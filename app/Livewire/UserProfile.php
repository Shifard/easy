<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public User $user;
    public $blogs;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->blogs = Blog::where('user_id', $this->user->id)
                            ->orderBy('updated_at', 'desc')
                            ->get();
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
