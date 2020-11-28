
<div id="Category-edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Chỉnh Sửa Chuyên Mục</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="form-edit" data-url="" role="form" method="POST">
            @method('PATCH')
            @csrf
              <div class="form-group">
                <label for="formGroupExampleInput">Thể Loại</label>
              <input type="text" class="form-control" id="CateName-edit" value=""  name="CateName" id="formGroupExampleInput" placeholder="Thể Loại...">
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Sửa</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
        </div>
      </form>
      </div>
    </div>
  </div>