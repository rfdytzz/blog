@extends('layout.main')

@section('title', 'Home')

@section('content')

    <section class="py-20 px-6 bg-gray-900 h-screen flex pt-10 lg:pt-50">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                Share your <span class="text-lime-600 dark:text-lime-400">Article</span> or Beautiful <span class="text-lime-600 dark:text-lime-400">Story</span>
                
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto">
                A Blog Platform components to help you create stunning websites without starting from scratch.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/blog"
                    class="w-full sm:w-auto px-8 py-4 bg-lime-600 text-white font-semibold rounded-lg hover:bg-lime-700 transition-colors">
                    Blog
                </a>
                @auth
                                    <a href="{{ route('myblog', $user->id) }}"
                    class="w-full sm:w-auto px-8 py-4 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-lg hover:border-lime-600 hover:text-lime-600 dark:hover:border-lime-400 dark:hover:text-lime-400 transition-colors">
                    My Blog
                </a>
                @endauth
            </div>
        </div>
    </section>
@endsection
