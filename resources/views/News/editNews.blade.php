@extends('layout.menu_layout')
@section('content')
<form action="{{route('News.update',$BaiViet[0]['IdNews'])}}" method="POST">
@method('PATCH')
@csrf
<h3>CHỈNH SỬA BÀI VIẾT</h3>
  <div class="form-group">
    <label for="formGroupExampleInput">Tiêu Đề</label>
    <input type="text" value="{{$BaiViet[0]['Title']}}" class="form-control @error('Title') is-invalid @enderror" name="Title" required id="formGroupExampleInput" autocomplete="Title" placeholder="Tiêu đề...">  
    @error('Title')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  <div class="form-group">
    <label for="inputGroupSelect01">Tên Chuyên Mục</label>
    <select class="form-control @error('CateId_FK') is-invalid  @enderror"  name="CateId_FK" required placeholder="Chuyên Mục..." id="inputGroupSelect01">
      @foreach ($Cate as $item)
        @if ($item['CateId'] == $BaiViet[0]['CateId_FK'])
          <option value="{{$item['CateId']}}" selected>
        @else
          <option value="{{$item['CateId']}}">
        @endif
        {{$item['CateName']}}
        </option>   
      @endforeach
    </select>
    @error('CateId')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="inputGroupSelect01">Tên Người Đăng</label>
    <select class="custom-select" name="id_user_FK" id="inputGroupSelect01">
      <option value="{{Auth::user()->id}}">
          {{Auth::user()->Username}}
      </option>
    </select>
    <p style="color:red" class="help is-danger textError" id="errorUsername_FK"></p>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Nội Dung</label>
    <textarea  class="form-control editor @error('Content') is-invalid @enderror" value="{{ old('Content') }}" name="Content" id="exampleFormControlTextarea1" rows="5" placeholder="Nội Dung...">
      {{$BaiViet[0]['Content']}}
    </textarea>
    @error('Content')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea2">Mô Tả</label>
    <textarea  class="form-control @error('Description') is-invalid @enderror" required value="{{ old('Description') }}" name="Description" id="exampleFormControlTextarea2" rows="5" placeholder="Mô Tả">
{{$BaiViet[0]['Description']}}
    </textarea>
    @error('Description')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea3">Từ Khoá</label>
    <textarea   class="form-control @error('KeyWord') is-invalid @enderror" required value="{{ old('KeyWord') }}" name="KeyWord" id="exampleFormControlTextarea3" rows="5" placeholder="Từ Khoá...">
{{$BaiViet[0]['KeyWord']}}
    </textarea>
    @error('KeyWord')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Tác Giả</label>
    <input type="text" value="{{$BaiViet[0]['Author']}}" class="form-control @error('Author') is-invalid @enderror" value="{{ old('Author') }}" name="Author" required id="formGroupExampleInput2" placeholder="Tác Giả...">  
    @error('Author')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
    @enderror
  </div>
  <div class="custom-file">
    <img src="{{ $BaiViet[0]['Picture'] }}" alt="sadfds">
    <label for="formGroupExampleInput3" class="custom-file-label">Hình Ảnh</label>
    <input type="file"  class="custom-file-input @error('Picture') is-invalid @enderror" value="" name="Picture"  id="formGroupExampleInput3" placeholder="Hình Đại Diện...">  
    @error('Picture')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
    @enderror
  </div>
  <div class="form-group">
    <input type="text" name="IdNews" hidden value="{{ $BaiViet[0]['IdNews'] }}">  
  </div>  
  <p></p>
  <div class="row">
      <div class="col-4"></div>
      <div class="col-4"><button type="submit" class="btn btn-success">Thêm</button></div>
      <div class="col-4"></div>
  </div>
</form>
@endsection
@section('script')
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
