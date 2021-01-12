<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;

class APINewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListNews = News::where('Status','=','Yes')->get();
        foreach($ListNews as $item){
            $item['Content'] = '';
        }
        echo json_encode(
            ['data'=>$ListNews]
        );
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function ListHotNews()
    {
        $ListNews = News::where('Status','=','Yes')->orderBy('created_at','desc')->take(10)->get();
        foreach($ListNews as $item){
            $item['Content'] = '';
        }
        echo json_encode(
            ['data'=>$ListNews]
        );
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function ListSportNews()
    {
        $category = Category::where([['Status','=','Yes'],['CateName','=','Thể Thao']])->first();
        $ListNews = News::where([['Status','=','Yes'],['CateId_FK','=',$category->CateId]])->get();
        foreach($ListNews as $item){
            $item['Content'] = '';
        }
        echo json_encode(
            ['data'=>$ListNews]
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        
        $ListNews['Data'] = News::where('IdNews','=',$id)->where('Status','=','Yes')->get();
        return View("API.DetailNews",$ListNews);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $ListData = News::where('IdNews',$id)->get();
        return $ListData;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
