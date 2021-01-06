@extends('layout.menu_layout')
@section('content')
<form action="{{route('Comment.store')}}" method="POST">
  @csrf
    <h3>THÊM BÌNH LUẬN</h3>
    <div class="form-group">
      <label for="formGroupExampleInput">Tiêu đề</label>
      <input type="text"  class="form-control @error('Title') is-invalid @enderror" value="{{ old('Title') }}" name="Title" required maxlength="1000" id="formGroupExampleInput" autocomplete="Title" placeholder="Tiêu đề...">  
      @error('Title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Tin tức</label>
        <div class="input-group mb-3">
          <select class="custom-select" name="IdNews_FK" id="inputGroupSelect01">
            @foreach ($news as $item)
                <option value="{{$item['IdNews']}}">
                    {{$item['Title']}}
                </option>
            @endforeach
          </select>
        </div>
        @error('IdNews_FK')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Nội dung</label>
        <input type="text"  class="form-control @error('Context') is-invalid @enderror" value="{{ old('Context') }}" name="Context" required maxlength="1000" id="formGroupExampleInput" autocomplete="Context" placeholder="Nội dung...">  
        @error('Context')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Tài khoản</label>
        <div class="input-group mb-3">
          <select class="custom-select" name="Usemember_FK" id="inputGroupSelect01">
            @foreach ($member as $item)
                <option value="{{$item['Usemember']}}">
                    {{$item['Usemember']}}
                </option>
            @endforeach
          </select>
        </div>
        @error('Usemember_FK')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><button type="submit" class="btn btn-success">Thêm</button></div>
        <div class="col-4"></div>
    </div>
  </form>
@endsection