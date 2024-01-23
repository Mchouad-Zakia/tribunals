@extends('include.layoute')
@section('title',"Ajouter stock")
@section("content")
<div class="container-fluid">
    <div class="card card-2">
        <h2 class=" text-center text-capitalize text-success m-3">Ajouter Stock</h2>
        <div class="card-body">

            <form  action="{{ route('Stock.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col form-group" id='form-group'>
                    <input type="text" name="name" class="input--style-2 " value="{{ old('name') }}"
                        placeholder="name ">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span><br>
                    @endif
                </div>
                <div class=" col form-group"id='form-group'>
                    <input type="text" name="model" class="input--style-2" value="{{ old('model') }}"
                        placeholder="model ">
                    @if ($errors->has('model'))
                        <span class="text-danger">{{ $errors->first('model') }}</span><br>
                    @endif
                </div>
            </div><br><br>
            <div class="row">
                <div class="col form-group" id='form-group'>
                    <input type="text" name="prix" class="input--style-2 " value="{{ old('prix') }}"
                        placeholder="prix ">
                    @if ($errors->has('prix'))
                        <span class="text-danger">{{ $errors->first('prix') }}</span><br>
                    @endif
                </div>
                <div class=" col form-group"id='form-group'>
                    <input type="number" name="garantie" class="input--style-2" value="{{ old('garantie') }}"
                        placeholder="garantie ">
                    @if ($errors->has('garantie'))
                        <span class="text-danger">{{ $errors->first('garantie') }}</span><br>
                    @endif
                </div>
            </div><br><br>
            <div class="row">
                <div class="col form-group" id='form-group'>
                    <input type="number" name="quantite" class="input--style-2 " value="{{ old('quantite') }}"
                        placeholder="quantite_stock ">
                    @if ($errors->has('quantite'))
                        <span class="text-danger">{{ $errors->first('quantite') }}</span><br>
                    @endif
                </div>
                <div class=" col form-group"id='form-group'>
                    <label for="" >sous_categories</label>
                    <select name="sous_categories" id="" class="form-select">
                        <option value="">Select sous_categories</option>
                     @foreach($data as $item)
                        <option value="{{$item->id}}">{{$item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('sous_categories'))
                        <span class="text-danger">{{ $errors->first('sous_categories') }}</span><br>
                    @endif
                </div>
            </div>
            <div class="form-group"id='form-group'>
                <label for="" class="m-2">Achats</label>
                <select name="Achats" id="" class="form-select">
                    <option value="">Select Achats(ref)</option>
                @foreach($achat as $item)
                    <option value="{{$item->id}}">{{$item->ref }}</option>
                    @endforeach
                </select>
                @if ($errors->has('Achats'))
                    <span class="text-danger">{{ $errors->first('Achats') }}</span><br>
                @endif
            </div>
            <button type="submit" class="btn btn-success btn--radius">Ajouter</button>
        </form>
        </div>
      </div>





</div>
@endsection
