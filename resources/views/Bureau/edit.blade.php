@extends('include.layoute')
@section('title',"Modifier Bureau")
@section("content")
<div class="container-fluid">


      <div class="card card-2">
        <h2 class=" text-center text-capitalize text-warning  m-3">Modifier Bureau</h2>
        <div class="card-body">

            <form  action="{{ route('Bureau.update') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="{{$data->id}}" name="id">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="name">Nom Bureau </label>
                    <input type="text" name="nom" class="form-control" value="{{$data->nom }}"
                        placeholder="Enter nome bureau ">
                    @error('nom')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="typeB">Type Bureau </label>
                    <input type="text" name="typeB" class="form-control" value="{{ $data->typeB }}"
                        placeholder="Enter type de bureau ">
                    @error('typeB')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </div>

            </div><br><br>

            <div class="form-group">
                <label for="user" class="m-2">Utilisateur</label>
                <select name="user" id="user" class="form-select">

                    @foreach($user as $item)
                        <option value="{{ $item->id }}" @if ($item->id===$data->id) selected @endif>{{ $item->nom }} {{ $item->prenom }}</option>
                    @endforeach
                </select>
                @error('user')
                    <span class="text-danger">{{ $message }}</span><br>
                @enderror
            </div>



            <button type="submit" class="btn btn-warning btn--radius">Modifier</button>
        </form>
        </div>
      </div>





</div>





@endsection
