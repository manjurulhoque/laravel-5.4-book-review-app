@extends('main')

@section('title', '| Create New Book')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Book</h1>
			<hr>
			{!! Form::open(array('route' => 'books.store', 'method' => 'POST', 'files' => true)) !!}
                
				{{ Form::label('title', 'Book Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('category_id', 'Category:') }}
				<select class="form-control" name="category_id">
                
                    <option value='0'>Select Category</option>
					@foreach($categories as $category)
						<option value='{{ $category->id }}'>{{ $category->name }}</option>
					@endforeach

				</select>

				{{ Form::label('featured_img', 'Upload a Featured Image') }}
                {{ Form::file('featured_img') }}

				{{ Form::label('description', "Book Description:") }}
				{{ Form::textarea('description', null, array('class' => 'form-control')) }}

                {{ Form::label('author', 'Book Author:') }}
                {{ Form::text('author', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::submit('Create Book', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection
