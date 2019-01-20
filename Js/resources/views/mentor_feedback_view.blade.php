<?php
if(Auth::user()->roll == 3)  $val = "layouts.startup"; 
if(Auth::user()->roll == 2) $val = "layouts.mentor_header"; 
if(Auth::user()->roll == 1) $val = "layouts/admin_header";
?>


@extends($val) 

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
                                                        <h3>Mentor Feedback</h3>
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
                                                                            <div role="form" id="form2" class="w-95" style = "margin: 0 auto;">
                                                                                <p id="msg" class="border p-3 border-danger text-success err_toggle text-center hidden"></p>

                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1" for="technology_domain_area">Startup Name&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" name="mname" id="mname" style="height: unset;" value="{{$mentor[0]->start_up_name}}" disabled>
                                                                                        <p class="technology_domain_area_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1" for="technology_domain_area">Session Timings&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" name="mname" id="mname" style="height: unset;" value="{{$mentor[0]->mentoring_session_time_v}}" disabled>
                                                                                        <p class="technology_domain_area_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                                    
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-12">
                                                                                       <!---------------------------------Milestone --------------------------------------- -->
                                                                                       <div class="">
                                                                                            <div class="row">
                                                                                                <label class="control-labe">Milestones agreed upon &nbsp: </label>
                                                                                                <ul class="timeline" style="width: 100%;">
                                                                                                    
                                                                                                
                                                                                                    <li class="timeline-inverted">
                                                                                                        <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i></div>
                                                                                                        <div class="timeline-panel">
                                                                                                            <div class="timeline-heading">
                                                                                                                <h4 class="timeline-title">END</h4>
                                                                                                            </div>
                                                                                                            <div class="timeline-body">
                                                                                                                <p>Milestone Achieved.</p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul> 
                                                                                            </div>
                                                                                        </div>
                                                                                       <!---------------------------------Milestone --------------------------------------- -->
                                                                                        <p class="technology_domain_area_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                                    
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-12" for="qualitative_feedback">Qualitative feedback&nbsp: </label><br>
                                                                                    <div class="col-sm-12">
                                                                                        <p  class="form-control pt-2">{{$mentor_feedback[0]->qualitative}}
                                                                                        </p>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1" >Rate the Startup in terms of punctuality&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <form class="rating pt-0 m-0" style="font-size:19px">
                                                                                            
                                                                                            <label>
                                                                                            <?php $i = 0;
                                                                                                for($i = 0; $i < $mentor_feedback[0]->punctuality; $i++) {
                                                                                                    echo '<span class="icon text-info">★</span>';
                                                                                                  }  for($i = $mentor_feedback[0]->punctuality; $i < 5; $i++) {
                                                                                                    echo '<span class="icon">★</span>';
                                                                                                  } ?>
                                                                                               
                                                                                            </label>
                                                                                        </form>                    
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1" >Rate the Startup in terms of team quality?&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <form class="rating pt-0 m-0" style="font-size:19px">
                                                                                            
                                                                                            <label>
                                                                                                <?php $i = 0;
                                                                                                for($i = 0; $i < $mentor_feedback[0]->team_quality; $i++) {
                                                                                                    echo '<span class="icon text-info">★</span>';
                                                                                                }  for($i = $mentor_feedback[0]->team_quality; $i < 5; $i++) {
                                                                                                    echo '<span class="icon">★</span>';
                                                                                                } ?>
                                                                                            </label>
                                                                                        </form>                    
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1">Rate the Startup in terms of domain knowledge?&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <form class="rating pt-0 m-0" style="font-size:19px">
                                                                                           
                                                                                            <label>
                                                                                                <?php $i = 0;
                                                                                                for($i = 0; $i < $mentor_feedback[0]->domain_knowledge; $i++) {
                                                                                                    echo '<span class="icon text-info">★</span>';
                                                                                                }  for($i = $mentor_feedback[0]->domain_knowledge; $i < 5; $i++) {
                                                                                                    echo '<span class="icon">★</span>';
                                                                                                } ?>
                                                                                            </label>
                                                                                        </form>                    
                                                                                    </div>
                                                                                </div>


                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1">Do you feel startup needs mentoring in any other domain area?&nbsp: </label><br>
                                                                                    
                                                                                    <div class="col-sm-6">
                                                                                        <select class="form-control" onchange="changeme(value)" name="another" id="another" style="height: unset;" disabled>
                                                                                        <option id="val"> </option>
                                                                                            @foreach ($yn as $ynv)
                                                                                                <option id="val"  <?php if($ynv->id == $mentor_feedback[0]->another_session) echo "selected" ?> value = '{{$ynv->id}}'> {{$ynv->val}} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                
                                                                                   
                                                                                    
                                                                                        @if ($mentor_feedback[0]->another_session == 1)
                                                                                        
                                                                                        <script>$('.req').removeClass('hidden');</script>
                                                                                        
                                                                                        @else 
                                                                                        <script>$('.req').addClass('hidden');</script>
                                                                                        @endif
                                                                                    


                                                                                
                                                                                <div class="req hidden form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1" for="mbusiness_domain_area">Business Domain Area&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select class="form-control" name="mbusiness_domain_area" id="mbusiness_domain_area" style="height: unset;" disabled>
                                                                                            <option id="val"> </option>
                                                                                                @foreach ($business_domain_area as $bda)
                                                                                                    <option id="val" <?php if($bda->id == $mentor_feedback[0]->areas_of_business_and_management_competence) echo "selected" ?> value = '{{$bda->id}}'> {{$bda->industry_experience}} </option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        <p class="mbusiness_domain_area_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                               
                                                                                <div class="req hidden form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1" for="mentoring_session_time">Mentoring Session&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select class="form-control" name="mentoring_session_time" id="mentoring_session_time" style="height: unset;" disabled>
                                                                                            <option id="val"> </option>
                                                                                                @foreach ($mentoring_session_time as $mts)
                                                                                                    <option id="val" <?php if($ynv->id == $mentor_feedback[0]->mentoring_session_time) echo "selected" ?> value = '{{$mts->id}}'> {{$mts->mentoring_session_time_v}} </option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        <p class="mmentoring_session_time_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                                    
                                                                                    </div>
                                                                                </div>

                                                                            </div>
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

