<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeblog(Request $request) {

        $this->validate($request,[
            'title'=>'required',
            'description'=>'required|min:5'
          ]);

        $user_id =  Auth::user()->id; // getting current user ID
		$data = new BlogModel();
		$data->title = $request->title;
        $data->blog_description = $request->description;
        $data->user_id = $user_id;
        $data->save();
        $request->session()->flash('Blog','blog has been created');
        return back()->with('Blog','blog has been created');
    }

    public function editblog($id)
    {
        $blog = BlogModel::find($id);
        return view('EditBlog',compact('blog'));
    }

    public function updateBlog(Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'description'=>'required|min:5'
          ]);

        $blog = BlogModel::find($request->id);
        $blog->title = $request->title;
		$blog->blog_description = $request->description;
		$blog->save();

        return redirect()->route('home');
    }


    public function deleteBlog($id)
    {

        $blog = BlogModel::where('id',$id)->delete();

        return back()->with('blog_delete','Blog has been Deleted');
    }

}
