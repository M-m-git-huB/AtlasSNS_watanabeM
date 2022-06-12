<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(){
        
        $posts = \DB::table('users')
        ->select('posts.id','posts.post','posts.created_at','users.username','users.images')
        ->join('posts','users.id','=','posts.user_id')
        ->get();
        return view('posts.index',['posts'=>$posts]);
        
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');
        $user_id = Auth::id() ;
        \DB::table('posts')->insert([
            'post' => $post,
            'user_id' => $user_id
        ]);
 
        return redirect('top');
    }
    
    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();
 
        return redirect('top');
    }

    public function updateform($id)
    {
        $post = \DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('top', compact('post'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('top');
    }
}
