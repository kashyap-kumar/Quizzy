<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Questions') }}
            </h2>
            <a href="{{ route('admin.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                Add New Question
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Subject Filter -->
                    <div class="mb-6">
                        <form action="{{ route('admin.questions.index') }}" method="GET" class="flex items-center space-x-4">
                            <label for="subject_id" class="text-sm font-medium text-gray-700">Filter by Subject:</label>
                            <select name="subject_id" id="subject_id" 
                                class="mt-1 block w-64 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">All Subjects</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $selectedSubject == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                                Filter
                            </button>
                        </form>
                    </div>

                    <!-- Questions List -->
                    <div class="space-y-8">
                        @foreach($questions as $question)
                            <div class="border rounded-lg p-6 bg-white shadow-sm">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <span class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-600 mb-2">
                                            {{ $question->subject->name }}
                                        </span>
                                        <h3 class="text-lg font-semibold">
                                            {{ $question->question_text }}
                                            @if($question->question_image)
                                                <div class="mt-4">
                                                    <img src="{{ asset('storage/'.$question->question_image) }}" class="max-w-full h-auto rounded-lg shadow-sm">
                                                </div>
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.questions.edit', $question) }}" 
                                           class="text-indigo-600 hover:text-indigo-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.questions.destroy', $question) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Are you sure you want to delete this question?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    @foreach($question->options as $option)
                                        <div class="p-3 rounded-lg {{ $option->is_correct ? 'bg-green-100' : 'bg-gray-50' }}">
                                            <div class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    @if($option->is_correct)
                                                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-sm {{ $option->is_correct ? 'text-green-800' : 'text-gray-700' }}">
                                                        {{ $option->option_text }}
                                                    </p>
                                                    @if($option->option_image)
                                                        <div class="mt-2">
                                                            <img src="{{ asset('storage/'.$option->option_image) }}" class="max-w-full h-auto rounded-lg shadow-sm">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 