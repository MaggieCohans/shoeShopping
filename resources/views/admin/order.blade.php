<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Shopping Cart</title>
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .center{
            margin: auto;
            width: 70%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
            padding: 5px;
        }
        .fontsize{
            font-size: 35px;
           
            justify-content: center;
            text-align: center;
        }
        .imgsize{
            width: 130px;
            height: 130px;
            object-fit: cover;

        }
        .th_design{
            padding: 25px;
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
          @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{session()->get('message')}}
                    </div>
                @endif
            <h2 class="fontsize">All Order</h2>
            <div style="padding-left:600px; padding-bottom:20px;margin-top:30px;">
                <form action="{{url('search')}}" method="get">
                    @csrf
                    <input type="text" style="color: black;" name="search" placeholder="Search something">
                    <input type="submit" value="Search" class="btn btn-outline-primary">
                </form>
            </div>
            <table class="center">
                <tr style="background-color:teal;">
                    <th class="th_design">Name</th>
                    <th class="th_design">Email</th>
                    <th class="th_design">Product title</th>
                    <th class="th_design">Quantity</th>
                    <th class="th_design">Price</th>
                    <th class="th_design">Image</th>
                    <th class="th_design">Delivery status</th>
                    <th class="th_design">Payment status</th>
                    <th class="th_design">Delivered</th>
                    <th class="th_design">Print PDF</th>


    
                </tr>
                @forelse($data as $data)
                <tr>
                    <th>{{ $data->name }}</th>
                    <th>{{ $data->email }}</th>
                    <th>{{ $data->product_title }}</th>
                    <th>{{ $data->quantity }}</th>
                    <th>{{ $data->price }}</th>
                    <th><img class="imgsize" src="/product_img/{{$data->image}}"></th>
                    <th>{{ $data->deliver_status }}</th>
                    <th>{{ $data->payment_status }}</th>
                    @if($data->deliver_status=="On Processing")
                        <th>
                            <a href="{{url('delivered',$data->id)}}" onclick="return confirm('Are you sure want this product to delivered?')" class="btn btn-primary">Delivered</a>
                        </th>
                    @else
                        <th style="color: white;">delivered</th>
                    @endif
                    <th>
                        <a href="{{url('print',$data->id)}}" onclick="return confirm('Are you sure want this product to print PDF?')" class="btn btn-success">Print</a>

                    </th>

                </tr>
                @empty
                <tr>
                <td colspan="16">No Data Found</td>
                </tr>
                @endforelse
            </table>
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
