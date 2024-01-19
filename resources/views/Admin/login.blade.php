@extends('Admin.master')
@section('title',"login")
@section('content')

<div class="container">

    <form class="form-inline custom-form" action="{{route('admin.authentifier')}}" method="POST">
     @csrf
     <h1 class="text-center">Se connecter</h1>
     <div class="form-group">
        email <input type="email" name="email" class="form-control "placeholder="Saisir votre email" value="{{old('email')}}">
         @if($errors->has('email'))

    <span class="text-danger">{{ $errors->first('email') }}</span><br>
 @endif
</div>
 <div class="form-group">

       Password
       <input type="password" id="inputPassword6" placeholder="Saisir votre mot de passe" name="password" class="form-control" value="">
       @if($errors->has('password'))
       <span class="text-danger">{{ $errors->first('password') }}</span><br>
    @endif
    @error('error')
    <span class="text-danger">{{ $message }}</span><br>
    @enderror
     </div>
     <button type="submit" class="btn btn-primary">Connexion</button>
   </form>
 </div>






@endsection
