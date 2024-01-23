@extends('include.layoute')
@section('title',"Ajouter fournisseur")
@section("content")
<div class="container-fluid">


      <div class="card card-2">
        <h2 class=" text-center text-capitalize text-success m-3">Ajouter Fournisseur</h2>
        <div class="card-body">

            <form  action="{{ route('Fournisseurs.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf


            <div class="row">
                <div class="col form-group" id='form-group'>
                    <input type="text" name="nom" class="input--style-2 " value="{{ old('nom') }}"
                        placeholder="Nom ">
                    @if ($errors->has('nom'))
                        <span class="text-danger">{{ $errors->first('nom') }}</span><br>
                    @endif
                </div>
                <div class=" col form-group"id='form-group'>
                    <input type="text" name="adresse" class="input--style-2" value="{{ old('adresse') }}"
                        placeholder="Adresse ">
                    @if ($errors->has('adresse'))
                        <span class="text-danger">{{ $errors->first('adresse') }}</span><br>
                    @endif
                </div>
            </div><br><br>
            <div class="row">
                <div class="col form-group" id='form-group'>
                    <input type="email" name="email" class="input--style-2 " value="{{ old('email') }}"
                        placeholder="Email ">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span><br>
                    @endif
                </div>
                <div class="col form-group" id='form-group'>
                    <input type="text" name="telephone" class="input--style-2 "
                        value="{{ old('telephone') }}"placeholder="Telephone ">
                    @if ($errors->has('telephone'))
                        <span class="text-danger">{{ $errors->first('telephone') }}</span><br>
                    @endif
                </div>
            </div>




            <button type="submit" class="btn btn-success btn--radius">Ajouter</button>
        </form>
        </div>
      </div>





</div>



<style>


</style>

@endsection
