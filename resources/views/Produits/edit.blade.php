@extends('include.layoute')
@section('title','Modifier produits')
@section("content")
<div class="container-fluid">


      <div class="card card-2">
        <h2 class=" text-center text-capitalize text-warning mt-4">Modifier produits </h2>
        <div class="card-body">
            <form action="{{route('produits.update')}}" method="POST" enctype="multipart/form-data">
                 @csrf
                <input type="hidden" value="{{$produits->id}}" name="id">
                <div class="form-group">
                    <label for="name">stockes_id :</label> <input type="text" name="stockes_id" class="input input--style-3" value="{{$produits->stockes_id}}" >
                     @if($errors->has('stockes_id'))
                     <span class="text-danger">{{ $errors->first('stockes_id') }}</span><br>
                 @endif
                 </div>

                 <div class="form-group">
                    <label for="name">numserie :</label> <input type="text" name="numserie" class="input input--style-3" value="{{$produits->numserie}}" >
                     @if($errors->has('numserie'))
                     <span class="text-danger">{{ $errors->first('numserie') }}</span><br>
                 @endif
                 </div>

                 <div class="form-group">
                    <label for="name">numinv :</label> <input type="text" name="numinv" class="input input--style-3" value="{{$produits->numinv}}" >
                     @if($errors->has('numinv'))
                     <span class="text-danger">{{ $errors->first('numinv') }}</span><br>
                 @endif
                 </div>

                 <div class="form-group">
                    <label for="name">Tribunal :</label> <input type="text" name="Tribunal" class="input input--style-3" value="{{$produits->Tribunal}}" >
                     @if($errors->has('Tribunal'))
                     <span class="text-danger">{{ $errors->first('Tribunal') }}</span><br>
                 @endif
                 </div>
                 <div class="form-group">
                    <label for="name">fondus :</label> <input type="text" name="fondus" class="input input--style-3" value="{{$produits->fondus}}" >
                     @if($errors->has('fondus'))
                     <span class="text-danger">{{ $errors->first('fondus') }}</span><br>
                 @endif
                 </div>

                 <div class="form-group">
                    <label for="name">nbr_maintenance :</label> <input type="text" name="nbr_maintenance" class="input input--style-3" value="{{$produits->nbr_maintenance}}" >
                     @if($errors->has('nbr_maintenance'))
                     <span class="text-danger">{{ $errors->first('nbr_maintenance') }}</span><br>
                 @endif
                 </div>
                 <div class="form-group">
                    <label for="name">description :</label> <input type="text" name="description" class="input input--style-3" value="{{$produits->description}}" >
                     @if($errors->has('description'))
                     <span class="text-danger">{{ $errors->first('description') }}</span><br>
                 @endif
                 </div>

                 <button type="submit" class="btn btn-warning btn--radius">Modifier</button>
                </form>
                </div>
              </div>




        @endsection
