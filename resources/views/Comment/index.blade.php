@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<a type="button" href="{{route('Comment.create')}}" class="btn btn-success" >Thêm Bình Luận</a>
<h4>Danh Sách Bình Luận</h4>
<div class="row">
    <div class="col-8"></div>
    <div class="col-4">
      <br>
    </div>
  </div>
    <table class="table" id="table-roles">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tin tức</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Đọc giả</th>
            <th scope="col">Chi Tiết</th>
            <th scope="col">Chỉnh Sửa</th>
            <th scope="col">Xoá</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Data as $item)
              
          <tr>
          <th scope="row">{{$item['IdCom']}}</th>
            <td>{{$item['IdNews_FK']}}</td>
            <td>{{$item['Title']}}</td>
            <td>{{$item['Context']}}</td>
            <td>{{$item['Usemember_FK']}}</td>
            <td><a  href="{{route('Comment.show',$item['IdCom'])}}" class="btn btn-warning btn-show" >Chi Tiết</a></td>
            <td><a  href="{{route('Comment.edit',$item['IdCom'])}}" class="btn btn-success btn-edit" >Chỉnh Sửa</a></td>
            <td>
              <form action="{{route('Comment.delete',$item['IdCom'])}}" method="POST" >
                @method('delete')
                @csrf
                <input type="submit" value="Xoá" class="btn btn-danger">
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    {{--  --}}
@endsection