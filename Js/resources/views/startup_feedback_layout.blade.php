
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
                                                        <h3>Feedback</h3>
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
                                                                                    <label class="control-label col-sm-6 pt-1" for="technology_domain_area">Mentor Name&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" name="mname" id="mname" style="height: unset;" value="{{$mentor[0]->name}}" disabled>
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
                                                                                                <label class="control-labe">Milestones agreed upon &nbsp: <button class="btn btn-primary" id="addnew">Click To add event</button></label>
                                                                                                <ul class="timeline" style="width: 100%;">
                                                                                                    <li>
                                                                                                        <div class="timeline-badge info"><i class="glyphicon glyphicon-hand-left"></i></div>
                                                                                                        <div class="timeline-panel">

                                                                                                            <i class="text-muted clock glyphicon glyphicon-time"></i> 
                                                                                                            <p><small class="text-muted"><input style="float:left;" type="date" name="mdate[]" class="pl-5 form-control"></small></p>
                                                                                                            
                                                                                                            <div class="timeline-body">
                                                                                                                <textarea row="4" type="text" class="form-control" id="pro" name="mpoint[]" placeholder="Enter here" required></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                
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
                                                                                        <textarea row="4" type="text" class="form-control" id="qualitative_feedback" name="qualitative_feedback" placeholder="Enter here" required></textarea>
                                                                                        <p class="bproblem_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1" >Rate the mentor in terms of punctuality&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <form class="rating pt-0 m-0" style="font-size:19px">
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star1(1)" value="1" />
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star1(2)" value="2" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star1(3)" value="3" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>   
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star1(4)" value="4" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star1(5)" value="5" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                        </form>                    
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1" >Rate the mentor in terms of understanding of problem&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <form class="rating pt-0 m-0" style="font-size:19px">
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star2(1)" value="1" />
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star2(2)" value="2" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star2(3)" value="3" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>   
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star2(4)" value="4" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star2(5)" value="5" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                        </form>                    
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1">Has mentor allotted enough time for this session?&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <form class="rating pt-0 m-0" style="font-size:19px">
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star3(1)" value="1" />
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star3(2)" value="2" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star3(3)" value="3" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>   
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star3(4)" value="4" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star3(5)" value="5" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                        </form>                    
                                                                                    </div>
                                                                                </div>

                         
                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1">Has mentor met to your expectation?&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <form class="rating pt-0 m-0" style="font-size:19px">
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star4(1)" value="1" />
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star4(2)" value="2" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star4(3)" value="3" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>   
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star4(4)" value="4" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star4(5)" value="5" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                        </form>                    
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1">How’s your Overall experience?&nbsp:</label>
                                                                                    <div class="col-sm-6">
                                                                                        <form class="rating pt-0 m-0" style="font-size:19px">
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star5(1)" value="1" />
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star5(2)" value="2" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star5(3)" value="3" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>   
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star5(4)" value="4" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                            <label>
                                                                                                <input type="radio" name="stars" onchange="star5(5)" value="5" />
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                                <span class="icon">★</span>
                                                                                            </label>
                                                                                        </form>                    
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-6 pt-1">Do you need another session?&nbsp: </label><br>
                                                                                    
                                                                                    <div class="col-sm-6">
                                                                                        <select class="form-control" onchange="changeme(value)" name="another" id="another" style="height: unset;" required>
                                                                                        <option id="val"> </option>
                                                                                            @foreach ($yn as $ynv)
                                                                                                <option id="val" value = '{{$ynv->id}}'> {{$ynv->val}} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <script>
                                                                                    function changeme(val)
                                                                                    {
                                                                                        if(val == 1)
                                                                                        {
                                                                                            $('.req').removeClass('hidden');
                                                                                        }
                                                                                        else {
                                                                                            $('.req').addClass('hidden');
                                                                                        }
                                                                                    }
                                                                                </script>


                                                                                
                                                                                <div class="req hidden form-group row">
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
                                                                               
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" id="feedback_ajax" class="btn btn-primary mentor_modal_button">Submit</button>
                                                                        
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
var und = -1;
var all = -1;
var expection = -1;
var overall = -1;

function star1(val)
{
    pun = val
    console.log(pun);
}
function star2(val)
{
    und = val
    console.log(und);
}
function star3(val)
{
    all = val
    console.log(all);
}
function star4(val)
{
    expection = val
    console.log(expection);
}
function star5(val)
{
    overall = val
    console.log(overall);
}

$(document).ready(function(){

   $('#addnew').click(function(){
       //for(var i =0; i < timelineLength; i++){
           
           if($('ul.timeline li').length % 2 == 0){
                $('.timeline').prepend(
                    '<li class="timeline-inverted">'
                    +'<div class="timeline-badge info"><i class="glyphicon glyphicon-hand-right"></i></div>'
                    +'<div class="timeline-panel">'
                    +'<i class="text-muted clock glyphicon glyphicon-time"></i>'
                    +'<p><small class="text-muted"><input style="float:left;" type="date" name="mdate[]" class="pl-5 form-control"></small></p>'
                    
                    +'<div class="timeline-body">'
                    +'<textarea row="4" type="text" class="form-control" id="pro" name="mpoint[]" placeholder="Enter here" required></textarea>'
                    
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
                    +'<p><small class="text-muted"><input style="float:left;" type="date" name="mdate[]" class="pl-5 form-control"></small></p>'
               
                    +'<div class="timeline-body">'
                    +'<textarea row="4" type="text" class="form-control" id="pro" name="mpoint[]" placeholder="Enter here" required></textarea>'
                    +'</div>'
                    +'</div>'
                    +'</li>'
                );
            
                
          // }
       }
   });    
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
            data.append('und', und);
            data.append('all', all);
            data.append('expection', expection);
            data.append('overall', overall);
            data.append('request_mentor', '{{$req_m}}');
            data.append('qualitative_feedback', $('textarea[name=qualitative_feedback]').val());
            data.append('another', $('select[name=another]').val());
            data.append('mbusiness_domain_area', $('select[name=mbusiness_domain_area]').val());
              
            $.ajax({
               type : 'POST',
               url : '/startup/feedback',
               beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
               data: data,
               contentType: false,
               processData: false,
               success: function(data) {
                   if(data.errors) {
                    
                        $('#msg').removeClass('hidden');
                        $("#msg").text("All field are required ");
                    
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




