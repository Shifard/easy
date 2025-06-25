<div>
    <a href="{{ route('profile', ['user' => $blog->user]) }}" class="mb-12">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900">{{ $blog->user->name }}</h1>
        <p class="mt-2 text-sm text-gray-500">&#64;{{ $blog->user->username }}</p>
    </a>

    <p>{{ $blog->updated_at }}</p>
    <p>{{ $blog->title }}</p>
    <p>{{ $blog->description }}</p>
    <p>{!! $htmlBody !!}</p>

    @can('update', $blog)
        <a href="{{ route('blog.edit', ['blog' => $blog, 'user' => $blog->user->username]) }}"
            wire:navigate
            class="px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
            Edit
        </a>
    @endcan
    @can('delete', $blog)
        <button
           wire:click="delete"
           wire:confirm="Are you sure you want to delete this post? This cannot be undone."
           class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">
           Delete
        </button>
    @endcan
</div>
