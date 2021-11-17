
    <div class="container">
        <div class="p-1 rounded">
            <div class="p-2 h3 bg-white rounded">
                Đơn hàng của <b>{{$order->getCustomer()->first()->name}}</b>
            </div>
            <div class="border p-2 bg-white">
                @foreach($carts as $cart)
                    <div class="text-dark bg-light">
                        <div class="w-25 d-flex">
                            <img src="{{$cart->Product()->first()->thumbnail}}" class="w-25">

                            <span class="d-flex flex-column">
                                <span class="text-primary font-weight-bold h5">{{$cart->Product()->first()->price}} đ</span>
                            </span>
                        </div>

                            {{$cart->Product()->first()->name."x".$cart->quantity}}

                    </div>
                @endforeach
            </div>
            <hr>
            <div class="border p-3">
                <p>Tổng thanh toán : {{$total}}</p>
                <p>Địa chỉ ship hàng : {{$order->ship_address}}</p>
                <p>Email : {{$order->getCustomer()->first()->email}}</p>

            </div>
        </div>
    </div>
