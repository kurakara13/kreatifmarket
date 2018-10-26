@extends('layouts.app-all')
@section('content')
<div class="container" style="margin-top:100px;margin-bottom:100px">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Registration Confirmed</div>
        <div class="panel-body">
        Your Email is successfully verified. Click here to <a href="{{url('/login')}}">login</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
