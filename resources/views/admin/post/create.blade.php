@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
                <h2>création d'un article</h2>
                <hr>
                @if(Session::has('message'))
                <p>{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('post') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                     <div class="form-group">
                    <input type="hidden" class="form-control" name="user_id" value="{{$userId}}">
                    </div>
                     <div class="form-group">
                     <input type="text" class="form-control" name="title" placeholder="Votre titre" value="{{old('title')}}">
                     </div>
                    @if($errors->has('title')) <span class="error">{{ $errors->first('title') }}</span> @endif
                     <div class="form-group">
                     <textarea name="content" class="form-control" rows="3"></textarea>
                     </div>
                    @if($errors->has('content')) <span class="error">{{ $errors->first('content') }}</span> @endif 
                     <div class="form-group">
                     <input type="date" name="published_at">
                     </div>
               
                     <div class="form-group">
                     <input type="file" name="picture"  >
                     </div>
                    @if($errors->has('picture')) <span class="error">{{ $errors->first('picture') }}</span> @endif 
                     <div class="form-group">
                      <label for="name">titre de l'image</label>
                      <input type="text" name="name" class="form-control">
                      </div>
                    @if($errors->has('name')) <span class="error">{{ $errors->first('name') }}</span> @endif 
                    
                     <div class="form-group">
                     <label for="category">choisez une categorie </label>
                     
                       <select name="category_id" class="form-control">
                                        @foreach($categories as $id => $title)
                                          <option value="{{$id}}">{{$title}} </option>
                                        @endforeach
                       </select>
                   </div>
                    <div class="form-group">
                    <label for="tags">tag</label>
                                <select name="tag_id[]" class="form-control" multiple>
                                        @foreach(App\Tag::all() as $tags)
                                            <option value="{{$tags->id}}">{{$tags->name}} </option>
                                        @endforeach
                        </select>
                        </div>
                      @if($errors->has('tags')) <span class="error">{{ $errors->first('tags') }}</span> @endif 
                      

                    <button type="submit" class="btn btn-primary edit" value="valider">valider</button>
                    <br><br>
                </form>
    </div>
</div>
@endsection


