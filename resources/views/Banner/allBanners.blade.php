@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<h4>Tất cả Banner</h4>
<a href="{{route('Banner.create')}}" class="btn btn-success btn-add" >Thêm mới</a>
<div class="row">
  <div class="col-8"></div>
</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Banner Name</th>
            <th scope="col">Img Url</th>
            <th scope="col" colspan="4">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Data as $item)
          <tr>
              <th scope="row">{{$item['BannerName']}}</th>
              <td>{{$item['ImgUrl']}}</td>
              <td><button type="button" class="btn btn-success">Duyệt</button></td>
              <th><button type="button" class="btn btn-danger">Không duyệt</button></th>
              <td><a href="{{route('Banner.edit',$item['IdBanner'])}}" type="button" class="btn btn-warning">Chỉnh Sửa</a></td>
              <td><button type="button" class="btn .btn-primary">Xoá</button></td>
          </tr>
          @endforeach
        </tbody>
    </table>
      
    </div>
    {{--  --}}
@endsection