
  <!-- Modal -->
  <div id="Roles-edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Chỉnh Sửa Quyền</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form data-url="" id="form-edit" method="POST">
            @method('PATCH')
            @csrf
              <div class="form-group">
                <label for="formGroupExampleInput">QUYỀN</label>
                <input type="text" class="form-control" name="RoleName" value="" id="RoleName-edit" id="formGroupExampleInput" placeholder="QUYỀN...">
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