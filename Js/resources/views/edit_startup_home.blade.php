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
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <i class="icofont icofont-file-code bg-c-blue"></i>
                                    <div class="d-inline">
                                        <h4>Start Up info</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                            <!-- Add start data ----- --> 
                                <div class="" id="add_mentor_model_dialog" tabindex="-1" role="">
                                    <div class="modal-md " role="document" style="width: auto;">
                                        <div class="">
                                            <div class="row">
                                                
                                                    <div class="modal-body pt-0" >
                                                        <div class="wizard m-0">
                                                            <div class="wizard-inner">
                                                                <div class="connecting-line"></div>
                                                                <ul class="nav nav-tabs mt-4" role="tablist">

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
                                                                    <div class="tab-pane active" id="step1">
                                                                        <h3>Startup Form</h3>
                                                                        
                                                                        <!--- ---- -->
                                                                            <section>
                                                                                <div class="form-group row add">
                                                                                    <label class="control-label col-sm-4 pt-2" for="sname">Start Up Name :</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" required class="form-control" id="sname" name="sname" placeholder="Enter Your StartUp Name" required>
                                                                                        <p class="sname_error err text-center alert alert-danger hidden"></p>
                                                                                    </div>
                                                                                </div>
                                                                                                            
                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-4 pt-1" for="nature_of_startup">Nature of Startup :</label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control" name="nature_of_startup" id="nature_of_startup" style="height: unset;" required>
                                                                                        <option id="val"> </option>
                                                                                            @foreach ($nature_of_startup as $value)
                                                                                                <option id="val" value = '{{$value->id}}'> {{$value->nature}} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <p class="nos_error err text-center alert alert-danger hidden"></p>
                                                                                    
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-4 pt-1" for="industry">Start Up Industry :</label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control" name="industry" id="industry" style="height: unset;" required>
                                                                                        <option id="val"> </option>
                                                                                            @foreach ($industry as $ind)
                                                                                                <option id="val" value = '{{$ind->id}}'> {{$ind->industry}} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <p class="industry_error err text-center alert alert-danger hidden"></p>
                                                                                    
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="control-label col-sm-4 pt-1" for="categories">Categorie :</label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control" name="categories" id="categories" style="height: unset;" required>
                                                                                        <option id="val"> </option>
                                                                                            @foreach ($categories as $cat)
                                                                                                <option id="val" value = '{{$cat->id}}'> {{$cat->categories}} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <p class="categories_error err text-center alert alert-danger hidden"></p>
                                                                                    
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row add">
                                                                                    <label class="control-label col-sm-4 pt-2" for="Address">Office Address :</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" required class="form-control" id="Address" name="Address" placeholder="Enter Your StartUp Name" required>
                                                                                        <p class="Address_error err text-center alert alert-danger hidden"></p>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row add">
                                                                                    <label class="control-label col-sm-4 pt-2" for="numberoffounder">Number Of Founder :</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" required class="form-control" id="numberoffounder" name="numberoffounder" placeholder="Enter Number Founder Your Start Up Has" required>
                                                                                        <p class="numberoffounder_error err text-center alert alert-danger hidden"></p>
                                                                                    </div>
                                                                                </div>
                                                                            </section>
                                                                        <!----- ---- -->
                                                                            
                                                                        <ul class="list-inline pull-right">
                                                                            <li><button type="button" class="btn btn-primary" id="submit_step1" >Save and continue</button></li>
                                                                            
                                                                        </ul>
                                                                    </div>
                                                                    <div class="tab-pane" id="step2">
                                                                        <h3>Founder Details </h3>
                                                                        <!-- <p>This is step 2</p> -->
                                                                        <section id="innerstep2"></section>
                                                                            <script>
                                                                                
                                                                                    function showstep2() {
                                                                                        showtab("step2");
                                                                                        var i = 0; 
                                                                                        var n = 0;

                                                                                        n = $('#numberoffounder').val();

                                                                                        @foreach($founders as $fou)
                                                                                            $("#innerstep2").append('<p>Founder '+ (+i + +1) +' </p><div class="form-group row">' + 
                                                                                                '<label class="control-label col-sm-4 pt-2" for="fname">Name Of Founder :</label>' +
                                                                                                '<div class="col-sm-8">' +
                                                                                                    '<input type="text" required class="form-control" id="fname" name="fname[]" placeholder="Enter Name here" value = "{{$fou->name}}">'+
                                                                                                    '<p class="name_error text-center alert alert-danger hidden"></p>'+
                                                                                                '</div>' +
                                                                                            '</div>' +
                                                                                            '<div class="form-group row">' +
                                                                                                '<label class="control-label col-sm-4 pt-2" for="fdesignation">Designation :</label>' +
                                                                                                '<div class="col-sm-8">' +
                                                                                                    '<input type="text" required class="form-control" id="fdesignation" name="fdesignation[]" placeholder="Enter Designation here" value = "{{$fou->designation}}">' +
                                                                                                    '<p class="fdesignation_error text-center alert alert-danger hidden"></p>' +
                                                                                                '</div>' +
                                                                                            '</div>' +
                                                                                            '<div class="form-group row">' +
                                                                                                '<label class="control-label col-sm-4 pt-2" for="fmobile">Mobile no :</label>' +
                                                                                                '<div class="col-sm-8">' +
                                                                                                    '<input type="text" required class="form-control" id="fmobile" name="fmobile[]" placeholder="Enter Mobile no. here" value = "{{$fou->contact}}">' +
                                                                                                    '<p class="fmobile_error text-center alert alert-danger hidden"></p>' +
                                                                                                '</div>' +
                                                                                            '</div>' +
                                                                                            
                                                                                            '<div class="form-group row">' +
                                                                                            ' <label class="control-label col-sm-4 pt-2" for="femail">Email Id :</label>' +
                                                                                                '<div class="col-sm-8">' +
                                                                                                    '<input type="text" required class="form-control" id="femail" name="femail[]" placeholder="Enter Email Id here" value = "{{$fou->email_id}}">' +
                                                                                                    '<p class="femail_error text-center alert alert-danger hidden"></p>' +
                                                                                                '</div>' +
                                                                                            '</div>' +
                                                                                            '<div class="form-group row">' +
                                                                                                '<label class="control-label col-sm-4 pt-1" for="fqualification">Education Qualification :</label>' +
                                                                                                '<div class="col-sm-8">' +
                                                                                                    '<select class="form-control" name="fqualification[]" id="fqualification" style="height: unset;" >' +
                                                                                                    '<option id="val">  </option>' +
                                                                                                        @foreach ($qualification as $qual)
                                                                                                            
                                                                                                            '<option id="val" <?php if($fou->qualification == $qual->id){echo("selected");}?> value = {{$qual->id}}> {{$qual->qualification}} </option>' +
                                                                                                            
                                                                                                        @endforeach
                                                                                                    '</select>' +
                                                                                                '</div>' +
                                                                                            '</div>');
                                                                                            i++;                                                                   
                                                                                        @endforeach
                                                                                    }
                                                                            </script>
                                                                        <ul class="list-inline pull-right">
                                                                            <!-- <li><button type="button" class="btn btn-default prev-step">Previous</button></li> -->
                                                                            <li><button type="button" id="submit_step2" class="btn btn-primary">Save and continue</button></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="tab-pane" id="step3">
                                                                        <section>
                                                                            <h3>Basic information about Startup</h3>
                                                                            <!--<p>This is step 3</p> -->
                                                                            <div class="form-group row">
                                                                                <label class="control-label col-sm-4 pt-2" for="logo">Logo :</label>
                                                                                <div class="col-sm-8">
                                                                                    <div style="overflow:hidden;"> <label class="btn btn-warning"> Upload
                                                                                        <input type="file" id="logo" name="logo" class="btn btn-warning hidden" onchange="readURL(this,'image_id_logo');"></label><br><br>
                                                                                        <p class="file_C err text-center alert alert-danger hidden"></p>
                                                                                        <img id="image_id_logo" src="#"  hidden/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                    <label class="control-label col-sm-8" for="cne">Current number of employees (including founders) :</label><br>
                                                                                    <div class="col-sm-12">
                                                                                        <input type="text" style="width: 100%;float: right; max-width: 300px;" required class="form-control" id="cne" name="cne" placeholder="Enter number of employees here" required>
                                                                                        <p style="margin-top: 40px;" class="cne_error err text-center alert alert-danger hidden"></p>
                                                                                    </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                    <label class="control-label col-sm-8" for="current_stage_of_development">What is the current stage of development of your product / service? :</label><br>
                                                                                    
                                                                                    <div class="col-sm-12">
                                                                                        <select class="form-control" style="width: 100%; float: right; max-width: 300px; height: inherit;" name="current_stage_of_development" id="current_stage_of_development" required>
                                                                                        <option id="val"> </option>
                                                                                            @foreach ($start_up_stage as $start_up_s)
                                                                                                <option id="val" value = '{{$start_up_s->id}}'> {{$start_up_s->stage}} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <p style="margin-top: 40px;" class="stage_error err text-center alert alert-danger hidden"></p>
                                                                                  
                                                                                    </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                    <label class="control-label col-sm-8" for="iprval">Has your startup applied for any IPR (Intellectual Property Right):</label><br>
                                                                                    
                                                                                    <div class="col-sm-12">
                                                                                        <select class="form-control" style="width: 100%; float: right; max-width: 300px; height: inherit;" name="iprval" id="iprval" required>
                                                                                        <option id="val"> </option>
                                                                                            @foreach ($yn as $ynv)
                                                                                                <option id="val" value = '{{$ynv->id}}'> {{$ynv->val}} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <p style="margin-top: 40px;" class="ipr_error err text-center alert alert-danger hidden"></p>
                                                                                  
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
                                                                                                    <input type="text" name="applied_for[]" value="{{ $iprval->applied_for }}" class="text-center tb"/>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" name="registered[]" value="{{ $iprval->registered_granted }}" class="text-center tb"/>
                                                                                                </td>
                                                                                                <td> 
                                                                                                    <input type="text" name="application_no[]" value="{{ $iprval->application_no }}" class="text-center tb"/>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                    <label class="control-label col-sm-8" for="innovative_p">Is the startup creating an  product / service / process or improving an existing product / service / process:</label><br>
                                                                                    
                                                                                    <div class="col-sm-12">
                                                                                        <select class="form-control" style="width: 100%; float: right; max-width: 300px; height: inherit;" name="innovative_p" id="innovative_p" required>
                                                                                        <option id="val"> </option>
                                                                                            @foreach ($yn as $ynv2)
                                                                                                <option id="val" value = '{{$ynv2->id}}'> {{$ynv2->val}} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <p style="margin-top: 40px;" class="inn_error err text-center alert alert-danger hidden"></p>
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
                                                                                                    <input type="text" name="innovative_v[]" value="{{ $i_val->innovative }}" class="text-center tb"/>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" name="improvement_v[]" value="{{ $i_val->improvement }}" class="text-center tb"/>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            <div>
                                                                        </section>        
                                                                        <ul class="list-inline pull-right">
                                                                            <!--<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>-->
                                                                            <li><button type="button" id="submit_step3" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="tab-pane" id="step4">
                                                                        <h3>Detailed startup activities </h3>
                                                                        <!--<p>This is step 4</p> -->
                                                                        <section>
                                                                            <div class="form-group row">
                                                                                    <label class="control-label col-sm-12" for="about_your_startup">Few words about your startup  (250 words maximum)</label><br>
                                                                                    <div class="col-sm-12">
                                                                                        <textarea row="4" type="text" class="form-control" id="about_your_startup" name="about_your_startup" placeholder="Enter here" required></textarea>
                                                                                        <p class="fwas_error err text-center alert alert-danger hidden"></p>
                                                                                    </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                    <label class="control-label col-sm-12" for="problem_solving">What is the problem the startup is solving? (250 words maximum)</label><br>
                                                                                    <div class="col-sm-12">
                                                                                        <textarea row="4" type="text" class="form-control" id="problem_solving" name="problem_solving" placeholder="Enter here" required></textarea>
                                                                                        <p class="ptsis_error err text-center alert alert-danger hidden"></p>
                                                                                    </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                    <label class="control-label col-sm-12" for="propose_solving_problem">How does your startup propose to solve this problem? (250 words maximum)</label><br>
                                                                                    <div class="col-sm-12">
                                                                                        <textarea row="4" type="text" class="form-control" id="propose_solving_problem" name="propose_solving_problem" placeholder="Enter here" required></textarea>
                                                                                        <p class="hyptspp_error err text-center alert alert-danger hidden"></p>
                                                                                    </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                    <label class="control-label col-sm-12" for="uniqueness">What is the uniqueness/innovation of your solution? (250 words maximum)</label><br>
                                                                                    <div class="col-sm-12">
                                                                                        <textarea row="4" type="text" class="form-control" id="uniqueness" name="uniqueness" placeholder="Enter here" required></textarea>
                                                                                        <p class="uni_error err text-center alert alert-danger hidden"></p>
                                                                                    </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                    <label class="control-label col-sm-12" for="generate_revenue">How does your startup generate revenue? (250 words maximum)</label><br>
                                                                                    <div class="col-sm-12">
                                                                                        <textarea row="4" type="text" class="form-control" id="generate_revenue" name="generate_revenue" placeholder="Enter here" required></textarea>
                                                                                        <p class="hdysgr_error err text-center alert alert-danger hidden"></p>
                                                                                    </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                    <label class="control-label col-sm-12" for="competitors">Who are your competitors? (Direct/Indirect competitors)</label><br>
                                                                                    <div class="col-sm-12">
                                                                                        <textarea row="4" type="text" class="form-control" id="competitors" name="competitors" placeholder="Enter here" required></textarea>
                                                                                        <p class="wayc_error err text-center alert alert-danger hidden"></p>
                                                                                    </div>
                                                                            </div>
                                                                        </section>
                                                                        <ul class="list-inline pull-right">
                                                                            <!--<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>-->
                                                                            <li><button type="button" id="submit_step4" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                                                        </ul>
                                                                    </div> 
                                                                    <div class="tab-pane" id="step5">
                                                                        <h3>step5</h3>
                                                                        <!--<p>You have successfully completed all steps.</p>-->
                                                                        <section>
                                                                            <div class="form-group row add">
                                                                                <label class="control-label col-sm-4 pt-2" for="revenue_any"> Revenue (if any) :</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" required class="form-control" id="revenue_any" name="revenue_any" placeholder="Enter here" required>
                                                                                    <p class="revenue_any_error err text-center alert alert-danger hidden"></p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row add">
                                                                                <label class="control-label col-sm-12 pt-2" for="Incubator_name"> Where have you been incubated?</label>
                                                                            </div>

                                                                            <div class="form-group row add">
                                                                                <label class="control-label col-sm-4 pt-2" for="Incubator_name"> Name of Incubator :</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" required class="form-control" id="Incubator_name" name="Incubator_name" placeholder="Enter here" required>
                                                                                    <p class="Incubator_name_any_error err text-center alert alert-danger hidden"></p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row add ">
                                                                                <label class="control-label col-sm-4 pt-2" for="incubation_date"> Date of incubation :</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date" required class="form-control" id="incubation_date" name="incubation_date" placeholder="Enter here" required>
                                                                                    <p class="incubation_date_any_error err text-center alert alert-danger hidden"></p>
                                                                                </div>
                                                                            </div>
                                                                                
                                                                        </section>
                                                                        <ul class="list-inline pull-right">
                                                                           <!-- <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>-->
                                                                            <li><button type="button" id="submit_step5" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="tab-pane" id="complete">
                                                                        <h3>Complete</h3>
                                                                        <p>You have successfully completed all steps.</p>
                                                                        <section>
                                                                                                
                                                                            <div class="form-group row">
                                                                                <label class="control-label col-sm-6 pt-1" for="know_about_us">How do you come to know about us ? :</label>
                                                                                <div class="col-sm-6">
                                                                                    <select class="form-control" name="know_about_us" id="know_about_us" style="height: unset;" required>
                                                                                        <option id="val"> </option>
                                                                                        @foreach ($know_about_us as $know_)
                                                                                            <option id="val" value = '{{$know_->id}}'> {{$know_->ways}} </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <p class="know_about_us_any_error err text-center alert alert-danger hidden"></p>
                                                                              
                                                                                </div>
                                                                            </div>
                                                                        </section>
                                                                        <ul class="list-inline pull-right">
                                                                                <li><button type="button" id="submit_step6" class="btn btn-primary">Save and Complete</button></li>
                                                                                <li><a href="/request/mentor" id="lreq" class="btn btn-warning hidden">Request Mentor</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="border err_toggle border-danger text-success p-1 pl-4 mt-2 mb-3 hidden" id="msg"></div>
                                                                        
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){     
        
        $('input[name=sname').val('{{$start_up_info[0]->start_up_name}}');

        $('select[name=nature_of_startup').val('{{$start_up_info[0]->nature_of_startup}}');
 
        $('select[name=industry]').val('{{$start_up_info[0]->industry}}');
        
        $('select[name=categories]').val('{{$start_up_info[0]->categorie}}');
        $('input[name=Address]').val('{{$start_up_info[0]->office_address}}');
    
        $('input[name=numberoffounder]').val('{{$start_up_info[0]->no_of_founders}}');
        
        var i = 0;
        @foreach($founders as $fou)
        $("#innerstep2").append('<p>Founder '+ (+i + +1) +' </p><div class="form-group row">' + 
                                                                                                '<label class="control-label col-sm-4 pt-2" for="fname">Name Of Founder :</label>' +
                                                                                                '<div class="col-sm-8">' +
                                                                                                    '<input type="text" required class="form-control" id="fname" name="fname[]" placeholder="Enter Name here" value = "{{$fou->name}}">'+
                                                                                                    '<p class="name_error text-center alert alert-danger hidden"></p>'+
                                                                                                '</div>' +
                                                                                            '</div>' +
                                                                                            '<div class="form-group row">' +
                                                                                                '<label class="control-label col-sm-4 pt-2" for="fdesignation">Designation :</label>' +
                                                                                                '<div class="col-sm-8">' +
                                                                                                    '<input type="text" required class="form-control" id="fdesignation" name="fdesignation[]" placeholder="Enter Designation here" value = "{{$fou->designation}}">' +
                                                                                                    '<p class="fdesignation_error text-center alert alert-danger hidden"></p>' +
                                                                                                '</div>' +
                                                                                            '</div>' +
                                                                                            '<div class="form-group row">' +
                                                                                                '<label class="control-label col-sm-4 pt-2" for="fmobile">Mobile no :</label>' +
                                                                                                '<div class="col-sm-8">' +
                                                                                                    '<input type="text" required class="form-control" id="fmobile" name="fmobile[]" placeholder="Enter Mobile no. here" value = "{{$fou->contact}}">' +
                                                                                                    '<p class="fmobile_error text-center alert alert-danger hidden"></p>' +
                                                                                                '</div>' +
                                                                                            '</div>' +
                                                                                            
                                                                                            '<div class="form-group row">' +
                                                                                            ' <label class="control-label col-sm-4 pt-2" for="femail">Email Id :</label>' +
                                                                                                '<div class="col-sm-8">' +
                                                                                                    '<input type="text" required class="form-control" id="femail" name="femail[]" placeholder="Enter Email Id here" value = "{{$fou->email_id}}">' +
                                                                                                    '<p class="femail_error text-center alert alert-danger hidden"></p>' +
                                                                                                '</div>' +
                                                                                            '</div>' +
                                                                                            '<div class="form-group row">' +
                                                                                                '<label class="control-label col-sm-4 pt-1" for="fqualification">Education Qualification :</label>' +
                                                                                                '<div class="col-sm-8">' +
                                                                                                    '<select class="form-control" name="fqualification[]" id="fqualification" style="height: unset;" >' +
                                                                                                    '<option id="val">  </option>' +
                                                                                                        @foreach ($qualification as $qual)
                                                                                                            
                                                                                                            '<option id="val" <?php if($fou->qualification == $qual->id){echo("selected");}?> value = {{$qual->id}}> {{$qual->qualification}} </option>' +
                                                                                                            
                                                                                                        @endforeach
                                                                                                    '</select>' +
                                                                                                '</div>' +
                                                                                            '</div>');
                     i++;                                                                   
        @endforeach

        var v = "public/images" + "{{$start_up_info[0]->logo}}";
        $('#image_id_logo')
                        .attr('src', '{{asset('')}}' + v)
                        .width(150)
                        .height(200);
        $('input[name=cne]').val('{{$start_up_info[0]->number_of_employees}}');
    
        $('select[name=current_stage_of_development]').val('{{$start_up_info[0]->current_stage}}');
        $('select[name=iprval]').val('{{$start_up_info[0]->ipr_status}}');
        $('select[name=innovative_p]').val('{{$start_up_info[0]->innovative_status}}');
        
        $('textarea[name=about_your_startup]').val('{{$start_up_info[0]->about_your_startup}}');
        
        $('textarea[name=problem_solving]').val('{{$start_up_info[0]->problem}}');
        $('textarea[name=propose_solving_problem]').val('{{$start_up_info[0]->solution}}');
        $('textarea[name=uniqueness]').val('{{$start_up_info[0]->uniqueness}}');
        $('textarea[name=generate_revenue]').val('{{$start_up_info[0]->revenue_method}}');
        $('textarea[name=competitors]').val('{{$start_up_info[0]->competitors}}');
        
        $('input[name=revenue_any]').val('{{$start_up_info[0]->revenue}}');
        $('input[name=Incubator_name]').val('{{$start_up_info[0]->name_of_incubator}}');
        $('input[name=incubation_date]').val('{{$start_up_info[0]->date_of_incubator}}');
        
        $('select[name=know_about_us]').val('{{$start_up_info[0]->how_know_about_us}}');
        
    });
