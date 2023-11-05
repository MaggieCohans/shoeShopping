
<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
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
   </head>
   <body>
      <div class="hero_area">
      <header class="header_section">
         @include('home.header')
         </header>
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.new_arrive')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')
   
      <!-- end product section -->
     
      <!-- subscribe section -->
      @include('home.subcribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
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


