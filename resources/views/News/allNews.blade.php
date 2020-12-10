@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<h4>DANH SÁCH TIN TỨC</h4>
<a href="{{route('News.create')}}" class="btn btn-success">Thêm mới</a>
<div class="row">
  <div class="col-8"></div>
  <div class="col-4">
    <br>
  </div>
</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tiêu Đề</th>
            <th scope="col">Nội Dung</th>
            <th scope="col">Tác Giả</th>
            <th scope="col">Duyệt</th>
            <th scope="col">Không Duyệt</th>
            <th scope="col">Chỉnh Sửa</th>
            <th scope="col">Xoá</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Data as $item)
          <tr>
              <th scope="row">{{$item['IdNews']}}</th>
              <td>{{$item['Title']}}</td>
              <td>{!!$item['Content']!!}</td>
              <td>{{$item['Author']}}</td>
              <td><button type="button" class="btn btn-success">Duyệt</button></td>
              <th><button type="button" class="btn btn-danger">Không Duyệt</button></th>
              <td><button type="button" class="btn btn-warning">Chỉnh Sửa</button></td>
              <td><button type="button" class="btn .btn-primary">Xoá</button></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
@endsection