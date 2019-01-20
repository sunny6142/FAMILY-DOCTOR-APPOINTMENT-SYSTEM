@extends('layouts.startup')

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
                                            <img src="{{ asset('') }}public/images/{{ $start_up_info[0]->logo  }}" alt="{{ $start_up_info[0]->start_up_name }}" />
                                        </div>
                                    </header>

                                    <h3>{{ $start_up_info[0]->start_up_name }} <a href="/edit/profile"><span class="glyphicon glyphicon-edit"></span></a></h3>
                                    <div class="desc">
                                        {{ $start_up_info[0]->about_your_startup }}
                                    </div>
											<div class="row text-center" style="margin: 0 auto;">
												<div class="col-sm-4 b-r"> <strong>User Name</strong>
													<br>
													<p class="text-muted"> {{ $users[0]->name }}</p>
												</div>
												
												<div class="col-sm-4 b-r"> <strong>Email</strong>
													<br>
													<p class="text-muted"> {{ $users[0]->email }}</p>
												</div>
                                                <div class="col-sm-4 b-r"> <strong>Name of Incubator </strong>
													<br>
													<p class="text-muted"> {{ $start_up_info[0]->name_of_incubator }}</p>
												</div>
												
												<!--<div class="col-sm-4 b-r"> <strong>Date of incubation</strong>
													<br>
													<p class="text-muted"> {{ $start_up_info[0]->date_of_incubator }}</p>
												</div> -->
										    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-12 p-0">
                        <div class="card">
                            <!-- Nav tabs -->
                                     
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b>Nature of StartUp :</b>
									</div> 
                                    <div class="col-sm-8">
					    				<span class="text-muted"> {{ $start_up_info[0]->nature }}</span>
									</div> 
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> StartUp Industry :</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ $start_up_info[0]->industry }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> StartUp Categories  :</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ $start_up_info[0]->categories }}</span>
                                    </div> 
                                </div> 
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"> 
                                        <b> Office Address :-</b>
                                    </div> 
                                    <div class="col-sm-8"> 
                                        <span class="text-muted"> {{ $start_up_info[0]->office_address }}</span>
                                    </div> 
                                </div>  
                            </div>
                            <!-- Tab panes -->
                           
                        </div>
                    </div>
                    <!-- Column -->

                    
                    <!-- Founder -->
                    <div class="col-lg-12 p-0">
                        <div class="card" style="overflow: auto;">
                            <div class="row">
                                <div class="col-sm-4"> 
                                    <h4> Founders’ Details :-</h4>
                                </div> 
                                <div class="col-sm-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">Qualification</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                            @foreach($founders as $foun)
                                                <tr>
                                                    <th scope="row">{{++$i}}</th>
                                                    <td>{{$foun->name}}</td>
                                                    <td>{{$foun->designation}}</td>
                                                    <td>{{$foun->qualification}}</td>
                                                    <td>{{$foun->contact}}</td>
                                                    <td>{{$foun->email_id}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>   
                        </div>
                    </div>
                    <!-- End Founder -->
              
                <div class="col-lg-12 p-0">
                    <div class="card">
                        <ul class="p-0">
                            <div class="col-sm-12 p-0 mb-3"> 
                                <h4>Basic information about Startup :-</h4>
                            </div> 

                            <li class="col-sm-12" style="max-width:800px">
                                <label class="control-label col-sm-8" for="generate_revenue">Current number of employees (including founders) :</label>
                                <div class="col-sm-4">
                                   {{ $start_up_info[0]->no_of_founders }}
                                </div>
                            </li>

                            <li class="col-sm-12" style="max-width:800px">
                                <label class="control-label col-sm-8" for="generate_revenue">What is the current stage of development of your product / service? :</label>
                                <div class="col-sm-4">
                                   {{ $start_up_info[0]->stage }}
                                </div>
                            </li>

                            <li class="col-sm-12" style="max-width:800px">
                                <label class="control-label col-sm-8" for="generate_revenue">Has your startup applied for any IPR (Intellectual Property Right):</label>
                                    <div class="col-sm-4">
                                        @if($start_up_info[0]->ipr_status == 1)
                                            YES
                                        @else
                                            NO
                                        @endif
                                    </div>
                            </li>

                            <li class="col-sm-12" style="max-width:800px">
                                <label class="control-label col-sm-8" for="generate_revenue">Is the startup creating an product / service / process or improving an existing product / service / process :</label>
                                    <div class="col-sm-4">
                                        @if($start_up_info[0]->innovative_status == 1)
                                            YES
                                        @else
                                            NO
                                        @endif
                                    </div>
                            </li>
                           
                        </ul>
                    </div>
                    @if($start_up_info[0]->ipr_status == 1)
                                <div class="card" style="overflow: auto;" >
                                    <div class="col-sm-12 p-0 mb-3"> 
                                        <h4> IPR (Intellectual Property Right) :-</h4>
                                    </div> 
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Title </th>
                                                <th scope="col" class="text-center">applied_for</th>
                                                <th scope="col" class="text-center">registered_granted</th>
                                                <th scope="col" class="text-center">application_no</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ipr_stats as $i_val)
                                                <tr>
                                                    <th scope="row" class="text-center tb">{{ $i_val->ipr }}</th>
                                                    <td class="text-center tb">
                                                        {{ $i_val->applied_for }}
                                                    </td>
                                                    <td class="text-center tb">
                                                        {{ $i_val->registered_granted }}
                                                    </td>
                                                    <td class="text-center tb">
                                                        {{ $i_val->application_no }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                            @if($start_up_info[0]->innovative_status == 1)
                                <div class="card" style="overflow: auto;" >
                                    <div class="col-sm-12 p-0 mb-3"> 
                                        <h4> Product / Service / Process :-</h4>
                                    </div> 
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Title </th>
                                                <th scope="col" class="text-center">Innovative</th>
                                                <th scope="col" class="text-center">Improvement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($innovative_stats as $inno_val)
                                                <tr>
                                                    <th scope="row" class="text-center tb">{{ $inno_val->Inno_val_ }}</th>
                                                    <td class="text-center tb">
                                                        {{ $inno_val->innovative }}
                                                    </td>
                                                    <td class="text-center tb">
                                                        {{ $inno_val->improvement }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                            <div class="card p-0">
                                <div class="card-header">
                                    Detailed startup activities
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h6 class="modal-body">About StartUp</h6>
                                        <p class="card-text pl-3 pr-3"> {{ $start_up_info[0]->about_your_startup }}</p>
                                    </li>
                                    <li class="list-group-item" class="pt-3 pb-3">
                                        <h6 class="modal-body">What is the problem the startup is solving ?</h6>
                                        <p class="card-text pl-3 pr-3"> {{ $start_up_info[0]->problem }}</p>
                                    </li>
                                    <li class="list-group-item" class="pt-3 pb-3">
                                        <h6 class="modal-body">How does your startup propose to solve this problem ?</h6>
                                        <p class="card-text pl-3 pr-3"> {{ $start_up_info[0]->solution }}</p>
                                    </li>
                                    <li class="list-group-item" class="pt-3 pb-3">
                                        <h6 class="modal-body">What is the uniqueness/innovation of your solution?</h6>
                                        <p class="card-text pl-3 pr-3"> {{ $start_up_info[0]->uniqueness }}</p>
                                    </li>
                                    <li class="list-group-item" class="pt-3 pb-3">
                                        <h6 class="modal-body">How does your startup generate revenue?</h6>
                                        <p class="card-text pl-3 pr-3"> {{ $start_up_info[0]->revenue_method }}</p>
                                    </li>
                                    <li class="list-group-item" class="pt-3 pb-3">
                                        <h6 class="modal-body">Who are your competitors? (Direct/Indirect competitors)</h6>
                                        <p class="card-text pl-3 pr-3"> {{ $start_up_info[0]->competitors }}</p>
                                    </li>
                                </ul>
                            </div>
                </div>
                <!-- End PAge Content -->
            
        </div>
            <!-- End Container fluid  -->
@endsection
