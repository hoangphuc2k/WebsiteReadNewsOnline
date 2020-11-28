@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<h4>Tất cả thành viên</h4>
<div class="row">
  <div class="col-8"></div>
</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Usermember</th>
            <th scope="col">Password</th>
            <th scope="col">Email</th>
            <th scope="col">Fullname</th>
            <th scope="col" colspan="4">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Data as $item)
          <tr>
              <th scope="row">{{$item['Usemember']}}</th>
              <td>{{$item['Password']}}</td>
              <td>{{$item['Email']}}</td>
              <td>{{$item['FullName']}}</td>
              <td><button type="button" class="btn btn-success">Duyệt</button></td>
              <th><button type="button" class="btn btn-danger">Không duyệt</button></th>
              <td><button type="button" class="btn btn-warning">Chỉnh Sửa</button></td>
              <td><button type="button" class="btn .btn-primary">Xoá</button></td>
          </tr>
          @endforeach
        </tbody>
    </table>
      
    </div>
    {{--  --}}
@endsection