@extends('include.layoute')
@section('title',"Modifier Achat")
@section("content")
<div class="container-fluid">


      <div class="card card-2">
        <h2 class=" text-center text-capitalize text-text-warning  m-3">Modifier Achat</h2>
        <div class="card-body">

            <form  action="{{ route('Achat.update') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="{{$data->id}}" name="id">
            <div class="row">
                <div class="col form-group" id='form-group'>
                    <input type="text" name="ref" class="input--style-2 " value="{{$data->ref}}"
                        placeholder="référence ">
                    @if ($errors->has('ref'))
                        <span class="text-danger">{{ $errors->first('ref') }}</span><br>
                    @endif
                </div>
                <div class=" col form-group"id='form-group'>
                    <input type="number" name="qt" class="input--style-2" value="{{$data->qt}}"
                        placeholder="quantité ">
                    @if ($errors->has('qt'))
                        <span class="text-danger">{{ $errors->first('qt') }}</span><br>
                    @endif
                </div>
            </div><br><br>
            <div class="row">
                <div class="col form-group" id='form-group'>
                    <label for="" class="m-3">Fournisseur</label>
                    <select name="fournisseur" id="" class=" form-select">

                        @foreach($fournisseur as $item)
                        <option value="{{$item->id}}" @if($data->fournisseurs_id===$item->id) selected @endif>{{$item->nom_fournisseur }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('fournisseur'))
                        <span class="text-danger">{{ $errors->first('fournisseur') }}</span><br>
                    @endif
                </div>
                <div class="col form-group" id='form-group'>
                    <input type="date" name="date" class="input--style-2 "
                        value="{{$data->date}}"placeholder="date_achat ">
                    @if ($errors->has('date'))
                        <span class="text-danger">{{ $errors->first('date') }}</span><br>
                    @endif
                </div>
            </div>


                <div class="form-group">
                    <label for="name" class="m-3">description</label><br> <textarea name="description" id="" cols="30" rows="5"  class="textarea">{{$data->description}}</textarea>
                     @if($errors->has('description'))
                     <span class="text-danger">{{ $errors->first('description') }}</span><br>
                 @endif
                 </div>



            <button type="submit" class="btn btn-warning btn--radius">Modifier</button>
        </form>
        </div>
      </div>





</div>





@endsection
