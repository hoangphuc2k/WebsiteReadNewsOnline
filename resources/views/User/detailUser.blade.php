@extends('layout.menu_layout')
@section('content')
    <h3>CHI TIẾT USER</h3>
    <div class="form-group">
        <h1>Tên TÀI KHOẢN:{{$Username}} </h1>
      </div>
    <div class="form-group">
      <h1>Tên ĐẦY ĐỦ:{{$FullName}} </h1>
    </div>
    <div class="form-group">
        <h1>Tên Quyền:{{$RoleCode_FK}} </h1>
    </div>
    <div class="form-group">
        <h1>EMAIL:{{$email}} </h1>
    </div>
@endsection