@extends('layouts.user')


@section('content')
<main class="middle">
            <div class="pr-5 pt-0 pl-5">
                <div class="card-body">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ asset('') }}home">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ asset('') }}choose/doctor/{{$doctor[0]->cat_id}}">{{$doctor[0]->category}}</a></li>
                                <li class="breadcrumb-item">{{$doctor[0]->name}}</li>
                            </ol>
                        </nav>
                    <div class="">
                            <div class="text-center">
                                {{--<img style="width: 200px; height: 200px;" src="http://xinature.com/wp-content/uploads/2016/10/flowers-love-rose-flower-delicte-blue-wallpapers-big-size.jpg" class="rounded" alt="..."> --}}
                                <img style="width: 180px; height: 200px;" style="border-radius: 0px; padding: 0px" src="{{ asset('') }}images/{{$doctor[0]->image}}" class="rounded" alt="...">
                            </div>
                            <div class="text-center pt-2 pb-2">
                                <a href="" style="width: 180px;" class="btnr btn btn-primary" data-toggle="modal" data-target="#exampleModal">Choose</a>
                            </div>
                            <p class="text-center pt-1">{{$doctor[0]->introduction}}</p>
                    </div>
                </div>
            </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
        <div class="modal-body">
            <p>
                <button type="button" class="close" style="font-size: 16px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </p>
            <div class="text-center">
                <i class="fa fa-user-circle" style="font-size:48px;color:red"></i>
            </div>
            <div class="text-center pt-2 pb-2">

                <h5>You choose</h5>
                <h5 class="text-danger">{{$doctor[0]->name}}</h5>
                <h6><small>as your family doctor</small></h6>
                <h6><small id="error" class="hidden"></small></h6>
                <button id="confirmbutton" onclick="Confirm_Doctor()" style="width: 200px;" class="btnr btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
  </div>
</div>

<script>
// 
function Confirm_Doctor(){
        $('#confirmbutton').html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Pls wait...');
             
            var data = new FormData();
            data.append('id', '{{$doctor[0]->doctors_id}}');

            $.ajax({
                type : 'POST',
                url : '{{ asset('') }}confirm/doctor',
                beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                contentType: false,
                data:data,
                processData: false,
                success: function(data) {
                   
                    $("#confirmbutton").html("Redirecting...");
                //       updatelist();
                    
                    $('#error').addClass('hidden');
                    window.location.replace("{{ asset('') }}home");
            }
            }).fail(function (jqXHR, textStatus, error) {  
                    $("#error").html("<span class='text-danger'>Error :" + error +"</span>");
                    $('#error').removeClass('hidden');
                    $("#confirmbutton").html("Confirm");
            });
            
    }
</script>
@endsection
