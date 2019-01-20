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

  <link href="{{ asset('') }}css/landing.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="body">
  
     <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light" style="padding: 0px;" id="mainNav">
        <div class="container-fluid">
            <div class="row w-100">
                <div class="col-sm-4 text-center pr-0">
                        <img src="{{ asset('') }}images/logo_shuangjing.png" class="img-fluid hmargin" alt="logo">
                   
                </div>
                <div class="col-sm-8 text-center rightheader pl-0">
                     FAMILY DOCTOR APPOINTMENT SYSTEM 
                </div>
            </div>
           
        </div>
    </nav>
    <div class="container-fluid midfluid">
        @yield('content')
        
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

    <script src="//code.jquery.com/jquery-2.2.4.min.js" ></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   
</body>
</html>
