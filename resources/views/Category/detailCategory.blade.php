@if (Auth::user()->RoleCode_FK != 1)
  @php
      return;
  @endphp
@endif
@extends('layout.menu_layout')
@section('content')
    <h3>CHI TIẾT QUYỀN</h3>
    <div class="form-group">
      <h1>Tên Chuyên Mục:{{$data[0]['CateName']}} </h1>
    </div>
@endsection