<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Publication;


class CommentController extends Controller
{

    public function store(Publication $publication,CommentRequest $request)
    {
        $data = $request->validated();
        $newComment = new Comment($data);
        $newComment->post_id = $publication->id;
        $newComment->author_id = $request->user()->id;
        $newComment->save();
        return redirect()->route('post',['publication' => $newComment->post_id
        ])->with('success','dodano komentarz pomyslnie');
    }
    public function destroy(Comment $comment,Request $request){

        $post_id = $comment->post_id;
        $comment->delete();
        return redirect()->route('post', ['publication' => $post_id])->with('success','Usunięto Komentarz');
    }
}
