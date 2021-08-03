<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::latest()->paginate(5);
        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateRequest $request)
    {
         $request->validated();

         if($request->hasFile('image')) {
            // Get Filename
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Extension
            $extension =$request->file('image')->getClientOriginalExtension();
            // File format to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Storing image
            $filepath =$request->file('image')->storeAs('public/images', $filenameToStore);
         } else {
            $filenameToStore = 'noimage.png';
         }

         auth()->user()->articles()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $filenameToStore
         ]);

         return redirect()->route('dashboard')->with('success', 'Successfully created a new article...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, Article $article)
    {
         $request->validated();

         if($request->hasFile('image')) {
            // Get Filename
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Extension
            $extension =$request->file('image')->getClientOriginalExtension();
            // File format to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Storing image
            $filepath =$request->file('image')->storeAs('public/images', $filenameToStore);
         } else {
            $filenameToStore = $article->image;
         }

         $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $filenameToStore,
         ]);

         return redirect()->route('dashboard')->with('success', 'Successfully updated article...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->image != 'noimage.jpg') {
            Storage::delete('public/images/'. $article->image);
        }

        $article->delete();

        return redirect()->route('dashboard')->with('success', 'Successfully deleted article...');
    }
}
