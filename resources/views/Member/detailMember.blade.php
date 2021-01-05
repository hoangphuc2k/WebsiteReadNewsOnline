@extends('layout.menu_layout')
@section('content')
<form action="{{route('Member.store')}}" method="POST">
    <h3>CHI TIẾT Member</h3>
    <div class="form-group">
      <h1>Tên Banner:{{$data[0]['Usermember']}} </h1>
    </div>
  </form>
@endsection