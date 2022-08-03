<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use App\Models\Artisan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;


class CategoryController extends Controller
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
            'categories' => Category::whereNull('parent_category')
            ->orderBy('created_at', 'desc')
            ->with(['categories'])
            ->get()
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
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        $category = new Category;

        $category->name = $validated['name'] ?? null;
		$category->description = $validated['description'] ?? null;
		$category->slug = Str::slug($validated['name']);
		$category->parent_category = $validated['parent_category'] ?? null;
		$category->img_url = $validated['img_url'] ?? null;
		
        $category->save();

        $data = [
            'success'       => true,
            'category'   => $category
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $data = [
            'success' => true,
            'category' => $category
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        $category->name = $validated['name'] ?? null;
		$category->description = $validated['description'] ?? null;
		$category->slug = Str::slug($validated['name']);
		$category->parent_category = $validated['parent_category'] ?? null;
		$category->img_url = $validated['img_url'] ?? null;
		
        $category->save();

        $data = [
            'success'       => true,
            'category'   => $category
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {   
        $category->delete();

        $data = [
            'success' => true,
            'category' => $category
        ];

        return response()->json($data);
    }

    public function artisans(Request $request, string $slug) {
        $category = Category::where('slug', $slug)->first();
        $artisan_ids = collect(Article::where('category_id', $category->id)->get())
        ->map(function($article) {
            return $article->artisan_id;
        });
        $artisans = Artisan::whereIn('id', [...$artisan_ids])
        ->with(['page'])->orderBy('created_at', 'desc')
        ->paginate(env('PAGINATE'));

        $data = [
            'success' => true,
            'artisans' => $artisans
        ];
        
        return response()->json($data);
    }

    public function articles(Request $request, string $slug) {
        $category = Category::where('slug', $slug)->with(['categories'])->first();
        $sub_categories_ids = [];

        if (isset($category->categories)) {
            $sub_categories_ids = collect($category->categories)->map(function($sub_categorie) {
                return $sub_categorie->id;
            });
        }

        $articles = Article::whereIn('category_id', $sub_categories_ids)
        ->orderBy('created_at', 'desc')
        ->paginate(env('PAGINATE'));

        $data = [
            "success" => true,
            "articles" => $articles
        ];
        
        return response()->json($data);
    }
}