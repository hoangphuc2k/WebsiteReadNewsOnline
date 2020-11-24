@extends('layout.menu_layout')
@section('content')
<form action="{{route('Banner.store')}}" method="POST">
    @csrf
    <h3>Thêm Trang Bìa</h3>
    <div class="form-group">
      <label for="formGroupExampleInput">Tên Banner</label>
      <input type="text" class="form-control" name="BannerName" id="formGroupExampleInput" placeholder="">
    </div>

    <div class="custom-file">
      <label for="formGroupExampleInput3" class="custom-file-label">Hình ảnh banner</label>
      <input type="file" class="custom-file-input" name="ImgUrl" id="formGroupExampleInput3" placeholder="Ảnh banner">
    </div>
    <p></p>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><button type="submit" class="btn btn-success">Thêm</button></div>
        <div class="col-4"></div>
    </div>
  </form>
@endsection