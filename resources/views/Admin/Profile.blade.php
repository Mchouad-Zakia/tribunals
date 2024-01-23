@extends('include.layoute')
@section('title',"User Profile")
@section("content")
<div class="container-fluid">
    @if (session('status'))
    <div class="alert alert-success auto-close-alert">
        {{ session('status') }}
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.auto-close-alert').style.display = 'none';
        }, 2000);
    </script>
@endif
    <div class="card card-2">
        <h2 class=" text-center text-capitalize text-secondary m-3">Profile</h2>
        <div class="card-body">

            <form  action="{{route('admin.editProfile')}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name='id' value="{{$user->id}}">


            <div class="row">
                <div class="col form-group" id='form-group'>
                    <input type="text" name="nom" class="input--style-2 " value="{{ $user->nom}}"
                        placeholder="Nom ">
                    @if ($errors->has('nom'))
                        <span class="text-danger">{{ $errors->first('nom') }}</span><br>
                    @endif
                </div>
                <div class=" col form-group"id='form-group'>
                    <input type="text" name="prenom" class="input--style-2" value="{{ $user->prenom }}"
                        placeholder="Prenom ">
                    @if ($errors->has('prenom'))
                        <span class="text-danger">{{ $errors->first('prenom') }}</span><br>
                    @endif
                </div>
            </div><br><br>
            <div class="row">
                <div class="col form-group" id='form-group'>
                    <input type="email" name="email" class="input--style-2 " value="{{ $user->email }}"
                        placeholder="Email ">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span><br>
                    @endif
                </div>
                <div class="col form-group" id='form-group'>
                    <input type="password" name="password" class="input--style-2 "
                        value="{{ old('password') }}"placeholder="Ancien mot de passe  ">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span><br>
                    @endif
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col form-group" id='form-group'>
                    <input type="password" name="newpassword" class="input--style-2 " value="{{ old('newpassword') }}"
                        placeholder="nouvelle mot de passe ">
                    @if ($errors->has('newpassword'))
                        <span class="text-danger">{{ $errors->first('newpassword') }}</span><br>
                    @endif
                </div>
                <div class="col form-group" id='form-group'>
                    <input type="password" name="confpassword" class="input--style-2 "
                        value="{{ old('confpassword') }}"placeholder="confirmation de mot de passe ">
                    @if ($errors->has('confpassword'))
                        <span class="text-danger">{{ $errors->first('confpassword') }}</span><br>
                    @endif
                </div>
            </div>




            <button type="submit" class="btn  btn-secondary btn--radius">Modifier</button>
        </form>
        </div>


</div>





@endsection
