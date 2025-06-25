<?php

namespace App\Livewire;

use App\Models\Blog;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class EditBlog extends Component
{
    use WithFileUploads;

    public Blog $blog;

    #[Rule('required|string|min:5|max:255')]
    public $title = '';

    #[Rule('required|string|min:5|max:255')]
    public $description = '';

    #[Rule('required|string|min:5')]
    public $content = '';

    public bool $showImageManager = false;

    #[Rule('nullable|image|max:10240')]
    public $newImage;

    public function mount(Blog $blog)
    {
        $this->authorize('update', $blog);

        $this->blog = $blog;
        $this->title = $blog->title;
        $this->description = $blog->description;
        $this->content = $blog->content;
    }

    public function uploadNewImage()
    {
        $this->validateOnly('newImage');

        if ($this->newImage){
            $this->blog->addMedia($this->newImage)
                ->toMediaCollection('images');
        }

        $this->newImage = null;
        $this->blog = $this->blog->refresh();
    }

    public function deleteImage(int $mediaId)
    {
        $media = Media::find($mediaId);

        if ($media && $media->model_id === $this->blog->id) {
            $media->delete();
        }

        $this->blog = $this->blog->fresh();
    }

    public function save()
    {
        $this->validate();

        $this->blog->update([
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
        ]);

        return redirect()->route('blog.view', ['blog' => $this->blog->slug]);
    }

    public function render()
    {
        return view('livewire.edit-blog');
    }
}
