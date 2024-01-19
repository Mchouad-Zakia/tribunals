@extends('Admin.master')
@section('title','Modifier Catégories')

@section('content')
<div class="container">

    <form class="form-inline custom-form" action="{{route('sous_categories.update')}}" method="POST" enctype="multipart/form-data">
     @csrf

     <h1 class="text-center text-warning">Modifier Categories </h1>
     <input type="hidden" name="id" id="" value="{{$data->id}}">
     <div class="form-group">
        name <input type="text" name="name" class="form-control " value="{{$data->name}}" >
         @if($errors->has('name'))
         <span class="text-danger">{{ $errors->first('name') }}</span><br>
     @endif
     </div>

     <div class="form-group">
        description <textarea name="description" id="" cols="30" rows="2">{{$data->description}}</textarea>
         @if($errors->has('description'))
         <span class="text-danger">{{ $errors->first('description') }}</span><br>
     @endif
     </div>
     <br>
     <div class="form-group">

        categories<select name="categories" id="" class="form-select">
            <option value="">Select categories</option>
            @foreach($categories as $categorie)
            <option value="{{$categorie->id}}" @if($data->categories_id===$categorie->id) selected @endif>{{$categorie->name}}</option>
            @endforeach
        </select>
         @if($errors->has('categories'))
         <span class="text-danger">{{ $errors->first('categories') }}</span><br>
     @endif
     </div><br>




     <button type="submit" class="btn btn-warning">Modifier</button>
   </form>
</div>
@endsection
