@extends('layout')
    
@section('content')
<div class="card">

                <div class="container-fliud">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                        action="/php/twig/frontend/giohang/themvaogiohang">
                        <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                        <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                        <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                        <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="tab-content">
                                   
                            
                                    <div class="tab-pane active" id="pic-3" >
                                        <img src="{{ asset('img') }}/{{ $product->photo }}">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title">{{ $product->product_name }}</h3>
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
                                <p class="product-description">{{ $product->product_description }}</p>
                                <small class="text-muted">Giá cũ: <s><span>${{ $product->price }}</span></s></small>
                                <h4 class="price">Giá hiện tại: <span>${{ $product->price }} </span></h4>
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
                                <div class="form-group">
                                    
                                    <label for="soluong">Số lượng đặt mua: </label>
                                    <input type="number" class="form-control" id="soluong" name="soluong" value="1">
                                </div>
                                <div class="action">
                                    <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang" href="{{ route('detailpro', $product->id) }}">Xem ngay</a>
                                   
                                    <a class="like btn btn-default" href="#"><span class="fa fa-heart"></span></a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
               
            </div>

            <div class="card" style="margin-top:15px ;">
                
                    <h4>{{ $product->product_name}}</h3>
                    <div class="row">
                        <div class="col">
                        {{ $product->product_description }}
                        </div>
                    </div>
               
            </div>
            @endsection

            