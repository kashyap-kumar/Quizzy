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
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'question_text' => 'required|string',
            'question_image' => 'nullable|image|max:2048',
            'options' => 'required|array|size:4',
            'options.*.text' => 'required|string',
            'options.*.image' => 'nullable|image|max:2048',
            'correct_answers' => 'required|array|min:1',
            'correct_answers.*' => 'required|integer|min:0|max:3'
        ]);

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
                'is_correct' => in_array($index, $request->correct_answers)
            ]);
        }

        return redirect()->route('admin.create')->with('success', 'Question created successfully!');
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