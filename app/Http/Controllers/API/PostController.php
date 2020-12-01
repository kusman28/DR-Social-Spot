<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::latest()->get();
    }

    public function comments($id) {
        $post = Post::findOrFail($id);
        $comments = $post->comments;
        return $comments;
    }

    public function posts() {
        
        // $wew = User::with('post')->where('id', auth()->user()->id)->latest()->get();
        // return $wew;
        return User::with('post')->latest()->paginate(8);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:255',
        ]);
            
        $post = new Post;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->user = $request->user;
        $post->likes = 0;

        $post->save();

        // return redirect('/home');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $post = Post::find($id);
        $comment = $post->comment($request->comment);
        $comment->save();
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function like(Request $request)
    {
        $post = Post::find($request->post);
        $value = $post->likes;
        $post->likes = $value+1;
        $post->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }
}
