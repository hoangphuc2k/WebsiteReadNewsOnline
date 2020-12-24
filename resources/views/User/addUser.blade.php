@extends('layout.menu_layout')
@section('content')
<form action="{{route('User.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <h3>THÊM THỂ LOẠI MỚI</h3>
    <div class="form-group">
      <label for="formGroupExampleInput">UserName</label>
      <input type="text" class="form-control" name="Username" id="formGroupExampleInput" placeholder="Thể Loại...">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput">PassWord</label>
      <input type="text" class="form-control" name="password" id="formGroupExampleInput" placeholder="Thể Loại...">
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
      <input type="text" class="form-control" name="email" id="formGroupExampleInput" placeholder="Thể Loại...">
    </div>
    <div class="custom-control">
      <label class="custom-file-label">Hình đại diện</label>
      <input type="file" id="Img" class="custom-file-input" name="Img" placeholder="Hình đại diện...">
    </div>
    <div class="form-group">
      <img src="{{public_path()}}/" class="w-75" id="imgPres" alt="Img" aceept="*.JPG|*.PNG" />
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><button type="submit" class="btn btn-success">Thêm</button></div>
        <div class="col-4"></div>
    </div>
  </form>
@endsection
@section('script')
<script>
  function readURL(input, idImg) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
    $(idImg).attr("src", e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
        }
	}
  $("#Img").change(function () {
      readURL(this, '#imgPres');
  });
</script>
    
@endsection