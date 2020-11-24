@extends('layout.menu_layout')
@section('content')
<form action="{{route('User.store')}}" method="POST">
  @csrf
    <h3>THÊM THỂ LOẠI MỚI</h3>
    <div class="form-group">
      <label for="formGroupExampleInput">UserName</label>
      <input type="text" class="form-control" name="Username" id="formGroupExampleInput" placeholder="Thể Loại...">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput">PassWord</label>
      <input type="text" class="form-control" name="Password" id="formGroupExampleInput" placeholder="Thể Loại...">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput">Tên Đầy Đủ</label>
      <input type="text" class="form-control" name="FullName" id="formGroupExampleInput" placeholder="Thể Loại...">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput">Quyền</label>
      <div class="input-group mb-3">
        <select class="custom-select" name="RoleCode_FK" id="inputGroupSelect01">
          @foreach ($Data as $item)
              <option value="{{$item['RoleCode']}}">
                  {{$item['RoleName']}}
              </option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput">Email</label>
      <input type="text" class="form-control" name="Email" id="formGroupExampleInput" placeholder="Thể Loại...">
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><button type="submit" class="btn btn-success">Thêm</button></div>
        <div class="col-4"></div>
    </div>
  </form>
@endsection