@extends('layout.menu_layout')
@section('content')
<form action="{{route('Member.update',$data[0]['Usermember'])}}" method="POST">
    @method('PATCH')
    @csrf
    <h3>CHỈNH SỬA Thành Viên</h3>

    <div class="form-group">
      <label for="formGroupExampleInput">Tài khoản </label>
      <input type="text" class="form-control @error('Usemember') is-invalid @enderror" value="{{$data[0]['Usemember']}}" name="Usemember" maxlength="200" required id="formGroupExampleInput" autocomplete="Usemember" placeholder="Usemember..."> 
      @error('Usemember')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
      @enderror
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput">Mật khẩu </label>
      <input type="text" class="form-control  @error('Password') is-invalid @enderror" value="{{$data[0]['Password']}}"  name="Password" maxlength="20" required id="formGroupExampleInput" autocomplete="Password" placeholder="Password.....">
      @error('Password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
      @enderror
    </div> 

    <div class="form-group">
      <label for="formGroupExampleInput">Email </label>
      <input type="text" class="form-control @error('Email') is-invalid @enderror" value="{{$data[0]['Email']}}" name="Email"  maxlength="200" autocomplete="Email" required id="formGroupExampleInput" placeholder="zyx@gmi.com">
      @error('Email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
      @enderror
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput">Họ tên </label>
      <input type="text" class="form-control @error('FullName') is-invalid @enderror" value="{{$data[0]['FullName']}}"  name="Fullname" maxlength="100" autocomplete="FullName" required id="formGroupExampleInput" placeholder="Nguyen Van A">
      @error('FullName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
      @enderror
    </div>

    <p></p>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><button type="submit" class="btn btn-success">Thêm</button></div>
        <div class="col-4"></div>
    </div>
  </form>
@endsection