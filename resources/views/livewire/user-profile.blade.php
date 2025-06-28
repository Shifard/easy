<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
    <header class="mb-12">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900">{{ $user->name }}</h1>
        <p class="mt-2 text-sm text-gray-500">&#64;{{ $user->username }}</p>
    </header>


    @foreach ($blogs as $blog)
        <article>
            <a href="{{ route('blog.view', ['blog' => $blog->slug]) }}" wire:navigate class="block">
                <h2 class="text-2xl font-bold text-gray-900 hover:text-indigo-600">
                    {{ $blog->title }}
                </h2>
                <p class="mt-3 text-base text-gray-600 line-clamp-2">
                    {{ $blog->description }}
                </p>
            </a>
            <div class="mt-4 text-xs text-gray-500">
                <span>Published on {{ $blog->updated_at->format('F j, Y') }}</span>
            </div>
        </article>
    @endforeach
</div>
