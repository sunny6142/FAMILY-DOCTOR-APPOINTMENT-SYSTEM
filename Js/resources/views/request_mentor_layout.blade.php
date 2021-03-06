@extends('layouts.startup')

@section('content')
                <div class="pcoded-wrapper">
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="p-5">
                                    <!-- Page-header start -->
                                    <div class="page-header card m-0">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-file-code bg-c-blue"></i>
                                                    <div class="d-inline">
                                                        <h3>Request Mentor</h3>
                                                        <hr>
                                                        <!-- <span>Add <code>Delete</code> & Update</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        
                                    <!-- Page-header end -->

                                            <!-- Page body start -->
                                            
                                            <div class="container">
                                                
                                                    <div class="row row-centered" style="display: block;max-width: 800px; margin: 0px auto;">
                                                        
                                                           <!-- Request Mentor -- --------------- -->
                                                            <div  id="request_mentor_dialog" tabindex="-1" role="">
                                                                <div class="" role="document" style="width: auto;">
                                                                    <div class="">
                                                                        <!--   -->
                                                                        
                                                                        <div class="modal-body">
                                                                            <form role="form" id="form2" class="w-95" style = "margin: 0 auto;">
                                                                            <p id="msg" class="border p-3 border-danger text-success err_toggle text-center hidden"></p>
                                                                                    
                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1" for="technology_domain_area">Technology Domain Area&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select class="form-control" name="technology_domain_area" id="technology_domain_area" style="height: unset;" required>
                                                                                            <option id="val"> </option>
                                                                                                @foreach ($technology_domain_area as $tda)
                                                                                                    <option id="val" value = '{{$tda->id}}'> {{$tda->expertise}} </option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        <p class="technology_domain_area_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1" for="mbusiness_domain_area">Business Domain Area&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select class="form-control" name="mbusiness_domain_area" id="mbusiness_domain_area" style="height: unset;" required>
                                                                                            <option id="val"> </option>
                                                                                                @foreach ($business_domain_area as $bda)
                                                                                                    <option id="val" value = '{{$bda->id}}'> {{$bda->industry_experience}} </option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        <p class="mbusiness_domain_area_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-12" for="bproblem">Briefly describe the problem you are facing. </label><br>
                                                                                    <div class="col-sm-12">
                                                                                        <textarea row="4" type="text" class="form-control" id="bproblem" name="bproblem" placeholder="Enter here" required></textarea>
                                                                                        <p class="bproblem_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1" for="mentoring_session_time">Mentoring Session&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select class="form-control" name="mentoring_session_time" id="mentoring_session_time" style="height: unset;" required>
                                                                                            <option id="val"> </option>
                                                                                                @foreach ($mentoring_session_time as $mts)
                                                                                                    <option id="val" value = '{{$mts->id}}'> {{$mts->mentoring_session_time_v}} </option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        <p class="mmentoring_session_time_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                            <form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" id="mrequest_mentor_ajax" class="btn btn-primary mentor_modal_button">Submit</button>
                                                                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                
                                                                    </div>
                                                                </div>
                                                            </div>   
                                                           <!-- End Request Mentor --------------- -->
                                                            
                                                            
                                                         
                                                    </div>
                                                
                                                <div class="text-right">
                                                   
                                                </div>
                                            </div>
                                            <!-- Page body end -->
                                        </div>
                                    </div>
                                 </div>
                            </div>
                            <!-- Main-body end -->
                        </div>
                    </div>
                </div>
                
                                                      

<!-- Msg -->
<div id="msgbox" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title text-left">Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <input hidden type="text" class="form-control hidden" id="del_id" name="del_id">
      </div>
      <div class="modal-body">
        <h4 id="del_msg_success" >Are you sure want to delete this ?</h4>
        
      </div>
      <div class="modal-footer">
        <button type="button" onclick="delete_Mentor()" id ="del_id_ajax" class="btn btn-danger">Delete</button>
        <button type="button" id="mdspinner"  class="btn mentor_modal_button btn-primary hidden"><i class="fa fa-spinner"></i> Pls Wait...</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                                        

      </div>
    </div>

  </div>
