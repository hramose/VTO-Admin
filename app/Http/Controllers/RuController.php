<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Repositories\BlogRepository;
use App\Repositories\CommentRepository;
use App\Tasklist;
use Illuminate\Support\Facades\Session;


class RuController extends Controller {

 

/**
    * Show the admin panel.
    *
    * @param  App\Repositories\ContactRepository $contact_gestion
    * @param  App\Repositories\BlogRepository $blog_gestion
    * @param  App\Repositories\CommentRepository $comment_gestion
    * @return Response
    */
    public function index(
      
        BlogRepository $blog_gestion,
        CommentRepository $comment_gestion)
    {     
       
        $nbrPosts = $blog_gestion->getNumber();
        $nbrComments = $comment_gestion->getNumber();
        $tasklistall = Tasklist::all();
        Session::put('tasklisttkey', $tasklistall);
        $taskcount = Tasklist::count();
        Session::put('taskcountkey', $taskcount);
      

        return view('back.partials.ru', compact( 'nbrPosts', 'nbrComments','taskcountkey','tasklisttkey'));
    }


    

}
