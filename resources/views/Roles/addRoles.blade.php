
@extends('layout.menu_layout')
@section('content')
<form action="{{route('Roles.store')}}" method="POST">
  @csrf
    <h3>THÊM QUYỀN</h3>
    <div class="form-group">
      <label for="formGroupExampleInput">Tên quyền</label>
      <input type="text"  class="form-control @error('RoleName') is-invalid @enderror" value="{{ old('RoleName') }}" name="RoleName" required maxlength="1000" id="formGroupExampleInput" autocomplete="RoleName" placeholder="QUYỀN...">  
      @error('RoleName')
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