</div>

<!--  form Create Post -->
      

<script>
   function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                $('#'+id).removeAttr("hidden");
                $('#'+id).removeClass("hidden");
                reader.onload = function (e) {
                    $('#'+id)
                        .attr('src', e.target.result)
                        .width(50)
                        .height(50);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<script>

    function clear()
    {
        $('.err_toggle').addClass('hidden');
        $('#form2').find('input').val('');
        $('#form2').find('select').val(''); 
        $('#form2').find('textarea').val('');
        $('#form2').find('input').removeClass("border border-danger");
        $('#form2').find('select').removeClass("border border-danger");
        $('#form2').find('textarea').removeClass("border border-danger");
    }

    function Delete_user(val)
    {
        $('#msgbox').modal('show');
        $('.form-horizontal').show();
        $('#del_id').val(val.id);
        $("#del_msg_success").html("<span class='text-warning'>Are you sure want to delete this ?</span>");
                   
    }

    //Show Request mentor Dialog
    $(document).ready(function(){     
        $("#request_mentor").click(function(){
            $('#request_mentor_dialog').modal('show');
            $('.form-horizontal').show();
            clear();
        });
    }) 

    // <!-- Request mentor -->
    $(document).ready(function(){
        $("#mrequest_mentor_ajax").click(function() {
            $('.err_toggle').addClass('hidden');
            $('.mentor_modal_button').html('<i class="fa fa-spinner fa-spin"></i> Pls Wait...');
            $('#mrequest_mentor_ajax').removeClass('hidden');
            
            $('#form2').find('input').removeClass("border border-danger");
            
            var data = new FormData();

            data.append('professional_expertise', $('select[name=technology_domain_area]').val());
            data.append('industry_vertical_experience', $('select[name=mbusiness_domain_area]').val());
            data.append('problem', $('textarea[name=bproblem]').val());
            data.append('mentoring_session_time', $('select[name=mentoring_session_time]').val());
              
            $.ajax({
               type : 'POST',
               url : '/request/mentor',
               beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
               data: data,
               contentType: false,
               processData: false,
               success: function(data) {
                   if(data.errors) {
                        
                        if(data.errors.professional_expertise){
                            $('#technology_domain_area').addClass("border border-danger");
                            $('.technology_domain_area_error').removeClass('hidden');
                            $('.technology_domain_area_error').text(data.errors.professional_expertise);
                        }
                        if(data.errors.industry_vertical_experience){
                            $('#mbusiness_domain_area').addClass("border border-danger");
                            $('.mbusiness_domain_area_error').removeClass('hidden');
                            $('.mbusiness_domain_area_error').text(data.errors.industry_vertical_experience);
                        }
                        if(data.errors.problem){
                            $('#bproblem').addClass("border border-danger");
                            $('.bproblem_error').removeClass('hidden');
                            $('.bproblem_error').text(data.errors.problem);
                        }
                        if(data.errors.mentoring_session_time){
                            $('#mentoring_session_time').addClass("border border-danger");
                            $('.mmentoring_session_time_error').removeClass('hidden');
                            $('.mmentoring_session_time_error').text(data.errors.mentoring_session_time);
                        }
                   }
                   else
                   {
                       clear();
                       $('#msg').removeClass('hidden'); 
                       $("#msg").text("Your Request has been Recored, You can another application for other domain");
                   }
                   $('.mentor_modal_button').html('Submit');
                    $('#mrequest_mentor_ajax').removeClass('hidden');
               }
            }).fail(function (jqXHR, textStatus, error) {  
                    $('#msg').removeClass('hidden');
                    $("#msg").text("Error !"+error);
                    $('.mentor_modal_button').html('Submit');
                    $('#mrequest_mentor_ajax').removeClass('hidden');
                });
        });
    })
</script>     


 <!-- end Add mentor -->
@endsection




