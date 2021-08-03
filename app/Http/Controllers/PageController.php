<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('welcome',[
            'articles' => $articles,
        ]);
    }
}
