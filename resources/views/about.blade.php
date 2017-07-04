@extends('main')
@section('title', '| About me')
@section('content')
<h2>About me</h2>
<div class="row">
    <div class="col-md-4">
        <img src="{{ asset('/images/me.jpg') }}" width="300px" height="400px">
    </div>
    <div class="col-md-8">
        <h1>Manjurul Hoque</h1>
        <p>Like to work with new technology</p>
    </div>
</div>
@endsection