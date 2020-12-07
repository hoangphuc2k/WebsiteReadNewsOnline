
  <!-- Modal -->
<div id="Roles-add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thêm Quyền</h4>
        <button type="button btn-exit" class="close btn-exit" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form data-url="{{route('Roles.store')}}" id="form-add" method="POST">
          @csrf
            <div class="form-group">
              <label for="formGroupExampleInput">QUYỀN</label>
              <input type="text" class="form-control" name="RoleName" id="RoleName"  required id="formGroupExampleInput" placeholder="QUYỀN...">
              <p style="color:red" class="help is-danger textError" id="errorRolesName"></p>
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