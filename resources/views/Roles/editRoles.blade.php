@extends('layout.menu_layout')
@section('content')
<form action="{{route('Roles.update',$data[0]['RoleCode'])}}" method="POST">
  @method('PATCH')
  @csrf
  <p></p>
    <h3>Chỉnh sửa quyền</h3>
    <div class="form-group">
      <label for="formGroupExampleInput">Tên quyền</label>
      <input type="text"  class="form-control @error('RoleName') is-invalid @enderror" value="{{$data[0]['RoleName']}}" name="RoleName" required maxlength="1000" id="formGroupExampleInput" autocomplete="RoleName" placeholder="QUYỀN...">  
      @error('RoleName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><button type="submit" class="btn btn-success">Lưu</button></div>
        <div class="col-4"></div>
    </div>
  </form>
@endsection