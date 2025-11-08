<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostComments extends Component {
    public Post $post;
    public $newComment = '';

    protected $rules = [
        'newComment' => 'required|string|max:1000',
    ];

    public function addComment () {
        $this->validate();

        $this->post->comments()->create([
            'user_id' => Auth::id(),
            'comment' => $this->newComment,
        ]);

        $this->newComment = '';

        $this->refreshComments();
    }

    public function getListeners () {
        return [
            "echo:post.{$this->post->id},CommentCreated" => '$refreshComments',
        ];
    }
    
    public function refreshComments () {
        $this->post->load('comments.user');
    }
    

    public function render () {
        return view('livewire.post-comments', [
            'comments' => $this->post->comments()->latest()->get()
        ]);
    }
}
