@extends('layouts.admin_header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 dashpad">
            <div class="card card-success card1">
               

                <div class="card-body"><span class="">Welcome, Admin</span>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
            <!--team-1-->
    <div class="col-md-3">
    <div class="our-team-main">
    
    <div class="team-front">
    <a href=""> <img src="http://placehold.it/110x110/9c27b0/fff?text=Dilip" class="img-fluid" /></a>
    <h3>Dashboard</h3>
    </div>
    
    <div class="team-back">
    <a href=""> <img src="http://placehold.it/110x110/9c27b0/fff?text=Dilip" class="img-fluid" /></a>
    <h3>Dashboard</h3>
    </div>
    
    </div>
    </div>
    <!--team-1-->
    
    <!--team-2-->
    <div class="col-md-3">
    <div class="our-team-main">
    
    <div class="team-front">
    <a href="/list/mentor"> <img src="http://placehold.it/110x110/336699/fff?text={{$mentor}}" class="img-fluid" /></a>
    <h3>Mentor</h3>
    </div>
    
    <div class="team-back">
    <a href="/list/mentor"> <img src="http://placehold.it/110x110/336699/fff?text={{$mentor}}" class="img-fluid" /></a>
    <h3>Mentor</h3>
    </div>
    
    </div>
    </div>
    <!--team-2-->
    
    <!--team-3-->
    <div class="col-md-3">
    <div class="our-team-main">
    
    <div class="team-front">
    <a href="/admin/approval"> <img src="http://placehold.it/110x110/607d8b/fff?text={{$approval}}" class="img-fluid" /></a>
    <h3>Approval</h3>
    </div>
    
    <div class="team-back">
     <a href="/admin/approval"> <img src="http://placehold.it/110x110/607d8b/fff?text={{$approval}}" class="img-fluid" /></a>
    <h3>Approval</h3>
    </div>
        </div>
    </div>
    
    <!--team-4-->
    <div class="col-md-3">
    <div class="our-team-main">
    
    <div class="team-front">
    <a href="/admin/list/startup"><img src="http://placehold.it/110x110/4caf50/fff?text={{$mentor}}" class="img-fluid" /></a>
    <h3>Start Up</h3>
    </div>
    
    <div class="team-back">
    <a href="/admin/list/startup"><img src="http://placehold.it/110x110/4caf50/fff?text={{$mentor}}" class="img-fluid" /></a>
    <h3>Start Up</h3>
    </div>
    
    </div>
    </div>
    <!--team-4-->
   
    </div>
</div>
</div>
@endsection
