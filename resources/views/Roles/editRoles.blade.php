@extends('layout.menu_layout')
@section('content')
<form action="{{route('Roles.update',$data[0]['RoleCode'])}}" method="POST">
  @method('PATCH')
  @csrf
    <h3>CHỈNH SỬA QUYỀN</h3>
    <div class="form-group">
      <label for="formGroupExampleInput">Tên quyền</label>
      <input type="text"  class="form-control @error('RoleName') is-invalid @enderror" value="{{$data[0]['RoleName']}}" name="RoleName" required id="formGroupExampleInput" autocomplete="RoleName" placeholder="QUYỀN...">  
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