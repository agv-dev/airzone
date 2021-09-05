<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $post = Post::findOrFail($id);
        $loaded_post = $post->load('owner','users','comments');

        return response()->json(['body' => ['post' => $loaded_post]], 200);
    }
}
