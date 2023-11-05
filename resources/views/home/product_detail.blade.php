
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
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
   </head>
   <body>
      <div class="hero_area">
      <header class="header_section">
         @include('home.header')
         </header>
         <!-- detail card section -->
         <div class="card">

<div class="container-fliud">
    <form method="POST" action="{{url('add_cart',$data->id)}}">
        @csrf
        <input type="hidden" name="sp_ma" id="sp_ma" value="5">
        <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
        <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
        <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

        <div class="wrapper row">
            <div class="preview col-md-6">
                <div class="tab-content">
                   
            
                    <div class="tab-pane active" id="pic-3" >
                        <img src="/product_img/{{ $data->image }}">
                    </div>
                </div>
                
            </div>
            <div class="details col-md-6">
                <h3 class="product-title">{{ $data->title }}</h3>
                <div class="rating">
                    <div class="stars">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <span class="review-no">999 reviews</span>
                </div>
                <p class="product-description">{{ $data->description }}</p>
                <small class="text-muted">Giá cũ: <s><span>${{ $data->price }}</span></s></small>
                <h4 class="price">Giá hiện tại: <span>${{ $data->discount_price }} </span></h4>
                <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                    <strong>Uy
                        tín</strong>!</p>
                <h5 class="sizes">sizes:
                    <span class="size" data-toggle="tooltip" title="cỡ Nhỏ">s</span>
                    <span class="size" data-toggle="tooltip" title="cỡ Trung bình">m</span>
                    <span class="size" data-toggle="tooltip" title="cỡ Lớn">l</span>
                    <span class="size" data-toggle="tooltip" title="cỡ Đại">xl</span>
                </h5>
                <h5 class="colors">colors:
                    <span class="color orange not-available" data-toggle="tooltip"
                        title="Hết hàng"></span>
                    <span class="color green"></span>
                    <span class="color blue"></span>
                </h5>
              
                <div class="row" style="padding-top:17px ;">
                                 <div class="col-md-7">
                                    <label style="font-weight: bold;">Số lượng đặt mua:  </label>
                                    <input style="width:100px;" type="number" name="quantity" min="1" value="1">
                                 </div>

                                 <div >
                                    <input type="submit" value="Add To Cart">  
                                 </div>
                              </div>


               
            </div>

        </div>
    </form>
   
                            
                
</div>


</div>

<div class="card" style="margin-top:15px ;">

    <h4>Product name: {{ $data->title}}</h3>
    <div class="row">
        <div class="col">
        Product description: {{ $data->description }}
        </div>
        <div class="col">
        Product category: {{ $data->category }}
        </div>
        <div class="col">
        Product available quantity: {{ $data->quantity }}
        </div>
    </div>

</div>
         <!-- end detail card section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
     
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


