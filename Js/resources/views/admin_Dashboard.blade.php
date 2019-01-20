@extends('layouts.admin_header')

@section('content')
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Welcome Admin</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
<div class="container-fluid">
                <!-- Start Page Content -->
   
    <div class="container-fluid midfluid" style="min-height: 61vh;">
        <main class="midde">
        <div class="pl-5 pr-5 pt-0">
            <div class="text text-center"> 
                <img src="{{ asset('') }}images/logo_shuangjing.png" class="img-fluid hmargin" alt="logo">        
            </div>   
        </div>
            <div class="pl-5 pr-5 pt-0">
                <div class="text text-center"> WELCOME TO USE FAMILY DOCTOR APPOINTMENT SYSTEM </div>
               
            </div>
        </main>
    </div>

   
                <!-- End PAge Content -->
</div>
           
@endsection


