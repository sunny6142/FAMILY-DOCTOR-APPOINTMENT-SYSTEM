@extends('layouts.mentor_header')

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
                                                        <h3>Startup List</h3>
                                                        <hr>
                                                        <!-- <span>Add <code>Delete</code> & Update</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        
                                    <!-- Page-header end -->

                                            <!-- Page body start -->
                                            
                                            <div class="container">
                                                
                                                            
                                                            <!-- Table ------------- -->
                                                            <div class="card-block table-border-style">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No.</th>
                                                                                <th>Name</th>
                                                                                <th>Problem</th>
                                                                                <th class="text-center" width="150px">
                                                                                    {{--<a href="{{route('add.mentor')}}" id="add_mentor_model" class="btn btn-success btn-sm">
                                                                                        <i class="glyphicon glyphicon-plus"></i>
                                                                                    </a>--}}
                                                                                </th>
                                                                            </tr>
                                                                            {{ csrf_field() }}
                                                                        </thead>
                                                                        <tbody id="mentortable">
                                                                        <?php 
                                                                            if (empty($_GET['page'])) {
                                                                                $_GET['page'] = 1;
                                                                                $no = 1;
                                                                            }
                                                                            else
                                                                                $no = ((($_GET['page']-1) * 25) +1);
                                                                        ?>
                                                                        @foreach ($startup as $ment)
                                                                            <tr class="mentor{{$ment->id}}">
                                                                                <td>{{ $no++}} </td>
                                                                                <td>{{ $ment->name }} </td>
                                                                                <td>{{ $ment->problem }} </td>
                                                                                <td class="text-left">
                                                                                    <a href="/list/startup/connection/{{$ment->user}}" class="btn btn-primary btn-sm" >
                                                                                        <i class="glyphicon glyphicon-info-sign"></i> Info
                                                                                    </a>
                                                                                    <a href="/admin/view/user/profile/{{ $ment->user }}" class="btn btn-info btn-sm" >
                                                                                        <i class="glyphicon glyphicon-eye-open"></i> Profile
                                                                                    </a>
                                                                                
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                        <div class="text-center hidden" id="table_progress"><i class="fa fa-cog fa-spin text-success" style="font-size:48px"></i><div>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="text-right">
                                                                {{--{{ $startup->links() }}--}}
                                                            </div>
                                                            <!-- End Table --------- -->

                                                            @foreach ($startup as $start)
                                                            <!--<div class="col-md-4">
                                                                <div class="card" style="width: 28rem;">
                                                                    <div style="width:150px; height:150px; display: block;margin-left: auto; margin-right: auto;">
                                                                    <img style="width:auto; height:150px" class="card-img-top img-fluid img-thumbnail" src="https://www.w3schools.com/w3images/lights.jpg" alt="Card image cap">
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <h5 class="card-title mt-3 tb-3">{{ $start->name }}</h5>
                                                                        
                                                                        <p style="height:60px;" class="card-text mt-3 mb-3 block-with-text"><span>Problem : </span> {{ $start->problem }} </p>
                                                                    </div>
                                                                  
                                                                    <div class="card-body">
                                                                        <a href="#" class="card-link btn btn-warning">Profile</a>
                                                                        <a href="/message/{{ $start->user }}" class="card-link btn btn-info">Message</a>
                                                                    </div> 
                                                                </div>
                                                            </div>  -->
                                                            @endforeach
                                                         
                                                
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




