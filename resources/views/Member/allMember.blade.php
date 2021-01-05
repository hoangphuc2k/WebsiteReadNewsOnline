@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<h4>Tất cả thành viên</h4>
<a href="{{route('Member.create')}}" class="btn btn-success btn-add" >Thêm mới</a>
<div class="row">
  <div class="col-8"></div>
</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Usermember</th>
            <th scope="col">Password</th>
            <th scope="col">Email</th>
            <th scope="col">Fullname</th>
            <th scope="col" colspan="4">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Data as $item)
          <tr>
              <th scope="row">{{$item['Usemember']}}</th>
              <td>{{$item['Password']}}</td>
              <td>{{$item['Email']}}</td>
              <td>{{$item['FullName']}}</td>
              <td><a href="{{route('Member.edit',$item['Usermember'])}}" class="btn btn-success">Chinh3 sua</a></td>
              <td><a href="{{route('Member.show',$item['Usermember'])}}" class="btn btn-warning">Chi tiet</a></td>
              <td>
                <form action="{{route('Member.delete',$item['Usermember'])}}" method="POST" >
                @method('delete')
                @csrf
                <input type="submit" value="Xoá" class="btn btn-danger">
              </form></td>
          </tr>
          @endforeach
        </tbody>
    </table>
      
    </div>
    {{--  --}}
@endsection