<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700"/>
    <!-- Bootstrap -->
    <link href="https://resources.vdu.lt/design/bootstrap-theme.min.css" rel="stylesheet">
    <link href="https://resources.vdu.lt/design/bootstrap.min.css" rel="stylesheet">
    <link href="https://resources.vdu.lt/design/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://resources.vdu.lt/design/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://resources.vdu.lt/Simple-Date-Picker-for-Bootstrap/css/datepicker.css"/>

    <!-- Scripts Library-->
    <script src="https://resources.vdu.lt/scripts/jquery-1.12.4.min.js"></script>
    <script src="https://resources.vdu.lt/scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://resources.vdu.lt//Simple-Date-Picker-for-Bootstrap/js/bootstrap-datepicker.min.js"></script>
    <script src="https://resources.vdu.lt/IRISfiles/scripts/knockout-3.4.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!--Script-->
    <script src="https://resources.vdu.lt/IRISfiles/scripts/script.js" charset="utf-8"></script>
    <!-- Styles -->
    <link href="https://resources.vdu.lt/IRISfiles/design/styles.css" rel="stylesheet">


    <title>Įvairių registracijų sistema</title>

</head>
<body>
        @include('inc.navbar')

        @yield('content')

</body>
</html>


