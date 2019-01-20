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
                                                        <h4>Add Doctor</h4>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        
                                    <!-- Page-header end -->

                                            <!-- Page body start -->
                                            
                                            <div class="container">
                                                
                                               <!-- Add Mentor ----- --> 
                                               <div class="" id="add_mentor_model_dialog" tabindex="-1" role="">
                                                    <div class="modal-md " role="document" style="width: auto;">
                                                        <div class="">
                                                            <!--   -->
                                                                <!--   -->
                                                                    <div  class="modal-body" >
                                                                        <div class="wizard m-0">
                                                                            

                                                                            <form role="form" id="form2" class="w-95" style = "margin: 0 auto;">
                                                                                <div class="tab-content">
                                                                                    <div class="border err_toggle border-success text-success p-1 pl-4 mt-2" id="msg"></div>
                                                                                    
                                                                                        <section>
                                                                                            {{--<h3>Professional Information </h3>--}}
                                                                                            <div class="form-group row">
                                                                                                <label class="control-label col-sm-4 pt-1" for="category">Setup Category&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <select class="form-control" name="category" id="category" style="height: unset;" required>
                                                                                                       @foreach ($category as $cat)
                                                                                                            <option id="val" value = '{{$cat->cat_id}}'> {{$cat->category}} </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                    <p class="category_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group row">
                                                                                                <label class="control-label col-sm-4 pt-1" for="name"> Name&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input class="form-control" name="name" id="name" style="height: unset;" required>
                                                                                                       
                                                                                                    <p class="name_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group row">
                                                                                                    <label class="control-label col-sm-4 pt-1" for="introduction">Introduction&nbsp:</label><br>
                                                                                                    <div class="col-sm-8">
                                                                                                        <textarea row="4" type="text" class="form-control" id="introduction" name="introduction" placeholder="Enter here" required></textarea>
                                                                                                        <p class="introduction_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                    </div>
                                                                                            </div>

                                                                                            <div class="form-group row">
                                                                                                <label class="control-label col-sm-4 pt-2" for="image">Image&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <div style="overflow:hidden;"> <label class="btn btn-warning"> Upload
                                                                                                        <input type="file" id="image" name="image" class="btn btn-warning hidden" onchange="readURL(this,'image_id_');"></label>
                                                                                                        <p class="image_id_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                        <img id="image_id_" class="img-rounded" src="#"  hidden/>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </section>        
                                                                                        <li class="pull-right">
                                                                                            <button type="button" id="msubmit"  class="btn mentor_modal_button btn-primary hidden">Submit</button>
                                                                                            <button type="button" id="mspinner"  class="btn mentor_modal_button btn-primary hidden"><i class="fa fa-spinner"></i> Pls Wait...</button>
                                                                                            
                                                                                        </li>
                                                                                    
                                                                                    <div class="clearfix"></div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>        
                                                <!-- End Add Mentor --------- -->
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
            showtab('step1');
            $("#form2 :input").prop("disabled", false);
            $("#form2 :button").prop("disabled", false);

            clear();

            $('#msubmit').removeClass('hidden');
      
    }) 

    function Delete_user(val)
    {
        $('#msgbox').modal('show');
        $('.form-horizontal').show();
        $('#del_id').val(val.id);
        $("#del_msg_success").html("<span class='text-warning'>Are you sure want to delete this ?</span>");
                   
    }
</script>     


