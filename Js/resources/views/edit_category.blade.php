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
                                                        <h4>Update Category</h4>
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
                                                                                <div class="tab">
                                                                                    <div class="tab pt-3">
                                                                                        {{--<h3>Social Profile</h3>--}}
                                                                                        <div class="m-5 hidden border err_toggle border-success text-success p-1 pl-4 mt-2" id="msg"></div>
                                                                                        <section>
                                                                                            <div class="form-group row add">
                                                                                                <label class="control-label col-sm-4 pt-2 text-right" for="cat">Name&nbsp:</label>
                                                                                                <div class="col-sm-8">
                                                                                                    <input type="text" style="width:300px" class="form-control" id="cat" name="cat" value="{{ $category[0]->category }}" placeholder="Enter here">
                                                                                                    <p style="width:300px" class="LI_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                                </div>
                                                                                            </div>

                                                                                        </section>
                                                                                        <ul class="list-inline text-center">
                                                                                            <p class="cat_error err_toggle text-center alert alert-danger hidden"></p>
                                                                                            
                                                                                            <li>
                                                                                                <button type="button" id="submitcat"  class="btn mentor_modal_button btn-primary">Submit</button>
                                                                                                <button type="button" id="spinnercat"  class="btn mentor_modal_button btn-primary hidden"><i class="fa fa-spinner"></i> Pls Wait...</button>
                                                                                               
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
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
    }

// <!-- Add mentor -->
    $(document).ready(function(){
        $("#submitcat").click(function() {
            $('.err_toggle').addClass('hidden');
            $('.mentor_modal_button').addClass('hidden');
            $('#spinnercat').removeClass('hidden');
            
            $('#form2').find('input').removeClass("border border-danger");
            
            var data = new FormData();

            data.append('category', $('input[name=cat]').val());
            data.append('id', '{{$id}}');

            $.ajax({
               type : 'POST',
               url : '{{ asset('') }}edit/category',
               beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
               data: data,
               contentType: false,
               processData: false,
               success: function(data) {
                   if(data.errors) {
                        if(data.errors.category){
                            $('#cat').addClass("border border-danger");
                            $('.LI_error').removeClass('hidden');
                            $('.LI_error').text(data.errors.category);
                        }
                   }
                   else
                   {
                     //  clear();
                       $('#msg').removeClass('hidden'); 
                       $("#msg").text("Category Successfully Updatd");
                       //updatelist();
                   }
                    $('.mentor_modal_button').addClass('hidden');
                    $('#submitcat').removeClass('hidden');
               }
            }).fail(function (jqXHR, textStatus, error) {  
                    $('#msg').removeClass('hidden');
                    $("#msg").text("Error !"+error);
                    $('.addmentor_error').removeClass('hidden');             
                    $('.addmentor_error').text('Error ! '+error);
                    $('.mentor_modal_button').addClass('hidden');
                    $('#submitcat').removeClass('hidden');
                });
        });
    })

</script>

@endsection


