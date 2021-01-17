@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<a type="button" href="{{route('User.create')}}" class="btn btn-success" >Thêm Tài Khoản</a>
<p></p>
<h4>Tài khoản WebSite</h4>
<div class="row">
    <div class="col-8"></div>
    <div class="col-4">
      <br>
    </div>
  </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">UserName</th>
            <th scope="col">Quyền</th>
            <th scope="col">Tên Đầy Đủ</th>
            <th scope="col">Email</th>
            <th scope="col">Lần Đăng Nhập Cuối</th>
            <th scope="col">Chỉnh Sửa</th>
            <th scope="col">Khoá Tài Khoản</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Data as $item) 
          <tr>
          <th scope="row">{{$item['Username']}}</th>
            @php
                $list = App\User::find($item['id'])->role;
            @endphp
            <td>{{$list['RoleName']}}</td>
            <td>{{$item['FullName']}}</td>
            <td>{{$item['email']}}</td>
            <td>{{$item['Munlog']}}</td>
            <td><a type="button" class="btn btn-success" href="{{route('User.edit',$item['id'])}}">Chỉnh Sửa</a></td>
            <td><button type="button" class="btn btn-danger">Khóa Tài Khoản</button></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    {{--  --}}
@endsection