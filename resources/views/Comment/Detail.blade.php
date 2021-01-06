@extends('layout.menu_layout')
@section('content')
    <h3>CHI TIẾT BÌNH LUẬN</h3>
    <div class="form-group">
      <h1>Tin tức:{{$data[0]['IdNews_FK']}} </h1>
    </div>
    <div class="form-group">
        <h1>Tiêu đề:{{$data[0]['Title']}} </h1>
    </div>
    <div class="form-group">
        <h1>Nội dung:{{$data[0]['Context']}} </h1>
    </div>
    <div class="form-group">
        <h1>Đọc giả:{{$data[0]['Usemember_FK']}} </h1>
    </div>
@endsection