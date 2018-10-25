@extends('layouts.app')

@section('scripts')
	<script src="{{ asset('js/asyncform.js') }}" defer></script>
@endsection

@section('content')
<div class="container">
	{!! Form::open(['files' => true]) !!}
	
		<div class="form-group">
			{!! Form::label('firstname', 'Imię') !!}
			{!! Form::text('firstname', '', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('lastname', 'Nazwisko') !!}
			{!! Form::text('lastname', '', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('file', 'Plik') !!}
			{!! Form::file('file') !!}
		</div>

	{!! Form::close() !!}

	<button class="btn btn-primary" id="submit">
		Wyślij
	</button>
</div>
@endsection