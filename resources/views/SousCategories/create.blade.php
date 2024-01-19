@extends('Admin.master')
@section('title','Ajouter sous_Catégories')

@section('content')
<div class="container">

    <form class="form-inline custom-form" action="{{route('sous_categories.store')}}" method="POST" enctype="multipart/form-data">
     @csrf

     <h1 class="text-center text-success">Ajouter sous-Categories </h1>

         <div class="form-group">
            name <input type="text" name="name" class="form-control " value="{{old("name")}}" >
             @if($errors->has('name'))
             <span class="text-danger">{{ $errors->first('name') }}</span><br>
         @endif
         </div>

         <div class="form-group">
            description <textarea name="description" id="" cols="30" rows="2"></textarea>
             @if($errors->has('description'))
             <span class="text-danger">{{ $errors->first('description') }}</span><br>
         @endif
         </div>
         <br>
         <div class="form-group">

            categories<select name="categories" id="" class="form-select">
                <option value="">Select categories</option>
                @foreach($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                @endforeach
            </select>
             @if($errors->has('categories'))
             <span class="text-danger">{{ $errors->first('categories') }}</span><br>
         @endif
         </div><br>



     <button type="submit" class="btn btn-success">Ajouter</button>
   </form>
</div>
@endsection