<!--  End form Create Post -->                              
<script>
function showtab(id)
{
    $('#add_mentor_model_dialog').modal('handleUpdate');

        if(id == 'step1'){
            $('#step1').addClass('active show');
            $('#present1').addClass('active');
            $('#present1').removeClass('disable');
        }  else {
            $('#step1').removeClass('active show');
            $('#present1').removeClass('active');
            $('#present1').addClass('disable');
        }

        if(id == 'step2'){
            $('#step2').addClass('active show');
            $('#present2').addClass('active');
            $('#present2').removeClass('disable');
        }  else {
            $('#step2').removeClass('active show');
            $('#present2').removeClass('active');
            $('#present2').addClass('disable');
        }

        if(id == 'step3'){
            $('#step3').addClass('active show')
            $('#present3').addClass('active');
            $('#present3').removeClass('disable');
        }  else {
            $('#step3').removeClass('active show');
            $('#present3').removeClass('active');
            $('#present3').addClass('disable');
        }

        if(id == 'step4'){
            $('#step4').addClass('active show');
            $('#present4').addClass('active');
            $('#present4').removeClass('disable');
        }  else {
            $('#step4').removeClass('active show');
            $('#present4').removeClass('active');
            $('#present4').addClass('disable');
        }

        if(id == 'step5'){
            $('#step5').addClass('active show');
            $('#present5').addClass('active');
            $('#present5').removeClass('disable');
        }  else {
            $('#step5').removeClass('active show');
            $('#present5').removeClass('active');
            $('#present5').addClass('disable');
        }

        if(id == 'complete'){
            $('#complete').addClass('active show');
            $('#present6').addClass('active');
            $('#present6').removeClass('disable');
        }  else {
            $('#complete').removeClass('active show');
            $('#present6').removeClass('active');
            $('#present6').addClass('disable');
        }
}

function Editdetail(val) 
{
    $('#add_mentor_model_dialog').modal('show');
    $('.form-horizontal').show();
    $("#form2 :input").prop("disabled", false);
    $("#form2 :button").prop("disabled", false);
   
    clear();
    
    $('#msg').removeClass('hidden'); 
    $("#msg").html("<span class='text-danger'>** Leave Password Field Blank If You Don't Wish To Update Password </span>");
    showtab('step1');
    $('input[name=memail]').prop("disabled", true);

    $('input[name=mid').val(val.id);
    $('input[name=mname').val(val.name);
    $('select[name=mgender]').val(val.gender);
    $('input[name=mmobile]').val(val.mobile);
    $('input[name=tel_no_office]').val(val.telephone_office);
    $('input[name=tel_no_home]').val(val.telephone_home);
    $('input[name=mdob]').val(val.dob);
    $('input[name=memail]').val(val.email);
    $('input[name=Address]').val(val.address);
    $('input[name=mcompany_name]').val(val.company_name);
    $('input[name=mdesignation]').val(val.designation);
           
    $('textarea[name=about_you]').val(val.about_you);
    $('textarea[name=primary_and_secondary_objectives]').val(val.primary_and_secondary_objectives);
    $('select[name=mprofessional_expertise]').val(val.professional_expertise);
    $('select[name=mindustry_experience]').val(val.industry_vertical_experience);
    $('select[name=marea]').val(val.areas_of_business_and_management_competence);
    $('input[name=tc]').val(val.time_commitment);
    $('input[name=sdow]').val(val.days_of_week);
    $('input[name=st]').val(val.suitable_time);
         
    $('input[name=LI]').val(val.linked_in);
    $('input[name=fb]').val(val.facebook);
    $('input[name=twitter]').val(val.twitter);

    $('input[name=mpassword]').val();

    $('.mentor_modal_button').addClass('hidden');
    $('#mupdate').removeClass('hidden');
    //        data.append('image', $('#image')[0].files[0]);
}

function viewdetil(val) 
{
    $('#add_mentor_model_dialog').modal('show');
    $('.form-horizontal').show();
    $("#form2 :input").prop("disabled", true);
    $("#form2 :button").prop("disabled", false);

    clear();
    
    showtab('step1');
    $('input[name=mname').val(val.name);
    $('select[name=mgender]').val(val.gender);
    $('input[name=mmobile]').val(val.mobile);
    $('input[name=tel_no_office]').val(val.telephone_office);
    $('input[name=tel_no_home]').val(val.telephone_home);
    $('input[name=mdob]').val(val.dob);
    $('input[name=memail]').val(val.email);
    $('input[name=Address]').val(val.address);
    $('input[name=mcompany_name]').val(val.company_name);
    $('input[name=mdesignation]').val(val.designation);
           
    $('textarea[name=about_you]').val(val.about_you);
    $('textarea[name=primary_and_secondary_objectives]').val(val.primary_and_secondary_objectives);
    $('select[name=mprofessional_expertise]').val(val.professional_expertise);
    $('select[name=mindustry_experience]').val(val.industry_vertical_experience);
    $('select[name=marea]').val(val.areas_of_business_and_management_competence);
    $('input[name=tc]').val(val.time_commitment);
    $('input[name=sdow]').val(val.days_of_week);
    $('input[name=st]').val(val.suitable_time);
         
    $('input[name=LI]').val(val.linked_in);
    $('input[name=fb]').val(val.facebook);
    $('input[name=twitter]').val(val.twitter);

    $('.mentor_modal_button').addClass('hidden');
   
   // $('input[name=mpassword]').val(val.password);
    //        data.append('image', $('#image')[0].files[0]);
}

