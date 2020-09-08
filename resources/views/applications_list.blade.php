@extends('layouts.app')

@section('content')

	<div class="content">
		<h1>Панель администратора</h1>
		<div class="applicationAll">

			@foreach($applicationAll as $application)
			<div class="alert alert-primary">
				<p class="">ID:  {{$application->id}}</p>
				<p class="">Тема:  {{$application->subject}}</p>
				<p class="">Сообщение:  {{$application->message}}</p>
				<p class="">Имя:  {{$application->user->name}}</p>
				<p class="">Е-мейл:  {{$application->user->email}}</p>
				<p class="">Дата создания:  {{$application->created_at}}</p>
					 @if($application->file)
					 <a class="btn btn-primary" href="{{asset($application->file)}}">File</a>
					 @endif
				</div>
		@endforeach
		</div>
	</div>
@endsection