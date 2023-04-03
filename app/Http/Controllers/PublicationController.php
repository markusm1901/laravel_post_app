<?php

namespace App\Http\Controllers;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\PublicationRequest;
class PublicationController extends Controller
{

    public function show(int $id)
    {
        $post = Publication::where('id',$id)->firstOrFail();
        return view('post',['post' => $post, 'comments'=>$post->comments]);
        //NOTE: $post->comments to null?
    }
    public function index()
    {
        $publications = Publication::orderBy('created_at','desc')->limit(1)->get();
        // return view('posts', ['publications' => $publications, 'comments'=>$publications->comments]);
        return view('posts', ['publications' => $publications,'comments'=>$publications[0]->comments]);
        //NOTE: blad, ze nie ma publications->comment
    }
    public function store(PublicationRequest $request)
    {
        // $data = $request->all();
        $data = $request->validated();
        $newPost = new Publication($data);
        // if ($request->user()->id !== $newPost->user_id) {
        //     abort(404);
        // }
        $newPost->author_id = $request->user()->id;
        $newPost->save();
        // echo "dodajemy post";
        // return redirect('posts'); -> raczej to
        return redirect()->route('post',[
            'publication'=>$newPost->id
        ])->with('success','dodano publikacje pomyslnie');
    }
    public function create()
    {
        $users = User::all();
        return view("form",['users'=> $users, 'post'=>null]);
    }
    public function edit(Publication $publication)
    {
        $users = User::all();
        return view('form', [
            'users' => $users,
            'post' => $publication
        ]);
    }
    public function update(Publication $publication, PublicationRequest $request)
{
    $data = $request->validated();
    if ($request->user()->id !== $publication->author_id) {
        abort(404);
    }
    $publication->fill($data);
    $publication->save();
    return redirect()->route('post', [
        'publication' => $publication->id
    ])->with('success', 'Zmiany zapisane');
}
public function destroy(Publication $publication, Request $request)
{
    if ($request->user()->id !== $publication->author_id) {
        abort(404);
    }
    $publication->comments()->delete();
    $publication->delete();
    return redirect()->route('posts');
}

}