// <!-- Add mentor -->
    $(document).ready(function(){
        $("#msubmit").click(function() {
            $('.err_toggle').addClass('hidden');
            $('.mentor_modal_button').addClass('hidden');
            $('#mspinner').removeClass('hidden');
            
            $('#form2').find('input').removeClass("border border-danger");
            
            var data = new FormData();

            data.append('name', $('input[name=name]').val());
            data.append('category', $('select[name=category]').val());
            data.append('introduction', $('textarea[name=introduction]').val());
        
            data.append('image', $('#image')[0].files[0]);
              
            $.ajax({
               type : 'POST',
               url : '{{ asset('') }}add/doctor',
               beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
               data: data,
               contentType: false,
               processData: false,
               success: function(data) {
                   if(data.errors) {
                        
                        if(data.errors.category){
                            $('#category').addClass("border border-danger");
                            $('.category_error').removeClass('hidden');
                            $('.category_error').text(data.errors.category);
                        }
                        if(data.errors.name){
                            $('#name').addClass("border border-danger");
                            $('.name_error').removeClass('hidden');
                            $('.name_error').text(data.errors.name);
                        }
                        if(data.errors.introduction){
                            $('#introduction').addClass("border border-danger");
                            $('.introduction_error').removeClass('hidden');
                            $('.introduction_error').text(data.errors.introduction);
                        }
                   }
                   else
                   {
                       clear();
                       $('#msg').removeClass('hidden'); 
                       $("#msg").text("Doctor Successfully Added");
                //       updatelist();
                   }
                    $('.mentor_modal_button').addClass('hidden');
                    $('#msubmit').removeClass('hidden');
               }
            }).fail(function (jqXHR, textStatus, error) {  
                    $('#msg').removeClass('hidden');
                    $("#msg").text("Error !"+error);
                    $('.addmentor_error').removeClass('hidden');             
                    $('.addmentor_error').text('Error ! '+error);
                    $('.mentor_modal_button').addClass('hidden');
                    $('#msubmit').removeClass('hidden');
                });
        });
    })

// Delete
    function delete_Mentor(){
        $('.err_toggle').addClass('hidden');
            $('#del_id_ajax').addClass('hidden');
            $('#mdspinner').removeClass('hidden');
             
            var data = new FormData();
            data.append('id', $('input[name=del_id]').val());

            $.ajax({
                type : 'POST',
                url : '/delete/mentor',
                beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                contentType: false,
                data:data,
                processData: false,
                success: function(data) {
                   
                    $("#del_msg_success").html("<span class='text-success'>Mentor Successfully Deleted :</span>");
                       updatelist();
                    $('#del_id_ajax').removeClass('hidden');
                    $('#mdspinner').addClass('hidden');
            }
            }).fail(function (jqXHR, textStatus, error) {  
                    $("#del_msg_success").html("<span class='text-danger'>Error :" + error +"</span>");
                    
                    $('#del_id_ajax').removeClass('hidden');
                    $('#mdspinner').addClass('hidden');
            });
            
    }
