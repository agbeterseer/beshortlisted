<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\LogoResource; 
use App\Services\LogoService;
use App\Http\Requests\LogoRequest; 
use App\Logo;
use Auth;
use DB;

class LogoController extends Controller
{
    protected $logoService;

    public function __construct(LogoService $logoService)
    {
      $this->logoService = $logoService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = $this->logoService->all();

    // return LogoResource::collection($logos);
        return view('admin.logos.index', compact('logos'), array('user' => Auth::user()));
    }

        public function indexapi()
    {
        $logos = $this->logoService->all();

    return LogoResource::collection($logos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.logos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogoRequest $request)
    { 
       
        $logo = $this->logoService->save_logo($request);

        return redirect()->route('pages.index');
        // return new LogoResource($logo);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logo = $this->logoService->read($id);

        return view('admin.logos.show', compact('logo'), array('user'=>Auth::user()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logo = $this->logoService->read($id);

        return view('admin.logos.edit', compact('logo'), array('user'=>Auth::user()));
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
        dd($request->all());
        $this->logoService->update($request, $id);

        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logo = $this->logoService->findSingleRecord($id);

        $logo->delete();

        if($logo->delete()) {
        return new LogoResource($logo);
        } 
    }


    public function setLogo($id)
    {
       
        $logos = $this->setAllLogoStatusFalse();
         //dd($logos);
        $logo = $this->logoService->findSingleRecord($id);
        $logo->status = 1;
        $logo->save();

          return back();
    }

    public function getAllLogos()
    {
        $logos = $this->logoService->all();
        return $logos;
    }

    public function setAllLogoStatusFalse()
    { 

      foreach ($this->getAllLogos() as $logo) {
       $new_logos = DB::table('logos')->where(['id' => $logo->id])->update([ 'status' => 0 ]);
      }
     
      return $this->getAllLogos();
    }
}
