@extends('layouts.scaffold')

@section('main')

<h1>Create Product</h1>

{{ Form::open(array('route' => 'products.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('link', 'Link:') }}
            {{ Form::text('link') }}
        </li>

        <li>
            {{ Form::label('photo', 'Photo:') }}
            {{ Form::text('photo') }}
        </li>

        <li>
            {{ Form::label('live', 'Live:') }}
            {{ Form::checkbox('live') }}
        </li>

        <li>
            {{ Form::label('featured', 'Featured:') }}
            {{ Form::checkbox('featured') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


