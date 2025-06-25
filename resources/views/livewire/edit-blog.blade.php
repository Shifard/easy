<div x-data="{
    copyToClipboard(text) {
        const tempInput = document.createElement('input');
        tempInput.value = `![Image](${text})`;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        alert('Markdown URL copied to clipboard!');
    }
}">
    <form wire:submit="save">
        <header class="mb-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                Edit a Blog
            </h1>
        </header>

        <div class="space-y-6">
            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="mt-2">
                    <input wire:model.lazy="title" id="title" name="title" type="text"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Your Awesome Blog Title">
                </div>
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                <div class="mt-2">
                    <input wire:model.lazy="description" id="description" name="description" type="text"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Describe your blog.">
                </div>
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Manager Button -->
            <div>
                <button type="button" @click="$wire.showImageManager = true" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                    Manage Images
                </button>
            </div>

            {{-- Content --}}
            <div>
                <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                <div class="mt-2">
                    <textarea wire:model.lazy="content" id="content" name="content" rows="15"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Start writing your thoughts..."></textarea>
                </div>
                @error('content')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <button type="submit"
                class="inline-flex items-center px-6 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25 transition">
                Update blog
            </button>
        </div>
    </form>

    <!-- Image Manager Modal -->
    <div
        x-show="$wire.showImageManager"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-gray-900 bg-opacity-75"
        @keydown.escape.window="$wire.showImageManager = false"
        style="display: none;"
    >
        <div class="w-full max-w-4xl p-6 mx-4 bg-white rounded-lg shadow-xl" @click.away="$wire.showImageManager = false">
            <div class="flex items-center justify-between pb-4 border-b">
                <h3 class="text-2xl font-bold">Image Manager</h3>
                <button @click="$wire.showImageManager = false" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>

            <!-- Upload New Image Section -->
            <div class="py-4 border-b">
                <h4 class="text-lg font-semibold">Upload New Image</h4>
                <div class="mt-2">
                    <input type="file" wire:model="newImage" id="newImage" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                    <div wire:loading wire:target="newImage" class="mt-1 text-sm text-gray-500">Uploading...</div>
                    @error('newImage') <span class="mt-1 text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
                <button wire:click.prevent="uploadNewImage" class="inline-flex items-center px-3 py-1 mt-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700">
                    Upload
                </button>
            </div>

            <!-- Existing Images Gallery -->
            <div class="py-4">
                <h4 class="text-lg font-semibold">Existing Images</h4>
                @if($blog->hasMedia('images'))
                <div class="grid grid-cols-2 gap-4 mt-4 overflow-y-auto md:grid-cols-4 max-h-96">
                    @foreach($blog->getMedia('images') as $media)
                        <div class="relative group">
                            <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" class="object-cover w-full rounded-md aspect-square">
                            <div class="absolute inset-0 flex flex-col items-center justify-center p-2 text-center text-white transition-opacity bg-black bg-opacity-50 rounded-md opacity-0 group-hover:opacity-100">
                                <button @click="copyToClipboard('{{ $media->getUrl() }}')" class="px-2 py-1 mb-1 text-xs bg-blue-600 rounded">Copy URL</button>
                                <button wire:click.prevent="deleteImage({{ $media->id }})" wire:confirm="Are you sure you want to delete this image?" class="px-2 py-1 text-xs bg-red-600 rounded">Delete</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                    <p class="mt-4 text-sm text-gray-500">No images have been uploaded for this post yet.</p>
                @endif
            </div>
        </div>
    </div>

</div>