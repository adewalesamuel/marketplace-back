<?php
namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Str;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'success' => true,
            'articles' => Article::where('id', '>', -1)
            ->orderBy('created_at', 'desc')->get()
        ];

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();

        $article = new Article;

        $article->name = $validated['name'] ?? null;
		$article->description = $validated['description'] ?? null;
		$article->type = $validated['type'] ?? null;
		$article->quantity = $validated['quantity'] ?? null;
		$article->price = $validated['price'] ?? null;
		$article->discount = $validated['discount'] ?? null;
		$article->artisan_id = $validated['artisan_id'] ?? null;
		$article->attributes = $validated['attributes'] ?? null;
		$article->period = $validated['period'] ?? null;
		$article->address = $validated['address'] ?? null;
		$article->img_url = $validated['img_url'] ?? null;
		
        $article->save();

        $data = [
            'success'       => true,
            'article'   => $article
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $data = [
            'success' => true,
            'article' => $article
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validated = $request->validated();

        $article->name = $validated['name'] ?? null;
		$article->description = $validated['description'] ?? null;
		$article->type = $validated['type'] ?? null;
		$article->quantity = $validated['quantity'] ?? null;
		$article->price = $validated['price'] ?? null;
		$article->discount = $validated['discount'] ?? null;
		$article->artisan_id = $validated['artisan_id'] ?? null;
		$article->attributes = $validated['attributes'] ?? null;
		$article->period = $validated['period'] ?? null;
		$article->address = $validated['address'] ?? null;
		$article->img_url = $validated['img_url'] ?? null;
		
        $article->save();

        $data = [
            'success'       => true,
            'article'   => $article
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {   
        $article->delete();

        $data = [
            'success' => true,
            'article' => $article
        ];

        return response()->json($data);
    }
}