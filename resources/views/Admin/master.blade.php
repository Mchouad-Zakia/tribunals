<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Application')</title>
    <!-- Ajoutez ici vos balises meta, stylesheets, scripts, etc. -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    *{
        font-family: Georgia, 'Times New Roman', Times, serif;

    }
    .custom-form {
    border: 2px solid #ccc;
    padding: 20px;
    border-radius: 10px;
    margin-top: 8%;
    margin-left:30%;
    width: 500px;
    font-family: Georgia, 'Times New Roman', Times, serif
  }



  .custom-form input {
    margin-bottom: 10px;
  }
  .custom-form a {
    margin-left: 62%;
    color: #000;
  }
  .custom-form button {
    width: 300px;
    margin-left: 18%;
    color: #fff;
  }

</style>
<body>

    <header>
        <!-- Ajoutez ici le contenu de l'en-tête commun à toutes les pages -->
        @yield('nav')

    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Ajoutez ici le contenu du pied de page commun à toutes les pages -->
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
