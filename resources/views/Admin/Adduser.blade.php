@extends('include.layoute')
@section('title'," Add Use")
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
        <h2 class=" text-center text-capitalize text-success m-3">Ajouter utilisateur</h2>
        <div class="card-body">

            <form  action="{{route('admin.storUser')}}" method="POST"
            enctype="multipart/form-data">
            @csrf



            <div class="row">
                <div class="col form-group" id='form-group'>
                    <input type="text" name="nom" class="input--style-2 "
                        placeholder="Nom ">
                    @if ($errors->has('nom'))
                        <span class="text-danger">{{ $errors->first('nom') }}</span><br>
                    @endif
                </div>
                <div class=" col form-group"id='form-group'>
                    <input type="text" name="prenom" class="input--style-2"
                        placeholder="Prenom ">
                    @if ($errors->has('prenom'))
                        <span class="text-danger">{{ $errors->first('prenom') }}</span><br>
                    @endif
                </div>
            </div><br><br>
            <div class="row">
                <div class="col form-group" id='form-group'>
                    <input type="email" name="email" class="input--style-2 "
                        placeholder="Email ">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span><br>
                    @endif
                </div>
                <div class="col form-group" id='form-group'>

                    <label>Superadmin :</label>
                    <div class="btn-group" role="group" aria-label="Superadmin">
                        <button type="button" class="btn  superadmin-btn" data-value="1">Oui</button>
                        <button type="button" class="btn  btn-success superadmin-btn active" data-value="0">Non</button>
                    </div>
                    <input type="hidden" name="superadmin" id="superadmin" value="0">
                    @if ($errors->has('superadmin'))
                    <span class="text-danger">{{ $errors->first('superadmin') }}</span><br>
                @endif
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col form-group" id='form-group'>
                    <input type="password" name="password" class="input--style-2 "
                        value="{{ old('password') }}"placeholder="Mot de passe  ">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span><br>
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




            <button type="submit" class="btn  btn-success btn--radius">Ajouter</button>
        </form>
        </div>


</div>


<script>
    $(document).ready(function() {
        $('.superadmin-btn').click(function() {
            var value = $(this).data('value');
            $('#superadmin').val(value);

            // Ajouter ou retirer la classe 'active' en fonction de la valeur du bouton
            $(this).addClass('active btn-success').siblings().removeClass('active btn-success');
        });
    });
</script>


@endsection