</script>

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
                
                $('#submit_step1').text(""); 
                $('#submit_step1').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Processing ...');

                var data = new FormData();

                data.append('start_up_name', $('input[name=sname]').val());
                
                data.append('nature_of_startup',  $('select[name=nature_of_startup]').val());
                data.append('industry', $('select[name=industry]').val());
                data.append('categorie', $('select[name=categories]').val());
                data.append('office_address', $('input[name=Address]').val());
                data.append('no_of_founders', $('input[name=numberoffounder]').val());

         //       $("#login_error_msg").text(''); 
           //     $("#login_error_msg").addClass('d-none'); 

                $.ajax({
                   type : 'POST',
                   url : '/starup/form',
                   beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                   data: data,
                   contentType: false,
                   processData: false,
                   success: function(data) {

                    if(data.errors) {
                            
                            if(data.errors.start_up_name){
                                $('.sname_error').removeClass('hidden');
                                $('.sname_error').text(data.errors.start_up_name);
                            }
                            if(data.errors.nature_of_startup){
                                $('.nos_error').removeClass('hidden');
                                $('.nos_error').text(data.errors.nature_of_startup);
                            }
                            if(data.errors.industry){
                                $('.industry_error').removeClass('hidden');
                                $('.industry_error').text(data.errors.industry);
                            }
                            if(data.errors.categorie){
                                $('.categories_error').removeClass('hidden');
                                $('.categories_error').text(data.errors.categorie);
                            }
                            if(data.errors.office_address){
                                $('.Address_error').removeClass('hidden');
                                $('.Address_error').text(data.errors.office_address);
                            }
                            if(data.errors.no_of_founders){
                                $('.numberoffounder_error').removeClass('hidden');
                                $('.numberoffounder_error').text(data.errors.no_of_founders);
                            }
                        }
                        else {
                            showstep2();
                            $('.err').addClass('hidden');
                        }
                        $('#submit_step1').text(""); 
                        $('#submit_step1').append('Save and continue');
                   }
               }).fail(function (jqXHR, textStatus, error) {
                    $('#msg').removeClass('hidden');
                    $('#msg').text('Please fill the details ! '+error);
                    $('#submit_step1').text(""); 
                    $('#submit_step1').append('Save and continue');

                 });
        });
    })
