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
                                                        <h4>Mentor Detail</h4>
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
                                                                            <div class="wizard-inner">
                                                                                <div class="modal-header connecting-line"></div>
                                                                                <ul class="nav nav-tabs mt-0" role="tablist">
                                                                                    <li role="presentation" id="present1" class="active">
                                                                                        <a href="#step1" id="sp1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                                                                            <span class="round-tab">
                                                                                                1
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li role="presentation" id="present2" class="disabled">
                                                                                        <a href="#step2" id="sp2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                                                                            <span class="round-tab">
                                                                                                2
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li role="presentation" id="present3" class="disabled">
                                                                                        <a href="#step3" id="sp3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                                                                            <span class="round-tab">
                                                                                                3
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li role="presentation" id="present4" class="disabled">
                                                                                        <a href="#step4" id="sp4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                                                                                            <span class="round-tab">
                                                                                                4
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li role="presentation" id="present5" class="disabled">
                                                                                        <a href="#step5" id="sp5" data-toggle="tab" aria-controls="step5" role="tab" title="Step 5">
                                                                                            <span class="round-tab">
                                                                                                5
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li role="presentation" id="present6" class="disabled">
                                                                                        <a href="#complete" id="sp6" data-toggle="tab" aria-controls="complete" role="tab" title="complete">
                                                                                            <span class="round-tab">
                                                                                                <i class="glyphicon glyphicon-ok"></i>
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                            <form role="form" id="form2" class="w-95" style = "margin: 0 auto;">
                                                                                <div class="tab-content">
                                                                                    <div class="border err_toggle border-success text-success p-1 pl-4 mt-2" id="msg"></div>
                                                                                    <div class="tab-pane active pt-3" id="step1">
                                                                                        <h3>Add Mentor</h3>
                                                                                        <!--- ---- -->
                                                                                            <section>
                                                                                            <input type="text" hidden class="form-control hidden" id="mid" name="mid">
                                                                                                <div class="form-group row add">
                                                                                                    <label class="control-label col-sm-4 pt-2" for="mname">Mentor Name :</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Mentor Name" required>
                                                                                                        <p class="sname_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group row">
                                                                                                    <label class="control-label col-sm-4 pt-1" for="mgender">Gender&nbsp:</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <select class="form-control" name="mgender" id="mgender" style="height: unset;" required>
                                                                                                        <option id="val"> </option>
                                                                                                            @foreach ($gender as $Gender)
                                                                                                                <option id="val" value = '{{$Gender->id}}'> {{$Gender->gender}} </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                        <p class="mgender_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                    
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group row add">
                                                                                                    <label class="control-label col-sm-4 pt-2" for="mdob">Mentor D.O.B&nbsp:</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <input type="date" required class="form-control" id="mdob" name="mdob" placeholder="Enter Your StartUp Name" required>
                                                                                                        <p class="mdob_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group row add">
                                                                                                    <label class="control-label col-sm-4 pt-2" for="memail">Email Id&nbsp:</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <input type="email" required class="form-control" id="memail" name="memail" placeholder="Enter Mentor Email Id" required>
                                                                                                        <p class="memail_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                    </div>
                                                                                                </div> 
                                                                                                <div class="form-group row add">
                                                                                                    <label class="control-label col-sm-4 pt-2" for="mpassword">Password&nbsp:</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <input type="password" required class="form-control" id="mpassword" name="mpassword" placeholder="Enter Password" required>
                                                                                                        <p class="password_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                    </div>
                                                                                                </div>                  
                                                                                                <div class="form-group row add">
                                                                                                    <label class="control-label col-sm-4 pt-2" for="mcpassword">Confirm&nbspPassword&nbsp:</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <input type="password" required class="form-control" id="mcpassword" name="mcpassword" placeholder="Enter Password" required>
                                                                                                    </div>
                                                                                                </div>    
                                                                                            </section>
                                                                                        <!----- ---- -->
                                                                                        <ul class="list-inline pull-right">
                                                                                            <li><button type="button" onclick="showtab('step2')" class="btn btn-primary" id="submit_step1" >Next Step</button></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="tab-pane pt-3" id="step2">
                                                                                        <h3>Contact Details </h3>
                                                                                        <section id="innerstep2">
                                                                                            <div class="form-group row add">
                                                                                                <label class="control-label col-sm-4 pt-2" for="Address">Address&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input type="text" required class="form-control border border-danger" id="Address" name="Address" placeholder="Enter here" required>
                                                                                                    <p class="Address_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row add">
                                                                                                <label class="control-label col-sm-4 pt-2" for="tel_no_office">Telephone&nbsp(O)&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input style="width: 100%;" type="tel" class="form-control tell" data-country="US" id="tel_no_office" name="tel_no_office" required>
                                                                                                    <p class="tel_no_office_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row add">
                                                                                                <label class="control-label col-sm-4 pt-2" for="tel_no_home">Telephone&nbsp(H)&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input type="tel" class="form-control tell"  data-country="US" id="tel_no_home" name="tel_no_home" required>
                                                                                                    <p class="tel_no_home_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row add">
                                                                                                <label class="control-label col-sm-4 pt-2" for="mmobile">Mobile&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input type="phone" class="form-control" id="mmobile" name="mmobile" placeholder="Enter here" required>
                                                                                                    <p class="mmobile_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </section>
                                                                                            
                                                                                        <ul class="list-inline pull-right">
                                                                                            <li><button type="button" onclick="showtab('step1')" class="btn btn-default prev-step">Previous</button></li> 
                                                                                            <li><button type="button" onclick="showtab('step3')" id="submit_step2" class="btn btn-primary">Next Step</button></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="tab-pane pt-3" id="step3">
                                                                                        <section>
                                                                                            <h3>Professional Information </h3>
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

                                                                                            <div class="form-group row">
                                                                                                    <label class="control-label col-sm-4 pt-2" for="mcompany_name">Company&nbspName&nbsp:</label><br>
                                                                                                    <div class="col-sm-8">
                                                                                                        <input type="text" class="form-control" id="mcompany_name" name="mcompany_name" placeholder="Enter here" required>
                                                                                                        <p class="mcompany_name_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                    </div>
                                                                                            </div>
                                                                                            <div class="form-group row add">
                                                                                                <label class="control-label col-sm-4 pt-2" for="mdesignation">Designation&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input type="text" required class="form-control" id="mdesignation" name="mdesignation" placeholder="Enter here" required>
                                                                                                    <p class="mdesignation_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>  
                                                                                            <div class="form-group row">
                                                                                                <label class="control-label col-sm-4 pt-1" for="mprofessional_expertise">Professional Expertise&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <select class="form-control" name="mprofessional_expertise" id="mprofessional_expertise" style="height: unset;" required>
                                                                                                    <option id="val"> </option>
                                                                                                        @foreach ($professional_expertise as $p_e)
                                                                                                            <option id="val" value = '{{$p_e->id}}'> {{$p_e->expertise}} </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                    <p class="mprofessional_expertise_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label class="control-label col-sm-4 pt-1" for="mindustry_experience ">Industry&nbspExperience&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <select class="form-control" name="mindustry_experience" id="mindustry_experience" style="height: unset;" required>
                                                                                                    <option id="val"> </option>
                                                                                                        @foreach ($industry_vertical_experience as $ind)
                                                                                                            <option id="val" value = '{{$ind->id}}'> {{$ind->industry_experience}} </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                    <p class="mindustry_experience_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label class="control-label col-sm-4 pt-1" for="marea ">Areas of Business & Management Competence&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <select class="form-control" name="marea" id="marea" style="height: unset;" required>
                                                                                                    <option id="val"> </option>
                                                                                                        @foreach ($areas_of_business_and_management_competence as $aob)
                                                                                                            <option id="val" value = '{{$aob->id}}'> {{$aob->areas_of_business}} </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                    <p class="marea_experience_expertise_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </section>        
                                                                                        <ul class="list-inline pull-right">
                                                                                            <li><button type="button" onclick="showtab('step2')" class="btn btn-default prev-step">Previous</button></li>
                                                                                            <li><button type="button" onclick="showtab('step4')" id="submit_step3" class="btn btn-primary btn-info-full next-step">Next</button></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="tab-pane pt-3" id="step4">
                                                                                        <h3> About You </h3>
                                                                                        <section>
                                                                                            <div class="form-group row">
                                                                                                    <label class="control-label col-sm-12" for="about_you">We would like to learn more about you – your passions, areas of interest, entrepreneurial 	experience. Please describe yourself in the rea below (200 words)</label><br>
                                                                                                    <div class="col-sm-12">
                                                                                                        <textarea row="4" type="text" class="form-control" id="about_you" name="about_you" placeholder="Enter here" required></textarea>
                                                                                                        <p class="about_you_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                    </div>
                                                                                            </div>
                                                                                            

                                                                                            <div class="form-group row">
                                                                                                    <label class="control-label col-sm-12" for="primary_and_secondary_objectives">What are your primary and secondary objectives and expectations in being involved with the mentor network? How do you think you would be able to add value to these start-ups? (Max 200 words)</label><br>
                                                                                                    <div class="col-sm-12">
                                                                                                        <textarea row="4" type="text" class="form-control" id="primary_and_secondary_objectives" name="primary_and_secondary_objectives" placeholder="Enter here" required></textarea>
                                                                                                        <p class="poso_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                    </div>
                                                                                            </div>
                                                                                        </section>
                                                                                        <ul class="list-inline pull-right">
                                                                                            <li><button type="button" onclick="showtab('step3')" class="btn btn-default prev-step">Previous</button></li>
                                                                                            <li><button type="button" onclick="showtab('step5')" id="submit_step4" class="btn btn-primary btn-info-full next-step">Next</button></li>
                                                                                        </ul>
                                                                                    </div> 
                                                                                    <div class="tab-pane pt-3" id="step5">
                                                                                        <h3>Commitment</h3>
                                                                                        <p>We would like to learn about how you much time you would be able to commit to 	the start-ups being mentored by you?</p>
                                                                                        <section>
                                                                                            <div class="form-group row add">
                                                                                                <label class="control-label col-sm-4 pt-2" for="tc"> Time&nbspCommitment&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input type="text" required class="form-control" id="tc" name="tc" placeholder="Number of hours per month" required>
                                                                                                    <p class="tc_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group row add ">
                                                                                                <label class="control-label col-sm-4 pt-2" for="sdow"> Suitable days of week&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input type="text" required class="form-control" id="sdow" name="sdow" placeholder="Enter here" required>
                                                                                                    <p class="sdow_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group row add">
                                                                                                <label class="control-label col-sm-4 pt-2" for="st"> Suitable&nbspTime&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input type="text" required class="form-control" id="st" name="st" placeholder="Enter here" required>
                                                                                                    <p class="st_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </section>
                                                                                        <ul class="list-inline pull-right">
                                                                                            <li><button type="button" onclick="showtab('step4')" class="btn btn-default prev-step">Previous</button></li>
                                                                                            <li><button type="button" onclick="showtab('complete')" id="submit_step5" class="btn btn-primary btn-info-full next-step">Next</button></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="tab-pane pt-3" id="complete">
                                                                                        <h3>Social Profile</h3>
                                                                                        <p>Please share your profile with us</p>
                                                                                        <section>
                                                                                            <div class="form-group row add">
                                                                                                <label class="control-label col-sm-4 pt-2" for="LI">Linked&nbspin&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input type="text" required class="form-control" id="LI" name="LI" placeholder="Number of hours per month" required>
                                                                                                    <p class="LI_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group row add ">
                                                                                                <label class="control-label col-sm-4 pt-2" for="fb">Facebook&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input type="text" required class="form-control" id="fb" name="fb" placeholder="Enter here" required>
                                                                                                    <p class="fb_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group row add">
                                                                                                <label class="control-label col-sm-4 pt-2" for="twitter">Twitter&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input type="text" required class="form-control" id="twitter" name="twitter" placeholder="Enter here" required>
                                                                                                    <p class="twitter_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </section>
                                                                                        <ul class="list-inline pull-right">
                                                                                            <p class="addmentor_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                            
                                                                                            <li><button type="button" onclick="showtab('step5')" class="btn btn-default prev-step">Previous</button>
                                                                                                <button type="button" id="msubmit"  class="btn mentor_modal_button btn-primary hidden">Submit</button>
                                                                                                <button type="button" id="mspinner"  class="btn mentor_modal_button btn-primary hidden"><i class="fa fa-spinner"></i> Pls Wait...</button>
                                                                                                <button type="button" id="mupdate"  class="btn mentor_modal_button btn-primary hidden">Update</button>
                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
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
        $("#form2 :input").prop("disabled", true);
        $("#form2 :button").prop("disabled", false);

        clear();
        
        showtab('step1');
        $('input[name=mname').val('{{$mentor[0]->name}}');
        $('select[name=mgender]').val('{{$mentor[0]->gender}}');
        $('input[name=mmobile]').val('{{$mentor[0]->mobile}}');
        $('input[name=tel_no_office]').val('{{$mentor[0]->telephone_office}}');
        $('input[name=tel_no_home]').val('{{$mentor[0]->telephone_home}}');
        $('input[name=mdob]').val('{{$mentor[0]->dob}}');
        $('input[name=memail]').val('{{$mentor[0]->email}}');
        $('input[name=Address]').val('{{$mentor[0]->address}}');
        $('input[name=mcompany_name]').val('{{$mentor[0]->company_name}}');
        $('input[name=mdesignation]').val('{{$mentor[0]->designation}}');
            
        $('textarea[name=about_you]').val('{{$mentor[0]->about_you}}');
        $('textarea[name=primary_and_secondary_objectives]').val('{{$mentor[0]->primary_and_secondary_objectives}}');
        $('select[name=mprofessional_expertise]').val('{{$mentor[0]->professional_expertise}}');
        $('select[name=mindustry_experience]').val('{{$mentor[0]->industry_vertical_experience}}');
        $('select[name=marea]').val('{{$mentor[0]->areas_of_business_and_management_competence}}');
        $('input[name=tc]').val('{{$mentor[0]->time_commitment}}');
        $('input[name=sdow]').val('{{$mentor[0]->days_of_week}}');
        $('input[name=st]').val('{{$mentor[0]->suitable_time}}');
            
        $('input[name=LI]').val('{{$mentor[0]->linked_in}}');
        $('input[name=fb]').val('{{$mentor[0]->facebook}}');
        $('input[name=twitter]').val('{{$mentor[0]->twitter}}');

        $('.mentor_modal_button').addClass('hidden');
      
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
               url : '/add/mentor',
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
                       $("#msg").text("Mentor Successfully Added");
                       updatelist();
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
        alert("s");
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


