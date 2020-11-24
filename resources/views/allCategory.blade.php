@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<h4>DUYỆT BÀI</h4>
<div class="row">
  <div class="col-8"></div>
  <div class="col-4">
    <input type="text" placeholder="Tìm Kiếm,..." class="form-control">
    <br>
  </div>
</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Chủ Đề</th>
            <th scope="col" colspan="2">Chức Năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Data as $item)
          <tr>
            <th scope="row">{{$item['CateId']}}</th>
            <td>{{$item['CateName']}}</td>
            <td><button type="button" class="btn btn-success">Chỉnh Sửa</button></td>
            <td><button type="button" class="btn .btn-primary">Xoá</button></td>
          </tr>
        @endforeach
        </tbody>
      </table>
      </div>
    {{--  --}}
@endsection