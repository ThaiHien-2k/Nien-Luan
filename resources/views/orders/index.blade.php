@extends('layouts.app')

@section ('content')


    @if(!$orders->isEmpty())
    <div class="container sixtyvh">
    <div class="row ml-2 mr-2">
        <div class="col-12">
            <h3>LỊCH SỬ ĐẶT HÀNG</h3>
            <hr>

            <div class="row d-flex ">
                @foreach($orders as $order)

                @if($order->status == 'Đã đặt hàng')
                <div class="col-sm-12 col-md-8 col-lg-8 d-flex order-history mx-auto">
                    <div class="row">
                        @foreach ($order->cart->items as $item)
                            <div class="col-12 d-flex justify-content-between ">
                                <div class="order-image">
                                    <img src="{{ asset('/storage/'.$item['item']['image']) }}" alt="">
                                </div>

                                <div class="order-detail mr-auto d-flex flex-column justify-content-center">
                                    <div class="detail-1">
                                        <h5>{{ $item['item']['name'] }}</h5>
                                    </div>
                                    <div class="detail-2">
                                        <h6>Mẫu: {{ $item['model'] }}</h6>
                                    </div>
                                   
                                    <div class="detail-4">
                                        <h6>Giá: {{ number_format($item['price'], -3,',')  }} đ</h6>
                                    </div>
                                </div> 
                            </div>
                        @endforeach
                    </div>                      
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 d-flex flex-column justify-content-center mx-auto order-info">
                    <div class="row d-flex   ">
                        <div class="col-6 ">
                            <h6>Mã đơn hàng</h6>
                            <h6>Ngày đặt mua </h6>
                            <h6>Tổng giá tiền</h6>
                            <h6>Tình trạng</h6>
                        </div>
                        <div class="col-6">
                            <h6>: {{ $order['id'] }}</h6>
                            <h6>: {{ $order['created_at']->format('d/m/Y') }}</h6>
                            <h6>: {{ number_format($order->cart->totalPrice, -3,',') }} đ</h6>
                            <h6>: {{$order->status}}</h6>
                        </div>
                    </div>
                    <br>
                    <form  action="{{ route('changeStatus',['id'=>$order['id']]) }}" method="get">
    <div>
        <label for="changeStatus"><h5>Hủy đơn hàng</h5></label>
        
        <input name="changeStatus" id="colors" style="width:200px; text-align:center;" value="Hủy" readonly hidden>
          
    
        </select>
    </div>
    <div>
        
        <button type="submit" class="btn btn-success">Xác nhận </button>
    </div>
                </div>
                @endif
                
 @if($order->status != 'Hủy' && $order->status !="Đã đặt hàng")
 <div class="col-sm-12 col-md-8 col-lg-8 d-flex order-history mx-auto">
                    <div class="row">
                        @foreach ($order->cart->items as $item)
                            <div class="col-12 d-flex justify-content-between ">
                                <div class="order-image">
                                    <img src="{{ asset('/storage/'.$item['item']['image']) }}" alt="">
                                </div>

                                <div class="order-detail mr-auto d-flex flex-column justify-content-center">
                                    <div class="detail-1">
                                        <h5>{{ $item['item']['name'] }}</h5>
                                    </div>
                                    <div class="detail-2">
                                        <h6>Mẫu: {{ $item['model'] }}</h6>
                                    </div>
                                   
                                    <div class="detail-4">
                                        <h6>Giá: {{ number_format($item['price'], -3,',') }}đ</h6>
                                    </div>
                                </div> 
                            </div>
                        @endforeach
                    </div>                      
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 d-flex flex-column justify-content-center mx-auto order-info">
                    <div class="row d-flex   ">
                        <div class="col-6 ">
                            <h6>Mã đơn hàng</h6>
                            <h6>Ngày đặt mua </h6>
                            <h6>Tổng giá tiền</h6>
                            <h6>Tình trạng</h6>
                        </div>
                        <div class="col-6">
                            <h6>: {{ $order['id'] }}</h6>
                            <h6>: {{ $order['created_at']->format('d/m/Y') }}</h6>
                            <h6>: {{ number_format($order->cart->totalPrice, -3,',') }}đ</h6>
                            <h6>: {{$order->status}}</h6>
                        </div>
                    </div>
                    <br>
                   
                </div>
    @endif
  

                @endforeach
            </div>
        </div>
    </div>
    </div>

   
    @else
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-column justify-content-center align-items-center sixtyvh empty-history">
                    <div><i class="fa fa-th-list"></i></div>
                    <div><h4><b>Lịch sử đơn hàng của bạn trống.</b></h4></div>
                    <div><a href="{{ route('product.index') }}">Hãy mua gì đó trước :)</a></div>
                </div>
            </div>
        </div>
        
    @endif


@endsection