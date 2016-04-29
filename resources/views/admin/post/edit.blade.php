@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">

            <h2>édition d'un article</h2>
            <hr>

            <form action="{{url('post', $post->id)}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT"> {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="nouveaux title">
                </div>
                <div class="form-group">
                    <textarea type="text" name="content" class="form-control">{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <input type="date" name="published_at" class="form-control" value="{{ $post->published_at}}">
                </div>
                <div class="form-group">
                    @if(!is_null($post->picture))
                        <img src="{{url('uploads', $post->picture->uri)}}"> 
                        @if($errors->has('picture')) {{ $errors->first('picture') }} 
                        @endif 
                    @endif
                </div>

                <div class="form-group">
                    <input type="file" name="picture">
                </div>
                    
                <div class="form-group">
                     <label class="checkbox-inline">
                    <input type="checkbox" name="deletepicture"> supprimer l'image :</label>
                </div>

               <div class="form-group">
                    <label for="name">titre de l'image </label>
                    <input type="text" name="name">
                </div>

              <div class="form-group">
                 <label for="category">changer de categorie </label>
                 
                   <select name="category_id" class="form-control">
                                    @foreach($categories as $id => $title)
                                      <option value="{{$id}}">{{$title}} </option>
                                    @endforeach
                   </select>
            </div>

                <div class="form-group">
                    <label for="tags">tag</label>
                    <select name="tag_id[]"  class="form-control" multiple>
                        @foreach($tags as $id => $name)
                        <option @if($post->hasTag($id)) selected @endif value="{{$id}}">{{$name}} </option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('tag_id')) {{ $errors->first('tag_id') }} @endif

                <button type="submit" class="btn btn-default edit">éditer</button>
                <br>
                <br>
            </form>
            <hr> @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
            @endif
    </div>
</div>
@endsection
