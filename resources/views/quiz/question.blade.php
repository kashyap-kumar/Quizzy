<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Question') }} {{ session('quiz.current') + 1 }} of {{ count(session('quiz.questions')) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold">
                            @if($question->question_image)
                                <img src="{{ asset('storage/'.$question->question_image) }}" class="max-w-full h-auto mb-4">
                            @endif
                            {{ $question->question_text }}
                        </h3>
                        
                        <form method="POST" action="{{ route('quiz.answer') }}">
                            @csrf
                            @foreach($question->options as $option)
                                <div class="mb-4">
                                    <label class="flex items-center p-4 border rounded-lg hover:bg-gray-50 cursor-pointer">
                                        <input type="radio" name="answer" value="{{ $option->id }}" required
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                        <span class="ml-3">
                                            @if($option->option_image)
                                                <img src="{{ asset('storage/'.$option->option_image) }}" class="max-w-full h-auto mb-2">
                                            @endif
                                            {{ $option->option_text }}
                                        </span>
                                    </label>
                                </div>
                            @endforeach

                            <div class="flex items-center justify-end mt-6">
                                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                                    Next Question
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 