@extends('layouts.app')
@section('content')
    <!--//main-content-->
    <!---->
    <style type="text/css">
  .error{
    color: red;
  }
</style>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact Us</li>
    </ol>
    <!---->
    <!--// mian-content -->
    <!-- banner -->
    <section class="ab-info-main py-5">
        <div class="container py-3">
            <h3 class="tittle text-center"><span class="sub-tittle">Find Us</span> Contact Us</h3>
            <div class="row contact-main-info mt-5">
                <div class="col-md-6 contact-right-content">
                    <form action="{{url('contact')}}" method="post" name="contact" id="contact">
                        {{csrf_field()}}
                        <input type="text" name="name" placeholder="Name" required="">
                        <input type="email" class="email" name="email" placeholder="Email" required="">
                        <input type="tel" name="phone " placeholder="Phone" required="">
                        <textarea name="message" placeholder="Message" required=""></textarea>
                        <div class="read mt-3">
                            <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 contact-left-content">
                    <div class="address-con">
                        <h4 class="mb-2"><span class="fa fa-phone-square" aria-hidden="true"></span> Phone</h4>
                        <p>+121 098 8907 9987</p>
                        <p>+121 098 8907 9987</p>
                    </div>
                    <div class="address-con my-4">
                        <h4 class="mb-2"><span class="fa fa-envelope-o" aria-hidden="true"></span> Email </h4>
                        <p><a href="mailto:info@example.com">info@example.com</a></p>
                        <p><a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                    <div class="address-con mb-4">
                        <h4 class="mb-2"><span class="fa fa-fax" aria-hidden="true"></span> Fax</h4>

                        <p>(800) 123-80088</p>
                    </div>
                    <div class="address-con">
                        <h4 class="mb-2"><span class="fa fa-map-marker" aria-hidden="true"></span> Location </h4>

                        <p>Honey Avenue, New York City</p>
                    </div>

                </div>

            </div>
            <div class="map-fo mt-lg-5 mt-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423286.27404345275!2d-118.69191921441556!3d34.02016130939095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos+Angeles%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1522474296007" allowfullscreen></iframe>
            </div>
        </div>
    </section>

<script >
    $(document).ready(function () {
    $('#contact').validate({ // initialize the plugin
        rules: {
            
            name: {
                required:true,
                maxlength: 50,
                minlength:2

            },
            email:{
                required:true,
                minlength:2,
                maxlength:50
            },
            phone: {
                required: true,
                pattern: "[0-9]+",
                minlength:10,
                maxlength:10

            },
            
            message:{
                required:true,
                minlength:2,
                maxlength:50
            }  
        },
        messages:{
            
           name:{
                required:"Name is required"

            },
             email:{
                required:"Email cann't be blank!",
            },
            phone:{
                required:"mobile number is required",
                pattern:"please input valid mobile number",
                minlength:"minimum 10 digit number required"
            },
           
            message:{
                required:"Message cann't be blank!",
            }
          
        }



    });

});
</script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <!-- //contact -->
@endsection