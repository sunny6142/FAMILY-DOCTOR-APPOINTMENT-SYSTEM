@extends('layouts.admin_header')

@section('content')
                <div class="pcoded-wrapper">
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="p-5">
                                    <!-- Page-header start -->
                                    <div class="page-header card m-0">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-file-code bg-c-blue"></i>
                                                    <div class="d-inline">
                                                        <h4>Request Denied</h4>
                                                            <span><a href="/admin/approval"> Pending </a><code><a href="/admin/approved"> Approved </a></code><a href="/admin/deny"> & Deny</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="index.html">
                                                                <i class="icofont icofont-home"></i>
                                                            </a>
                                                        </li>
                                                        
                                                        <li><a href="#!" hidden>filter</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        
                                    <!-- Page-header end -->

                                            <!-- Page body start -->
                                            
                                            <div class="container">
                                                
                                                <div class="card-block table-border-style">
                                                    <div class="table-responsive">
                                                        <table class="table" id="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-left">No.</th>
                                                                    <th class="text-left">Name</th>
                                                                    <th class="text-success text-left">Mentoring Session</th>
                                                                    <th class="text-danger text-left">Created At</th>
                                                                    <th class="text-left" width="150px">
                                                                        Status
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
                                                            @foreach ($request_mentor as $ment)
                                                                <tr class="mentor{{$ment->id}}">
                                                                    <td class="text-left">{{ $no++}} </td>
                                                                    <td class="text-left">{{ $ment->name }} </td>
                                                                    <td class="text-left">{{ $ment->mentoring_session_time_v  }} </td>
                                                                    <td class="text-danger text-left">{{ $ment->created_at }} </td>
                                                                    <td class="text-left">
                                                                    
                                                                       Denied
                                                                        <!--
                                                                        <a onclick="Editdetail( {{ json_encode($ment) }}  )" href="#" class="btn btn-warning btn-sm" >
                                                                            <i class="glyphicon glyphicon-pencil"></i>
                                                                        </a>
                                                                        <a onclick="Delete_user( {{ json_encode($ment) }} )" href="#" class="btn btn-danger btn-sm">
                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                        </a> -->
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            <div class="text-center hidden" id="table_progress"><i class="fa fa-cog fa-spin text-success" style="font-size:48px"></i><div>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    {{ $request_mentor->links() }}
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
<!--  form Create Post -->
<div class="modal fade" id="add_mentor_model_dialog" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md " role="document" style="width: auto;">
        <div class="modal-content">
            <!--   -->
                <!--   -->
            <div class="card" style=";">
                <div style="width:150px; height:150px; display: block;margin-left: auto; margin-right: auto;">
                    <img style="width:auto; height:150px" id="stlogo" class="card-img-top img-fluid img-thumbnail" src="" alt="Start Up logo">
                </div>
                <div class="card-body mt-3 tb-3">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" id="expertise">Cras justo odio</li>
                    <li class="list-group-item" id="industry_experience">Dapibus ac facilisis in</li>
                    <li class="list-group-item" id="mentoring_session_time_v">Vestibulum at eros</li>
                    <li class="list-group-item" id="created_at">Vestibulum at eros</li>
                </ul>
                <div class="card-body text-right">
                    <a href="#" target="_blank" id="sprofile" class="card-link btn btn-info btn-sm">Profile</a>
                    <a href="#" id="proceed" class="card-link btn btn-warning btn-sm">Proceed</a>
                </div>
            </div>
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
        <input type="text" class="form-control hidden" id="del_id" name="del_id">
      </div>
      <div class="modal-body">
        <h4 id="del_msg_success" >Are you sure want to Deny this request?</h4>
        
                                                    
      </div>
      <div class="modal-footer">
        <button type="button" onclick="Deny()" id ="del_id_ajax" class="btn btn-danger">Deny</button>
        <button type="button" id="mdspinner"  class="btn mentor_modal_button btn-primary hidden"><i class="fa fa-spinner"></i> Pls Wait...</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                                        

      </div>
    </div>

  </div>
</div>


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
    $(document).ready(function () {

        $("#sp1").click(function(){
            showtab("step1");
        });

        $("#sp2").click(function(){
            showtab("step2");
        });

        $("#sp3").click(function(){
            showtab("step3");
        });

        $("#sp4").click(function(){
            showtab("step4");
        });

        $("#sp5").click(function(){
            showtab("step5");
        });

        $("#sp6").click(function(){
            showtab("complete");
        });

    });
</script>

<script>

    function clear()
    {
        $('.err_toggle').addClass('hidden');
        $('#image_id_').addClass('hidden');
        $('#form2').find('input').val('');
        $('#form2').find('select').val('');
        $('#form2').find('textarea').val('');
        $('#form2').find('input').removeClass("border border-danger");
        $('#form2').find('select').removeClass("border border-danger");
        $('#form2').find('textarea').removeClass("border border-danger");
        $('.mentor_modal_button').addClass('hidden');
    }
