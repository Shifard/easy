<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;

class ViewBlog extends Component
{
    public Blog $blog;

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function render()
    {
        return view('livewire.view-blog');
    }
}
