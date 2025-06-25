<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;

class HomeFeed extends Component
{
    public $blogs;

    public function mount()
    {
        $this->blogs = Blog::with('user')->latest()->get();
    }

    public function render()
    {
        return view('livewire.home-feed');
    }
}
