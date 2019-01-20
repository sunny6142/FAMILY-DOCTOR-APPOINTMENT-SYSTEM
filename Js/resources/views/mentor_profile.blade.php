@extends('layouts.mentor_header')

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
                                            <img src="{{ asset('') }}public/images/{{ Auth::user()->image  }}" alt="{{ Auth::user()->name }}" />
                                        </div>
                                    </header>

                                    <h3>{{ Auth::user()->name }} <a href="/edit/mentor/{{Auth::user()->id}}"><span class="glyphicon glyphicon-edit"></span></a></h3>
                                    <div class="desc">
                                        {{ Auth::user()->about_you }}
                                    </div>
                                    
											<div class="row text-center" style="margin: 0 auto;">
												<div class="col-sm-4 b-r"> <strong>mobile</strong>
													<br>
													<p class="text-muted"> {{ Auth::user()->mobile }}</p>
												</div>
												
												<div class="col-sm-4 b-r"> <strong>Telephone Office </strong>
													<br>
													<p class="text-muted"> {{ Auth::user()->telephone_office  }}</p>
												</div>
                                                <div class="col-sm-4 b-r"> <strong>Telephone Home  </strong>
													<br>
													<p class="text-muted"> {{ Auth::user()->telephone_home  }}</p>
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
					    				<span class="text-muted"> {{ Auth::user()->email }}</span>
									</div> 
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> dob  :</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ Auth::user()->dob  }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Gender  :</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ Auth::user()->gender }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Address  :-</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ Auth::user()->address  }}</span>
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
					    				<span class="text-muted"> {{ Auth::user()->company_name }}</span>
									</div> 
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Designation :</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ Auth::user()->designation }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Roll :</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ Auth::user()->roll }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Time Commitment  :</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ Auth::user()->time_commitment }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Days Of Week  :-</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ Auth::user()->days_of_week  }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Suitable Time  :-</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ Auth::user()->suitable_time  }}</span>
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
                                        <p class="card-text pl-3 pr-3"> {{ Auth::user()->primary_and_secondary_objectives  }}</p>
                                    </li>
                                    <li class="list-group-item" class="pt-3 pb-3">
                                        <h6 class="modal-body">Professional Expertise </h6>
                                        <p class="card-text pl-3 pr-3"> {{ Auth::user()->professional_expertise }}</p>
                                    </li>
                                    <li class="list-group-item" class="pt-3 pb-3">
                                        <h6 class="modal-body">Industry Vertical Experience </h6>
                                        <p class="card-text pl-3 pr-3"> {{ Auth::user()->industry_vertical_experience  }}</p>
                                    </li>
                                    <li class="list-group-item" class="pt-3 pb-3">
                                        <h6 class="modal-body">Areas Of Business And Management Competence</h6>
                                        <p class="card-text pl-3 pr-3"> {{ Auth::user()->areas_of_business_and_management_competence }}</p>
                                    </li>
                                   
                                </ul>
                            </div>
                </div>
                <!-- End PAge Content -->
            
        </div>
            <!-- End Container fluid  -->
@endsection
