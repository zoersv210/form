@extends('layouts.app')

@section('content')

	<div class="content">
		<h1>Обратная связь</h1>

		<form method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="subject">Тема сообщения</label>
				<input class="form-control" type="text" name="subject" id="subject" 
				value="{{ old('subject') }}">
			</div>

			<div class="form-group">
				<label  for="message">Сообщение</label>
				<textarea id="message" name="message" class="form-control" rows="8" >
				{{old('message')}}
				</textarea>
			</div>

			<div class="form-group">
				<input class="form-control-file" type="file" name="file" id="file" 
				value="{{old('file') }}">
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>

		@if($errors->any())
			<ul class="alert alert-danger">
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		@endif

		@if(session('danger'))
			<div class="alert alert-danger">
				{{session('danger')}}
			</div>
		@elseif(session('success'))
			<div class="alert alert-success">
				{{session('success')}}
			</div>
		@endif
	</div>

@endsection
