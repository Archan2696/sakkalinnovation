@extends('admin.layout.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               @if($id==0)
               <a href=""><span>Add Service Package</span></a>
               @else
               <a href=""><span>Update Service Package</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Service Package</h4>
          @else
            <h4 class="mb-4">Update Service Package</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_package_service_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
         	@csrf
         <div class="detail table-responsive">
            <div class="details_main">

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Title</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Title" name="title" value="{{$title}}" >
                             @if($errors->has('title')) <p class="error_mes">{{ $errors->first('title') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>   

                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Standard</label>
                        </div>
                        <div class="col-lg-10 data row" style="margin: 0;">
                           <select name="standard_type" class="client_type">
                               <option value="1" @selected(1 == $standard_type)>boolean</option>
                               <option value="2" @selected(2 == $standard_type)>Text</option>
                           </select>
                            
                            @if($standard_type == 2)
                            <div class="client_text">
                            @else
                            <div class="client_text" style="display: none;">
                            @endif
                                <input type="text" placeholder="Enter Standard" name="standard_text" value="{{$standard_text}}">
                                @if($errors->has('standard_text')) <p class="error_mes">{{ $errors->first('standard_text') }}</p> @endif
                            </div>

                            @if($standard_type == 1)
                            <div class="client_boolean row">
                            @else  
                            <div class="client_boolean row" style="display: none;">
                            @endif
                                <label><input type="radio" class="input-radio on" name="standard" value="1" @checked(1 == $standard)> YES</label>
                                <label><input type="radio" class="input-radio off" name="standard" value="2" @checked(2 == $standard)> NO</label>
                                @if($errors->has('standard')) <p class="error_mes">{{ $errors->first('standard') }}</p> @endif
                            </div>
                        </div>
                     </div>   
                  </div>
               </div> 


               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Premium</label>
                        </div>
                        <div class="col-lg-10 data row" style="margin: 0;">
                           <select name="premium_type" class="colleague_type">
                               <option value="1" @selected(1 == $premium_type)>boolean</option>
                               <option value="2" @selected(2 == $premium_type)>Text</option>
                           </select>
                            
                            @if($premium_type == 2)
                            <div class="colleague_text">
                            @else
                            <div class="colleague_text" style="display: none;">
                            @endif
                                <input type="text" placeholder="Enter Premium" name="premium_text" value="{{$premium_text}}">
                                @if($errors->has('premium_text')) <p class="error_mes">{{ $errors->first('premium_text') }}</p> @endif
                            </div>

                            @if($premium_type == 1)
                            <div class="colleague_boolean row">
                            @else
                            <div class="colleague_boolean row" style="display: none;">
                            @endif
                                <label><input type="radio" class="input-radio on" name="premium" value="1" @checked(1 == $premium)> YES</label>
                                <label><input type="radio" class="input-radio off" name="premium" value="2" @checked(2 == $premium)> NO</label>
                                @if($errors->has('premium')) <p class="error_mes">{{ $errors->first('premium') }}</p> @endif
                            </div>
                        </div>
                     </div>   
                  </div>
               </div> 


               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Business</label>
                        </div>
                        <div class="col-lg-10 data row" style="margin: 0;">
                           <select name="business_type" class="partner_type">
                               <option value="1" @selected(1 == $business_type)>boolean</option>
                               <option value="2" @selected(2 == $business_type)>Text</option>
                           </select>
                            
                            @if($business_type == 2)
                            <div class="partner_text">
                            @else
                            <div class="partner_text" style="display: none;">
                            @endif
                                <input type="text" placeholder="Enter Business" name="business_text" value="{{$business_text}}">
                                @if($errors->has('business_text')) <p class="error_mes">{{ $errors->first('business_text') }}</p> @endif
                            </div>

                            @if($business_type == 1)
                            <div class="partner_boolean row">
                            @else
                            <div class="partner_boolean row" style="display: none;">
                            @endif
                                <label><input type="radio" class="input-radio on" name="business" value="1" @checked(1 == $business)> YES</label>
                                <label><input type="radio" class="input-radio off" name="business" value="2" @checked(2 == $business)> NO</label>
                                @if($errors->has('business')) <p class="error_mes">{{ $errors->first('business') }}</p> @endif
                            </div>
                        </div>
                     </div>   
                  </div>
               </div>                           

               <div class="uplode-btn" style="text-align: center;">
                  <button>submit</button>
                  <a href="{{url('admin/package_services')}}">Back</a>
               </div>
            </div>
         </div>

         </form>
      </div>
     
<style type="text/css">
    .client_text{
        margin: auto;
        width: 75%;
    }
    .client_type{
        width: 20%!important;
    }
    .client_boolean{
        padding-left: 20px;
     }
    .client_boolean label {
        display: flex;
        margin: 10px 15px;
        align-items: center;
    }

    .client_boolean label {
        cursor: pointer;
    }    
    .client_boolean .input-radio {
        box-shadow: 0px 0px 0px 1px #6d6d6d;
        font-size: 3em;
        width: 15px;
        height: 15px;
        margin-right: 7px;

        border: 4px solid #fff;
        background-clip: border-box;
        border-radius: 50%;
        appearance: none;
        transition: background-color 0.3s, box-shadow 0.3s;

    }
    .input-radio.on:checked {
        box-shadow: 0px 0px 0px 4px #00eb27;
        background-color: #51ff6e;
    }
    .input-radio.off:checked {
        box-shadow: 0px 0px 0px 4px #eb0000;
        background-color: #ff5151;
    }



    .colleague_text{
        margin: auto;
        width: 75%;
    }
    .colleague_type{
        width: 20%!important;
    }
    .colleague_boolean{
        padding-left: 20px;
     }
    .colleague_boolean label {
        display: flex;
        margin: 10px 15px;
        align-items: center;
    }

    .colleague_boolean label {
        cursor: pointer;
    }    
    .colleague_boolean .input-radio {
        box-shadow: 0px 0px 0px 1px #6d6d6d;
        font-size: 3em;
        width: 15px;
        height: 15px;
        margin-right: 7px;

        border: 4px solid #fff;
        background-clip: border-box;
        border-radius: 50%;
        appearance: none;
        transition: background-color 0.3s, box-shadow 0.3s;

    }
    
    .partner_text{
        margin: auto;
        width: 75%;
    }
    .partner_type{
        width: 20%!important;
    }
    .partner_boolean{
        padding-left: 20px;
     }
    .partner_boolean label {
        display: flex;
        margin: 10px 15px;
        align-items: center;
    }

    .partner_boolean label {
        cursor: pointer;
    }    
    .partner_boolean .input-radio {
        box-shadow: 0px 0px 0px 1px #6d6d6d;
        font-size: 3em;
        width: 15px;
        height: 15px;
        margin-right: 7px;

        border: 4px solid #fff;
        background-clip: border-box;
        border-radius: 50%;
        appearance: none;
        transition: background-color 0.3s, box-shadow 0.3s;

    }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script type="text/javascript">

           function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#summernote').summernote({
        placeholder: 'About Us',
        tabsize: 2,
        height: 120,
        callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                }
        },
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
      /*    ['view', ['fullscreen', 'codeview', 'help']]*/
        ]
      });


    $('.client_type').on('change', function() {
        var client_type=$(".client_type").val();

        if(client_type ==1){
            $(".client_boolean").show();
            $(".client_text").hide();
        }else{
            $(".client_boolean").hide();
            $(".client_text").show();
        }
    });


    $('.colleague_type').on('change', function() {
        var colleague_type=$(".colleague_type").val();

        if(colleague_type ==1){
            $(".colleague_boolean").show();
            $(".colleague_text").hide();
        }else{
            $(".colleague_boolean").hide();
            $(".colleague_text").show();
        }
    });

    $('.partner_type').on('change', function() {
        var partner_type=$(".partner_type").val();

        if(partner_type ==1){
            $(".partner_boolean").show();
            $(".partner_text").hide();
        }else{
            $(".partner_boolean").hide();
            $(".partner_text").show();
        }
    });
    

</script>



@endsection