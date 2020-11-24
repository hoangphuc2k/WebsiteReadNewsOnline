@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<h4>Danh Sách Quyền</h4>
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
            <th scope="col">ID</th>
            <th scope="col">Tên Quyền</th>
            <th scope="col" colspan="2">Chức Năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Data as $item)
              
          <tr>
          <th scope="row">{{$item['RoleCode']}}</th>
            <td>{{$item['RoleName']}}</td>
            <td><button type="button" class="btn btn-success">Chỉnh Sửa</button></td>
            <td><button type="button" class="btn btn-danger">Xoá</button></td>
          </tr>
          @endforeach

        </tbody>
      </table>
      </div>
    {{--  --}}
@endsection