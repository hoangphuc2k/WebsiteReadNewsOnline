@extends('layout.menu_layout')
@section('content')
<form action="{{route('Banner.store')}}" method="POST">
    @csrf
    <h3>Thêm Trang Bìa</h3>
    <div class="form-group">
      <label for="formGroupExampleInput">Tên Banner</label>
      <input type="text" class="form-control @error('BannerName') is-invalid @enderror" value="{{ old('BannerName')}}" name="BannerName" maxlength="1000" required id="formGroupExampleInput" autocomplete="BannerName" placeholder="Banner....">
      @error('BannerName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
      @enderror
    </div>

    <div class="custom-file">
      <label for="formGroupExampleInput3" class="custom-file-label">Hình ảnh banner</label>
      <input type="file" class="custom-file-input @error('ImgUrl') is-invalid @enderror" value="{{ old('ImgUrl')}}" name="ImgUrl" maxlength="1000" accept="*.jpg|*.png" id="formGroupExampleInput3"  placeholder="Ảnh banner">
    </div>
    <p></p>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><button type="submit" class="btn btn-success">Thêm</button></div>
        <div class="col-4"></div>
    </div>
  </form>
@endsection