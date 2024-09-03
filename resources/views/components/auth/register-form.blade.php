<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<script src="{{asset('js/axios.min.js')}}"></script>
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form id="register" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="lastName" name="lastName"  placeholder="Last name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" id="phone" name="phone" placeholder="phone">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
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
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                </a>
            </div>

            <a href="{{url('/')}}" class="text-center">I already have a Register</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
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
    $('#register').on('submit', async function(event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way
        if (!$('#exampleCheck1').is(':checked')) {
            Toast.fire({
                icon: 'error',
                title: 'You must agree to the terms and conditions.'
            });
        }else {
            // Gather form data
            let firstName = $('#firstName').val();
            let lastName = $('#lastName').val();
            let phone = $('#phone').val();
            let email = $('#email').val();
            let password = $('#password').val();
            console.log(email,password)
            let response = await axios.post('/user-register',{firstName:firstName,lastName:lastName,mobile:phone,email:email,password:password});
            if(response.status===200 && response.data['status']==='success'){
                Toast.fire({
                    icon: 'success',
                    title: response.message
                });
                setTimeout(function (){
                    window.location.href = "/";
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
        $('#register').validate({
            rules: {
                firstName:{
                    required: true,
                    email: true,
                },
                lastName:{
                    required: true,
                    email: true,
                },
                phone:{
                    required: true,
                    email: true,
                },
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

