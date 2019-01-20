<!DOCTYPE html>
<html lang="en">
<head>
  <title>SJ Hospital</title>

  <meta id="token" name="token" content="{{ csrf_token() }}">  
  <!-- for-mobile-apps -->
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8" />
  <meta name="keywords" content="" />

  <link href="css/landing.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
</head>
<body class="bo">
  <div class="cover"></div>
     <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light pt-4" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand w-100 text-center" href="#">
                <img src="{{ asset('') }}images/logo_shuangjing.png" class="img-fluid hmargin" alt="logo">
            </a>
        </div>
    </nav>
    <div class="container-fluid midfluid" style="min-height: 61vh;">
        <main class="middle">
            <div class="pl-5 pr-5 pt-0">
                <div class="text text-center"> FAMILY DOCTOR APPOINTMENT SYSTEM </div>
                <div class="text text-center mt-0 pt-3 pb-0">
                    <a href="{{ route('register') }}" class="btnwarning btn btn-warning"> REGISTRATION </a>
                </div>
                <div class="text text-center p-0"> 
                    <a href="{{route('login')}}" class="btn btn-ligh">
                        MY DOCTOR
                    </a>
                </div>
            </div>
        </main>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                    <ul class="nav justify-content-center w-100">
                        <li class="nav-item navbotton text-center">
                                <a href="#" class="footertext">&copy2018 COPYRIGHT</a>
                            <a class="footertext" href="#">Shuangjiang Central Hoospital 023-44862942</a>
                        </li>
                    </ul>
            </div>
        </div>
    </footer>

    <div class="break"></div>
</body>
</html>
