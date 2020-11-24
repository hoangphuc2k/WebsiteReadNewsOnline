@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<h4>DUYỆT BÀI</h4>
<div class="row">
  <div class="col-8"></div>
  <div class="col-4">
    <input type="text" placeholder="Tiêu đề, tác giả,..." class="form-control">
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
            <th scope="col" colspan="4">Chức năng</th>
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