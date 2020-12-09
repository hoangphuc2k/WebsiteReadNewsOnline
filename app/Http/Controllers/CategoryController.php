<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ListCategory['Data'] = Category::where('Status','=','Yes')->get();
        return view('Category.allCategory',$ListCategory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Category.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $data = $request->all();
        $category = Category::create($data);
        return redirect()->route('Category.index');
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
        $ListCate['data'] = Category::where('CateId','=',$id)->where('Status','=','Yes')->get();
        return view('Category.detailCategory',$ListCate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ListCate['data'] = Category::where('CateId','=',$id)->where('Status','=','Yes')->get();
        return view('Category.editCategory',$ListCate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request,$id)
    {
        //
        $ListCate = Category::where('CateId','=',$id)->update(['CateName'=>$request->CateName]);
        return redirect()->route('Category.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ListCate = Category::where('CateId','=',$id)->update(['Status'=>'No']);
        if($ListCate){
            return redirect()->route('Category.index');
        }else{
            return 'ERROR';
        }
    }
}
