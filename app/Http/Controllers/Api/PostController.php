<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = $request->get('category');

        if($category){
            $posts = Post::join('category_posts', function($builder) {
                $builder->on('category_posts.post_id', '=', 'posts.id');
            })
            ->join('categories', function($builder) {
                $builder->on('categories.id', '=', 'category_posts.category_id');
                // here you can add more conditions on subcategories table.
            })
            ->where('name', 'LIKE', $category.'%')
            ->get();
        }
        else {
            $posts = Post::with(['user','categories'])->paginate(9);
        }



        return response()->json([
            'success' => true,
            'results' => $posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response()->json(
            [
                'success' => true,
                'results' => $post,
                'author' => $post->user,
                'categories' => $post->categories,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response('', 204);
    }
}
