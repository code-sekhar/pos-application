<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<script src="{{asset('js/axios.min.js')}}"></script>
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    @include('components.dashboard.header')

    <!-- Main Sidebar Container -->
    @include('components.dashboard.sideber')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Update Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update <small>Profile</small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="firstName">First Name</label>
                                                <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Enter First Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="lastName">Last Name</label>
                                                <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Enter Last Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" name="email" class="form-control" id="email"  placeholder="Enter email" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="mobile">Mobile</label>
                                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" id="password" class="form-control"  placeholder="Password">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                            <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('components.dashboard.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- /.login-box -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- AdminLTE App -->

<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- Page specific script -->
<script>

    getProfile();
    async function getProfile(){

            try {
                let response = await axios.get('/user-profile');
                if(response.status===200 && response.data['status']==='success'){
                    console.log(response.data);
                    $('#firstName').val()
                    $.each(response.data, function(key, value) {
                        $('#firstName').val(value.firstName);
                        $('#lastName').val(value.lastName);
                        $('#email').val(value.email);
                        $('#mobile').val(value.mobile);
                        $('#password').val(value.password);
                        console.log(value.firstName);
                    });
                    Toast.fire({
                        icon: 'success',
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

    }
    $('#quickForm').on('submit', async function(event) {
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
            let mobile = $('#mobile').val();
            let email = $('#email').val();
            let password = $('#password').val();
            console.log(email,password)
            try {
                let response = await axios.post('/userUpdateProfile',{firstName:firstName,lastName:lastName,mobile:mobile,password:password});
                if(response.status===200 && response.data['status']==='success'){
                    Toast.fire({
                        icon: 'success',
                        title: response.data['message']

                    });
                    setTimeout(function (){
                        window.location.href = "/profile-update";
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
        $('#quickForm').validate({
            rules: {
                firstName:{
                    required: true,
                    firstName: true,
                },
                lastName:{
                  required:true,
                  lastName:true,
                },
                email: {
                    required: true,
                    email: true,
                },
                mobile:{
                  required:true,
                  mobile:true
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
