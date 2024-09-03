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
                        <h1>Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">product</li>
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
                                        <h3 class="card-title">Product</h3>

                                    </div>
                                    <div class="col-lg-4 ">
                                        <button type="button" class="btn btn-default float-right add_product" data-toggle="modal" data-target="#modal-default">
                                            Add Product
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
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Unit</th>
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
                        <h4 class="modal-title">Add Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="productAdd">
                        <div class="modal-body">
                            <div class="inner_form">
                                <div class="form-group">
                                    <label for="category_name_value">Product Category</label>
                                    <select class="form-control category_name_value" name="category_name_value" >
                                        <option>Select a Category</option>
                                    </select>
{{--                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Customer Name">--}}
                                </div>
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Product Price</label>
                                    <input type="text" name="price" class="form-control" id="price" placeholder="Enter Product Price">
                                </div>
                                <div class="form-group">
                                    <label for="unit">Product Unit</label>
                                    <input type="text" name="unit" class="form-control" id="unit" placeholder="Enter Product Unit">
                                </div>
                                <div class="form-group">
                                    <label for="image_url">Product Image</label>
                                    <input type="file" name="image_url" class="form-control" id="image_url" >
                                </div>
                                <div class="input-group form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="prd_tc_customer" class="custom-control-input" id="prd_tc_customer">
                                        <label class="custom-control-label" for="prd_tc_customer">I agree to the <a href="#">terms of service</a>.</label>
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
                        <h4 class="modal-title">Update Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateAdd">
                        <div class="modal-body">
                            <div class="inner_form">
                                <div class="form-group">
                                    <label for="category_name_value">Product Category</label>
                                    <select class="form-control category_name_value" name="category_name_value"  >
                                        <option>Select a Category</option>
                                    </select>
                                    {{--                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Customer Name">--}}
                                </div>
                                <div class="form-group">
                                    <label for="u_name">Product Name</label>
                                    <input type="text" name="u_name" class="form-control" id="u_name" placeholder="Enter Product Name">
                                </div>
                                <div class="form-group">
                                    <label for="u_price">Product Price</label>
                                    <input type="text" name="u_price" class="form-control" id="u_price" placeholder="Enter Product Price">
                                </div>
                                <div class="form-group">
                                    <label for="u_unit">Product Unit</label>
                                    <input type="text" name="u_unit" class="form-control" id="u_unit" placeholder="Enter Product Unit">
                                </div>
                                <div class="mb-3">
                                    <img src="" alt="" srcset="" id="set_update_image" style="width: 100px">
                                </div>
                                <div class="form-group">
                                    <label for="u_image_url">Product Image</label>
                                    <input type="file" name="u_image_url" class="form-control" id="u_image_url" >
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

   getProduct();


    async function getProduct(){
        try {
            let response = await axios.get('/getProduct');
            if(response.status===200 && response.data['status']==='success'){
                console.log(response.data.data);
                $.each(response.data.data, function(key, value) {
                    //console.log(value.category_name);
                    let table_row = `<tr>
                                        <td>${key+1}</td>
                                        <td>
                                            <div class="cat_image">
                                                 <img id="product_by_${value.id}" src="storage/product_images/${value.image_url}" alt="" srcset="" width="70px">
                                            </div>
                                        </td>
                                        <td>${value.name}</td>
                                        <td>
                                           ₹ ${value.price} /-
                                        </td>
                                        <td>
                                            ${value.unit}
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

    async function getCategory(){
        $('.category_name_value').html('');
        try {
            let response = await axios.get('/getCategory');
            if(response.status===200 && response.data['status']==='success'){
                console.log(response.data.data);
                $.each(response.data.data, function(key, value) {
                    //console.log(value.category_name);
                    let category_name_value = `<option value="${value.id}">${value.category_name}</option>`;
                    $('.category_name_value').append(category_name_value);
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
   $(document).ready(function() {
       $('#set_update_image').attr('src', 'https://placehold.co/600x400/000000/FFF');
   });
   $('#u_image_url').on('change', function(event) {
       // Get the file input element
       let fileInput = event.target;

       // Ensure a file was selected
       if (fileInput.files && fileInput.files[0]) {
           let file = fileInput.files[0];

           // Create a URL for the selected file
           let imageUrl = URL.createObjectURL(file);

           // Set the image URL as the src of the <img> element
           $('#set_update_image').attr('src', imageUrl);
       } else {
           // Clear the image if no file is selected
           $('#set_update_image').attr('src', '');
       }
   });
    editCustomer();
    async function editCustomer(){
        $("body").on("click",".edit-data",async function (){
            getCategory();
            let id = $(this).data('edit');
            console.log(id);
            $('#idc').val(id);
            let response = await axios.post('/getByIdProduct',{product_id:id});
            if (response.status === 200 && response.data.status === 'success') {
                let result = response.data.data
                console.log(result);
                //let category_name_value = `<option value="${result.category_id}">${result.category_id}</option>`;u_image_url
                $('.category_name_value').val(result.category_id);
               // $('#u_category').val(result.name);
                $('#u_name').val(result.name);
                $('#u_price').val(result.price);
                $('#u_unit').val(result.unit);


                if (result.image_url) {
                    // Set the image URL as the src of the <img> element
                    $('#set_update_image').attr('src', 'storage/product_images/'+result.image_url);
                } else {
                    // Optionally handle cases where the image URL is missing or invalid
                    $('#set_update_image').attr('src', '');
                }
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
                let delete_product_id = $(this).data('delete');
                let delete_file_path = $("#product_by_" + delete_product_id).attr("src");
                console.log(delete_file_path,delete_product_id)
                //Sending the DELETE request with a payload
                let response = await axios.delete('/deleteProduct', {
                    data: { product_id: delete_product_id,file_path:delete_file_path }
                });

                if (response.status === 200 && response.data.status === 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: response.data.message
                    });
                    // Optionally, you might want to remove the deleted item from the DOM
                    $(this).closest('.category-item').remove(); // Adjust selector as needed
                    setTimeout(function (){
                        window.location.href = "/product";
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
            let image_url = $("#u_image_url")[0].files[0]; // Get the first selected file

            // Check if an image file is selected
            if (!image_url) {
                Toast.fire({
                    icon: 'error',
                    title: 'Please select an image file.'
                });
                return;
            }
            // Get form values
            let category = $(".category_name_value").val();
            let product_name = $("#u_name").val();
            let price = $("#u_price").val();
            let unit = $("#u_unit").val();
            const formData = new FormData();


            // Create a new FormData instance
            formData.append('category_id', category);
            formData.append('name', product_name);
            formData.append('price', price);
            formData.append('unit',unit);
            formData.append('image_url',image_url)

            let getId = $("#idc").val();
            // Check if an image file is selected
            formData.append('product_id',getId);
            let response = await axios.post('/updateByIdProduct', formData, {
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
                    window.location.href = "/product";
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
    $('.add_product').click(function (){
        getCategory();
    })
    $('#productAdd').on('submit', async function(event) {
        event.preventDefault(); // Prevents the default form submission

        try {
            if (!$('#prd_tc_customer').is(':checked')) {
                Toast.fire({
                    icon: 'error',
                    title: 'You must agree to the terms and conditions.'
                });
            }else {
                let image_url = $("#image_url")[0].files[0]; // Get the first selected file

                // Check if an image file is selected
                if (!image_url) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Please select an image file.'
                    });
                    return;
                }
                // Get form values
                let category = $(".category_name_value").val();
                let product_name = $("#name").val();
                let price = $("#price").val();
                let unit = $("#unit").val();
                const formData = new FormData();


                // Create a new FormData instance
                formData.append('category_id', category);
                formData.append('name', product_name);
                formData.append('price', price);
                formData.append('unit',unit);
                formData.append('image_url',image_url)

                try {
                    // Send the POST request
                    const response = await axios.post('/productAdd', formData, {
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
                            window.location.href = "/product";
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
        $('#prd_tc_customer').validate({
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
                prd_tc_customer: {
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
