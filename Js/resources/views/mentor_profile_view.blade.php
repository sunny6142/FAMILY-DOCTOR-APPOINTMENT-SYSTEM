<?php
if(Auth::user()->roll == 3)  $val = "layouts.startup"; 
if(Auth::user()->roll == 2) $val = "layouts.mentor_header"; 
if(Auth::user()->roll == 1) $val = "layouts/admin_header";
?>


@extends($val) 

@section('content')
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <!-- colomn -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-two">
                                    <header>
                                        <div class="avatar">
                                            <img src="{{ asset('') }}public/images/{{ $admin[0]->image  }}" alt="{{ $admin[0]->name }}"/>
                                        </div>
                                    </header>

                                    <h3>{{ $admin[0]->name }} </h3>
                                    <div class="desc">
                                        {{ $admin[0]->about_you }}
                                    </div>
                                    
											<div class="row text-center" style="margin: 0 auto;">
												<div class="col-sm-4 b-r"> <strong>mobile</strong>
													<br>
													<p class="text-muted"> {{ $admin[0]->mobile }}</p>
												</div>
												
												<div class="col-sm-4 b-r"> <strong>Telephone Office </strong>
													<br>
													<p class="text-muted"> {{ $admin[0]->telephone_office  }}</p>
												</div>
                                                <div class="col-sm-4 b-r"> <strong>Telephone Home  </strong>
													<br>
													<p class="text-muted"> {{ $admin[0]->telephone_home  }}</p>
												</div>
												
												<!--<div class="col-sm-4 b-r"> <strong>Date of incubation</strong>
													<br>
													<p class="text-muted"> </p>
												</div> -->
										    </div>

										
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Column -->
                <!-- Personal Information -->
                <div class="col-lg-12 p-0">
                        <div class="card">
                            <!-- Nav tabs -->
                            <div class="card-header">
                                Personal Information
                            </div>
                            <div class="container">
                            
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Email :</b>
									</div> 
                                    <div class="col-sm-8">
					    				<span class="text-muted"> {{ $admin[0]->email }}</span>
									</div> 
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> dob  :</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ $admin[0]->dob  }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Gender  :</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ $admin[0]->gender }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Address  :-</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ $admin[0]->address  }}</span>
                                    </div> 
                                </div>  
                            </div>
                            <!-- Tab panes -->
                           
                        </div>
                    </div>
                <!--End Personal Information -->

                <!-- Official Information -->
                    <div class="col-lg-12 p-0">
                        <div class="card">
                            <!-- Nav tabs -->
                            <div class="card-header">
                                Official Information
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b>Company Name :</b>
									</div> 
                                    <div class="col-sm-8">
					    				<span class="text-muted"> {{ $admin[0]->company_name }}</span>
									</div> 
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Designation :</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ $admin[0]->designation }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Roll :</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ $admin[0]->roll }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Time Commitment  :</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ $admin[0]->time_commitment }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Days Of Week  :-</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ $admin[0]->days_of_week  }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Suitable Time  :-</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ $admin[0]->suitable_time  }}</span>
                                    </div> 
                                </div>  
                            </div>
                            <!-- Tab panes -->
                           
                        </div>
                    </div>
                <!--End Official Information -->

                    
                 
              
                <div class="col-lg-12 p-0">
                   
                            <div class="card p-0">
                                <div class="card-header">
                                    Detailed activities
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h6 class="modal-body">Primary And Secondary Objectives </h6>
                                        <p class="card-text pl-3 pr-3"> {{ $admin[0]->primary_and_secondary_objectives  }}</p>
                                    </li>
                                    <li class="list-group-item" class="pt-3 pb-3">
                                        <h6 class="modal-body">Professional Expertise </h6>
                                        <p class="card-text pl-3 pr-3"> {{ $admin[0]->expertise }}</p>
                                    </li>
                                    <li class="list-group-item" class="pt-3 pb-3">
                                        <h6 class="modal-body">Industry Vertical Experience </h6>
                                        <p class="card-text pl-3 pr-3"> {{ $admin[0]->industry_experience  }}</p>
                                    </li>
                                    <li class="list-group-item" class="pt-3 pb-3">
                                        <h6 class="modal-body">Areas Of Business And Management Competence</h6>
                                        <p class="card-text pl-3 pr-3"> {{ $admin[0]->areas_of_business }}</p>
                                    </li>
                                   
                                </ul>
                            </div>
                </div>
                <!-- End PAge Content -->
            
        </div>
            <!-- End Container fluid  -->
@endsection
