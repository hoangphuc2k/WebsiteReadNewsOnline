@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<a type="button" href="{{route('Roles.create')}}" class="btn btn-success" >Thêm Quyền</a>
<h4>Danh Sách Quyền</h4>
<div class="row">
    <div class="col-8"></div>
    <div class="col-4">
      <br>
    </div>
  </div>
    <table class="table" id="table-roles">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Chuyên Mục</th>
            <th scope="col">Chi Tiết</th>
            <th scope="col">Chỉnh Sửa</th>
            <th scope="col">Xoá</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Data as $item)
              
          <tr>
          <th scope="row">{{$item['RoleCode']}}</th>
            <td>{{$item['RoleName']}}</td>
            <td><a  href="{{route('Roles.show',$item['RoleCode'])}}" class="btn btn-warning btn-show" >Chi Tiết</a></td>
            <td><a  href="{{route('Roles.edit',$item['RoleCode'])}}" class="btn btn-success btn-edit" >Chỉnh Sửa</a></td>
            <td>
              <form action="{{route('Roles.delete',$item['RoleCode'])}}" method="POST" >
                @method('delete')
                @csrf
                <input type="submit" value="Xoá" class="btn btn-danger">
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    {{--  --}}
@endsection