</script>

<script>
    $(document).ready(function(){
        $("#submit_step3").click(function() {
            $('#submit_step3').text(""); 
            $('#submit_step3').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Processing ...');
     
            var data = new FormData();
            //alert($('select[name=iprval]').val());
                    var applied_for = JSON.stringify($('#form2').find('input[name^="applied_for"]').serializeArray());
                    var ipr_id = JSON.stringify($('#form2').find('input[name^="ipr_id"]').serializeArray());
                //   console.log(ipr_id);
                    var registered = JSON.stringify($('#form2').find('input[name^="registered"]').serializeArray());
                    var application_no = JSON.stringify($('#form2').find('input[name^="application_no"]').serializeArray());
                   
                    var innovative_v = JSON.stringify($('#form2').find('input[name^="innovative_v"]').serializeArray());
                    var improvement_v = JSON.stringify($('#form2').find('input[name^="improvement_v"]').serializeArray());
                    var inno_id = JSON.stringify($('#form2').find('input[name^="ino_id"]').serializeArray());
                   
                    data.append('logo', $('#logo')[0].files[0]);
                    data.append('cne', $('input[name=cne]').val());
                    data.append('csd', $('select[name=current_stage_of_development]').val());
                    data.append('iprval', $('select[name=iprval]').val());
                  
                    data.append('innovative_p', $('select[name=innovative_p]').val());
                  
                    data.append('applied_for',  applied_for);
                    data.append('registered', registered);
                    data.append('application_no', application_no);
                    data.append('innovative_v', innovative_v);
                    data.append('improvement_v', improvement_v);
                    data.append('ipr_id', ipr_id);
                    data.append('inno_id', inno_id);
             //   var data = JSON.stringify($('#form2').find('input[name^="fname"]').serializeArray());

                $.ajax({
                   type : 'POST',
                   url : '/starup/form3',
                   beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                   data: data,
                   contentType: false,
                   processData: false,
                   success: function(data) {
                        if(data.errors) {
                            
                            if(data.errors.cne){
                                $('.cne_error').removeClass('hidden');
                                $('.cne_error').text(data.errors.cne);
                            }
                            if(data.errors.csd){
                                $('.stage_error').removeClass('hidden');
                                $('.stage_error').text("this field is required");
                            }
                            if(data.errors.iprval){
                                $('.ipr_error').removeClass('hidden');
                                $('.ipr_error').text("this field is required");
                            }
                            if(data.errors.innovative_p){
                                $('.inn_error').removeClass('hidden');
                                $('.inn_error').text("this field is required");
                            }
                        }
                        else {
                            showtab("step4");
                            $('.err').addClass('hidden');
                        }
                        $('#submit_step3').text(""); 
                        $('#submit_step3').append('Save and continue');
                        
                   }
               }).fail(function (jqXHR, textStatus, error) {
                    $('#msg').text('Error ! '+error);
                    $('#msg').removeClass('hidden');
                    $('#submit_step3').text(""); 
                    $('#submit_step3').append('Save and continue');
                 });
        });
    })
