<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="Admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="Admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="Admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="Admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="Admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="Admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="Admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="Admin/assets/images/favicon.png" />
    <style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .fontsize{
            font-size: 35px;
            padding-bottom: 40px;
        }
        .centertable{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border:3px solid gray;
        }
        .text-color{
            color: black;
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width:200px;
        }
        .div-design{
            padding-bottom: 15px;
        }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

        <!-- partial -->
        @include('admin.header')
         <!-- partial -->
         <div class="main-panel">
          <div class="content-wrapper">
          <div class="div_center"> 
          @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{session()->get('message')}}
                    </div>
                @endif
            <h2 class="fontsize">Add Product</h2>
            <form method="POST" action="/add_product" enctype="multipart/form-data">
                @csrf
                <div class="div-design">
                <label>Product title</label>
                <input type="text" name="title" placeholder="Write product title..." class="text-color" required="">
                </div>

                <div class="div-design">
                <label>Product description</label>
                <input type="text" name="description" placeholder="Write product description..." class="text-color" required="">
                </div>

                <div class="div-design">
                <label>Product price</label>
                <input type="number" name="price" placeholder="Write product price..." class="text-color" required="">
                </div>

                <div class="div-design">
                <label>Product quantity</label>
                <input type="number" min="0" name="quantity" placeholder="Write product quantity..." class="text-color" required="">
                </div>

                <div class="div-design">
                <label>Product category</label>
                <select class="text-color" required="" name="category">
                    <option selected="" value="">Choose a category</option>
                    @foreach($data as $data)
                    <option value="{{ $data->category_name }}">{{ $data->category_name }}</option>
                    @endforeach
                </select>
                </div>

                <div class="div-design">
                <label>Product discount</label>
                <input type="number" name="discount_price" placeholder="Write product discount..." class="text-color" required="">
                </div>

                <div class="div-design">
                <label>Product image here</label>
                <input type="file" name="image" required="">
                </div>
                
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
           
            </div>
          </div>
         </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="Admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="Admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="Admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="Admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="Admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="Admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="Admin/assets/js/off-canvas.js"></script>
    <script src="Admin/assets/js/hoverable-collapse.js"></script>
    <script src="Admin/assets/js/misc.js"></script>
    <script src="Admin/assets/js/settings.js"></script>
    <script src="Admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="Admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
