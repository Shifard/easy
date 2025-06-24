<?php

namespace App\Livewire;

use App\Models\Blog;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Rule;

class WriteBlog extends Component
{
    #[Rule('required|string|min:5|max:255')]
    public $title = '';

    #[Rule('required|string|min:5|max:255')]
    public $description = '';

    #[Rule('required|string|min:5')]
    public $content = '';

    public function save()
    {
        $this->validate();

        $blog = Blog::create([
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'user_id' => auth()->id(),
            'slug' => Str::slug($this->title) . '-' . uniqid(),
        ]);

        return redirect()->route('blog.view', ['blog' => $blog->slug]);
    }

    public function render()
    {
        return view('livewire.write-blog');
    }
}