</script>

<script>
    $(document).ready(function(){

        $("#submit_step2").click(function() {
            $('#submit_step2').text(""); 
            $('#submit_step2').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Processing ...');

            var data = new FormData();
            
                    var fname = JSON.stringify($('#form2').find('input[name^="fname"]').serializeArray());
                    var fdesignation = JSON.stringify($('#form2').find('input[name^="fdesignation"]').serializeArray());
                    var fmobile = JSON.stringify($('#form2').find('input[name^="fmobile"]').serializeArray());
                    var femail = JSON.stringify($('#form2').find('input[name^="femail"]').serializeArray());
                    var fqualification = JSON.stringify($('#form2').find('select[name^="fqualification"]').serializeArray());
                    
                    data.append('fname',  fname);
                    data.append('fdesignation', fdesignation);
                    data.append('fmobile', fmobile);
                    data.append('femail', femail);
                    data.append('fqualification', fqualification);

             //   var data = JSON.stringify($('#form2').find('input[name^="fname"]').serializeArray());

                $.ajax({
                   type : 'POST',
                   url : '/starup/form2',
                   beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                   data: data,
                   contentType: false,
                   processData: false,
                   success: function(data) {
                        showtab("step3");
                        $('#submit_step2').text(""); 
                         $('#submit_step2').append('Save and continue');
                   }
               }).fail(function (jqXHR, textStatus, error) {
                    $('#msg').removeClass('hidden');    
                    $('#msg').text('Please fill the details '+error);
                    $('#submit_step2').text(""); 
                    $('#submit_step2').append('Save and continue');

                 });
        });
    })
