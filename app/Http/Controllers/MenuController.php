<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role; 
use App\Permission;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;
use Input;
use Validator;
use App\Menu;
use App\Submenu;
use Auth;
use App\Post;

class MenuController extends Controller
{
        public function __construct()
    {
        // $this->middleware(['permission:role-create','permission:role-edit', 'permission:role-delete']);
         $this->middleware('auth');
        // $this->middleware('role:admin');
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
        $menus = Menu::all();
        $submenus = Submenu::all();
        $permissions=Permission::all();
         return view('admin.menu.index', compact(['permissions', 'submenus' , 'menus']), array('user' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $menus = Menu::all();
      $user = Auth::user();
      return view('admin.menu.create', compact(['menus']), array('user' => Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $string = $request->name;
    $substr = '';
    $attachment = '-';

    $s = ucfirst($string);
    $bar =  strtolower($string);
    $path = preg_replace('/\s+/', $attachment, $bar);

    $name = $request->name;
    $display_name = $request->display_name;
    $menu_order = $request->menu_order;
    $tag_line = $request->tag_line;
    $menu_icon = $request->menu_icon;
    $menu_route = $request->menu_route;

     $rules = [
                'name' => 'required|string',
                'display_name' => 'required|string',
                'tag_line'=> 'required|string',
                'menu_order'=> 'required|integer'
        ];
 
        $input = Input::only(
        'name',
        'display_name',
        'description',
        'tag_line'
    );
         //dd($request->all());
    $this->validate($request, $rules); 
try {
        if ($name !=null && $name !='' && $display_name !=null && $display_name !='' && $menu_order !=null && $menu_order !='') {
        $menu = Menu::firstOrNew(['name' => $name]);
        $menu->display_name = $display_name;
        $menu->status = 1;
        $menu->menu_order = $menu_order;
        $menu->description = $tag_line;
        $menu->menu_icon = $menu_icon;
        $menu->created_at = $this->returnCurrentTime();
        $menu->routes = $path;
        $menu->save();
    }  
} catch (\Exception $e) {
     return redirect()->back()
          ->withErrors(['error' => 'Some thing went wrong']);
}
   Session::flash('success','Menu created successfully');
    return redirect()->route('menu.index');
    }
public function ShowAssignSubmenusToParentMenu($id)
{
    $menu = Menu::find($id);

   return view('admin.menu.addsub_menu', compact('menu'), array('user' => Auth::user()));
}
public function AssignSubmenusToParentMenu(Request $request)
    {
 // dd($request->all());
        $name = $request->name;
        $submenu_name = $request->submenu_name;
        $menu_order = $request->menu_order;
        $display_name = $request->display_name;
        $tag_line = $request->tag_line;
        $menu_link = $request->menu_link;
        $menu_route = $request->menu_route;
        $menu_icon = $request->menu_icon;

     $rules = [
                'name' => 'required|string',
                'submenu_name' => 'required|string',
                'menu_order'=> 'required|integer',
                'tag_line'=> 'required|string' 
        ];
 
        $input = Input::only(
        'name',
        'submenu_name',
        'menu_order', 
        'tag_line'
    ); 
    $this->validate($request, $rules);  
    //dd($request->all());
    try {
        if ($name !=null) {
            $menu = Menu::find($name);
            $submenu = new Submenu;
            $submenu->submenu = $submenu_name;
            $submenu->menu_id = $menu->id;
            $submenu->submenu_order = $menu_order;
            $submenu->status = 0;
            $submenu->tag_line = $tag_line;
            $submenu->link = $menu_link;
            $submenu->route = $menu_route;
            $submenu->created_at = $this->returnCurrentTime();
            $submenu->save(); 
            Session::flash('success','Menu created successfully');
        } 
    } catch (Exception $e) {
        return redirect()->back()
          ->withErrors(['error' => 'Some thing went wrong']); 
    }
       return redirect()->back();
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
        return view('menu.edit',  array('user' => Auth::user()));
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
   
    $name = $request->name;
    $display_name = $request->display_name;
    $menu_order = $request->menu_order;
    $tag_line = $request->tag_line;
  

     $rules = [
                'name' => 'required|string',
                'display_name' => 'required|string',
                'tag_line'=> 'required|string',
                'menu_order'=> 'required|integer'
        ];
 
        $input = Input::only(
        'name',
        'display_name',
        'description',
        'tag_line'
    );
         //dd($request->all());
    $this->validate($request, $rules); 
try {
        if ($name !=null && $name !='' && $display_name !=null && $display_name !='' && $menu_order !=null && $menu_order !='') {
       
        $menu = Menu::find($id);
        $menu->display_name = $display_name;
        $menu->status = 0;
        $menu->menu_order = $menu_order;
        $menu->description = $tag_line;
        $menu->created_at = $this->returnCurrentTime();
        $menu->save();
 
    }
  
} catch (\Exception $e) {
     return redirect()->back()
          ->withErrors(['error' => 'Some thing went wrong']);
}


    Session::flash('success','Menu created successfully');

    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
               
         if ($id) {

       DB::table("menu")->where('id',$id)->delete();
       Session::flash('success','Menu has been deleted successfully');
 
        }else{

            return 'ID is required';
        }
      return redirect()->back()->withMessage('Role Deleted');
    }

    public function linkMenuForm($id)
    {
    $pages = Post::where('status', 1)->get();
    $menu = Menu::findOrFail($id);

     return view('admin.menu.link_to_pages', compact('pages', 'menu'), array('user' => Auth::user()));
    }

    public function linkMenu(Request $request)
    {

        return redirect()->back()->withMessage('');
    }
}
