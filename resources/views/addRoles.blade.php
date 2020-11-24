@extends('layout.menu_layout')
@section('content')
<form action="{{route('Roles.store')}}" method="POST">
  @csrf
    <h3>THÊM QUYỀN</h3>
    <div class="form-group">
      <label for="formGroupExampleInput">QUYỀN</label>
      <input type="text" class="form-control" name="RoleName" id="formGroupExampleInput" placeholder="QUYỀN...">
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><button type="submit" class="btn btn-success">Thêm</button></div>
        <div class="col-4"></div>
    </div>
  </form>
@endsection