@extends('Admin.master')
@section('title','Ajouter Fournisseurs')

@section('content')
<div class="container">

    <form class="form-inline custom-form" action="{{route('Fournisseurs.store')}}" method="POST" enctype="multipart/form-data">
     @csrf

     <h1 class="text-center text-success">Ajouter Fournisseurs </h1>

         <div class="form-group">
            nom <input type="text" name="nom" class="form-control " value="{{old("nom")}}" >
             @if($errors->has('nom'))
             <span class="text-danger">{{ $errors->first('nom') }}</span><br>
         @endif
         </div>
         <div class="form-group">
            adresse <input type="text" name="adresse" class="form-control " value="{{old("adresse")}}" >
             @if($errors->has('adresse'))
             <span class="text-danger">{{ $errors->first('adresse') }}</span><br>
         @endif
         </div>
         <div class="form-group">
            email <input type="email" name="email" class="form-control " value="{{old("email")}}" >
             @if($errors->has('email'))
             <span class="text-danger">{{ $errors->first('email') }}</span><br>
         @endif
         <div class="form-group">
            telephone <input type="text" name="telephone" class="form-control " value="{{old("telephone")}}" >
             @if($errors->has('telephone'))
             <span class="text-danger">{{ $errors->first('telephone') }}</span><br>
         @endif
         </div>





     <button type="submit" class="btn btn-success">Ajouter</button>
   </form>
</div>
@endsection
