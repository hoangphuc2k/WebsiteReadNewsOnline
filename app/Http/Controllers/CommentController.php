<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\News;
use App\Member;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listComment['Data'] = Comment::where('Status','Yes')->get();
        return view('Comment.index',$listComment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $listNews['news'] = News::where('Status','Yes')->get();
        $listUser['member'] = Member::where('Status','Yes')->get();
        return view('Comment.Create',$listNews,$listUser);
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
        $data = $request->all();
        $comment = Comment::create($data);
        if($comment){
            return redirect()->route('Comment.index');
        }else{
            $listNews['news'] = News::where('Status','Yes')->get();
            $listMember['member'] = Member::where('Status','Yes')->get();
            return view('Comment.Create',$listNews,$listMember);
        }
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
        $comment['data'] = Comment::where('Status','Yes')->where('IdCom',$id)->get();
        if($comment){
            return view('Comment.Detail',$comment);
        } 
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
        $listNews = News::where('Status','Yes')->get();
        $listMember = Member::where('Status','Yes')->get();
        $comment['data'] = Comment::where('Status','Yes')->where('IdCom',$id)->get();
        $list = ['news'=> $listNews,'member'=> $listMember];
        if($comment){
            return view('Comment.Edit',$comment,$list);
        } 
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
        $data = $request->all();
        $comment = Comment::where('IdCom',$id)->update([
            'IdNews_FK' => $data['IdNews_FK'],
            'Title' => $data['Title'],
            'Context' => $data['Context`'],
            'Usemember_FK' => $data['Usemember_FK'],
        ]);
        if($comment){
            return redirect()->route('Comment.index');
        }else{
            $listNews = News::where('Status','Yes')->get();
            $listMember = Member::where('Status','Yes')->get();
            $comment['data'] = Comment::where('Status','Yes')->where('IdCom',$id)->get();
            $list = ['news'=> $listNews,'user'=> $listMember];
            if($comment){
                return view('Comment.Edit',$comment,$list);
            }
        }
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
        $comment = Comment::where('IdCom',$id)->update(['Status'=> 'No']);
        if($comment){
            return redirect()->route('Comment.index');
        }
    }
}
