@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
  <a type="button" class="btn btn-success"  data-target="#Roles-add" data-toggle="modal">Thêm Quyền</a>
<h4>Danh Sách Quyền</h4>
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
            <th scope="col">Chuyên Mục</th>
            <th scope="col">Chi Tiết</th>
            <th scope="col">Chỉnh Sửa</th>
            <th scope="col">Xoá</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Data as $item)
              
          <tr>
          <th scope="row">{{$item['RoleCode']}}</th>
            <td>{{$item['RoleName']}}</td>
            <td><button type="button" data-url="{{route('Roles.show',$item['RoleCode'])}}" class="btn btn-warning btn-show" data-target="#Roles-detail" data-toggle="modal">Chi Tiết</button></td>
            <td><button type="button" data-url="{{route('Roles.edit',$item['RoleCode'])}}" class="btn btn-success btn-edit" data-target="#Roles-edit" data-toggle="modal">Chỉnh Sửa</button></td>
            <td><button type="button" data-url="{{route('Roles.delete',$item['RoleCode'])}}" class="btn btn-primary btn-del">Xoá</button></td>
          </tr>
          @endforeach

        </tbody>
      </table>
      </div>
    {{--  --}}
@endsection
@section('script')
    <script type="text/javascript" charset="utf-8">
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
      });
    </script>
    <script>
      toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
    </script>
    @include('Roles.addRoles')
    @include('Roles.editRoles')
    @include('Roles.detailRoles')
    <script type="text/javascript">
      $(document).ready(function(){
        $('.btn-exit').click(function(e){
            e.preventDefault();
            $('.textError').text(" ");
        })  
        $('#form-add').submit(function(e){
          e.preventDefault();
          var url = $(this).attr('data-url');
          $.ajax({
            type:'post',
            url:url,
            data:{
              RoleName:$('#RoleName').val(),
            },
            success:function(response){
              toastr.success("Thành Công","Thêm Quyền")
              $('#Category-add').modal('hide');
              setTimeout(function(){
                window.location.href = '{{route('Roles.index')}}';  
              },500);
            },
            error:function(response){
              $('#errorRolesName').text(response.responseJSON.errors.RoleName)
            }
          })
        })
        //edit
        $('.btn-edit').click(function(e){
          var url = $(this).attr('data-url');
          $('#Roles-edit').modal('show');
          e.preventDefault();
          $.ajax({
            type:'get',
            url:url,
            success: function(response){
              $('#RoleName-edit').val(response.data[0].RoleName);
              $('#form-edit').attr('data-url','{{asset('Role/update')}}/'+response.data[0].RoleCode);
            },
            error:function(error){}
          })
        })
        //update
        $('#form-edit').submit(function(e){
          e.preventDefault();
          var url = $(this).attr('data-url');
          $.ajax({
            type:'patch',
            url:url,
            data:{
              RoleName:$('#RoleName-edit').val(),
            },
            success:function(response){
              toastr.success("Thành Công","Chỉnh Sửa Quyền")
              $('#Roles-edit').modal('hide');
              setTimeout(function(){
                window.location.href = '{{route('Roles.index')}}';  
              },500);
            },
            error:function(response){
              $('#errorRolesName').text(response.responseJSON.errors.RoleName)
            }
          })
        })
        //show
        $('.btn-show').click(function(){
          var url = $(this).attr('data-url');
          $.ajax({
            type:'get',
            url:url,
            success: function(response){
              console.log(response)
              $('h2#RoleCode').text(response.data[0].RoleCode);
              $('h2#RoleName').text(response.data[0].RoleName);
            }
          })
        })
        //del
        $('.btn-del').click(function(){
          var url = $(this).attr('data-url');
          if(confirm('Bạn thật sự muốn xoá?')){
            $.ajax({
              type:'delete',
              url:url,
              success: function(){
                window.location.reload();
              },
              error: function(error){}
            })
          }
        })
      })
    </script>
@endsection