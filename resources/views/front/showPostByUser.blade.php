@extends('layouts.app')
@section('title', $title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			<h1>Les posts de {{ $user->name }}</h1>
			<hr>
			@foreach($posts as $post)
			<h3><a href="{{ Action('FrontController@show', $post->id)}}">{{ $post->title }}</a></h3>
			<p>{{ $post->excerpt(10) }}</p>

				@if($category = $post->category)
				<p>Dans la catégorie : <a href="{{ Action('FrontController@showPostByCat', $category->id)}}">{{$category->title}}</a></p>
				@endif

			@endforeach
    </div>
</div>
@endsection
