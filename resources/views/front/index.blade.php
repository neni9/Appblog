@extends('layouts.app')
@section('title', $title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">

				<h1>Mes articles</h1>
				<hr>
				@if($posts)
					{{ $posts->render() }}
				@endif

				@forelse($posts as $post)
					<h2><a href="{{url('post',[$post->id,'edit'])}}">{{ $post->title }}</a></h2>
					@if($post->picture)
					<div class="picture">
						<a href="{{ Action('FrontController@show', $post->id)}}"><img src="{{url('uploads', $post->picture->uri)}}"></a>
					</div>
				@endif

				<br>
				<p>{{ $post->excerpt(10) }}</p>
				<p>@if($averageScore = $post->averageScore()){{$averageScore}}/20
	                	@else 0
	                	@endif</p>
					<a href="{{ Action('FrontController@show', $post->id)}}">En savoir plus...</a>
				@if($tags = $post->tags)
					<ul>
					    @foreach($tags as $tag)
					    <li>{{ $tag->name }}</li>
					    @endforeach
					</ul>
				@endif
				@if($category = $post->category)
					<p>Dans la catégorie : <a href="{{ Action('FrontController@showPostByCat', $category->id)}}">{{$category->title}}</a></p>
				@endif
					<p class="italic">Crée le {{ $post->date() }} @if($user = $post->user) par <a href="{{ Action('FrontController@showPostByUser', $user->id)}}">{{ $user->name }}</a>. @endif</p>
				@empty
					<p>Aucun article</p>
				@endforelse
    </div>
    <div class="col-md-4 sidebar">
		<h3>Les sponsors Php</h43>
		<hr>
		<img src="{{ asset('logos/elao_logo_150px.png') }}" class="img-responsive" >
		<img src="{{ asset('logos/Elephpant.png') }}" class="img-responsive" >
		<img src="{{ asset('logos/logo-large.png') }}" class="img-responsive" >
		<img src="{{ asset('logos/zol-logo.png') }}" class="img-responsive" >
    </div>
</div>
@endsection
