<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blog.list',compact('blogs'));
    }

    public function create()
    {
        return view('backend.blog.create');
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->summary = $request->input('summary');

        if($request->hasFile('summary_img'))
        {
            $summary_img = $request->file('summary_img');
            $path = $summary_img->store('images','public');
            $blog->summary_img = $path;
        }

        $blog->content = $request->input('content');
        $blog->author = $request->input('author');
        $blog->created = $request->input('created');
        $blog->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Add success!');
        //tao moi xong quay ve trang danh sach blog
        return redirect()->route('blog.index');

    }

    public function edit($id)
    {
        
        $blog = Blog::findOrFail($id);
        $blogs = Blog::all();
        return view('backend.blog.edit',compact('blog','blogs'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->summary = $request->input('summary');

        if($request->hasFile('summary_img'))
        {
            $currentImg = $blog->summary_img;
            if($currentImg)
            {
                Storage::delete('/public/'.$currentImg);
            }

            $summary_img = $request->file('summary_img');
            $path = $summary_img->store('images','public');
            $blog->summary_img = $path;
        }

        $blog->content = $request->input('content');
        $blog->author = $request->input('author');
        $blog->created = $request->input('created');
        $blog->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Update success!');
        //tao moi xong quay ve trang danh sach blog
        return route('blog.edit');

    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blog.delete',compact('blog'));
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $summary_img = $blog->summary_img;

        if($summary_img)
        {
            Storage::delete('/public/'. $summary_img);
        }

        $blog->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Delete success!');
        //xoa xong quay ve trang danh sach task
        return redirect()->route('blog.index');
    }
}