// <!-- Update mentor -->
$(document).ready(function(){
        $("#mupdate").click(function() {
            $('.err_toggle').addClass('hidden');
            $('.mentor_modal_button').addClass('hidden');
            $('#mspinner').removeClass('hidden');
            
            $('#form2').find('input').removeClass("border border-danger");
            
            var data = new FormData();
            data.append('id', $('input[name=mid]').val());
            data.append('name', $('input[name=mname]').val());
            data.append('gender', $('select[name=mgender]').val());
            data.append('mobile', $('input[name=mmobile]').val());
            data.append('telephone_office', $('input[name=tel_no_office]').val());
            data.append('telephone_home', $('input[name=tel_no_home]').val());
            data.append('dob', $('input[name=mdob]').val());
            data.append('email', $('input[name=memail]').val());
            data.append('address', $('input[name=Address]').val());
            data.append('company_name', $('input[name=mcompany_name]').val());
            data.append('designation', $('input[name=mdesignation]').val());
           
            data.append('about_you', $('textarea[name=about_you]').val());
            data.append('primary_and_secondary_objectives', $('textarea[name=primary_and_secondary_objectives]').val());
            data.append('professional_expertise', $('select[name=mprofessional_expertise]').val());
            data.append('industry_vertical_experience', $('select[name=mindustry_experience]').val());
            data.append('areas_of_business_and_management_competence', $('select[name=marea]').val());
            data.append('time_commitment', $('input[name=tc]').val());
            data.append('days_of_week', $('input[name=sdow]').val());
            data.append('suitable_time', $('input[name=st]').val());
         
            data.append('linked_in', $('input[name=LI]').val());
            data.append('facebook', $('input[name=fb]').val());
            data.append('twitter', $('input[name=twitter]').val());
            data.append('password', $('input[name=mpassword]').val());
            data.append('password_confirmation', $('input[name=mcpassword]').val());

            data.append('image', $('#image')[0].files[0]);
              
            $.ajax({
               type : 'POST',
               url : '/update/mentor',
               beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
               data: data,
               contentType: false,
               processData: false,
               success: function(data) {
                   if(data.errors) {
                        
                        if(data.errors.linked_in){
                            showtab('step6');
                            $('#LI').addClass("border border-danger");
                            $('.LI_error').removeClass('hidden');
                            $('.LI_error').text(data.errors.linked_in);
                        }
                        if(data.errors.facebook){
                            showtab('step6');
                            $('#fb').addClass("border border-danger");
                            $('.fb_error').removeClass('hidden');
                            $('.fb_error').text(data.errors.facebook);
                        }
                        if(data.errors.twitter){
                            showtab('step6');
                            $('#twitter').addClass("border border-danger");
                            $('.twitter_error').removeClass('hidden');
                            $('.twitter_error').text(data.errors.twitter);
                        }

                        if(data.errors.time_commitment){
                            showtab('step5');
                            $('#tc').addClass("border border-danger");
                            $('.tc_error').removeClass('hidden');
                            $('.tc_error').text(data.errors.time_commitment);
                        }
                        if(data.errors.days_of_week){
                            showtab('step5');
                            $('#sdow').addClass("border border-danger");
                            $('.sdow_error').removeClass('hidden');
                            $('.sdow_error').text(data.errors.days_of_week);
                        }
                        if(data.errors.suitable_time){
                            showtab('step5');
                            $('#st').addClass("border border-danger");
                            $('.st_error').removeClass('hidden');
                            $('.st_error').text(data.errors.suitable_time);
                        }

                        if(data.errors.about_you){
                            showtab('step4');
                            $('#about_you').addClass("border border-danger");
                            $('.about_you_error').removeClass('hidden');
                            $('.about_you_error').text(data.errors.about_you);
                        }
                        if(data.errors.primary_and_secondary_objectives){
                            showtab('step4');
                            $('#primary_and_secondary_objectives').addClass("border border-danger");
                            $('.poso_error').removeClass('hidden');
                            $('.poso_error').text(data.errors.primary_and_secondary_objectives);
                        }

                        if(data.errors.image){
                            showtab('step3');
                         //   $('#mname').addClass("border border-danger");
                            $('.image_id_error').removeClass('hidden');
                            $('.image_id_error').text(data.errors.image);
                        }
                        if(data.errors.company_name){
                            showtab('step3');
                            $('#mcompany_name').addClass("border border-danger");
                            $('.mcompany_name_error').removeClass('hidden');
                            $('.mcompany_name_error').text(data.errors.company_name);
                        }
                        if(data.errors.designation){
                            showtab('step3');
                            $('#mdesignation').addClass("border border-danger");
                            $('.mdesignation_error').removeClass('hidden');
                            $('.mdesignation_error').text(data.errors.designation);
                        }
                        if(data.errors.professional_expertise){
                            showtab('step3');
                            $('#mprofessional_expertise').addClass("border border-danger");
                            $('.mprofessional_expertise_error').removeClass('hidden');
                            $('.mprofessional_expertise_error').text(data.errors.professional_expertise);
                        }
                        if(data.errors.industry_vertical_experience){
                            showtab('step3');
                            $('#mindustry_experience').addClass("border border-danger");
                            $('.mindustry_experience_error').removeClass('hidden');
                            $('.mindustry_experience_error').text(data.errors.industry_vertical_experience);
                        }
                        if(data.errors.areas_of_business_and_management_competence){
                            showtab('step3');
                            $('#marea').addClass("border border-danger");
                            $('.marea_experience_expertise_error').removeClass('hidden');
                            $('.marea_experience_expertise_error').text(data.errors.areas_of_business_and_management_competence);
                        }

                        if(data.errors.address){
                            showtab('step2');
                            $('#Address').addClass("border border-danger");
                            $('.Address_error').removeClass('hidden');
                            $('.Address_error').text(data.errors.address);
                        }
                        if(data.errors.telephone_office	){
                            showtab('step2');
                            $('#tel_no_office').addClass("border border-danger");
                            $('.tel_no_office_error').removeClass('hidden');
                            $('.tel_no_office_error').text(data.errors.telephone_office);
                        }
                        if(data.errors.telephone_home){
                            showtab('step2');
                            $('#tel_no_home').addClass("border border-danger");
                            $('.tel_no_home_error').removeClass('hidden');
                            $('.tel_no_home_error').text(data.errors.telephone_home);
                        }
                        if(data.errors.mobile){
                            showtab('step2');
                            $('#mmobile').addClass("border border-danger");
                            $('.mmobile_error').removeClass('hidden');
                            $('.mmobile_error').text(data.errors.mobile);
                        }

                        if(data.errors.name){
                            showtab('step1');
                            $('#mname').addClass("border border-danger");
                            $('.sname_error').removeClass('hidden');
                            $('.sname_error').text(data.errors.name);
                        }
                        if(data.errors.gender){
                            showtab('step1');
                            $('#mgender').addClass("border border-danger");
                            $('.mgender_error').removeClass('hidden');
                            $('.mgender_error').text(data.errors.gender);
                        }
                        if(data.errors.dob){
                            showtab('step1');
                            $('#mdob').addClass("border border-danger");
                            $('.mdob_error').removeClass('hidden');
                            $('.mdob_error').text(data.errors.dob);
                        }
                        if(data.errors.email){
                            showtab('step1');
                            $('#memail').addClass("border border-danger");
                            $('.memail_error').removeClass('hidden');
                            $('.memail_error').text(data.errors.email);
                        }
                        if(data.errors.password){
                            showtab('step1');
                            $('#mpassword').addClass("border border-danger");
                        //    $('#mcpassword').addClass("border border-danger");
                            $('.password_error').removeClass('hidden');
                            $('.password_error').text(data.errors.password);
                        }
                        
                   }
                   else
                   {
                       clear();
                       showtab('step1');
                       $('#msg').removeClass('hidden'); 
                       $("#msg").text("Mentor Successfully Updated");
                       updatelist();
                   }
                    $('.mentor_modal_button').addClass('hidden');
                    $('#mupdate').removeClass('hidden');
               }
            }).fail(function (jqXHR, textStatus, error) {  
                    $('#msg').removeClass('hidden');
                    $("#msg").text("Error ! "+error);
                    $('.addmentor_error').removeClass('hidden');             
                    $('.addmentor_error').text('Error ! '+error);
                    $('.mentor_modal_button').addClass('hidden');
                    $('#mupdate').removeClass('hidden');
                });
        });
    })


    

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


