@extends('layouts.app')
@section('title', $title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			<h1>{{ $category->title }}</h1>
			
				<p>{{ $category->excerpt }}</p>

				@foreach($category->posts as $post)

				<h3>{{ $post->title }}</h3>

				@endforeach
    </div>
</div>
@endsection
