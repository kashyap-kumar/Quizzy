<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function selectSubject()
    {
        $subjects = Subject::all();
        return view('quiz.select-subject', compact('subjects'));
    }

    public function start(Subject $subject)
    {
        $questions = $subject->questions()->inRandomOrder()->limit(5)->get();
        $questions->each->increment('display_count');
        
        session()->put('quiz', [
            'questions' => $questions,
            'current' => 0,
            'answers' => []
        ]);

        return redirect()->route('quiz.question');
    }

    public function showQuestion()
    {
        $quiz = session('quiz');
        $question = $quiz['questions'][$quiz['current']];
        return view('quiz.question', compact('question'));
    }

    public function answer(Request $request)
    {
        $quiz = session('quiz');
        $question = $quiz['questions'][$quiz['current']];
        
        // Get all correct options for this question
        $correctOptions = $question->options()->where('is_correct', true)->pluck('id')->toArray();
        
        // Get user's selected answers
        $selectedAnswers = $request->has('answer') ? [$request->answer] : $request->input('answers', []);
        
        // Check if the number of selected answers matches the number of correct options
        // and if all selected answers are correct
        $isCorrect = count($selectedAnswers) === count($correctOptions) && 
                    empty(array_diff($selectedAnswers, $correctOptions));

        if ($isCorrect) {
            $question->increment('correct_count');
        } else {
            $question->increment('wrong_count');
        }

        // Store answer and move to next question
        $quiz['answers'][$quiz['current']] = $isCorrect;
        $quiz['current']++;
        session()->put('quiz', $quiz);

        if ($quiz['current'] >= count($quiz['questions'])) {
            return redirect()->route('quiz.results');
        }

        return redirect()->route('quiz.question');
    }

    public function results()
    {
        return view('quiz.results');
    }
} 