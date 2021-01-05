@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<h4>Chức Năng</h4>
<div class="row">
<div class="col-4">
  <a href="{{route('News.create')}}" class="btn btn-outline-success">Thêm mới</a>

</div>
<div class="col-4">
  <a href="{{route('News.baidaduyet')}}" class="btn btn-outline-warning">Danh Sách Bài Viết</a>
</div>
<div class="col-4">
    <a href="{{route('News.index')}}" class="btn btn-outline-danger">Danh Sách Chờ Duyệt</a>
</div>
</div>
<hr>
<h2>Danh Sách Bài Viết</h2>
<div class="row">
  <div class="col-8"></div>
  <div class="col-4">
    <br>
  </div>
</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tiêu Đề</th>
            <th scope="col">Nội Dung</th>
            <th scope="col">Tác Giả</th>
            <th scope="col">Chỉnh Sửa</th>
            <th scope="col">Xoá</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Data as $item)
          <tr>
              <th scope="row">{{$item['IdNews']}}</th>
              <td>{{$item['Title']}}</td>
              <td>{!!$item['Content']!!}</td>
              <td>{{$item['Author']}}</td>
              <td>
                <form action="{{route('News.edit')}}" method="GET">
                  @csrf
                  <input type="text" name="id" value="{{ $item['IdNews'] }}" hidden>
                  <button type="submit" class="btn btn-warning">Chỉnh Sửa</button></td>
                </form>
              <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">Xoá</button>
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>
                          Bạn có muốn xóa bài viết này
                        </p>
                      </div>
                      <div class="modal-footer" style="margin-right:50px">
                          <div class="col-5">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Không</button>
                          </div>
                          <div class="col-5">
                            <form action="{{route('News.destroy', $item['IdNews'])}}" method="POST">
                              @method('DELETE')
                              @csrf
                              <input type="hidden" value="{{$item['IdNews']}}">
                              <button type="submit" class="btn btn-danger">Có</button>
                            </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>

<!-- Button trigger modal -->


<!-- Modal -->


@endsection