
<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="lib/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="lib/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="lib/css/responsive.css" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
      <style type="text/css">
        .center{
            margin: auto;
            width: 65%;
            text-align: center;
            padding: 50px;
        }
        table,th,tr{
           border:1px solid gray;
        }
        .div_th{
            font-size: 17px;
            padding: 3px;
            text-align: center;
            background-color: #f7444e;
            
        }

    </style>
   </head>
   <body>
      <div class="hero_area">
      <header class="header_section">
         @include('home.header')
         </header>
         <div class="heading_container heading_center">
               <h2 style="font-size: 35px;">
                 Cart List
               </h2>
            </div>
            @if(session()->has('message'))
                    <div class="alert alert-success" >
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{session()->get('message')}}
                    </div>
                @endif
        <div class="center">
            <table >
                <thead>
                    
                    <tr>
                        <th  class="div_th" style="width:10%">Product</th>
                        <th   class="div_th" style="width:10%">Image</th>
                        <th  class="div_th" style="width:3%">Quantity</th>
                        <th  class="div_th" style="width:8%">Price</th>
                        <th  class="div_th" style="width:5%">Action</th>
                     
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $total_price =0 ?>
                        @foreach($data as $data )
                        
                            <tr >
                                <th >{{ $data->product_title }}</th>
                                <th ><img src="/product_img/{{$data->image}}" style="max-height: 150px; max-width:270px; "></th>
                                <td >{{ $data->quantity }}</th>
                                <th >${{ $data->price }}</th>
                                <th><a onclick="return confirm('Bạn có chắc xoá không ?')"   href="{{ route('delete_cart', $data->id) }}" class="btn btn-danger"><i class="material-icons">&#xe872;</i></a></th>
                            </tr>
                            <?php $total_price +=$data->price ?>
                        @endforeach
                
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" style="text-align:right; justify-content:center;"><h3><strong>Total price: ${{ $total_price }}</strong></h3></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align:right;">
                            
                            <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                            <a href="{{ url('/cash_order') }}" class="btn btn-success"> <i class="fa fa-money"></i> Checkout By Delivery</a>
                            <a href="{{ url('/stripe',$total_price) }}" class="btn btn-success"> <i class="fa fa-money"></i> Pay Using Card</a>
                            
                        </td>
                    </tr>
                </tfoot>
    </table>
        </div>
    
      </div>
   
   
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p>© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a></p>
      </div>
      <!-- jQery -->
      <script src="lib/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="lib/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="lib/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="lib/custom.js"></script>
   </body>
</html>


