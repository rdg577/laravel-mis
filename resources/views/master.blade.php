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
    }

    body {
      /* Margin bottom by footer height */
      margin-bottom: 60px;
    }

    .footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      /* Set the fixed height of the footer here */
      height: 60px;
      background-color: #f5f5f5;
    }

    .container .text-muted {
      margin: 20px 0;
    }
    </style>
  </head>
  <body>
  	<div class="container">
    	@yield('nav-bar')
    </div>

    <div style="margin-top: 5em; margin-bottom: 7em;" class="container">
    	@yield('content')
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted"><small>Developed by <a href="https://www.facebook.com/tata.konjo">Tata Konjo Aydelem</a></small></p>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ URL::asset('js/jquery/1.11.13/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-submenu.min.js') }}"></script>
    <script>
        $('.dropdown-submenu > a').submenupicker();
    </script>
    <script>
    $(document).ready(function () {
        $('#sector').change(function () {
            $.get($(this).data('url'), { option: $(this).val() },
            function (data) {
                var subsector = $('#subsector');
                subsector.empty();
                $.each(data, function (index, element) {
                    subsector.append("<option value='"+ element.id +"'>" + element.name + "</option>");
                });
            });
        });

        $('#subsector').change(function () {
            $.get($(this).data('url'), { option: $(this).val() },
            function (data) {
                var occupation = $('#occupation');
                occupation.empty();
                $.each(data, function (index, element) {
                    occupation.append("<option value='"+ element.id +"'>" + element.name + "</option>");
                });
            });
        });

        $('#occupation').change(function () {
            $.get($(this).data('url'), { option: $(this).val() },
            function (data) {
                var competency = $('#competency');
                competency.empty();
                $.each(data, function (index, element) {
                    competency.append("<option value='"+ element.id +"'>" + element.name + "</option>");
                });
            });
        });
    });
    </script>
  </body>
</html>