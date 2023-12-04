<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JobPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Facades\AppFacade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class JobpostController extends Controller
{
    public function index()
    {
        $user= Auth::user();
        if($user->role=='admin'){
            $jpost = JobPost::all();
        }
        else{
            $user_id = Auth::user()->id;
            $jpost = JobPost::where('post_created_by',$user_id)->get();
        }

        // $user= Auth::user();
        // $jobPost = JobPost::all();
        return view('admin.jobpost.index', compact('jpost', 'user'));
    }
    public function create()
    {
        $user= Auth::user();
        $category = Category::all();
        return view('admin.jobpost.create', compact('category','user'));




    }
    
    
    public function store(Request $request)
{
    try {
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required',
            'url' => 'required',
            'price' => 'required',
            'discount_price' => 'nullable|numeric',
            'status' => 'required',
            'designation' => 'required',
            'duration' => 'required',
            'work_experience' => 'required',
            'qualification' => 'required',
            'education' => 'required',
        ]);

        $post = new JobPost;
        $post->title = $request->has('title') ? $request->title : old('title');
        $post->name = $request->has('name') ? $request->name : old('name');
        $post->phone = $request->has('phone') ? $request->phone : old('phone');
        $post->description = $request->has('description') ? $request->description : old('description');
        $post->category = $request->has('category') ? $request->category : old('category');
        $post->image = $request->has('image') ? $request->image : old('image');
        $post->url = $request->has('url') ? $request->url : old('url');
        $post->price = $request->has('price') ? $request->price : old('price');
        $post->discount_price = $request->has('discount_price') ? $request->discount_price : old('discount_price');
        $post->status = $request->has('status') ? $request->status : old('status');
        $post->designation = $request->has('designation') ? $request->designation : old('designation');
        $post->duration = $request->has('duration') ? $request->duration : old('duration');
        $post->work_experience = $request->has('work_experience') ? $request->work_experience : old('work_experience');
        $post->qualification = $request->has('qualification') ? $request->qualification : old('qualification');
        $post->education = $request->has('education') ? $request->education : old('education');
        $post->post_created_by = Auth::user()->id;

        if (isset($post->discount_price)) {
            $post->total_price = $request->discount_price;
        } else {
            $post->total_price = $request->price;
        }

        if ($image = $request->file('image')) {
            $destinationPath = 'images/jobpost/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $post['image'] = "$profileImage";
        }

        $post->save();

        return redirect()->back();
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    }
}








    public function edit($id){
        $user= Auth::user();
        $categories = Category::all();

        $jobPost = JobPost::find($id);

        return view('admin.jobpost.edit',compact('categories','jobPost', 'user'));
    }
    public function show($id){

    }

    public function update(Request $request, $id)
    {

        $post = JobPost::find($id);
        $post->title = $request->title;
        $post->name = $request->name;
        $post->phone = $request->phone;
        $post->description = $request->description;
        $post->category = $request->category;
        $post->image = $request->image;
        $post->url = $request->url;
        $post->price = $request->price;
        $post->discount_price = $request->discount_price;
        $post->status = $request->status;
        $post->designation = $request->designation;
        $post->duration = $request->duration;
        $post->qualification = $request->qualification;
        $post->work_experience = $request->work_experience;
        $post->education = $request->education;
        $post->post_created_by = Auth::user()->id;
        if(isset($post->discount_price)){
            $post->total_price = $request->discount_price;
}
        else{
            $post->total_price = $request->price;
        }

        if ($image = $request->file('image')) {
            $destinationPath = 'images/jobpost/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $post['image'] = "$profileImage";

        }else {
            unset($post['image']);




    }
    $post->save();

    return redirect()->back();
}

    public function destroy($id)
    {
        $jobPost = JobPost::find($id);

        $jobPost->delete();

        return redirect()->back();
    }

}