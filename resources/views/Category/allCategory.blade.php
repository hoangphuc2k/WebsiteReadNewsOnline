@if (Auth::user()->RoleCode_FK != 1)
  @php
      return;
  @endphp
@endif
@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<h4>Danh Sách Chuyên Mục</h4>
<a href="{{route('Category.create')}}" class="btn btn-success btn-add" >Thêm mới</a>
<p></p>
<div class="row">
  <div class="col-8"></div>
  <div class="col-4">
    <br>
  </div>
</div>
    <table class="table" id="table-cate">
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
            <th scope="row">{{$item['CateId']}}</th>
            <td>{{$item['CateName']}}</td>
            <td><a  href="{{route('Category.show',$item['CateId'])}}" class="btn btn-warning">Chi Tiết</a></td>
            <td><a href="{{route('Category.edit',$item['CateId'])}}" type="button" class="btn btn-success">Chỉnh Sửa</a></td>
            <td>
              <form action="{{route('Category.delete',$item['CateId'])}}" method="POST" >
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
@endsection