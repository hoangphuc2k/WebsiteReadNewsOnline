
@if (Auth::user()->RoleCode_FK != 1)
  @php
      return;
  @endphp
@endif
<div id="News-add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Thêm Tin Tức</h4>
        <button type="button" class="close btn-exit" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="{{route('News.store')}}" method="POST">
          @csrf
            <h3>THÊM BÀI MỚI</h3>
            <div class="form-group">
              <label for="formGroupExampleInput">Tiêu Đề</label>
              <input type="text" required class="form-control"  id="Title-add" name="Title" id="formGroupExampleInput" placeholder="Tiêu Đề...">
              <p style="color:red" class="help is-danger textError" id="errorTitle"></p>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Thể Loại</label>
              <div class="input-group mb-3">
                <select class="custom-select" id="CateId_FK-add" name="CateId_FK" id="inputGroupSelect01">
                  @foreach ($Cate as $item)
                      <option value="{{$item['CateId']}}">
                          {{$item['CateName']}}
                      </option>
                  @endforeach
                </select>
                <p style="color:red" class="help is-danger textError" id="errorCateId_FK"></p>
              </div>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Tên Người Đăng</label>
              <div class="input-group mb-3">
                <select class="custom-select" id="id_user_FK-add" name="id_user_FK" id="inputGroupSelect01">
                  <option value="{{Auth::user()->id}}">
                      {{Auth::user()->Username}}
                  </option>
                </select>
                <p style="color:red" class="help is-danger textError" id="errorUsername_FK"></p>
              </div>
            </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nội Dung</label>
                <textarea class="form-control editor" id="Content-add" name="Content" id="exampleFormControlTextarea1" rows="5" placeholder="Nội Dung..."></textarea>
                <p style="color:red" class="help is-danger textError" id="errorContent"></p>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea2">Mô Tả</label>
                <textarea class="form-control" required id="Description-add" name="Description" id="exampleFormControlTextarea2" rows="5" placeholder="Mô Tả"></textarea>
                <p style="color:red" class="help is-danger textError" id="errorDescription"></p>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea3">Từ Khoá</label>
                <textarea class="form-control" required id="KeyWord-add" name="KeyWord" id="exampleFormControlTextarea3" rows="5" placeholder="Từ Khoá"></textarea>
                <p style="color:red" class="help is-danger textError" id="errorKeyWord"></p>
              </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Tác Giả</label>
              <input type="text" class="form-control" required id="Author-add" name="Author" id="formGroupExampleInput2" placeholder="Tác Giả...">
              <p style="color:red" class="help is-danger textError" id="errorAuthor"></p>
            </div>
            <div class="custom-file">
              <label for="formGroupExampleInput3" class="custom-file-label">Hình Đại Diện</label>
              <input type="file" required class="custom-file-input" id="Picture-add" name="Picture" id="formGroupExampleInput3" placeholder="Hình Đại Diện">
              <p style="color:red" class="help is-danger textError" id="errorPicture"></p>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Thêm</button>
        <button type="button" class="btn btn-default btn-exit" data-dismiss="modal">Thoát</button>
      </div>
    </form>
    </div>
  </div>
</div>