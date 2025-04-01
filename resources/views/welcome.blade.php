<x-app-layout>
    <div class="relative min-h-screen bg-gradient-to-br from-indigo-100 via-white to-pink-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <!-- Hero Section -->
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-[75vh]">
            <div class="container relative mx-auto">
                <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                        <div class="pr-12">
                            <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-6">
                                Welcome to Quizzy
                                <span class="block text-2xl font-normal mt-2">Test Your Knowledge</span>
                            </h1>
                            <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
                                Challenge yourself with our interactive quizzes. Learn, test, and improve your knowledge across various subjects.
                            </p>
                            <a href="{{ route('quiz.select-subject') }}" 
                               class="mt-8 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 transition-all duration-300 transform hover:scale-105">
                                Start Your Journey
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <section class="pb-20 bg-white dark:bg-gray-800 -mt-32">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap">
                    <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-700 w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                </div>
                                <h6 class="text-xl font-semibold dark:text-white">Take Quizzes</h6>
                                <p class="mt-2 mb-4 text-gray-600 dark:text-gray-300">
                                    Test your knowledge with our curated questions across various subjects.
                                </p>
                                <a href="{{ route('quiz.select-subject') }}" class="text-indigo-600 hover:text-indigo-500 font-medium">Start Quiz →</a>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-4/12 px-4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-700 w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <h6 class="text-xl font-semibold dark:text-white">Create Subjects</h6>
                                <p class="mt-2 mb-4 text-gray-600 dark:text-gray-300">
                                    Add new subjects to expand our quiz database.
                                </p>
                                <a href="{{ route('admin.subjects.create') }}" class="text-indigo-600 hover:text-indigo-500 font-medium">Add Subject →</a>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-700 w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h6 class="text-xl font-semibold dark:text-white">Create Questions</h6>
                                <p class="mt-2 mb-4 text-gray-600 dark:text-gray-300">
                                    Add new questions with text and images to make quizzes more engaging.
                                </p>
                                <a href="{{ route('admin.create') }}" class="text-indigo-600 hover:text-indigo-500 font-medium">Add Question →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="relative bg-gray-100 dark:bg-gray-900 pt-8 pb-6">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap text-center lg:text-left">
                    <div class="w-full lg:w-6/12 px-4">
                        <h4 class="text-3xl font-semibold text-gray-900 dark:text-white">Let's learn together!</h4>
                        <h5 class="text-lg mt-0 mb-2 text-gray-600 dark:text-gray-300">
                            Find us on any of these platforms.
                        </h5>
                        <div class="mt-6 lg:mb-0 mb-6">
                            <a href="#" class="bg-white dark:bg-gray-800 text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-flex" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="bg-white dark:bg-gray-800 text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-flex" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                                </svg>
                            </a>
                            <a href="#" class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-flex" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="flex flex-wrap items-top mb-6">
                            <div class="w-full lg:w-4/12 px-4 ml-auto">
                                <span class="block uppercase text-gray-600 dark:text-gray-400 text-sm font-semibold mb-2">Useful Links</span>
                                <ul class="list-unstyled">
                                    <li>
                                        <a class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-semibold block pb-2 text-sm" href="{{ route('quiz.select-subject') }}">Take Quiz</a>
                                    </li>
                                    <li>
                                        <a class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-semibold block pb-2 text-sm" href="{{ route('admin.subjects.create') }}">Add Subject</a>
                                    </li>
                                    <li>
                                        <a class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-semibold block pb-2 text-sm" href="{{ route('admin.create') }}">Add Question</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-gray-300 dark:border-gray-700">
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                        <div class="text-sm text-gray-600 dark:text-gray-400 font-semibold py-1">
                            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</x-app-layout>