var pun = -1;
var quality = -1;
var domain  = -1;

function star1(val)
{
    pun = val
    console.log(pun);
}
function star2(val)
{
    quality = val
    console.log(und);
}
function star3(val)
{
    domain  = val
    console.log(all);
}


$(document).ready(function(){

   @foreach($mentor_mildstone as $mentor)
       //for(var i =0; i < timelineLength; i++){
           
           if($('ul.timeline li').length % 2 == 0){
                $('.timeline').prepend( 
                    '<li class="timeline-inverted">'
                    +'<div class="timeline-badge info"><i class="glyphicon glyphicon-hand-right"></i></div>'
                    +'<div class="timeline-panel">'
                    +'<i class="text-muted clock glyphicon glyphicon-time"></i>'
                    +'<p><small class="text-muted"><span style="float:left;" class="pl-5 form-control"> {{$mentor->date}} </span></small></p>'
                    
                    +'<div class="timeline-body">'
                    +'<textarea row="4" style="background: white;" type="text" class="form-control" id="pro" disabled>{{$mentor->points}}</textarea>'
                    
                    +'</div>'
                    +'</div>'
                    +'</li>'
                );   
               
           }
           else{
               
                $('.timeline').prepend(
                    '<li>'
                    +'<div class="timeline-badge info"><i class="glyphicon glyphicon-hand-left"></i></div>'
                    +'<div class="timeline-panel">'
                    +'<i class="text-muted clock glyphicon glyphicon-time"></i>'
                    +'<p><small class="text-muted"><span style="float:left;"  class="pl-5 form-control">{{$mentor->date}}</span></small></p>'
               
                    +'<div class="timeline-body">'
                    +'<textarea row="4" style="background: white;" type="text" class="form-control" id="pro" disabled>{{$mentor->points}}</textarea>'
                    +'</div>'
                    +'</div>'
                    +'</li>'
                );
            }
    @endforeach
      
})

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
        $("#feedback_ajax").click(function() {
            $('.err_toggle').addClass('hidden');
            $('.mentor_modal_button').html('<i class="fa fa-spinner fa-spin"></i> Pls Wait...');
            $('#feedback_ajax').removeClass('hidden');
            
            $('#form2').find('input').removeClass("border border-danger");
            
            var dates = JSON.stringify($('#form2').find('input[name^="mdate"]').serializeArray());
            var ponits = JSON.stringify($('#form2').find('textarea[name^="mpoint"]').serializeArray());

            var data = new FormData();

            data.append('dates', dates);
            data.append('ponits', ponits);

            data.append('pun', pun);
            data.append('quality', quality);
            data.append('domain', domain);

            data.append('request_mentor', '{{$req_m}}');
            data.append('qualitative_feedback', $('textarea[name=qualitative_feedback]').val());
            data.append('another', $('select[name=another]').val());
            data.append('mbusiness_domain_area', $('select[name=mbusiness_domain_area]').val());
            data.append('mentoring_session_time', $('select[name=mentoring_session_time]').val());
              
            $.ajax({
               type : 'POST',
               url : '/mentor/feedback',
               beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
               data: data,
               contentType: false,
               processData: false,
               success: function(data) {
                   if(data.errors) {
                        
                        $('#msg').removeClass('hidden');
                        $("#msg").text("All fields are required ");
                        if(data.errors.qualitative_feedback){
                            $("#msg").text(data.errors.qualitative_feedback);
                        }
                       
                        /*if(data.errors.another){
                            $("#msg").text(data.errors.professional_expertise); 
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
                        }*/
                   }
                   else
                   {
                       clear();
                       $('#msg').removeClass('hidden'); 
                       $("#msg").text("Your Feedback has been Recored");
                   }
                   $('.mentor_modal_button').html('Submit');
                    $('#feedback_ajax').removeClass('hidden');
               }
            }).fail(function (jqXHR, textStatus, error) {  
                    $('#msg').removeClass('hidden');
                    $("#msg").text("Error !"+error);
                    $('.mentor_modal_button').html('Submit');
                    $('#feedback_ajax').removeClass('hidden');
                });
        });
    })
</script>     

 <!-- end Add mentor -->
@endsection




