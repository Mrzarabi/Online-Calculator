<?php

namespace App\Http\Controllers\V1\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Article\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( auth()->user()->isAbleTo('article-read') ) {

            $articles = Article::with('user')
                ->latest()
                ->paginate(9);
        
            return view('v1.panel.layouts.article.articles', compact('articles'));
        } else {

            abort(403, 'Forbidden.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( auth()->user()->isAbleTo('article-create') ) {
            
            return view('v1.panel.layouts.article.article');
        } else {

            abort(403, 'Forbidden.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        if( auth()->user()->isAbleTo('article-create') ) {

            DB::transaction(function () use($request) {
                if ($request->hasFile('image')) {
    
                    $article = Auth::User()->articles()->create( 
                        array_merge($request->all() , [
                            'image' => $this->upload($request->file('image'))
                        ]) 
                    );
                } else {
    
                    $article = Auth::User()->articles()->create($request->all());
                }

                $this->custom_alert('Article ' . $article->title, 'submited');
            });
            return redirect()->route('articles.index');
        } else {

            abort(403, 'Forbidden.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if( auth()->user()->isAbleTo('article-create') ) {

            return view('v1.panel.layouts.article.article', compact('article'));
        }else {

            abort(403, 'Forbidden.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {

        if(auth()->user()->isAbleTo('article-update') ) {

            DB::transaction(function () use($request, $article) {
                if ($request->hasFile('image')) {
                    
                    $article->update( array_merge(
                        $request->all(), [
                            'image' => $this->upload($request->file('image')),
                        ]
                    ));
                } else {

                    $article->update($request->all());
                }
            });
            
            $this->custom_alert('Article ' . $article->title, 'updated');
            return redirect()->route('articles.index');
        }else {

            abort(403, 'Forbidden.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if(auth()->user()->isAbleTo('article-delete') ) {

            DB::transaction(function () use($article) {
                $article = $article->delete();
            });
            
            $this->custom_alert('Article ' . $article->title, 'deleted');
            return redirect()->route('articles.index');
        } else {

            abort(403, 'Forbidden.');
        }
    }
}
