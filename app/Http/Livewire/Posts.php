<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Posts extends Component
{
    public $title;

    protected $rules = [
        'title' => 'required',
        // 'image' => 'image|max:1024',
    ];

    public function render()
    {
        return view('livewire.posts', ['posts' => Post::latest()->get()]);
    }

    public function submit()
    {
        $this->validate();
        Post::create([
            'title' => $this->title,
            'description' => 'Some cool description',
            'user_id' => auth()->user()->id,
        ]);
        $this->title = '';
        session()->flash('message', 'Post created successfully.');
        return redirect()->back();
    }
}
