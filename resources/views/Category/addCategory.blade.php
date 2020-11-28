
<div id="Category-add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Thêm Chuyên Mục</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="form-add" data-url="{{route('Category.store')}}" role="form" action="" method="POST">
          @csrf
            <div class="form-group">
              <label for="formGroupExampleInput">Thể Loại</label>
              <input type="text" class="form-control" id="CateName-add" name="CateName" id="formGroupExampleInput" placeholder="Thể Loại...">
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Thêm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>