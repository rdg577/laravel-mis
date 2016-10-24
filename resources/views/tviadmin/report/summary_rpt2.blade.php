<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ET-TVET MIS</title>
    <link href="{{ URL::asset('img/fdre_logo.ico') }}" rel="shortcut icon">

    <!-- Bootstrap -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap-submenu.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="{{ URL::asset('js/html5shiv.min.js') }}"></script>
    <script src="{{ URL::asset('js/respond.min.js') }}"></script>

    <style>
        html {
          position: relative;
          min-height: 100%;
          font-size: 50%;
        }

        body {
          margin-top: 1em;
          margin-left: 1em;
          margin-right: 1em;
        }

        .container .text-muted {
          margin: 10px 0;
        }

        @media print {
            h1 {page-break-before: always;}
        }
    </style>
  </head>
  <body>
    @yield("content")

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ URL::asset('js/jquery/1.11.13/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-submenu.min.js') }}"></script>
    <script>
        $('.dropdown-submenu > a').submenupicker();
    </script>
  </body>
</html>