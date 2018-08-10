<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Notifications\NotifyNotification;
use App\User;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function push($data)
    {
        // Comment::create([
        //     'user_id' => Auth::user()->id,
        //     'comment' => $comment
        // ]);

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->message = $data;
        $comment->save();

        $user = User::all();
        $comment->user->notify(new NotifyNotification($comment, 'comment'));
        //event(new \App\Events\NotifyComment(Auth::user(), $comment));
        //return view('home');
    }
}
