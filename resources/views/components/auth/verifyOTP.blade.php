<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<script src="{{asset('js/axios.min.js')}}"></script>
<div class="login-box ">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Forgot Password</p>

            <form id="verifyOTP">

                <div class="input-group form-group mb-3">
                    <input type="number" class="form-control" name="otp" id="otp" placeholder="OTP">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-keyboard"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                            <label class="custom-control-label" for="exampleCheck1"> <a href="#">terms of service</a>.</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Send OTP</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- AdminLTE App -->

<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- Page specific script -->
<script>
    let Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('#verifyOTP').on('submit', async function(event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way
        alert('hello')
        if (!$('#exampleCheck1').is(':checked')) {
            Toast.fire({
                icon: 'error',
                title: 'You must agree to the terms and conditions.'
            });
        }else {
            // Gather form data
            let otp = $('#otp').val();
            let storeEmail = localStorage.getItem("email");
            console.log(storeEmail,otp)
            let response = await axios.post('/verifyOTP',{email:storeEmail,otp:otp});
            if(response.status===200 && response.data['status']==='success'){
                Toast.fire({
                    icon: 'success',
                    title: response.message
                });
                setTimeout(function (){
                    window.location.href = "/change-password";
                },3000);
            }else {
                Toast.fire({
                    icon: 'error',
                    title: response.message
                });
            }
            // Toast.fire({
            //     icon: 'success',
            //     title: "Hii Hii"
            // });
        }
    });

    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
                alert( "Form successful submitted!" );
            }
        });
        $('#verifyOTP').validate({
            rules: {
                otp: {
                    required: true,
                    otp: true,
                },
                terms: {
                    required: true
                },
            },
            messages: {
                otp: {
                    required: "Please enter a OTP",
                    otp: "Please enter a vaild OTP"
                },
                terms: "Please accept our terms"
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
