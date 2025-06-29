<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <header class="mb-12">
            <h1 class="text-4xl font-bold tracking-tight brand-purple">{{ $user->name }}</h1>
            <p class="mt-1 text-sm text-gray-500">&#64;{{ $user->username }}</p>
        </header>

        <div class="space-y-8">
            @forelse ($blogs as $blog)
                <article class="bg-white p-6 rounded-2xl shadow-lg transition hover:shadow-xl">
                    <a href="{{ route('blog.view', ['blog' => $blog->slug]) }}" wire:navigate class="block">
                        <div class="flex justify-between items-start">
                             <div>
                                <h2 class="text-2xl font-bold brand-purple hover:underline">
                                    {{ $blog->title }}
                                </h2>
                                {{-- The author's name is already in the header, so we can omit it here or display other info --}}
                             </div>
                             <div class="text-xs text-gray-500 text-right shrink-0 ml-4">
                                <span>Published on {{ $blog->updated_at->format('F j, Y') }}</span>
                            </div>
                        </div>
                        <p class="mt-4 text-base text-gray-600 line-clamp-3">
                            {{ $blog->description }}
                        </p>
                    </a>
                </article>
            @empty
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <h2 class="text-xl font-semibold text-gray-700">{{ $user->name }} hasn't written any blogs yet.</h2>
                </div>
            @endforelse
        </div>
    </div>
</div>