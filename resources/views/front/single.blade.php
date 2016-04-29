@extends('layouts.app')

@section('title', $title)

@section('content')
<h1 class="titleafter">{{ $post->title }}</h1>
<p>{{ $post->content }}</p>

<p class="italic">Créer le {{ $post->date() }} par {{ $post->user->name }}</p>
@if($post->picture)
	<div class="picture">
		<img src="{{url('uploads', $post->picture->uri)}}">
	</div>
@endif
<br>

@if($averageScore = $post->averageScore())
<div class="total">
	<p> la note moyenne de cet article est de:{{$averageScore}}.</p>
</div>
@endif
@can('rate', $post)
<form action="{{ action('FrontController@ScorePost', $post)}}" method="post">
{{ csrf_field() }}
 <div class="form-group">
    <label for="score" class="form-control">voter pour cet article</label>
    <select name="score" class="form-control">
		@for($i =0; $i <=20; $i++)
		 <option value="{{$i}}">{{$i}}</option>
		 @endfor
	</select>
  </div>
  <button type="submit" value="Voter" class="btn btn-warning edit">voter</button>
</form>
	@if(!Auth::check())
	<p><a href"{{url('/login')}}">Connectez vous pour pouvoir voter</a></p>
	
	@endif
@endcan
<br>

<button type="submit" class="btn btn-warning modifier"><a href="{{url('post',[$post->id,'edit'])}}"> modifier l'article</a></button>
@endsection