</script>

<script>
$(document).ready(function(){
//form 4;

        $("#submit_step4").click(function() {                
           //     $('#stup-login').text(""); 
           //     $('#stup-login').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Processing ...');
           $('#submit_step4').text(""); 
            $('#submit_step4').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Processing ...');

                var data = new FormData();
                data.append('about_your_startup', $('textarea[name=about_your_startup]').val());
                data.append('problem', $('textarea[name=problem_solving]').val());
                
                data.append('solution',  $('textarea[name=propose_solving_problem]').val());
                data.append('uniqueness', $('textarea[name=uniqueness]').val());
                data.append('revenue_method', $('textarea[name=generate_revenue]').val());
                data.append('competitors', $('textarea[name=competitors]').val());

         //       $("#login_error_msg").text(''); 
           //     $("#login_error_msg").addClass('d-none'); 

                $.ajax({
                   type : 'POST',
                   url : '/starup/form4',
                   beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                   data: data,
                   contentType: false,
                   processData: false,
                   success: function(data) {
                    if(data.errors) {
                            
                            if(data.errors.about_your_startup){
                                $('.fwas_error').removeClass('hidden');
                                $('.fwas_error').text(data.errors.about_your_startup);
                            }
                            if(data.errors.problem){
                                $('.ptsis_error').removeClass('hidden');
                                $('.ptsis_error').text(data.errors.problem);
                            }
                            if(data.errors.solution){
                                $('.hyptspp_error').removeClass('hidden');
                                $('.hyptspp_error').text(data.errors.solution);
                            }
                            if(data.errors.uniqueness){
                                $('.uni_error').removeClass('hidden');
                                $('.uni_error').text(data.errors.uniqueness);
                            }
                            if(data.errors.revenue_method){
                                $('.hdysgr_error').removeClass('hidden');
                                $('.hdysgr_error').text(data.errors.revenue_method);
                            }
                            if(data.errors.competitors){
                                $('.wayc_error').removeClass('hidden');
                                $('.wayc_error').text(data.errors.competitors);
                            }
                        }
                        else {
                            showtab("step5");
                            $('.err').addClass('hidden');
                        }
                        $('#submit_step4').text(""); 
                        $('#submit_step4').append('Save and continue');
                   }
               }).fail(function (jqXHR, textStatus, error) {
                    $('#msg').removeClass('hidden');    
                    $('#msg').text('Please fill the details '+error);
                    $('#submit_step4').text(""); 
                    $('#submit_step4').append('Save and continue');
                 });
        });
    })
