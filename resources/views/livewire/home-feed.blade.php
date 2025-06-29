<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-black brand-purple tracking-wider">BLOGS</h1>
        <a href="{{ route('blog.write') }}" wire:navigate class="inline-flex items-center bg-brand-purple text-white text-sm font-semibold px-6 py-3 rounded-lg hover:bg-brand-purple-dark transition shadow-md">
            + Create New
        </a>
    </div>

    <div class="space-y-8">
        @forelse ($blogs as $blog)
            <article class="bg-white p-6 rounded-2xl shadow-lg transition hover:shadow-xl">
                <a href="{{ route('blog.view', ['blog' => $blog->slug]) }}" wire:navigate class="block">
                    <div class="flex justify-between items-start">
                            <div>
                            <h2 class="text-2xl font-bold brand-purple hover:underline">
                                {{ $blog->title }}
                            </h2>
                            <p class="text-sm font-semibold text-gray-700 mt-2">By {{ $blog->user->name }}</p>
                            </div>
                            <div class="text-xs text-gray-500 text-right shrink-0 ml-4">
                            <span>{{ $blog->updated_at->format('F j, Y') }}</span>
                        </div>
                    </div>
                    <p class="mt-4 text-base text-gray-600 line-clamp-3">
                        {{ $blog->description }}
                    </p>
                </a>
            </article>
        @empty
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                <h2 class="text-xl font-semibold text-gray-700">No blogs yet!</h2>
                <p class="mt-2 text-gray-500">Why don't you create the first one?</p>
            </div>
        @endforelse
    </div>
</div>