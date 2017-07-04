@extends('main')

@section('title', '| Create New Category')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Category</h1>
            <hr>
            {!! Form::open(array('route' => 'categories.store', 'method' => 'POST')) !!}
                
                {{ Form::label('name', 'Category Name:') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

                {{ Form::submit('Create Category', array('class' => 'btn btn-danger btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
