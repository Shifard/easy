<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">

    <div class="flex justify-between content-center">
      <h1 class="font-black text-4xl text-gray-600">BLOGS</h1>
        <a href="{{ route('blog.write') }}" wire:navigate class="bg-gray-600 text-white text-sm font-medium px-4 py-2 rounded-full hover:bg-gray-900 transition">
            + Create New
        </a>
    </div>

    <div>
        @foreach ($blogs as $blog)
            <article class="mt-8">
                <a href="{{ route('blog.view', ['blog' => $blog->slug]) }}" wire:navigate class="block">
                    <h2 class="text-2xl font-semibold text-gray-500 hover:text-indigo-600">
                        {{ $blog->title }}
                    </h2>
                    <p class="font-bold">{{ $blog->user->name }}</p>
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
</div>
