@extends('layout')
    
@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr><h3>Danh sách sản phẩm đã xem</h3></tr>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Thông tin chi tiết</th>
            
        </tr>
    </thead>
    <tbody>
       
        @if(session('seen-cart'))
            @foreach(session('seen-cart') as $id => $details)
               
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('img') }}/{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                    </td>
                    <td >
                    <a class=" btn btn-default"   href="{{ route('detailpro', $details['product_name']) }}">Thêm vào giỏ hàng</a>
                    </td>
                   
                  
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        
        <tr>
            <td colspan="5" style="text-align:right;">
                <form action="/session" method="POST">
                <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                </form>
            </td>
        </tr>
    </tfoot>
</table>
@endsection
    
