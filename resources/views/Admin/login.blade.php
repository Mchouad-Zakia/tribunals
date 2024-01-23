@extends('Admin.master')
@section('title',"login")
@section('content')

<div class="container mt-5">
    <div class="page-wrapper bg-red  font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Se connecter</h2>
    <form class="form-inline custom-form" action="{{route('admin.authentifier')}}" method="POST">
     @csrf
     <div class="form-group">
  <input type="email" name="email" class="input--style-2"placeholder="Saisir votre email" value="{{old('email')}}">
         @if($errors->has('email'))

    <span class="text-danger">{{ $errors->first('email') }}</span><br>
 @endif
</div><br><br>
 <div class="form-group">

       <input type="password" id="inputPassword6" placeholder="Saisir votre mot de passe" name="password" class="input--style-2" value="">
       @if($errors->has('password'))
       <span class="text-danger">{{ $errors->first('password') }}</span><br>
    @endif
    @error('error')
    <span class="text-danger">{{ $message }}</span><br>
    @enderror
     </div><br><br>
     <button type="submit" class="btn btn--radius btn--green">Connexion</button>
   </form>
 </div>
 </div>
 </div>
 </div>

</div>




@endsection
