<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    //登録済みのユーザーを一覧表示
    public function search(){

        $users = \DB::table('users')->get();
        return view('users.search',['users'=>$users]);
        // 

    }

    //ここに検索用のメソッド
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
 
        $query = User::query();
        //use宣言を記述して動かす
 
        if (!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }
  
        $books = $query->get();
 
        return view('book.index', compact('books', 'keyword', 'stock'));
    }

}
