@extends('layout.menu_layout')
@section('content')
{{--  --}}<div>
<h4>DANH SÁCH TIN TỨC</h4>
<a href="" class="btn btn-success btn-add" data-target="#News-add" data-toggle="modal">Thêm mới</a>
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
            <th scope="col">Duyệt</th>
            <th scope="col">Không Duyệt</th>
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
              <td><button type="button" class="btn btn-success">Duyệt</button></td>
              <th><button type="button" class="btn btn-danger">Không Duyệt</button></th>
              <td><button type="button" class="btn btn-warning">Chỉnh Sửa</button></td>
              <td><button type="button" class="btn .btn-primary">Xoá</button></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
      </div>
    {{--  --}}
@endsection
@include('News.addNews')
@include('News.editNews')
@include('News.detailNews')
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
    <script type="text/javascript">
      $(document).ready(function(){
        $('.btn-exit').click(function(e){
            e.preventDefault();
            $('.textError').text(" ");
        })  
        //add
        $('#form-add').submit(function(e){
          e.preventDefault();
          var url = $(this).attr('data-url');
          $.ajax({
            type:'post',
            url: url,
            data:{
              CateId_FK:$('#CateId_FK-add').value,
              id_user_FK:$('#id_user_FK-add').value,
              Title:$('#Title-add').val(),
              Content:$('#Context-add').value,
              Description:$('#Description-add').value,
              KeyWord:$('#KeyWord-add').value,
              Author:$('#Author-add').val(),
              Picture:$('#Picture-add').val(),
            },
            success:function(response){
              toastr.success("Thành Công", "Thêm Tin Tức")
              $('#News-add').modal('hide');
              setTimeout(function(){
                window.location.href="{{route('News.index')}}";
              },500);
            },
            error:function(response){
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
    <script>ClassicEditor
      .create( document.querySelector( '.editor' ), {
        
        toolbar: {
          items: [
            'heading',
            '|',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            '|',
            'indent',
            'outdent',
            '|',
            'imageUpload',
            'blockQuote',
            'insertTable',
            'mediaEmbed',
            'undo',
            'redo'
          ]
        },
        language: 'vi',
        image: {
          toolbar: [
            'imageTextAlternative',
            'imageStyle:full',
            'imageStyle:side'
          ]
        },
        table: {
          contentToolbar: [
            'tableColumn',
            'tableRow',
            'mergeTableCells'
          ]
        },
        licenseKey: '',
        
      } )
      .then( editor => {
        window.editor = editor;
      } )
      .catch( error => {
        console.error( 'Oops, something went wrong!' );
        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
        console.warn( 'Build id: 7druuo26sl7z-8o65j7c6blw0' );
        console.error( error );
      } );
    </script>
@endsection