@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<h4>User WebSite</h4>
<div class="row">
    <div class="col-8"></div>
    <div class="col-4">
      <input type="text" placeholder="Tìm kiếm..." class="form-control">
      <br>
    </div>
  </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">UserName</th>
            <th scope="col">PassWord</th>
            <th scope="col">Quyền</th>
            <th scope="col">Tên Đầy Đủ</th>
            <th scope="col">Email</th>
            <th scope="col">Lần Đăng Nhập Cuối</th>
            <th scope="col" colspan="2">Chức Năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Data as $item) 
          <tr>
          <th scope="row">{{$item['Username']}}</th>
            <td>{{$item['password']}}</td>
            @php
                $list = App\User::find($item['id'])->role;
            @endphp
            <td>{{$list['RoleName']}}</td>
            <td>{{$item['FullName']}}</td>
            <td>{{$item['email']}}</td>
            <td>{{$item['Munlog']}}</td>
            <td><button type="button" class="btn btn-success">Chỉnh Sửa</button></td>
            <td><button type="button" class="btn btn-danger">Khóa Tài Khoản</button></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    {{--  --}}
@endsection