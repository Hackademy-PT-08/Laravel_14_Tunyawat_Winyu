<?php

namespace App\Http\Controllers;

use App\Models\AddPost;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeCOntroller extends Controller
{
    public function index() {

        $articles = Article::all();
        return view('home.home', [
            'articles' => $articles
        ]);
    }
}
