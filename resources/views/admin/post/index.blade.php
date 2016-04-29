@extends('layouts.app')


@section('content')			
			<h2>Dashboard</h2>
	            <hr>
	            {{ $posts->links() }}
	            
	            <table class="table table-striped">
	            <thead>
	            <tr>
	                
	                <th class="cap">title</th>
	                <th class="cap">score</th>
	                <th class="cap">autheur</th>
	                <th class="cap">picture </th>
	                <th class="cap">date</th>
	                <th class="cap">category</th>
	                <th class="cap">tags</th>
	                <th class="cap">status</th>
	                <th class="cap">supprimer</th>
	            </tr>
	            </thead>
	           
	            @forelse($posts as $post)
	             <tr>
	                
	                <td><a href="{{url('post',[$post->id,'edit'])}}" class="dash"> {{ $post->title }}</a></td>
	                <td>@if($averageScore = $post->averageScore()){{$averageScore}}/20
	                	@else 0
	                	@endif

	                </td>
	                <td>{{ $post->user?  $post->user->name : 'aucun auteur'}}</td>
	                <td> @if($post->picture)<a href="{{ Action('FrontController@show', $post->id)}}"> <img src="{{url('uploads', $post->picture->uri)}}" class="img-responsive"></a> @endif</td>
	                <td>{{ $post->published_at->format('d/m/Y')}}</td>
	                <td> @if($category = $post->category){{ $category->title }}@endif</td>
	                <td>
	                @if($tags = $post->tags)
	                    @foreach($tags as $tag)
	                        {{$tag->name}}
	                    @endforeach
	                @endif
	                </td>
	                <td><a href="{{ action('PostController@published', $post)}}" class="btn btn-warning" >{{$post->status ==='opended'? 'closed' : 'opended'}}</a>
	               </td>
					<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">supprimer</button>

					<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">êtes vous sûr de vouloir supprimer le post</h4>
							</div>
							<div class="modal-body">
								<form action="{{url('post', $post->id)}}" method="POST" >
								<input type="hidden" name="_method" value="DELETE">
								{{csrf_field()}}
								<button type="submit" class="btn btn-danger" value="delete" >supprimer</button></form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

						</div>
						</div>
					</td>

	            @empty
	            <p>aucun post</p>
	               </tr>
	            @endforelse
	         
	        </table>

@endsection

