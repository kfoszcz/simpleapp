@extends('layouts.app')

@section('content')
<div class="container">
	
	@if (count($people) > 0)
	<table class="table table-hover">
		<tr>
			<th>Imię</th>
			<th>Nazwisko</th>
			<th>Zdjęcie</th>
		</tr>
		@foreach ($people as $person)
			<tr>
				<td>{{ $person->firstname }}</td>
				<td>{{ $person->lastname }}</td>
				<td>{!! link_to_asset('images/' . $person->image, 'Zobacz zdjęcie') !!}</td>
			</tr>
		@endforeach
	</table>
	@else
	<p>Brak danych do wyświetlenia.</p>
	@endif
	
</div>
@endsection