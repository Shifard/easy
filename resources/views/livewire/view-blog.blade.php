<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Back Arrow -->
    <div class="mb-8">
        <a href="{{ url()->previous() }}" class="flex items-center text-gray-500 hover:text-gray-700">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back
        </a>
    </div>
    
    <article>
        <header class="mb-6">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 leading-tight">
                {{ $blog->title }}
            </h1>
            <p class="mt-2 text-lg text-gray-600">
                {{ $blog->description }}
            </p>
        </header>

        <div class="flex items-center space-x-4 mb-6">
            @can('update', $blog)
                <a href="{{ route('blog.edit', ['blog' => $blog]) }}"
                    wire:navigate
                    class="inline-flex items-center px-4 py-2 bg-brand-yellow border border-transparent rounded-lg text-sm font-semibold text-gray-800 tracking-wider hover:bg-brand-yellow-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 shadow-sm transition-all duration-200">
                    Edit
                </a>
            @endcan
            @can('delete', $blog)
                <button
                    wire:click="delete"
                    wire:confirm="Are you sure you want to delete this post? This cannot be undone."
                    class="inline-flex items-center px-4 py-2 bg-brand-red border border-transparent rounded-lg text-sm font-semibold text-white tracking-wider hover:bg-brand-red-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400 shadow-sm transition-all duration-200">
                    Delete
                </button>
            @endcan
        </div>

        <div class="prose prose-lg max-w-none text-gray-800">
            {!! $htmlBody !!}
        </div>
    </article>
</div>