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
            <p class="login-box-msg">Sign in to start your session</p>

            <form id="login">
                <div class="input-group form-group mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group form-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
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
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mt-2 mb-3">
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{url('/forgotPassword')}}">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="{{url('/register')}}" class="text-center">Register a new membership</a>
            </p>
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
    $('#login').on('submit', async function(event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way
        if (!$('#exampleCheck1').is(':checked')) {
            Toast.fire({
                icon: 'error',
                title: 'You must agree to the terms and conditions.'
            });
        }else {
            // Gather form data
            let email = $('#email').val();
            let password = $('#password').val();
            console.log(email,password)
            try {
                let response = await axios.post('/user-login',{email:email,password:password});
                if(response.status===200 && response.data['status']==='success'){
                    Toast.fire({
                        icon: 'success',
                        title: response.data['message']

                    });
                    setTimeout(function (){
                        window.location.href = "/dashboard";
                    },3000);
                }else if(response.status===500 && response.data['status']==='failed'){
                    Toast.fire({
                        icon: 'error',
                        title: response.data['message']
                    });
                }else {
                    Toast.fire({
                        icon: 'error',
                        title: response.data['message']
                    });
                }
            }catch (error) {
                if (error.response) {
                    // Server responded with a status other than 2xx
                    Toast.fire({
                        icon: 'error',
                        title: error.response.data.message || 'Server error'
                    });
                } else if (error.request) {
                    // Request was made but no response received
                    Toast.fire({
                        icon: 'error',
                        title: 'No response from server'
                    });
                } else {
                    // Something else happened
                    Toast.fire({
                        icon: 'error',
                        title: error.message || 'Request failed'
                    });
                }
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
        $('#login').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                terms: {
                    required: true
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
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
