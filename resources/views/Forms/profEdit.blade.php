use App\Professors;
use App\cilveks;

<html><head>
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
        </head>
        <body><div class="popUpRow">
            <div class="col-md-12">
                <h3>Rimas&nbsp;Sorokas&nbsp;36401300268</h3>

                <form method="post" action="{{ route('professor.update', $Professors->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">TAB number:</label>
                        <input type="text" class="form-control" name="tab_number" value={{ $Professors->tab_number }} />
                    </div>
                    <div class="form-group">
                        <label for="price">Komentaras :</label>
                        <input type="text" class="form-control" name="details" value={{ $Professors->details }} />
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </body></html>