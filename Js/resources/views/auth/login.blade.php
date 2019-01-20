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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="body">
  
     <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light pt-4" style="padding: 0px;" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand w-100 text-center" href="#">
                <img src="{{ asset('') }}images/logo_shuangjing.png" class="img-fluid hmargin" alt="logo">
            </a>
        </div>
    </nav>
    <div class="container-fluid midfluid">
        <main class="middle">
            <div class="pr-5 pt-0 pl-5">
                <div class="text text-center"> FAMILY DOCTOR APPOINTMENT SYSTEM </div>
                <div class="text-center">
                    <form method="POST" >
                        

                        <div class="form-group row formtxt">
                            <label for="users_id" class="pl-2 pt5 label col-form-label text-md-right">{{ __('ID Number :') }}</label>

                                <input id="users_id" type="text" class="pl14 pt5 border_controller form-control{{ $errors->has('users_id') ? ' is-invalid' : '' }}" value="{{ old('users_id') }}" name="users_id" required autofocus>

                                    <span id="error" class="text-danger hidden"></span>
                        </div>

                    </form>
                    <div class="form-group w-100 mt-5 text-center">
                            <button id="stup-login" class="btnw btnwarning btn btn-warning">
                                {{ __('Login') }}
                            </button>
                    </div>
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

    <script src="//code.jquery.com/jquery-2.2.4.min.js" ></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
    // Startup Ajax Login
    $(document).ready(function(){
            
	 	$("#stup-login").click(function(){
              
                $('#stup-login').text(""); 
                $('#stup-login').append('<i class="fa fa-spinner fa-spin"></i> Processing ...');
                $(".border_controller").removeClass("border border-danger");

                var data = new FormData();

                data.append('users_id', $('input[name=users_id]').val());
               
                $("#error").text(''); 
                $("#error").addClass('hidden'); 

                $.ajax({
                   type : 'POST',
                   url : 'starup/login',
                   data: data,
                   contentType: false,
                   processData: false,
                   beforeSend: function(xhr){ xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); },
                   success: function(data) {
                  //      $('#stup-login').text(""); 
                 //       $('#stup-login').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Connecting ...');
                        
                        if(data.errors.users_id){
                        //    alert("err");
                            $("#error").removeClass('hidden'); 
                            $('#error').text(data.errors.users_id);
                          	$('#stup-login').text(""); 
                        	$('#stup-login').append('<i class="fa fa-power-off"></i> Login');
                            $("#users_id").addClass("border border-danger");
                        }else if(data.errors){
							$("#error").removeClass('hidden'); 
                            $('#error').text(data.errors);
                          	$('#stup-login').text(""); 
                              $("#users_id").addClass("border border-danger");
							  $('#stup-login').append('<i class="fa fa-power-off"></i> Login');
						} else{
                            $('#std-login').text(""); 
                            $('#std-login').append('<i class="fa fa-spinner fa-spin"></i> Redirecting ...');
                            window.location.replace("home");
                        }
                   }
               }).fail(function (jqXHR, textStatus, error) {
                $("#error").removeClass('hidden');
                        $('#error').text('Error ! '+error);
                 });
            });
        });
  </script>
</body>
</html>

