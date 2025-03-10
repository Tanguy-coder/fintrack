<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FinTrack | Connexion</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f3f3f4;
        }
        .loginColumns {
            max-width: 900px;
            margin: auto;
            padding-top: 50px;
            flex: 1;
        }
        .loginColumns .ibox-content {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .loginColumns .btn-primary {
            background-color: #1ab394;
            border-color: #1ab394;
        }
        .loginColumns .btn-primary:hover {
            background-color: #18a689;
            border-color: #18a689;
        }
        .loginColumns h2 {
            color: #1ab394;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            padding: 10px 0;
            background-color: #ffffff;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

<body>

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6 text-center">
                <h2 class="font-bold">Bienvenue sur FinTrack</h2>
                <p>
                    Gérez vos finances de manière efficace et intuitive avec FinTrack.
                </p>
                <p>
                    <img src="{{ asset('img/FINTRACK.png') }}" alt="FinTrack Logo" style="max-width: 100%; height: auto;">
                </p>
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" method="POST" role="form" action="{{ route('login') }}" id="form">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" required="true" name="email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Mot de passe" required="true" name="password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Connexion</button>
                    </form>
                    <p class="m-t">
                        <small>FinTrack &copy; 2025</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="row">
            <div class="col-md-12">
                <small>&copy; 2025 FinTrack. Tous droits réservés.</small>
            </div>
        </div>
    </footer>

</body>

</html>
