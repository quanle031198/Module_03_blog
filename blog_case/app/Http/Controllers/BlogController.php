<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use PhpParser\Node\Expr\FuncCall;

class BlogController extends Controller
{

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function index()
    {
        $blogs = Blog::orderBy('id','DESC')->paginate(5);
        $categories = Category::all();
        return view('backend.blog.list',compact('blogs','categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.blog.create',compact('categories'));
    }

    public function store(FormBlogRequest $request)
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
        $blog->source = $request->input('source');
        $blog->created = $request->input('created');
        $blog->category_id = $request->input('category_id');
        $blog->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Add success!');
        //tao moi xong quay ve trang danh sach blog
        // return redirect()->route('blog.index');

    }

    public function edit($id)
    {
        
        $blog = Blog::findOrFail($id);
        $blogs = Blog::orderBy('id','DESC')->paginate(5);
        $categories = Category::all();
        return view('backend.blog.edit',compact('blog','blogs','categories'));
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
        $blog->source = $request->input('source');
        $blog->created = $request->input('created');
        $blog->category_id = $request->input('category_id');
        $blog->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Update success!');
        return redirect()->route('blog.edit', $id);

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

    public function detail($id){
        $blog = Blog::findOrFail($id);
        return view('backend.blog.detail',compact('blog'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if(!$keyword){
            return redirect()->route('blog.index');
        }

        $blogs = Blog::where('title','LIKE','%'.$keyword.'%')->paginate(10);
        // dd($blogs);
        $categories = Category::all();
        return view('backend.blog.search',compact('blogs', 'categories'));
    }

    public function filterByCategory(Request $request)
    {
        $idCategory = $request->input('category_id');
        
        $categoryFilter = Category::findOrFail($idCategory);

        $blogs = Blog::where('category_id',$categoryFilter->id)->get();
        $totalCategoryFilter = count($blogs);
        $categories = Category::all();
        dd($categories);

        return view('backend.blog.list', compact('blogs','categories','totalCategoryFilter','categoryFilter'));
    }
}
