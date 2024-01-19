<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('include.Sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <main>
                <div id="content">
                    <!-- Header (Navbar) -->
                    <header>
                        @include('include.navbar')
                    </header>

                    <!-- Page Content -->
                    @yield('content')
                </div>
            </main>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                @include('include.footer')
            </footer>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    function searchElements(query) {

    query = query.toLowerCase();

    // Parcours tous les éléments à rechercher
    $('.searchable-element').each(function() {
      var text = $(this).text().toLowerCase();

      // Si le texte de l'élément contient la requête, affiche l'élément
      if (text.indexOf(query) !== -1) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }

      $('#searchInput').on('input', function() {
    var query = $(this).val();
    searchElements(query);
  });

</script>
</body>
</html>
