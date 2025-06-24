<?php

namespace App\Livewire;

use App\Models\Blog;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Rule;

class EditBlog extends Component
{
    public Blog $blog;

    #[Rule('required|string|min:5|max:255')]
    public $title = '';

    #[Rule('required|string|min:5|max:255')]
    public $description = '';

    #[Rule('required|string|min:5')]
    public $content = '';

    public function mount(Blog $blog)
    {
        $this->authorize('update', $blog);

        $this->blog = $blog;
        $this->title = $blog->title;
        $this->description = $blog->description;
        $this->content = $blog->content;
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
