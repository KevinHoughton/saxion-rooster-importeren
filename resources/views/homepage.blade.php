<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Saxion rooster in agenda</title>
        <style>
            .vertical-center {
                min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
                min-height: 100vh; /* These two lines are counted as one :-)       */
                display: flex;
                align-items: center;
            }

            .stylish-input-group .input-group-addon {
                background: #a6ce39 !important;
            }
            .stylish-input-group .form-control {
                border-right: 0;
                box-shadow: 0 0 0;
                border-color: #a6ce39;
            }
            .stylish-input-group button {
                border: 0;
                background: transparent;
            }
            h2 {
                text-shadow: rgba(0,0,0,0.25) 1px 1px 5px;
            }
        </style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
    <div class="jumbotron vertical-center">
        <div class="container">
            <h2 class="text-center">Importeer je saxion rooster</h2>
            <h5 class="text-center">Naar je google/apple/outlook kalender, elke dag bijgewerkt.</h5>
            <br>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    {!! Form::open(['url' => 'add']) !!}

                    <div class="input-group stylish-input-group center-block text-center">
                        <h5>Ik wil het rooster van een: </h5>
                        <select name="search_type" id="search_type">
                            <option value="class">Klas / Class</option>
                            <option value="teacher">Docent / Teacher</option>
                        </select>
                    </div>
                    <br>

                    <div class="input-group stylish-input-group">
                        <input type="text" class="form-control" name="code" placeholder="Docent / Teacher or Klas / Class code..." >
                        <span class="input-group-addon">
                            <button type="submit">
                                <span class="glyphicon glyphicon-arrow-right"></span>
                            </button>
                        </span>
                    </div>

                    @if (isset($url))
                        {{ $url }}
                    @endif

                    @if (count($errors) > 0)
                        <br>
                        <div class="alert alert-danger text-left">
                            <strong>Oeps!</strong> Je hebt iets niet ingevuld!
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
