<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Question;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $question = Question::create([
            'subject_id' => $request->subject_id,
            'question_text' => $request->question_text,
            'question_image' => $request->hasFile('question_image') ? 
                $request->file('question_image')->store('questions', 'public') : null,
        ]);

        foreach ($request->options as $index => $option) {
            $question->options()->create([
                'option_text' => $option['text'],
                'option_image' => isset($option['image']) ? 
                    $option['image']->store('options', 'public') : null,
                'is_correct' => $request->correct_answer == $index
            ]);
        }

        return redirect()->route('admin.create');
    }

    public function createSubject()
    {
        return view('admin.subjects.create');
    }

    public function storeSubject(Request $request)
    {
        Subject::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.subjects.create');
    }
} 