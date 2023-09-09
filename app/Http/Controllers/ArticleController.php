<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Image;
use App\Models\AddPost;
use App\Models\Article;
use App\Models\Category;
use App\Models\Categories;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        

        return view('addpost.addPost', [
            'articles' => $articles
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();

        $tags = Tag::all();
        return view('addpost.addPost', [
            'categories' => $categories,
            'tags' => $tags
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        $article = new Article;

        $article->title = $request->title;
        $article->content = $request->content;
        $article->price = $request->price;
        $article->user_id = auth()->user()->id;

        $article->save();

        if($request->file('image')){

            $image = $request->file('image');

            $image_columns = [];

            foreach($image as $image){

                $imageId = uniqid();

                $filename = 'article-post-' . $imageId . '.' . $image->extension();

                $image_columns[] = ['file_name' => $filename, 'file_id' => $imageId, 'article_id' => $article->id];

                Image::insert(
                    
                    $image_columns
                );

                $image = $image->storeAs('public', $filename);

                $image->save();

            }

        }

        // Categories

        $categories = $request->categories;

        $currentArticle = Article::find($article->id);

        foreach($categories as $category){

            $currentArticle->categories()->attach($category);
        }

        return redirect()->route('home');

        // Tags

        $tags = $request->tags;

        $$currentArticle = Article::find($id);

        foreach($tags as $tag){
            
            $currentArticle->tags()->attach($tag);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article, $id)
    {
        $articles = Article::find($id);

        $categories = Categories::all();

        $tags = TAg::all();

        if(auth()->user()->id == $articles->user_id){

            return view('addpost.editPost', [
                'articles' => $articles,
                'categories' => $categories,
                'tags' => $tags

            ]);
        }
        else{
        
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article, $id)
    {
        $imageId = uniqid();

        $article = Article::find($id);

        if(auth()->user()->id == $article->user_id){
            
            $article->title = $request->title;
            $article->content = $request->content;
            $article->price = $request->price;
            $article->user_id = auth()->user()->id;

            $article->save();

            if($request->file('image')){
    
                $image = $request->file('image');
    
                $image_columns = [];
    
                foreach($image as $image){

                    $imageId = uniqid();

                    $filename = 'article-post-' . $imageId . '.' . $image->extension();
    
                    $image_columns[] = ['file_name' => $filename, 'file_id' => $imageId, 'article_id' => $article->id];
    
                    Image::insert(
                        
                        $image_columns
                    );
    
                    $image = $image->storeAs('public', $filename);
    
                }
    
            }    

            $currentArticle = Article::find($article->id);

            $allCategories = Categories::all();

            $allTags = Tag::all();

            // Elimino la vecchia categoria selezionata in precendenza (se esistente)

            foreach($allCategories as $category){

                $currentArticle->categories()->detach($category->id);
            }

            // Elimino la vecchia tag selexionata in precedenza (se esistente)
            
            foreach($allTags as $tag ){

                $currentArticle->tags()->detach($tag);

            }

            // metto una nuova categoria all'articolo

            $categories = $request->categories;


            foreach($categories as $category){

                $currentArticle->categories()->attach($category);
            }

            // metto una nuova tag all'articolo

            $tags = $request->tags;

            foreach($tags as $tag){

                $currentArticle->tags()->attach($tag);
            }

            return redirect()->route('profile', $id);

        }else {

            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article, $id)
    {
        $article = Article::find($id);

        $article->delete();

        return redirect()->route('profile');
    }
}
