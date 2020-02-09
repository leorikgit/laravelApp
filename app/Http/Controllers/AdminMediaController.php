<?php

namespace App\Http\Controllers;


use App\Image;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images  = Image::all();
        return view('admin.media.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');



        $orginal_name = $file->getClientOriginalName();
        $type = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $name = uniqid() . '.' . $type;
        $file->move('upload/images', $name);
        Image::create(['orginal_name'=>$orginal_name , 'type'=>$type, 'size'=>$size, 'name'=>$name]);

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


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        unlink(public_path() . $image->path);
        $image->delete();
        return redirect()->route('admin.media.index')->with('alert-success', 'image has been deleted.');
    }
}
