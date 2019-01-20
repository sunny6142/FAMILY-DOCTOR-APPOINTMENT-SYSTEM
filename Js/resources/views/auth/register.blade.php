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
                            <label for="name" class="pl-2 pt5 label col-form-label text-md-right">{{ __('Name :') }}</label>

                                <input id="name" type="text" class="pl10 pt5 border_controller form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    
                                        <span id="reg_error_name" class="text-danger hidden error"></span>
                                
                        </div>

                        <div class="form-group row formtxt">
                            <label for="cellphone" class="pl-2 pt5 label col-form-label text-md-right">{{ __('Cellphone :') }}</label>

                                <input id="cellphone" type="number" class="pl11 pt5 border_controller form-control{{ $errors->has('cellphone') ? ' is-invalid' : '' }}" name="cellphone" value="{{ old('cellphone') }}" required>

                                        <span id="reg_error_cellphone" class="text-danger hidden error"></span>
                        </div>

                        <div class="form-group row formtxt">
                            <label for="cellphone" class="pl-2 pt5 label col-form-label text-md-right">{{ __('Address :') }}</label>

                                <input id="address" type="text" class="pl12 pt5 border_controller form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                                        <span id="reg_error_address" class="text-danger hidden error"></span>
                        </div>

                        <div class="form-group row formtxt">
                            <label for="idnumber" class="pl-2 pt5 label col-form-label text-md-right">{{ __('ID Number :') }}</label>

                                <input id="idnumber" type="text" class="pl13 pt5 border_controller form-control{{ $errors->has('idnumber') ? ' is-invalid' : '' }}" name="idnumber" value="{{ old('idnumber') }}" required>

                                        <span id="reg_error_idnumber" class="text-danger hidden error"></span>
                        </div>

                    </form>
                    <div class="form-group w-100 mt-5 text-center">
                                <button id="stup_signup"  class="btnw btnwarning btn btn-warning">
                                    {{ __('SUBMIT') }}
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
// Register
			$(document).ready(function(){
					
						$("#stup_signup").click(function(){  
							$('#stup_signup').text(""); 
							$('#stup_signup').append('<i class="fa fa-spinner fa-spin"></i> Processing ...');

							var data = new FormData();

							data.append('name', $('input[name=name]').val());
							data.append('phone', $('input[name=cellphone]').val());
							data.append('address', $('input[name=address]').val());
							data.append('id_number', $('input[name=idnumber]').val());

                            
                            $('.error').text('');
                            $(".border_controller").removeClass("border border-danger");
					
						$.ajax({
							type : 'POST',
							url : 'register/new_user',
							data: data,
							contentType: false,
							processData: false,
							beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
							
							success: function(data) {
								
									$('#stup-signup').text(""); 
									$('#stup-signup').append('<i class="fa fa-spinner fa-spin"></i> Connecting ...');
							        
									
                                    if(data.errors){
                                        //     alert("err");
                                        $('#stup_signup').text(""); 
                                        $('#stup_signup').append('<i class="fa fa-power-off"></i> SUBMIT');
                                        $('#reg_error_msg').text("");
                                        //alert(data.errors.email);

										if(data.errors.name)
                                        {
                                            $("#reg_error_name").text('hidden');
                                            $('#reg_error_name').text(data.errors.name[0]);
                                            $("#name").addClass("border border-danger");
                                        }
											
										if (data.errors.id_number)
                                        {
                                            $("#reg_error_idnumber").removeClass('hidden');
                                            $('#reg_error_idnumber').text(data.errors.id_number[0]);
                                            $("#idnumber").addClass("border border-danger");
                                        }
											
										if(data.errors.phone)
                                        {
                                            $("#reg_error_cellphone").removeClass('hidden');
                                            $('#reg_error_cellphone').text(data.errors.phone[0]);
                                            $("#cellphone").addClass("border border-danger");
                                        }
										if(data.errors.address)
										{
                                            $("#reg_error_address").removeClass('hidden');
                                            $('#reg_error_address').text(data.errors.address[0]);
                                            $("#address").addClass("border border-danger");
                                        }

										
									} else if(data.msg){
										$("#reg_error_msg").removeClass('d-none'); 
										$('#reg_error_msg').text("NOW ! You Can Login !");
										
									} else{
										$('#stup_signup').text(""); 
										$('#stup_signup').append('<i class="fa fa-spinner fa-spin"></i> Redirecting ...');
										window.location.replace("home");
								//      console.log("ABC");
									}
							}
						}).fail(function (jqXHR, textStatus, error) {
								$('#stup_signup').text("Error ! "+error);
								$('#stup_signup').text(""); 
                                $('#stup_signup').append('<i class="fa fa-power-off"></i> SUBMIT');		
							});
						});
					});
</script>
</body>
</html>


