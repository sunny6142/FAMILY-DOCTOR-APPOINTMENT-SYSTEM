@extends('layouts.admin_header')


@section('content')
    <div class="container">
        <div class="row">
                <section  class="w-100 p-3" >
                    <div class="wizard"style = "max-width: 900px">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">

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
                        <form role="form" id="form2" class="w-95" style = "max-width: 600px; margin: 0 auto;">
                            <div class="tab-content">
                                <div class="border err_toggle border-danger text-success p-1 pl-4 mt-2 hidden" id="msg"></div>
                                <div class="tab-pane active" id="step1">
                                    <h3>User Basic Detail</h3>
                                    <section>
                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4 pt-2" for="sname">Name :</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $startup[0]->name }}"  readonly >
                                            </div>
                                        </div>
                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4 pt-2" for="sname">Email :</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="email" name="email" value="{{ $startup[0]->email }}"  readonly >
                                            </div>
                                        </div>
                                    </section>
                                    <h3>Startup Detail</h3>
                                    <!--- ---- -->
                                    <section>
                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4 pt-2" for="sname">Start Up Name :</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sname" name="sname" value="{{ $startup[0]->start_up_name }}" placeholder="Enter Your StartUp Name" readonly >
                                                <p class="sname_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-4 pt-1" for="student_fee">Nature of Startup :</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="nature_of_startup" id="nature_of_startup" style="height: unset;" >
                                                    <option id="val"> </option>
                                                    @foreach ($nature_of_startup as $value)
                                                        <option id="val" value ='{{$value->id}}' @if($value->id == $startup[0]->nature_of_startup) selected @endif readonly> {{$value->nature}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-4 pt-1" for="industry">Start Up Industry :</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="industry" id="industry" style="height: unset;" >
                                                    <option id="val"> </option>
                                                    @foreach ($industry as $ind)
                                                        <option id="val" value = '{{$ind->id}}' @if($ind->id == $startup[0]->industry) selected @endif > {{$ind->industry}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-4 pt-1" for="categories">Category :</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="categories" id="categories" style="height: unset;" >
                                                    <option id="val"> </option>
                                                    @foreach ($categories as $cat)
                                                        <option id="val" value = '{{$cat->id}}' @if($cat->id == $startup[0]->categorie) selected @endif > {{$cat->categories}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4 pt-2" for="Address">Office Address :</label>
                                            <div class="col-sm-8">
                                                <input type="text"  class="form-control" id="Address" name="Address" placeholder="Enter Your StartUp Name" value="{{ $startup[0]->office_address }}" >
                                                <p class="Address_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4 pt-2" for="numberoffounder">Number Of Founder :</label>
                                            <div class="col-sm-8">
                                                <input type="text"  class="form-control" id="numberoffounder" name="numberoffounder" placeholder="Enter Number Founder Your Start Up Has" value="{{ $startup[0]->no_of_founders }}" >
                                                <p class="numberoffounder_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>
                                    </section>
                                    <!----- ---- -->
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-primary" id="submit_step1" >Next Step</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="step2">
                                    <h3>Founder Details </h3>
                                    <section>
                                    @foreach($founders as $founder)
                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4 pt-2" for="numberoffounder">Name Of Founder :</label>
                                            <div class="col-sm-8">
                                                <input type="text"  class="form-control" id="numberoffounder" name="numberoffounder" placeholder="Enter Number Founder Your Start Up Has" value="{{ $founder->name }}" >
                                            </div>
                                        </div>
                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4 pt-2" for="numberoffounder">Designation</label>
                                            <div class="col-sm-8">
                                                <input type="text"  class="form-control" id="designation" name="designation" value="{{ $founder->designation }}" >
                                            </div>
                                        </div>
                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4 pt-2" for="numberoffounder">Contact</label>
                                            <div class="col-sm-8">
                                                <input type="text"  class="form-control" id="contact" name="contact" value="{{ $founder->contact }}" >
                                            </div>
                                        </div>

                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4 pt-2" for="numberoffounder">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="email_id" name="email_id"  value="{{ $founder->email_id }}" >
                                            </div>
                                        </div>
                                            <div class="form-group row add">
                                                <label class="control-label col-sm-4 pt-2" for="numberoffounder">Qualification</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="email_id" name="email_id"  value="{{ $founder->qualification }}" >
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    </section>
                                    <ul class="list-inline pull-right">
                                         <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                        <li><button type="button" id="submit_step2" class="btn btn-primary">Next</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="step3">
                                    <section>
                                        <h3>Basic information about Startup</h3>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4 pt-2" for="logo">Logo :</label>
                                            <div class="col-sm-8">
                                                <div style="overflow:hidden;"> <label class="btn btn-warning"> Upload
                                                        <input type="file" id="logo" name="logo" class="btn btn-warning hidden" onchange="readURL(this,'image_id_logo');"></label><br><br>
                                                    <p class="file_C text-center alert alert-danger hidden"></p>
                                                    <img id="image_id_logo" src="#"  hidden/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-8" for="cne">Current number of employees (including founders) :</label><br>
                                            <div class="col-sm-12">
                                                <input type="text" style="width: 100%;float: right; max-width: 300px;"  class="form-control" id="cne" name="cne" placeholder="Enter number of employees here"  >
                                                <p class="cne_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-8" for="current_stage_of_development">What is the current stage of development of your product / service? :</label><br>

                                            <div class="col-sm-12">
                                                <select class="form-control" style="width: 100%; float: right; max-width: 300px; height: inherit;" name="current_stage_of_development" id="current_stage_of_development" >
                                                    <option id="val"> </option>
                                                    @foreach ($start_up_stage as $start_up_s)
                                                        <option id="val" value = '{{$start_up_s->id}}'> {{$start_up_s->stage}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-8" for="iprval">Has your startup applied for any IPR (Intellectual Property Right):</label><br>

                                            <div class="col-sm-12">
                                                <select class="form-control" style="width: 100%; float: right; max-width: 300px; height: inherit;" name="iprval" id="iprval" >
                                                    <option id="val"> </option>
                                                    @foreach ($yn as $ynv)
                                                        <option id="val" value = '{{$ynv->id}}'> {{$ynv->val}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">Sr. No</th>
                                                    <th scope="col" class="text-center">Applied For</th>
                                                    <th scope="col" class="text-center">Registered/Granted</th>
                                                    <th scope="col" class="text-center">Application No.</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($ipr_val as $iprval)
                                                    <tr>
                                                        <th scope="row" class="text-center tb">{{ $iprval->ipr }}</th>
                                                        <input type="hidden" name="ipr_id[]" value="{{ $iprval->id }}" class="text-center tb"/>
                                                        <td>
                                                            <input type="text" name="applied_for[]" class="text-center tb"/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="registered[]" class="text-center tb"/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="application_no[]" class="text-center tb"/>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-8" for="innovative_p">Is the startup creating an  product / service / process or improving an existing product / service / process:</label><br>

                                            <div class="col-sm-12">
                                                <select class="form-control" style="width: 100%; float: right; max-width: 300px; height: inherit;" name="innovative_p" id="innovative_p" >
                                                    <option id="val"> </option>
                                                    @foreach ($yn as $ynv2)
                                                        <option id="val" value = '{{$ynv2->id}}'> {{$ynv2->val}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-4 mb-4">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">Title </th>
                                                    <th scope="col" class="text-center">Innovative</th>
                                                    <th scope="col" class="text-center">Improvement</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($innovative_val as $i_val)
                                                    <tr>
                                                        <th scope="row" class="text-center tb">{{ $i_val->Inno_val_ }}</th>

                                                        <input type="hidden" name="ino_id[]" value="{{ $i_val->id }}" class="text-center tb"/>

                                                        <td>
                                                            <input type="text" name="innovative_v[]" class="text-center tb"/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="improvement_v[]" class="text-center tb"/>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div>
                                    </section>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                        <li><button type="button" id="submit_step3" class="btn btn-primary btn-info-full next-step">Next</button></li>
                                    </ul>
                                </div>

                                <div class="tab-pane" id="step4">
                                    <h3>Detailed startup activities </h3>
                                    <section>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12" for="about_your_startup">Few words about your startup  (250 words maximum)</label><br>
                                            <div class="col-sm-12">
                                                <textarea row="4" type="text" class="form-control" id="about_your_startup" name="about_your_startup" placeholder="Enter here"  ></textarea>
                                                <p class="noe_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12" for="problem_solving">What is the problem the startup is solving? (250 words maximum)</label><br>
                                            <div class="col-sm-12">
                                                <textarea row="4" type="text" class="form-control" id="problem_solving" name="problem_solving" placeholder="Enter here" >{{ $startup[0]->problem }}</textarea>
                                                <p class="noe_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-12" for="propose_solving_problem">How does your startup propose to solve this problem? (250 words maximum)</label><br>
                                            <div class="col-sm-12">
                                                <textarea row="4" type="text" class="form-control" id="propose_solving_problem" name="propose_solving_problem" placeholder="Enter here" >{{ $startup[0]->solution }}</textarea>
                                                <p class="noe_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-12" for="uniqueness">What is the uniqueness/innovation of your solution? (250 words maximum)</label><br>
                                            <div class="col-sm-12">
                                                <textarea row="4" type="text" class="form-control" id="uniqueness" name="uniqueness" placeholder="Enter here" >{{ $startup[0]->uniqueness }}</textarea>
                                                <p class="noe_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-12" for="generate_revenue">How does your startup generate revenue? (250 words maximum)</label><br>
                                            <div class="col-sm-12">
                                                <textarea row="4" type="text" class="form-control" id="generate_revenue" name="generate_revenue" placeholder="Enter here" >{{ $startup[0]->revenue_method }}</textarea>
                                                <p class="noe_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-12" for="competitors">Who are your competitors? (Direct/Indirect competitors)</label><br>
                                            <div class="col-sm-12">
                                                <textarea row="4" type="text" class="form-control" id="competitors" name="competitors" placeholder="Enter here" >{{ $startup[0]->competitors }}</textarea>
                                                <p class="noe_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>
                                    </section>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>

                                        <li><button type="button" id="submit_step4" class="btn btn-primary btn-info-full next-step">Next</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="step5">
                                    <h3>step5</h3>
                                    <p>You have successfully completed all steps.</p>
                                    <section>
                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4 pt-2" for="revenue_any"> Revenue (if any) :</label>
                                            <div class="col-sm-8">
                                                <input type="text"  class="form-control" id="revenue_any" name="revenue_any" placeholder="Enter here" value="{{ $startup[0]->revenue }}" >
                                                <p class="revenue_any_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row add">
                                            <label class="control-label col-sm-12 pt-2" for="Incubator_name"> Where have you been incubated?</label>
                                        </div>

                                        <div class="form-group row add">
                                            <label class="control-label col-sm-4 pt-2" for="Incubator_name"> Name of Incubator :</label>
                                            <div class="col-sm-8">
                                                <input type="text"  class="form-control" id="Incubator_name" name="Incubator_name" placeholder="Enter here"  value="{{ $startup[0]->name_of_incubator }}" >
                                                <p class="revenue_any_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row add ">
                                            <label class="control-label col-sm-4 pt-2" for="incubation_date"> Date of incubation :</label>
                                            <div class="col-sm-8">
                                                <input type="text"  class="form-control" id="incubation_date" name="incubation_date" placeholder="Enter here"  value="{{ $startup[0]->date_of_incubator }}" >
                                                <p class="revenue_any_error text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>

                                    </section>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                        {{--<li><button type="button" class="btn btn-default next-step">Skip</button></li>--}}
                                        <li><button type="button" id="submit_step5" class="btn btn-primary btn-info-full next-step">Next</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="complete">
                                    <h3>Complete</h3>
                                    <p>You have successfully completed all steps.</p>
                                    <section>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-6 pt-1" for="know_about_us">How do you come to know about us ? :</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="know_about_us" id="know_about_us" style="height: unset;" >
                                                    <option id="val"> </option>
                                                    @foreach ($know_about_us as $know_)
                                                        <option id="val" value = '{{$know_->id}}' @if($know_->id = $startup[0]->how_know_about_us) selected @endif> {{$know_->ways}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </section>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                        {{--<li><button type="button" id="submit_step6" class="btn btn-primary">Save and Complete</button></li>--}}
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </section>
        </div>
    </div>

    <script>
        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                $('#'+id).removeAttr("hidden");
                reader.onload = function (e) {
                    $('#'+id)
                            .attr('src', e.target.result)
                            .width(150)
                            .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        /*function clear()
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
        }*/
        //Show add mentor
        $(document).ready(function(){
            $("#form2 :input").prop("disabled", true);
            $("#form2 :button").prop("disabled", false);
            showtab('step1');
        })

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

        })

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

        function showtab2(id)
        {
            if(id == 'step1'){
                $('#step1').addClass('active show')
            }  else {
                $('#step1').removeClass('active show')
            }

            if(id == 'step2'){
                alert("a");
                $('#sp2').addClass('active show')
            }  else {
                $('#step2').removeClass('active show')
            }


            if(id == 'step3'){
                $('#step3').addClass('active show')
            }  else {
                $('#step3').removeClass('active show')
            }

            if(id == 'step4'){
                $('#step4').addClass('active show')
            }  else {
                $('#step4').removeClass('active show')
            }

            if(id == 'step5'){
                $('#step5').addClass('active show')
            }  else {
                $('#step5').removeClass('active show')
            }

            if(id == 'complete'){
                $('#complete').addClass('active show')
            }  else {
                $('#complete').removeClass('active show')
            }
        }
    </script>
    <script>
        $(document).ready(function(){
            $("#submit_step1").click(function() {
                showtab("step2");
            });
        })
    </script>
    <script>
        $(document).ready(function(){
            $("#submit_step2").click(function() {
                showtab("step3");
            });
        })
    </script>
    <script>
        $(document).ready(function(){
            $("#submit_step2").click(function() {
                showtab("step4");
            });
        })
    </script>
    <script>
        $(document).ready(function(){
            $("#submit_step4").click(function() {
                showtab("step5");
            });
        })
    </script>
    <script>
        $(document).ready(function(){
            $("#submit_step5").click(function() {
                showtab("complete");
            });
        })
    </script>
@endsection
