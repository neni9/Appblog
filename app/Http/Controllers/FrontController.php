<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\User;
use View;
use Cache;
use App\Score;
use Auth;
use App\Http\Requests\ScoreRequest;
use Carbon\Carbon;


class FrontController extends Controller

{

    public function __construct() {

        View::composer('partials.nav',
            function($view) {

                $categories = Category::lists('title', 'id');
                $view -> with(compact('categories'));

            });
    }

    public function index()
    
    {
        $posts = Post::with('category', 'user', 'tags','picture')
                ->opened()
                ->paginate(10);

        $title = "Le titre de ma page";

        return view('front.index', compact('posts', 'title'));
    }


    public function show($id) {

        $post = Post::findOrFail($id);
        $title = 'Article - '.$post -> title;

        return view('front.single', compact('post', 'title'));
    }

    public function showPostByCat($id = null) {

        if (!$id) {

            $categories = Category::all();
            $title = 'Toutes les catégories';

            return view('front.categories', compact('categories', 'title'));
        }

        $category = Category::findOrFail($id);
        $title = $category -> title;

        return view('front.category', compact('category', 'title'));
    }

    public function showPostByUser($id) {
        
        $user = User::findOrFail($id);
        $posts = User::find($id) -> posts;
        $title = $user -> name;

        return view('front.showPostByUser', compact('posts', 'title', 'user'));
    }
     public function ScorePost( ScoreRequest $request, Post $post)
     {
        $score = new Score;
        $score->post_id = $post->id;
        $score->user_id = Auth::user()->id;
        $score->score =$request->input('score');
        $score->touch();

        return back();
    }
}