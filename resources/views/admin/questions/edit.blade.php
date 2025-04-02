<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.questions.update', $question) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="subject_id" class="block text-sm font-medium text-gray-700">Subject</label>
                            <select name="subject_id" id="subject_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Select a subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ old('subject_id', $question->subject_id) == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="question_text" class="block text-sm font-medium text-gray-700">Question Text</label>
                            <textarea name="question_text" id="question_text" rows="3" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('question_text', $question->question_text) }}</textarea>
                            @error('question_text')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="question_image" class="block text-sm font-medium text-gray-700">Question Image (Optional)</label>
                            <div id="question_image_preview" class="mb-2">
                                @if($question->question_image)
                                    <img src="{{ asset('storage/'.$question->question_image) }}" class="max-w-xs">
                                @endif
                            </div>
                            <input type="file" name="question_image" id="question_image" accept="image/*"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            @error('question_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Options</label>
                            @foreach($question->options as $index => $option)
                                <div class="mb-4 p-4 border rounded-md">
                                    <div class="flex items-center mb-2">
                                        <input type="checkbox" name="correct_answers[]" value="{{ $index }}"
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                            {{ in_array($index, old('correct_answers', $question->options->where('is_correct', true)->pluck('id')->map(function($id) use ($question) {
                                                return $question->options->search(function($option) use ($id) {
                                                    return $option->id === $id;
                                                });
                                            })->toArray())) ? 'checked' : '' }}>
                                        <label class="ml-2 block text-sm font-medium text-gray-700">Correct Answer</label>
                                    </div>
                                    <div class="mb-2">
                                        <label class="block text-sm font-medium text-gray-700">Option Text</label>
                                        <input type="text" name="options[{{ $index }}][text]" required
                                            value="{{ old("options.{$index}.text", $option->option_text) }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    </div>
                                    <div class="mb-2">
                                        <label class="block text-sm font-medium text-gray-700">Option Image (Optional)</label>
                                        <div id="options_{{ $index }}_image_preview" class="mb-2">
                                            @if($option->option_image)
                                                <img src="{{ asset('storage/'.$option->option_image) }}" class="max-w-xs">
                                            @endif
                                        </div>
                                        <input type="file" name="options[{{ $index }}][image]" id="options_{{ $index }}_image" accept="image/*"
                                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                    </div>
                                </div>
                            @endforeach
                            @error('options')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @error('correct_answers')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.questions.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">Cancel</a>
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                                Update Question
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/image-paste.js') }}"></script>
    @endpush
</x-app-layout> 