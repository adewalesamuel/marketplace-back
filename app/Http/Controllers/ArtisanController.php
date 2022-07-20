<?php
namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\Page;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArtisanRequest;
use App\Http\Requests\UpdateArtisanRequest;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Str;
use App\Http\Auth;


class ArtisanController extends Controller
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
            'artisans' => Artisan::where('id', '>', -1)
            ->with(['page'])->orderBy('created_at', 'desc')->get()
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
    public function store(StoreArtisanRequest $request)
    {
        $validated = $request->validated();

        $artisan = new Artisan;

        $artisan->name = $validated['name'] ?? null;
		$artisan->email = $validated['email'] ?? null;
		$artisan->password = $validated['password'] ?? null;
		$artisan->phone = $validated['phone'] ?? null;
		$artisan->country = $validated['country'] ?? null;
		$artisan->city = $validated['city'] ?? null;
		$artisan->postal_code = $validated['postal_code'] ?? null;
		$artisan->address = $validated['address'] ?? null;
		$artisan->is_active = $validated['is_active'] ?? null;
		$artisan->img_url = $validated['img_url'] ?? null;
        $artisan->api_token = Str::random(60);
		
        $artisan->save();

        $data = [
            'success'       => true,
            'artisan'   => $artisan
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artisan  $artisan
     * @return \Illuminate\Http\Response
     */
    public function show(Artisan $artisan)
    {
        $data = [
            'success' => true,
            'artisan' => $artisan
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artisan  $artisan
     * @return \Illuminate\Http\Response
     */
    public function edit(Artisan $artisan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artisan  $artisan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtisanRequest $request, Artisan $artisan)
    {
        $validated = $request->validated();

        $artisan->name = $validated['name'] ?? null;
		$artisan->email = $validated['email'] ?? null;
		$artisan->password = $validated['password'] ?? null;
		$artisan->phone = $validated['phone'] ?? null;
		$artisan->country = $validated['country'] ?? null;
		$artisan->city = $validated['city'] ?? null;
		$artisan->postal_code = $validated['postal_code'] ?? null;
		$artisan->address = $validated['address'] ?? null;
		$artisan->is_active = $validated['is_active'] ?? null;
		$artisan->img_url = $validated['img_url'] ?? null;
		
        $artisan->save();

        $data = [
            'success'       => true,
            'artisan'   => $artisan
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artisan  $artisan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artisan $artisan)
    {   
        $artisan->delete();

        $data = [
            'success' => true,
            'artisan' => $artisan
        ];

        return response()->json($data);
    }

    public function storePage(StorePageRequest $request) {
        $user = Auth::getUser($request, Auth::ARTISAN);
        $validated = $request->validated();
        $page = new Page;

        $page->content = $validated['content'] ?? null;
		$page->title = $validated['title'] ?? null;
		$page->artisan_id = $user->id;
		
        $page->save();

        $data = [
            'success'=> true,
            'page'   => $page
        ];

        return response()->json($data);
    }
   
    public function updatePage(UpdatePageRequest $request, Page $page) {
        $user = Auth::getUser($request, Auth::ARTISAN);
        $validated = $request->validated();
        $page = new Page;

        $page->content = $validated['content'] ?? null;
		$page->title = $validated['title'] ?? null;
        $page->artisan_id = $user->id;
		
        $page->save();

        $data = [
            'success'=> true,
            'page'   => $page
        ];

        return response()->json($data);
    }

    public function storeArticle(StoreArticleRequest $request) {
        $user = Auth::getUser($request, Auth::ARTISAN);
        $validated = $request->validated();
        $article = new Article;

        $article->name = $validated['name'] ?? null;
        $article->slug = Str::slug($validated['name']) . random_int(1000, 9999);
		$article->description = $validated['description'] ?? null;
		$article->type = $validated['type'] ?? null;
		$article->quantity = $validated['quantity'] ?? null;
		$article->price = $validated['price'] ?? null;
		$article->discount = $validated['discount'] ?? null;
		$article->category_id = $validated['category_id'] ?? null;
		$article->attributes = $validated['attributes'] ?? null;
		$article->img_urls = $validated['img_urls'] ?? null;
        $article->artisan_id = $user->id;
        
        $article->save();

        $data = [
            'success'=> true,
            'article'   => $article
        ];

        return response()->json($data);
    }

    public function updateArticle(UpdateArticleRequest $request, Article $article) {
        $user = Auth::getUser($request, Auth::ARTISAN);
        $validated = $request->validated();

        $article->name = $validated['name'] ?? null;
		$article->description = $validated['description'] ?? null;
		$article->type = $validated['type'] ?? null;
		$article->quantity = $validated['quantity'] ?? null;
		$article->price = $validated['price'] ?? null;
		$article->discount = $validated['discount'] ?? null;
		$article->category_id = $validated['category_id'] ?? null;
		$article->attributes = $validated['attributes'] ?? null;
		$article->img_urls = $validated['img_urls'] ?? null;
        $article->artisan_id = $user->id;
        
        $article->save();

        $data = [
            'success'  => true,
            'article'  => $article
        ];

        return response()->json($data);
    }

    public function destroyArticle(Request $request, Article $article) {
        $user = Auth::getUser($request, Auth::ARTISAN);

        if ($user->id !== $article->artisan_id) {
            $data = [
                "error" => true,
                "message" => "Une erreure est survene!"
            ];
            
            return response()->json($data, 401);
        }

        $article->delete();

        $data = [
            'success' => true,
            'article' => $article
        ];

        return response()->json($data);
    }
}