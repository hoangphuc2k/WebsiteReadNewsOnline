@extends('layout.menu_layout')
@section('content')
<form action="{{route('Category.store')}}" method="POST">
  @csrf
    <h3>THÊM THỂ LOẠI MỚI</h3>
    <div class="form-group">
      <label for="formGroupExampleInput">Thể Loại</label>
      <input type="text" class="form-control" name="CateName" id="formGroupExampleInput" placeholder="Thể Loại...">
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><button type="submit" class="btn btn-success">Thêm</button></div>
        <div class="col-4"></div>
    </div>
  </form>
@endsection