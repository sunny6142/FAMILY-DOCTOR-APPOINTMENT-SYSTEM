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
  <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
</head>
<body class="body">
  
     <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand w-100 text-center" href="#">
                <img src="{{ asset('') }}images/logo_shuangjing.png" class="img-fluid hmargin" alt="logo">
            </a>
        </div>
    </nav>
    <div class="container-fluid midfluid">
        <main class="middle">
            <div class="pl-5 pr-5 pt-0">
                <div class="text text-center"> FAMILY DOCTOR APPOINTMENT SYSTEM </div>
                
                <div><strong>{{Auth::user()->name}} </strong> family doctor :</div>

                        <div class="">
                                <div class="text-center">
                                {{--<img style="width: 200px; height: 200px;" src="http://xinature.com/wp-content/uploads/2016/10/flowers-love-rose-flower-delicte-blue-wallpapers-big-size.jpg" class="rounded" alt="...">--}}
                                    <img style="width: 180px; height: 200px;" src="{{ asset('') }}images/{{$doctor[0]->image}}" class="" alt="...">
                                </div>
                                <div class="text-center pt-2 pb-2">
                                    <a href="" style="width: 180px;" class="btnr btn btn-primary" data-toggle="modal" data-target="#exampleModal">Change</a>
                                </div>
                                <p class="text-center pt-1">{{$doctor[0]->introduction}}</p>
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

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
        <div class="modal-body">
            <p>
                <button type="button" class="close" style="font-size: 16px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </p>
            <div class="text-center">
                <i class="fa fa-user-circle" style="font-size:48px;color:red"></i>
            </div>
            <div class="text-center pt-2 pb-2">

                <h5>You choose</h5>
                <h5 class="text-danger">{{$doctor[0]->name}}</h5>
                <h6><small>as your family doctor</small></h6>
                <h6><small id="error" class="text-danger"> Are you sure you want to change?</small></h6>
                <button id="confirmbutton" onclick="Confirm_Doctor()" style="width: 200px;" class="btnr btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
  </div>
</div>

    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  


<script>
// 
function Confirm_Doctor(){

                    $("#confirmbutton").html("Redirecting...");
                
                    window.location.replace("{{ asset('') }}select/category");
}         
</script>
</body>
</html>

