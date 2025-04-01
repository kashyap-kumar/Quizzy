<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz Results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach(session('quiz.questions') as $index => $question)
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold">
                                @if($question->question_image)
                                    <img src="{{ asset('storage/'.$question->question_image) }}" class="max-w-full h-auto">
                                @else
                                    {{ $question->question_text }}
                                @endif
                            </h3>
                            
                            @foreach($question->options as $option)
                                <div class="@if($option->is_correct) bg-green-100 @elseif(!$option->is_correct && session('quiz.answers')[$index] === false) bg-red-100 @endif p-3 my-2 rounded">
                                    @if($option->option_image)
                                        <img src="{{ asset('storage/'.$option->option_image) }}">
                                    @else
                                        {{ $option->option_text }}
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    <div class="mt-6">
                        <a href="{{ route('quiz.select-subject') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Start New Quiz
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 