</script>

<script>
$(document).ready(function(){
//form 4;

        $("#submit_step5").click(function() {                
            $('#submit_step5').text(""); 
            $('#submit_step5').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Processing ...');

                var data = new FormData();

                data.append('revenue', $('input[name=revenue_any]').val());
                
                data.append('name_of_incubator',  $('input[name=Incubator_name]').val());
                data.append('date_of_incubator', $('input[name=incubation_date]').val());
                data.append('revenue', $('input[name=revenue_any]').val());

         //       $("#login_error_msg").text(''); 
           //     $("#login_error_msg").addClass('d-none'); 

                $.ajax({
                   type : 'POST',
                   url : '/starup/form5',
                   beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                   data: data,
                   contentType: false,
                   processData: false,
                   success: function(data) {
                    if(data.errors) {
                            
                            if(data.errors.revenue){
                                $('.revenue_any_error').removeClass('hidden');
                                $('.revenue_any_error').text(data.errors.revenue);
                            }
                            if(data.errors.name_of_incubator){
                                $('.Incubator_name_any_error').removeClass('hidden');
                                $('.Incubator_name_any_error').text(data.errors.name_of_incubator);
                            }
                            if(data.errors.date_of_incubator){
                                $('.incubation_date_any_error').removeClass('hidden');
                                $('.incubation_date_any_error').text(data.errors.date_of_incubator);
                            }
                    }
                    else {
                        showtab("complete");
                        $('.err').addClass('hidden');
                    }
                        $('#submit_step5').text(""); 
                        $('#submit_step5').append('Save and continue');
                   }
               }).fail(function (jqXHR, textStatus, error) {
                    $('#msg').removeClass('hidden');    
                    $('#msg').text('Please fill the details '+error);
                    $('#submit_step5').text(""); 
                    $('#submit_step5').append('Save and continue');
                 });
        });
    })
