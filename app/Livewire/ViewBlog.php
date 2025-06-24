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

    public function delete()
    {
        $this->authorize('delete', $this->blog);

        $this->blog->delete();

        return redirect()->route('profile', ['user' => $this->blog->user]);
    }

    public function render()
    {
        return view('livewire.view-blog');
    }
}
