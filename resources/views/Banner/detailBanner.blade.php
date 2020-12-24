@extends('layout.menu_layout')
@section('content')
<form action="{{route('Banner.store')}}" method="POST">
    <h3>CHI TIẾT BANNER</h3>
    <div class="form-group">
      <h1>Tên Banner:{{$data[0]['BannerName']}} </h1>
    </div>
  </form>
@endsection