</script>


<script>
$(document).ready(function(){
//form 4;

        $("#submit_step6").click(function() {                
           //     $('#stup-login').text(""); 
           //     $('#stup-login').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Processing ...');
           $('#submit_step6').text(""); 
            $('#submit_step6').append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Processing ...');

                var data = new FormData();

                data.append('how_know_about_us', $('select[name=know_about_us]').val());
            

         //       $("#login_error_msg").text(''); 
           //     $("#login_error_msg").addClass('d-none'); 

                $.ajax({
                   type : 'POST',
                   url : '/starup/form6',
                   beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                   data: data,
                   contentType: false,
                   processData: false,
                   success: function(data) {
                    if(data.errors) {
                            if(data.errors.how_know_about_us){
                                $('.know_about_us_any_error').removeClass('hidden');
                                $('.know_about_us_any_error').text(data.errors.how_know_about_us);
                            }
                            $('#submit_step6').text(""); 
                            $('#submit_step6').append('Save and Complete');
                    }
                    else {
                        $('#submit_step6').text(""); 
                        $('#submit_step6').append('Saved');
                        $('#msg').removeClass('hidden');
                        $('#msg').text('your account has been created successfully');
                        $('.err').addClass('hidden');
                        $('#lreq').removeClass('hidden');
                    }
                    
                   }
               }).fail(function (jqXHR, textStatus, error) {
                    $('#msg').removeClass('hidden');    
                    $('#msg').text('Error!'+error);
                    $('#submit_step6').text(""); 
                    $('#submit_step6').append('Save and Complete');
                 });
        });
    })
</script>

  
  <script>
   /* $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();
        
        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);
        
            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    } */
</script>
@endsection
