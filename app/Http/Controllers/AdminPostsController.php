<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\StaticAnalysis\HappyPath\AssertIsArray\consume;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();


        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth()->user();
        $input = $request->all();

        if($file = $request->file('file')){

            $image = new Image();
            $time = time();
            $image->orginal_name = $file->getClientOriginalName();
            $image->type = $file->getClientOriginalExtension();
            $image->size = $file->getSize();
            $image->name = $time . '_' . $user->id.'.'.$image->type;
            $image->save();

            $input['image_id'] = $image->id;
            $file->move('upload/images', $image->name);

        }
        $user->posts()->create($input);
        return redirect()->route('admin.posts.index')->with('alert-success', 'Post has been created!');






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.post.edit', compact('post','categories'));
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
        $user = Auth()->user();
        $input = $request->all();
        $post = $user->posts()->whereId($id)->first();

        if($file = $request->file('file')){

            $image = new Image();
            $time = time();
            $image->orginal_name = $file->getClientOriginalName();
            $image->type = $file->getClientOriginalExtension();
            $image->size = $file->getSize();
            $image->name = $time . '_' . $user->id.'.'.$image->type;
            $image->save();

            $input['image_id'] = $image->id;
            $file->move('upload/images', $image->name);

            if($post->image){
                unlink(public_path() . $post->image->dir . $post->image->name);
                $post->image->delete();
            }



        }
        $post->update($input);
        return redirect()->route('admin.posts.index')->with('alert-success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path() . $post->image->path);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('alert-success', 'Post has been deleted!.');
    }

    public function post(Request $request, $slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('home.post', compact('post'));
    }
    public function deletePosts(Request $request){
//        return $request->all();
        $posts = Post::findOrFail($request->array);
        foreach($posts as $post){
            unlink(public_path() . $post->image->path);
            $post->delete();
        }
        return redirect()->back();

    }
}