//Show add mentor
	$(document).ready(function(){     
        $("#add_mentor_model").click(function(){
            $('#add_mentor_model_dialog').modal('show');
            $('.form-horizontal').show();
            showtab('step1');
            $("#form2 :input").prop("disabled", false);
            $("#form2 :button").prop("disabled", false);

            clear();

            $('#msubmit').removeClass('hidden');
        });
    }) 

    function Delete_user(val)
    {
        $('#msgbox').modal('show');
        $('.form-horizontal').show();
        $('#del_id').val(val.request_mentor_id);
        $("#del_msg_success").html("<span class='text-warning'>Are you sure want to delete this ?</span>");
                   
    }
</script>     


<!--  End form Create Post -->                              
<script>

function viewdetil(val) 
{
    $('#add_mentor_model_dialog').modal('show');
    $('.form-horizontal').show();

    $('.card-title').html(val.start_up_name);
    $('.card-text').html('<b></b>'+val.problem);
    $('#expertise').html('<b>Professional Expertise : </b>'+val.expertise);
    $('#industry_experience').html('<b>Industry Vertical Experience : </b>'+val.industry_experience);
    $('#mentoring_session_time_v').html('<b>Mentoring Session : </b>'+val.mentoring_session_time_v);
    $('#created_at').html('<b>Created At : </b>'+val.created_at);
    $("#stlogo").attr("src","{{ asset('') }}public/images/"+val.logo);

    $("#proceed").attr("href", "/mentor/suggestion/id/"+val.request_mentor_id+"/pe/"+val.professional_expertise+"/ive/"+val.industry_vertical_experience);
    
    $("#sprofile").attr("href","/admin/view/user/profile/"+val.user);

    
}



// Delete
    function Deny(){
        $('.err_toggle').addClass('hidden');
            $('#del_id_ajax').addClass('hidden');
            $('#mdspinner').removeClass('hidden');
             
            var data = new FormData();
            data.append('request_mentor', $('input[name=del_id]').val());

            $.ajax({
                type : 'POST',
                url : '/admin/deny/mentor_request',
                beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                contentType: false,
                data:data,
                processData: false,
                success: function(data) {
                   
                    $("#del_msg_success").html("<span class='text-success'>Mentor Request has been Denied Successfully :</span>");
                    //   updatelist();
                    $('#del_id_ajax').removeClass('hidden');
                    $('#mdspinner').addClass('hidden');
                }
            }).fail(function (jqXHR, textStatus, error) {  
                    $("#del_msg_success").html("<span class='text-danger'>Error :" + error +"</span>");
                    
                    $('#del_id_ajax').removeClass('hidden');
                    $('#mdspinner').addClass('hidden');
            });
            
    }

function updatelist()
{   
    $('#mentortable').addClass('hidden');
    $('#table_progress').removeClass('hidden');
  
  //  var page = $(this).attr('href').split('page=')[1];

        $.ajax({
            type : 'POST',
            url : '/update/mentorlist?page={{$_GET["page"]}}',
            beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data['data']);

                $('#mentortable').text('');
                var i = 1;
                for (val in data['data']) {  
                    $('#mentortable').append('<tr>'+
                        '<td>'+ i+ '</td>'+
                        '<td>'+ data['data'][val]["name"] +'</td>'+
                        '<td>'+ data['data'][val]["email"] +'</td>'+
                        '<td>'+ data['data'][val]["mobile"] +'</td>'+
                        '<td class="text-success">'+ data['data'][val]["company_name"] +'</td>'+
                        '<td class="text-danger">'+  data['data'][val]["created_at"]  +'</td>'+
                        '<td>'+                                    
                            '<a onclick=\'viewdetil('+ JSON.stringify( data['data'][val] )  +')\' href="#" class="btn btn-info btn-sm" >'+
                                '<i class="glyphicon glyphicon-eye-open"></i>'+
                            '</a>&nbsp'+
                            '<a onclick=\'Editdetail('+  JSON.stringify( data['data'][val] )  +')\' href="#" class="btn btn-warning btn-sm" >'+
                                '<i class="glyphicon glyphicon-pencil"></i>'+
                            '</a>&nbsp'+
                            '</a>'+
                            '<a onclick=\'Delete_user('+  JSON.stringify( data['data'][val] ) +')\' href="#" class="btn btn-danger btn-sm">'+
                                '<i class="glyphicon glyphicon-trash"></i>'+
                            '</a>'+
                        '</td>'+
                    '</tr>');
                    i = i+1;
                }
                $('#mentortable').removeClass('hidden');
                $('#table_progress').addClass('hidden');
            }
        }).fail(function (jqXHR, textStatus, error) {  
            $('#mentortable').removeClass('hidden');
            $('#table_progress').addClass('hidden');
        });
}
    

</script>

<script>
$(document).ready(function(){
    $(".tell").intlTelInput({
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
        });
})
</script>
 <!-- end Add mentor -->
@endsection


