<div>
    <p>{{ $blog->user->name }}</p>
    <p>{{ $blog->updated_at }}</p>
    <p>{{ $blog->title }}</p>
    <p>{{ $blog->description }}</p>
    <p>{{ $blog->content }}</p>
    <a href="{{ route('blog.edit', ['blog' => $blog, 'user' => $blog->user->username]) }}"
        wire:navigate
        class="px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
        Edit
    </a>
    <button
       wire:click="delete"
       wire:confirm="Are you sure you want to delete this post? This cannot be undone."
       class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">
       Delete
    </button>
</div>
