<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="//cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css"/>
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                        <h1>customers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">customers</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h3 class="card-title">Customers</h3>

                                    </div>
                                    <div class="col-lg-4 ">
                                        <button type="button" class="btn btn-default float-right" data-toggle="modal" data-target="#modal-default">
                                            Add customers
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="10%">ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="category_row">

                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Customers</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="customerAdd">
                        <div class="modal-body">
                            <div class="inner_form">
                                <div class="form-group">
                                    <label for="name">Customer Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Customer Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Customer Email ID</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Customer Email">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Customer Mobile Number</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Customer Mobile Number">
                                </div>
                                <div class="input-group form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="customer_tc" class="custom-control-input" id="customer_tc">
                                        <label class="custom-control-label" for="customer_tc">I agree to the <a href="#">terms of service</a>.</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        <!---------------------Update section--------------------------------->
        <div class="modal fade" id="modal-update">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Customers</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateAdd">
                        <div class="modal-body">
                            <div class="inner_form">
                                <div class="form-group">
                                    <label for="customer_name">Customer Name</label>
                                    <input type="text" name="name" class="form-control" id="customer_name" placeholder="Enter Customer Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Customer Email ID</label>
                                    <input type="email" name="customer_email" class="form-control" id="customer_email" placeholder="Enter Customer Email">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Customer Mobile Number</label>
                                    <input type="text" name="customer_mobile" class="form-control" id="customer_mobile" placeholder="Enter Customer Mobile Number">
                                </div>
                                <input type="hidden" name="idc" id="idc">
                                <div class="input-group form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="update_tc_customer" class="custom-control-input" id="update_tc_customer">
                                        <label class="custom-control-label" for="update_tc_customer">I agree to the <a href="#">terms of service</a>.</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>

    @include('components.dashboard.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Toastr -->
<!-- AdminLTE App -->
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script src="//cdn.datatables.net/2.1.4/js/dataTables.min.js" ></script>
{{--<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>--}}
<!-- Page specific script -->
<script>

    getCategory();


    async function getCategory(){

        try {
            let response = await axios.get('/getCustomers');
            if(response.status===200 && response.data['status']==='success'){
                console.log(response.data.data);
                $.each(response.data.data, function(key, value) {
                    //console.log(value.category_name);
                    let table_row = `<tr>
                                        <td>${key+1}</td>
                                        <td>${value.name}</td>
                                        <td>
                                            ${value.email}
                                        </td>
                                        <td>
                                            ${value.mobile}
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn edit-data" data-toggle="modal" data-target="#modal-update" data-edit="${value.id}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                                |
                                            <a href="javascript:void(0)" class="btn delete-data"  data-delete="${value.id}">
                                                <i class="fas fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>`;
                    $('#category_row').append(table_row);
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
        new DataTable('#example2',{
            order:[[0,'asc']],
            lengthMenu:[5,10,15,20,30]
        });
    }
    editCustomer();
    async function editCustomer(){
        $("body").on("click",".edit-data",async function (){
            let id = $(this).data('edit');
            console.log(id);
            $('#idc').val(id);
            let response = await axios.post('/CustomerById',{id:id});
            if (response.status === 200 && response.data.status === 'success') {
                let result = response.data.data
                $('#customer_name').val(result.name);
                $('#customer_email').val(result.email);
                $('#customer_mobile').val(result.mobile);

                $(this).closest('.category-item').remove(); // Adjust selector as needed
            } else {
                Toast.fire({
                    icon: 'error',
                    title:'No response from server'
                });
            }
        });
    }
    deleteCategory();
    async function deleteCategory() {
        $("body").on("click", ".delete-data", async function () {
            try {
                let delete_category_id = $(this).data('delete');
                // Sending the DELETE request with a payload
                let response = await axios.delete('/deleteCustomer', {
                    data: { id: delete_category_id }
                });

                if (response.status === 200 && response.data.status === 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: response.data.message
                    });
                    // Optionally, you might want to remove the deleted item from the DOM
                    $(this).closest('.category-item').remove(); // Adjust selector as needed
                    setTimeout(function (){
                        window.location.href = "/customers";
                    },1500);
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.data.message || 'No response from server'
                    });
                }
            } catch (error) {
                Toast.fire({
                    icon: 'error',
                    title: error.response?.data?.message || 'An error occurred'
                });
            }
        });
    }

</script>


<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->

<!-- jQuery -->
<!-- Bootstrap 4 -->

<!-- AdminLTE App -->

<!-- AdminLTE App -->

<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<script>
    $('#updateAdd').on('submit', async function(event) {
        event.preventDefault();
        if (!$('#update_tc_customer').is(':checked')) {
            Toast.fire({
                icon: 'error',
                title: 'You must agree to the terms and conditions.'
            });
        }else {
            let customer_name = $('#customer_name').val();
            let customer_email = $('#customer_email').val();
            let customer_mobile = $('#customer_mobile').val();

            let getId = $("#idc").val();
            // Check if an image file is selected


            // Create a new FormData instance
            const formData = new FormData();
            formData.append('name', customer_name);
            formData.append('email', customer_email);
            formData.append('mobile', customer_mobile);
            formData.append('id',getId);
            let response = await axios.post('/updateCustomer', formData);
            if(response.status===200 && response.data['status']==='success'){
                Toast.fire({
                    icon: 'success',
                    title: response.data['message']

                });
                setTimeout(function (){
                    window.location.href = "/customers";
                },1200);
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
        }
    });
    $('#customerAdd').on('submit', async function(event) {
        event.preventDefault(); // Prevents the default form submission

        try {
            if (!$('#customer_tc').is(':checked')) {
                Toast.fire({
                    icon: 'error',
                    title: 'You must agree to the terms and conditions.'
                });
            }else {
                // Get form values
                let customerName = $("#name").val();
                let customerEmail = $("#email").val();
                let customerMobile = $("#mobile").val();



                // Create a new FormData instance
                const formData = new FormData();
                formData.append('name', customerName);
                formData.append('email', customerEmail);
                formData.append('mobile', customerMobile);

                try {
                    // Send the POST request
                    const response = await axios.post('/createCustomer', formData);

                    // Handle the response based on status
                    if (response.status === 200 && response.data['status'] === 'success') {
                        Toast.fire({
                            icon: 'success',
                            title: response.data['message']
                        });
                        setTimeout(function() {
                            window.location.href = "/customers";
                        }, 3000);
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: response.data['message']
                        });
                    }
                } catch (error) {
                    // Handle any errors from the request
                    Toast.fire({
                        icon: 'error',
                        title: 'An error occurred. Please try again later.'
                    });
                }

            }
        } catch (error) {
            Toast.fire({
                icon: 'error',
                title: 'An error occurred while submitting the form.'
            });
            // console.error('An error occurred:', error);
        }
    });
    $(function () {

        $.validator.setDefaults({
            submitHandler: function () {
                alert( "Form successful submitted!" );
            }
        });
        $('#customerAdd').validate({
            rules: {
                name: {
                    required: true,
                    name: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                mobile: {
                    required: true,
                    mobile: true,
                },
                customer_tc: {
                    required: true
                },
            },
            messages: {
                name: {
                    required: "Please enter a Name",
                    name: "Please enter a vaild Name"
                },
                email: {
                    required: "Please provide a Email ID",
                    email: "Please Valid Email ID"
                },
                mobile:{
                  required:"please Enter Mobile Number"
                },
                customer_tc: "Please accept our terms"
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
