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
                                                        <h4>Add Doctor</h4>
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
                                                                            
                                                                            <form role="form" id="form2" class="w-95" style = "margin: 0 auto;">
                                                                                <div class="tab-content">
                                                                                    <div class="border err_toggle border-success text-success p-1 pl-4 m-4 hidden" id="msg"></div>
                                                                                    
                                                                                        <section>
                                                                                            {{--<h3>Professional Information </h3>--}}
                                                                                            <div class="form-group row">
                                                                                                <label class="control-label col-sm-4 pt-1" for="category">Setup Category&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <select class="form-control" name="category" id="category" style="height: unset;">
                                                                                                       @foreach ($category as $cat)
                                                                                                            <option id="val" value = '{{$cat->cat_id}}'> {{$cat->category}} </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                    <p class="category_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>

                                                                                            <script>
                                                                                                $(document).ready(function () {
                                                                                                    $('input[name=name]').val('{{$doctors[0]->name}}');
                                                                                                    $('textarea[name=introduction]').val('{{$doctors[0]->introduction}}');
                                                                                                    $('select[name=category]').val('{{$doctors[0]->category}}');
                                                                                                    
                                                                                                    @if($doctors[0]->image != 'undefined' )
                                                                                                        $('#image_id_').removeClass("hidden");
                                                                                                    @endif
                                                                                                });
                                                                                            </script>

                                                                                            <div class="form-group row">
                                                                                                <label class="control-label col-sm-4 pt-1" for="name"> Name&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input class="form-control" name="name" id="name" style="height: unset;">
                                                                                                       
                                                                                                    <p class="name_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group row">
                                                                                                    <label class="control-label col-sm-4 pt-1" for="introduction">Introduction&nbsp:</label><br>
                                                                                                    <div class="col-sm-8">
                                                                                                        <textarea row="4" type="text" class="form-control" id="introduction" name="introduction" placeholder="Enter here"></textarea>
                                                                                                        <p class="introduction_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                    </div>
                                                                                            </div>

                                                                                            <div class="form-group row">
                                                                                                <label class="control-label col-sm-4 pt-2" for="image">Image&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <div style="overflow:hidden;"> <label class="btn btn-warning"> Upload
                                                                                                        <input type="file" id="image" name="image" class="btn btn-warning hidden" onchange="readURL(this,'image_id_');"></label>
                                                                                                        <p class="image_id_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                        <img id="image_id_" style="width:50px; height:50px;" class="img-rounded hidden" src="{{ asset('')}}/images/{{$doctors[0]->image}}" />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </section>        
                                                                                        <li class="pull-right">
                                                                                            <button type="button" id="msubmit"  class="btn mentor_modal_button btn-primary hidden">Submit</button>
                                                                                            <button type="button" id="mspinner"  class="btn mentor_modal_button btn-primary hidden"><i class="fa fa-spinner"></i> Pls Wait...</button>
                                                                                            
                                                                                        </li>
                                                                                    
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
            

            $('#msubmit').removeClass('hidden');
      
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
// <!-- Add mentor -->
    $(document).ready(function(){
        $("#msubmit").click(function() {
            $('.err_toggle').addClass('hidden');
            $('.mentor_modal_button').addClass('hidden');
            $('#mspinner').removeClass('hidden');
            
            $('#form2').find('input').removeClass("border border-danger");
            
            var data = new FormData();
            data.append('doctors_id', "{{$val}}");

            data.append('name', $('input[name=name]').val());
            data.append('category', $('select[name=category]').val());
            data.append('introduction', $('textarea[name=introduction]').val());
        
            data.append('image', $('#image')[0].files[0]);
              
            $.ajax({
               type : 'POST',
               url : '{{ asset('') }}edit/doctor',
               beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
               data: data,
               contentType: false,
               processData: false,
               success: function(data) {
                   if(data.errors) {
                        
                        if(data.errors.category){
                            $('#category').addClass("border border-danger");
                            $('.category_error').removeClass('hidden');
                            $('.category_error').text(data.errors.category);
                        }
                        if(data.errors.name){
                            $('#name').addClass("border border-danger");
                            $('.name_error').removeClass('hidden');
                            $('.name_error').text(data.errors.name);
                        }
                        if(data.errors.introduction){
                            $('#introduction').addClass("border border-danger");
                            $('.introduction_error').removeClass('hidden');
                            $('.introduction_error').text(data.errors.introduction);
                        }
                   }
                   else
                   {
                       //clear();
                       $('#msg').removeClass('hidden'); 
                       $("#msg").text("Doctor Info Successfully Updated");
                //       updatelist();
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


