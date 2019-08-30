<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use Validator;
use App\Post;
use App\PostContent;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\CreatePageContent;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:superuser')->only('create');
    }

    public function returnCurrentTime()
    {
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        return $currentTime;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $pages = Post::where('status', 1)->get();
     return view('admin.pages.index', compact('pages'), array('user' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.pages.create', array('user' => Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
       
        $user = Auth::user();
        $string = $request->title;
        $substr = '';
        $attachment = '-';
        $s = ucfirst($string);
        $bar =  strtolower($string);
        $path = preg_replace('/\s+/', $attachment, $bar);
        $filename2 = null;
        $filename = null;
        //dd($path);

        if ($request->hasFile('banner')) {
       $banner = $request->file('banner');
       $rules = [
        '_token'=>'required',
        'banner' =>'required|jpg,jpeg,png,gif|max:381872',
        ];
        $input = Input::only(
        '_token',
        'banner'
        );
          $validator = Validator::make($input, $rules);
         if(!$validator)
        {
          Session::flash('error-avatar', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $filename = time() . '.' . $banner->getClientOriginalExtension();
        $banner->move(public_path('/uploads/banners/'), $filename);
        }

        if ($request->hasFile('blog_image')) {
        $blog_image = $request->file('blog_image');
        $rules = [
        '_token'=>'required',
        'blog_image' =>'required|jpg,jpeg,png,gif|max:381872',
        ];
        $input = Input::only(
        '_token',
        'blog_image'
        );
        $validator = Validator::make($input, $rules);     
         if(!$validator)
        {
          Session::flash('error-avatar', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $filename2 = time() . '.' . $blog_image->getClientOriginalExtension();
        $blog_image->move(public_path('/uploads/banners/'), $filename2);
        }

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = url('/index') . '/'. $path;
        $post->post_type = $request->category;
        $post->image_link = $filename2;
        $post->status = 1;
        $post->user_id = $user->id;
        $post->user_name = $user->name;
        $post->category = $request->category;
        $post->display_name = $path;
        $post->created_at = $this->returnCurrentTime();
        $post->header = $request->header;
        $post->footer = $request->footer;
        $post->banner_top = $request->top_banner;
        $post->banner_buttom = $request->banner_buttom;
        $post->top_banner_link = $filename;
        $post->save();
        // else{
        //dd('here');
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->url = url('/index') . '/'. $path;
        // $post->post_type = $request->post_type;
        // $post->status = 1; 
        // $post->user_id = $user->id;
        // $post->user_name = $user->firstname . $user->lastname;
        // $post->category = $request->category;
        // $post->display_name = $path;
        // $post->created_at = $this->returnCurrentTime();
        // $post->header = $request->header;
        // $post->footer = $request->footer;
        // $post->banner_top = $request->top_banner;
        // $post->banner_buttom = $request->banner_buttom;
        // $post->save();
        // }
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $page = Post::findOrFail($id);
       return view('single_page', compact('page'), array('user' => Auth::user()));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $page = Post::findOrFail($id);
    return view('admin.pages.edit', compact('page'), array('user' => Auth::user()));
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
         //dd($request->all());
        $user = Auth::user();
        $string = $request->title;
        $substr = '';
        $attachment = '-';

        $s = ucfirst($string);
        $bar =  strtolower($string);
        $path = preg_replace('/\s+/', $attachment, $bar);

       // dd(url('/index') . '/'. $path);blog_image $request->hasFile('blog_image')
         if ($request->hasFile('top_banner') ) {
        $banner = $request->file('top_banner');
        $rules = [
        '_token'=>'required',
        'top_banner' =>'required|jpg,jpeg,png,gif|max:381872',
        ];

        $input = Input::only(
        '_token',
        'top_banner'
        );

        //$avatar = $request->file('avatar');
        $filename = time() . '.' . $banner->getClientOriginalExtension();
        Image::make($banner)->resize(1583, 300)->save(public_path('/uploads/banners/' . $filename));
        $banner->move(public_path('/uploads/banners/'), $filename);
        $validator = Validator::make($input, $rules);
     

         if(!$validator)
        {
          Session::flash('error-avatar', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }
   
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->link;
        $post->post_type = $request->post_type;
        $post->image_link = $filename;
        $post->status = 1;
        $post->user_id = $user->id;
        $post->user_name = $user->name;
        $post->category = $request->category;
        $post->display_name = $path;
        $post->updated_at = $this->returnCurrentTime();
        $post->header = $request->header;
        $post->footer = $request->footer;
        $post->banner_top = $request->top_banner;
        $post->banner_buttom = $request->banner_buttom;
        $post->top_banner_link = $filename;
        $post->save();
       }else{
   
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->link;
        $post->image_link = 'blog-default.jpg';
        $post->post_type = $request->post_type;
        $post->status = 1; 
        $post->user_id = $user->id;
        $post->user_name = $user->firstname . $user->lastname;
        $post->category = $request->category;
        $post->display_name = $path;
        $post->updated_at = $this->returnCurrentTime();
        $post->header = $request->header;
        $post->footer = $request->footer;
        $post->banner_top = $request->top_banner;
        $post->banner_buttom = $request->banner_buttom;
        $post->save();
       }
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
    
    if ($id) {
    $tag = Post::findOrFail($id);
    $tag->status = 0;
    $tag->save();
    Session::flash('success','Page has been deleted successfully');
    }else{
    return 'ID is required';
    } 
    return redirect()->route('pages.index')->withMessage('Page Deleted');
    }


    public function AddPageContent(CreatePageContent $request)
    {
        //dd($request->all());       
        $user = Auth::user();
        //$avatar = $request->file('avatar');
        $banner = $request->file('banner');
        $rules = [
        '_token'=>'required',
        'banner' =>'required|jpg,jpeg,png,gif|max:381872',
        ];

        $input = Input::only(
        '_token',
        'banner'
        );

        $filename = time() . '.' . $banner->getClientOriginalExtension();
        $banner->move(public_path('/uploads/banners/'), $filename);
        $validator = Validator::make($input, $rules);
     
         if(!$validator)
        {
          Session::flash('error-avatar', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $page_content = new PostContent; 
        $page_content->post_id = $request->title;
        $page_content->content = $request->content; 
        $page_content->post_type = $request->post_type;
        $page_content->content_image = $filename;
        $page_content->created_at = $this->returnCurrentTime();
        $page_content->save();
    return redirect()->route('pages.index');
    }


    public function showPageInforForm()
    { 
        return view('admin.pages.page_information');
    }


    public function getAllPageInformations()
    {
      $all_pages = DB::table('page_informations')->get();

        return view('admin.pages.page_infor_list', compact('all_pages'));
    }

    public function AddPageInfor(Request $request)
    { 
       // dd($request->all());
         $banner = $request->file('blog_image');
        $rules = [
        '_token'=>'required',
        'banner' =>'required|jpg,jpeg,png,gif|max:381872',
        ];

        $input = Input::only(
        '_token',
        'banner'
        );

        $filename = time() . '.' . $banner->getClientOriginalExtension();
        $banner->move(public_path('/uploads/banners/'), $filename);
        $validator = Validator::make($input, $rules);
     
         if(!$validator)
        {
          Session::flash('error-avatar', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }
        DB::table('page_informations')->insert(['name' => $request->title, 'description' => $request->description, 'image' =>$filename, 'status' => 1, 'created_at' => $this->returnCurrentTime(), 'category' => $request->category ]);
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
        return redirect()->back();
    }

        public function UpdatePageInfor(Request $request)
    { 
        //dd($request->all());
         $banner = $request->file('blog_image');
        $rules = [
        '_token'=>'required',
        'banner' =>'required|jpg,jpeg,png,gif|max:381872',
        ];

        $input = Input::only(
        '_token',
        'banner'
        );

        $filename = time() . '.' . $banner->getClientOriginalExtension();
        $banner->move(public_path('/uploads/banners/'), $filename);
        $validator = Validator::make($input, $rules);
     
         if(!$validator)
        {
          Session::flash('error-avatar', 'error');
            return Redirect::back()->withInput()->withErrors($validator);
        }
     DB::table('page_informations')->where('id', $request->id)->update(['name' => $request->title, 'description' => $request->description, 'image' =>$filename, 'status' => 1, 'updated_at' => $this->returnCurrentTime(), 'category' => $request->category ]);
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Done successfully!');
        return redirect()->back();
    }

}