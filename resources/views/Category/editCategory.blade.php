@if (Auth::user()->RoleCode_FK != 1)
  @php
      return;
  @endphp
@endif
@extends('layout.menu_layout')
@section('content')
<form action="{{route('Roles.update',$data[0]['CateId'])}}" method="POST">
  @csrf
    <h3>CHINH SUA CHUYÊN MỤC</h3>
    <div class="form-group">
      <label for="formGroupExampleInput">Tên chuyên mục</label>
      <input type="text"  class="form-control @error('CateName') is-invalid @enderror" value="{{$data[0]['CateName']}}" name="CateName" maxlength="1000"  required id="formGroupExampleInput" autocomplete="CateName" placeholder="Chuyên mục...">  
      @error('CateName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><button type="submit" class="btn btn-success">Lưu</button></div>
        <div class="col-4"></div>
    </div>
  </form>
@endsection