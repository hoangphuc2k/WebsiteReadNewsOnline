<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\User;

class NewsController extends Controller
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
        $ListNews['Data'] = News::all();
        $item['Cate'] = Category::all();
        $itemUse['User'] =  User::all(); 
        return view('News.allNews',$ListNews,$item,$itemUse);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $item['Cate'] = Category::all();
        $itemUse['User'] =  User::all();  
        return view('addNews',$item,$itemUse);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Title'=>'required|max:1000',
            'Description'=>'required|max:1000',
            'Author'=> 'required|max:200',
            'Picture'=> 'required|max:1000',
            'KeyWord'=> 'required|max:1000'
        ]);
        //Lay het du lieu trong bien requyest ra luu voa $data voi dang mang
        $data = $request->all();
        //Luu du lieu vao csdl
        $news = News::create($data);
        //Luu thanh cong thi hien thi tat ca bai viet
        return redirect()->route("News.index");
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
    public function edit()
    {
        //
        return view('editpost');
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
