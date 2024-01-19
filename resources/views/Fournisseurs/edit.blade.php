@extends('Admin.master')
@section('title','Modifier Tribunal')

@section('content')
<div class="container">

    <form class="form-inline custom-form" action="{{route('tribunal.update')}}" method="POST" enctype="multipart/form-data">
     @csrf

     <h1 class="text-center text-warning">Modifier Tribunal </h1>
        <input type="hidden" value="{{$data->id}}" name="id">
        <div class="form-group">
            nom <input type="text" name="nom" class="form-control " value="{{$data->nom}}" >
             @if($errors->has('nom'))
             <span class="text-danger">{{ $errors->first('nom') }}</span><br>
         @endif
         </div>
         <div class="form-group">
            type <input type="text" name="type" class="form-control " value="{{$data->type}}" >
             @if($errors->has('type'))
             <span class="text-danger">{{ $errors->first('type') }}</span><br>
         @endif
         </div>
         <div class="form-group">
            adresse <input type="text" name="adresse" class="form-control " value="{{$data->adresse}}" >
             @if($errors->has('adresse'))
             <span class="text-danger">{{ $errors->first('adresse') }}</span><br>
         @endif
         </div>



     <button type="submit" class="btn btn-warning">Modifier</button>
   </form>
</div>
@endsection
