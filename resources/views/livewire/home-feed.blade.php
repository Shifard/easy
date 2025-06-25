<div>
    @foreach ($blogs as $blog)
        <article class="mt-8">
            <a href="{{ route('blog.view', ['blog' => $blog->slug]) }}" wire:navigate class="block">
                <p>{{ $blog->user->name }}</p>
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
