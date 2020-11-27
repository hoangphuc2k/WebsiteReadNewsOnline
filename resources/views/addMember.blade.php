@extends('layout.menu_layout')
@section('content')
<form action="{{route('MemBer.store')}}" method="POST">
    @csrf
    <h3>Thêm Thành Viên</h3>

    <div class="form-group">
      <label for="formGroupExampleInput">Tài khoản </label>
      <input type="text" class="form-control" name="Usemember" id="formGroupExampleInput" placeholder="">
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput">Mật khẩu </label>
      <input type="text" class="form-control" name="Password" id="formGroupExampleInput" placeholder="">
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput">Email </label>
      <input type="text" class="form-control" name="Email" id="formGroupExampleInput" placeholder="">
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput">Họ tên </label>
      <input type="text" class="form-control" name="Fullname" id="formGroupExampleInput" placeholder="">
    </div>

    <p></p>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><button type="submit" class="btn btn-success">Thêm</button></div>
        <div class="col-4"></div>
    </div>
  </form>
@endsection