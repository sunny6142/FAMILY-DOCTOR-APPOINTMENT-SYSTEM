
<?php
    if(Auth::user()->roll == 3)  $val = "layouts.startup"; 
    if(Auth::user()->roll == 2) $val = "layouts.mentor_header"; 
    if(Auth::user()->roll == 1) $val = "layouts/admin_header";
?>
    
@extends($val) 

<div id="submitfeeback" hidden style="z-index: 1000; top: -50px; width: 100%; height: 100%; position: absolute;" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Feedback</h4>
                    </div>
                    <div class="modal-body text-success">
                        <p>Your feedback is important to improve our services.</p>
                    </div>
                    <div class="modal-footer">
                        @if( ($feedback != null ) && ($feedback->qualitative == null) )
                            <a href="/startup/feedback/{{$feedback->request_mentor}}" class="btn btn-default" data-dismiss="modal">Proceed</a>
                        @endif 
                    </div>
                </div>

            </div>
        </div>

@section('content')

                @if( ($feedback != null ) && ($feedback->qualitative == null) )
                    <script>
                        $('#submitfeeback').removeAttr('hidden');
                    </script>
                @endif 
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Welcome</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="glyphicon glyphicon-user f-s-40 color-primary"></i></span>
                                </div>
                                <a href="/req/mentor" class="media-body media-text-right">
                                    <h2>{{$request_mentor}}</h2>
                                    <p class="m-b-0">Total Request</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <a href="/request/mentor" class="media-body media-text-right">
                                    <h2>{{ $Approval_required }}</h2>
                                    <p class="m-b-0">Pending Action</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                                </div>
                                <a href="/request/approved" class="media-body media-text-right">
                                    <h2>{{$accepted}}</h2>
                                    <p class="m-b-0">Mentor Accepted</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{--
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>AS</h2>
                                    <p class="m-b-0">Approval Startup</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

            <!-- Mentor List -->
                <div class="row">
					<div class="col-lg-3">
                        <div class="card bg-dark">
                            <div class="testimonial-widget-one p-17">
                                <div class="testimonial-widget-one owl-carousel owl-theme">
                                    @foreach ($list as $ment)
                                        <div class="item">
                                            <div class="testimonial-content">
                                                <img class="testimonial-author-img" src="{{ asset('') }}public/images/{{ $ment->image }}" alt="" />
                                                <div class="testimonial-author">{{$ment->name}}</div>
                                                <div class="testimonial-author-position">{{$ment->designation}}</div>

                                                <div class="testimonial-text">
                                                    <i class="fa fa-quote-left"></i>  {{$ment->about_you}}
                                                    <i class="fa fa-quote-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-title">
                                <h4>Mentor List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th class="text-success">Company</th>
                                                <th class="text-success">Meeting</th>
                                                <th class="text-success">Profile</th>
                                                <th class="text-danger">Mentor Feedback</th>
                                                <th class="text-danger text-left">User Feedback</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($list as $ment)
                                                <tr>
                                                    <td>
                                                        <div class="round-img">
                                                            <a href=""><img src="{{ asset('') }}public/images/{{ $ment->image }}" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td>{{ $ment->name }} </td>
                                                    <td class="text-success">{{ $ment->company_name}} </td>
                                                    <td>
                                                        <a href="/user/view/accept/mentor/{{$ment->request_mentor}}" class="btn btn-warning btn-sm" >
                                                            Detail 
                                                        </a>
                                                    </td>
                                                    <td> 
                                                    
                                                        <a href="/user/view/mentor/profile/{{$ment->admins}}" class="btn btn-info btn-sm" >
                                                            Mentor 
                                                        </a>
                                                    </td>
                                                    <td class="text-danger">
                                                        @if($ment->user_feedback_status == null)
                                                            Not Available
                                                        @else
                                                            <a  href="/user/view/startup/feedback/{{$ment->request_mentor}}" class="btn btn-success btn-sm" >
                                                                Feedback
                                                            </a>
                                                        @endif
                                                    </td>

                                                    <td class="text-danger text-left">
                                                        @if($ment->mentor_feedback_status == null)
                                                            Not Available
                                                        @else
                                                            <a href="/user/view/mentor/feedback/{{$ment->request_mentor }}" class="btn btn-success btn-sm" >
                                                                Feedback
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End Mentor List -->
            <!-- Startup List -->
            
            <!-- End Startup List -->
                {{--
                <div class="row">
					<div class="col-lg-8">
						<div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-title">
                                        <h4>Message </h4>
                                    </div>
                                    <div class="recent-comment">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">john doe</h4>
                                                <p>Cras sit amet nibh libero, in gravida nulla. </p>
                                                <p class="comment-date">October 21, 2018</p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">john doe</h4>
                                                <p>Cras sit amet nibh libero, in gravida nulla. </p>
                                                <p class="comment-date">October 21, 2018</p>
                                            </div>
                                        </div>

                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">john doe</h4>
                                                <p>Cras sit amet nibh libero, in gravida nulla. </p>
                                                <p class="comment-date">October 21, 2018</p>
                                            </div>
                                        </div>

                                        <div class="media no-border">
                                            <div class="media-left">
                                                <a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Mr. Michael</h4>
                                                <p>Cras sit amet nibh libero, in gravida nulla. </p>
                                                <div class="comment-date">October 21, 2018</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /# card -->
                            </div>
                            <!-- /# column -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="year-calendar"></div>
                                    </div>
                                </div>
                            </div>


						</div>
					</div>

				    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Todo</h4>
                                <div class="card-content">
                                    <div class="todo-list">
                                        <div class="tdl-holder">
                                            <div class="tdl-content">
                                                <ul>
                                                    <li>
                                                        <label>
															<input type="checkbox"><i class="bg-primary"></i><span>Build an angular app</span>
															<a href='#' class="ti-close"></a>
														</label>
                                                    </li>
                                                    <li>
                                                        <label>
															<input type="checkbox" checked><i class="bg-success"></i><span>Creating component page</span>
															<a href='#' class="ti-close"></a>
														</label>
                                                    </li>
                                                    <li>
                                                        <label>
															<input type="checkbox" checked><i class="bg-warning"></i><span>Follow back those who follow you</span>
															<a href='#' class="ti-close"></a>
														</label>
                                                    </li>
                                                    <li>
                                                        <label>
															<input type="checkbox" checked><i class="bg-danger"></i><span>Design One page theme</span>
															<a href='#' class="ti-close"></a>
														</label>
                                                    </li>

                                                    <li>
                                                        <label>
															<input type="checkbox" checked><i class="bg-success"></i><span>Creating component page</span>
															<a href='#' class="ti-close"></a>
														</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="text" class="tdl-new form-control" placeholder="Type here">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}
                <!-- End PAge Content -->
            </div>
           
@endsection


