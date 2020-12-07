
  <!-- Modal -->
  <div id="Roles-edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Chỉnh Sửa Quyền</h4>
          <button type="button" class="close btn-exit" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form data-url="" id="form-edit" method="POST">
            @method('PATCH')
            @csrf
              <div class="form-group">
                <label for="formGroupExampleInput">QUYỀN</label>
                <input type="text" class="form-control" name="RoleName" value="" id="RoleName-edit" ss id="formGroupExampleInput" placeholder="QUYỀN...">
                <p style="color:red" class="help is-danger textError" id="errorRolesName"></p>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Sửa</button>
          <button type="button" class="btn btn-default btn-exit" data-dismiss="modal">Thoát</button>
        </div>
      </form>
      </div>
    </div>
  </div>