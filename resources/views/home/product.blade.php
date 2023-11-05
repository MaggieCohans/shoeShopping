<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row" style="margin-bottom:15px;">
               @foreach($datapro as $data)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_detail',$data->id)}}" class="option1">
                           Product Details
                           </a>
                        
                           <form method="POST" action="{{url('add_cart',$data->id)}}">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    <input style="width:100px;" type="number" name="quantity" min="1" value="1">
                                 </div>

                                 <div class="col-md-4">
                                    <input type="submit" value="Add To Cart">  
                                 </div>
                              </div>

                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="/product_img/{{$data->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        {{$data->title}}
                        </h5>
                        @if($data->discount_price!=null)
                        <h6  style=" color:red;">
                        Discount price
                        <br>
                        ${{$data->discount_price}}
                        </h6>
                        <h6 style="text-decoration:line-through; color:blue;">
                        Price
                        <br>
                        ${{$data->price}}
                        </h6>
                        @else
                        <h6 style="color:blue;">
                        Price
                        <br>
                        ${{$data->price}}
                        </h6>
                        @endif
                        
                        
                     </div>
                  </div>
               </div>
               
               @endforeach
               
            </div>
            {{$datapro->links()}}
           
         </div>
        
      </section>