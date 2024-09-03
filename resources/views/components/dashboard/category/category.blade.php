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
<!-- Content Wrapper. Contains page content -->
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    @include('components.dashboard.header')

    <!-- Main Sidebar Container -->
    @include('components.dashboard.sideber')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
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
                                        <h3 class="card-title">Product Category</h3>

                                    </div>
                                    <div class="col-lg-4 ">
                                        <button type="button" class="btn btn-default float-right" data-toggle="modal" data-target="#modal-default">
                                            Add Category
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
                                        <th>Category Name</th>
                                        <th>Category Image</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="category_row">

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>CSS grade</th>
                                    </tr>
                                    </tfoot>
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
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="categoryAdd">
                        <div class="modal-body">
                            <div class="inner_form">
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Enter Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="image">Category Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="category_tc" class="custom-control-input" id="category_tc">
                                        <label class="custom-control-label" for="category_tc">I agree to the <a href="#">terms of service</a>.</label>
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
                        <h4 class="modal-title">Update Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateAdd">
                        <div class="modal-body">
                            <div class="inner_form">
                                <div class="form-group">
                                    <label for="update_category_name">Category Name</label>
                                    <input type="text" name="update_category_name" class="form-control" id="update_category_name" placeholder="Enter Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="image">Category Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="update_image" name="update_image">
                                            <label class="custom-file-label" for="update_image">Choose file</label>
                                        </div>
                                        <span id="gt_ud"></span>
                                    </div>
                                </div>
                                <input type="hidden" name="idc" id="idc">
                                <div class="input-group form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="update_tc_cat" class="custom-control-input" id="update_tc_cat">
                                        <label class="custom-control-label" for="update_tc_cat">I agree to the <a href="#">terms of service</a>.</label>
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
<!-- /.login-box -->

<script src="//cdn.datatables.net/2.1.4/js/dataTables.min.js" ></script>
{{--<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>--}}
<!-- Page specific script -->
<script>

    getCategory();


    async function getCategory(){

        try {
            let response = await axios.get('/getCategory');
            if(response.status===200 && response.data['status']==='success'){
                console.log(response.data.data);
                $.each(response.data.data, function(key, value) {
                    //console.log(value.category_name);
                    let table_row = `<tr>
                                        <td>${key+1}</td>
                                        <td>${value.category_name}</td>
                                        <td>
                                            <div class="cat_image">
                                                <img src="storage/images/${value.image}" alt="" srcset="" width="70px">
                                            </div>
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
    editCategory();
    async function editCategory(){
        $("body").on("click",".edit-data",async function (){
           let edit_category_id = $(this).data('edit');
           console.log(edit_category_id);
            $('#idc').val(edit_category_id);
            let response = await axios.post('/getCategoriesbyId', {id: edit_category_id});
            if (response.status === 200) {
                console.log(response.data.category_name);
                $('#update_category_name').val(response.data.category_name);
                $('#gt_ud').html(response.data.image);
                $('#update_image').val(response.data.image);

                // Optionally, you might want to remove the deleted item from the DOM
                $(this).closest('.category-item').remove(); // Adjust selector as needed
                // setTimeout(function (){
                //     window.location.href = "/category";
                // },1500);
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
                let response = await axios.delete('/deleteCategory', {
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
                        window.location.href = "/category";
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
<!-- jQuery -->
<!-- Bootstrap 4 -->

<!-- AdminLTE App -->

<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<script>
    $('#updateAdd').on('submit', async function(event) {
        event.preventDefault();
        if (!$('#update_tc_cat').is(':checked')) {
            Toast.fire({
                icon: 'error',
                title: 'You must agree to the terms and conditions.'
            });
        }else {

            let update_category_name = $("#update_category_name").val();
            let update_image = $("#update_image")[0].files[0]; // Get the first selected file
            let getId = $("#idc").val();
            // Check if an image file is selected
            if (!update_image) {
                Toast.fire({
                    icon: 'error',
                    title: 'Please select an image file.'
                });
                return;
            }

            // Create a new FormData instance
            const formData = new FormData();
            formData.append('image', update_image);
            formData.append('category_name', update_category_name);
            formData.append('id',getId);
            let response = await axios.post('/updateCategory', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            if(response.status===200 && response.data['status']==='success'){
                Toast.fire({
                    icon: 'success',
                    title: response.data['message']

                });
                setTimeout(function (){
                    window.location.href = "/category";
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
    $('#categoryAdd').on('submit', async function(event) {
        event.preventDefault(); // Prevents the default form submission

        try {
            if (!$('#category_tc').is(':checked')) {
                Toast.fire({
                    icon: 'error',
                    title: 'You must agree to the terms and conditions.'
                });
            }else {
                // Get form values
                let category_name = $("#category_name").val();
                let image = $("#image")[0].files[0]; // Get the first selected file

                // Check if an image file is selected
                if (!image) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Please select an image file.'
                    });
                    return;
                }

                // Create a new FormData instance
                const formData = new FormData();
                formData.append('image', image);
                formData.append('category_name', category_name);

                try {
                    // Send the POST request
                    const response = await axios.post('/createCategory', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    });

                    // Handle the response based on status
                    if (response.status === 200 && response.data['status'] === 'success') {
                        Toast.fire({
                            icon: 'success',
                            title: response.data['message']
                        });
                        setTimeout(function() {
                            window.location.href = "/category";
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
        $('#categoryAdd').validate({
            rules: {
                category_name: {
                    required: true,
                    category_name: true,
                },
                image: {
                    required: true,
                    image: true,
                },
                category_tc: {
                    required: true
                },
            },
            messages: {
                category_name: {
                    required: "Please enter a Category Name",
                    category_name: "Please enter a vaild Category Name"
                },
                image: {
                    required: "Please provide a Category Image",
                    image: "Please Upload Category Image"
                },
                category_tc: "Please accept our terms"
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
