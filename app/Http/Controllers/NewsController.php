<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\User;
use App\Http\Requests\NewsRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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
        return view('News.addNews',$item,$itemUse);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $data = $request->all();
        //Luu hinh
        //Luu du lieu vao csdl
        $news = News::create($data);
        //Luu anh vao news vua tao (cap nhap anh)
        if ($request->hasFile('Picture')) 
        {
            //Luu hinh anh duoi ten ID.jpg
            Storage::putFileAs('public', new File($request->Picture), $news->IdNews.'.jpg');
        }
        $news2 = News::where('IdNews',$news->IdNews)->update(['Picture'=> $news->IdNews.'.jpg']);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //Lay du lieu tu csdl len de su dung
        $BaiViet['BaiViet'] = News::where('IdNews',$request->id)->get();
        $item['Cate'] = Category::all();
        $itemUse['User'] =  User::all();
        //var_dump($BaiViet['aaa']);
        return View('News.editNews',$BaiViet,$item,$itemUse);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        if ($request->hasFile('Picture'))
        {
            var_dump($request->Picture);
        }
        $update = News::where('IdNews','=',$id)->updateOrCreate(
            [
                'Title' => $request->Title,
                'Content' => $request->Content,
                'Description' => $request->Description,
                'KeyWord' => $request->KeyWord,
                'Author' => $request->Author,
                'CateId_FK' => $request->CateId_FK
            ]
        );
        // $new3 = News::where('IdNews',$id);
        // if ($request->hasFile('Picture'))
        // {
        //     Storage::delete($new3->Picture);
        //     Storage::putFileAs('public', new File($request->Picture), $news->IdNews.'x.jpg');
        //     // $news2 = News::where('IdNews',$id)->update(['Picture'=> $news->IdNews.'x.jpg']);
        // }
        return redirect()->route('News.index');
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
