@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<h4>Danh Sách Chuyên Mục</h4>
<a href="" class="btn btn-success btn-add" data-target="#Category-add" data-toggle="modal">Thêm mới</a>
<p></p>
<div class="row">
  <div class="col-8"></div>
  <div class="col-4">
    <br>
  </div>
</div>
    <table class="table" id="table-cate">
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
            <th scope="row">{{$item['CateId']}}</th>
            <td>{{$item['CateName']}}</td>
            <td><button  data-url="{{route('Category.show',$item['CateId'])}}" type="button" class="btn btn-warning btn-show" data-target="#Category-show" data-toggle="modal">Chi Tiết</button></td>
            <td><button data-url="{{route('Category.edit',$item['CateId'])}}" type="button" class="btn btn-success btn-edit"  data-target="#Category-edit" data-toggle="modal">Chỉnh Sửa</button></td>
          <td><button data-url="{{route('Category.delete',$item['CateId'])}}" type="button" class="btn btn-primary btn-del">Xoá</button></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
@endsection
@section('script')
    <script type="text/javascript" charset="utf-8">
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
      });
    </script>
    <script type="text/javascript">
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
    @include('Category.addCategory')
    @include('Category.editCategory')
    @include('Category.detailCategory')
    <script type="text/javascript">
      $(document).ready(function(){
        //add
        $('#form-add').submit(function(e){
          e.preventDefault();
          var url = $(this).attr('data-url');
          $.ajax({
            type:'post',
            url: url,
            data:{
              CateName:$('#CateName-add').val(),
            },
            success:function(response){
              toastr.success("Thành Công", "Thêm Chuyên Mục")
              $('#Category-add').modal('hide');
              setTimeout(function(){
                window.location.href="{{route('Category.index')}}";
              },500);
            },
            error:function(response){
              $('#errorCateName').text(response.responseJSON.error.CateName)
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
              $('h2#CateId').text(response.data[0].CateId)
              $('h2#CateName').text(response.data[0].CateName)
            }
          })
        })
        //Edit
        $('.btn-edit').click(function(e){
          var url = $(this).attr('data-url');
          $('#Category-edit').modal('show');
          e.preventDefault();
          $.ajax({
            type:'get',
            url: url,
            success:function(response){
              $('#CateName-edit').val(response.data[0].CateName);
              $('#form-edit').attr('data-url','{{asset('Category/update')}}/' + response.data[0].CateId);
            },
            error:function(error){
            }
          })
        })
        //form-edit
        $('#form-edit').submit(function(e){
          e.preventDefault();
          var url = $(this).attr('data-url');
          $.ajax({
            type:'patch',
            url: url,
            data:{
              CateName:$('#CateName-edit').val(),
            },
            success:function(response){
              toastr.success("Thành Công", "Chỉnh Sửa Chuyên Mục")
              $('#Category-edit').modal('hide');
              setTimeout(function(){
                window.location.href="{{route('Category.index')}}";
              },500);
            },
            error:function(jqXHR,textStatus,errorThrown){
            }
          })
        })
        //Del
        $('.btn-del').click(function(){
          var url = $(this).attr('data-url');
          if(confirm('Bạn thật sự muốn xoá?')){
            $.ajax({
              type:'delete',
              url:url,
              success:function(response){
                window.location.reload();
              },
              error: function(jqXHR,textStatus,errorThrown){

              }
            })
          }
        })
      })
    </script>
@endsection
