@extends("layout.app")
@section("content")
    <div class="container py-5">
        <h2>Lịch sử mua hàng </h2>
        <ul class="nav nav-pills mb-3 mt-5 w-100 text-center" id="pills-tab" role="tablist">
            <li class="nav-item w-25 ">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-waiting" role="tab" aria-controls="pills-home" aria-selected="true">Đang chờ</a>
            </li>
            <li class="nav-item w-25">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-ship" role="tab" aria-controls="pills-profile" aria-selected="false">Đang giao</a>
            </li>
            <li class="nav-item w-25">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-done" role="tab" aria-controls="pills-contact" aria-selected="false">Đã giao</a>
            </li>
            <li class="nav-item w-25">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-cancel" role="tab" aria-controls="pills-contact" aria-selected="false">Đã huỷ</a>
            </li>
        </ul>
        <hr>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-waiting" role="tabpanel" aria-labelledby="pills-home-tab">
                @if($waiting !== null)
                    @foreach($waiting as $order)
                        <div class="card mb-3">
                            <div class="card-header">
                                Đơn hàng #{{$order->id}}
                            </div>
                            <div class="card-body">
                                @foreach($order->items()->get() as $item)
                                    <div class="product mb-2">
                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <img src="{{$item->Product()->first()->thumbnail}}" class="w-100">
                                            </div>
                                            <div class="col-md-10 col-12">
                                                <div class="text-success h3">{{$item->Product()->first()->name}}</div>
                                                <div>Số lượng: {{$item->quantity}}</div>
                                                <div class="text-danger h4">Giá tiền : {{number_format($item->Product()->first()->price)}} đ</div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <div>Tổng số tiền : {{$order->total}}</div>
                                <div>Địa chỉ : {{$order->ship_address}}</div>
                                <div>Phương thức : {{$order->payment_method}}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="tab-pane fade" id="pills-ship" role="tabpanel" aria-labelledby="pills-profile-tab">
                @if($shipping !== null)
                    @foreach($shipping as $order)
                        <div class="card mb-3">
                            <div class="card-header">
                                Đơn hàng #{{$order->id}}
                            </div>
                            <div class="card-body">
                                @foreach($order->items()->get() as $item)
                                    <div class="product mb-2">
                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <img src="{{$item->Product()->first()->thumbnail}}" class="w-100">
                                            </div>
                                            <div class="col-md-10 col-12">
                                                <div class="text-success h3">{{$item->Product()->first()->name}}</div>
                                                <div>Số lượng: {{$item->quantity}}</div>
                                                <div class="text-danger h4">Giá tiền : {{number_format($item->Product()->first()->price)}} đ</div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <div>Tổng số tiền : {{$order->total}}</div>
                                <div>Địa chỉ : {{$order->ship_address}}</div>
                                <div>Phương thức : {{$order->payment_method}}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="tab-pane fade" id="pills-done" role="tabpanel" aria-labelledby="pills-contact-tab">
                @if($done !== null)
                    @foreach($done as $order)
                        <div class="card mb-3">
                            <div class="card-header">
                                Đơn hàng #{{$order->id}}
                            </div>
                            <div class="card-body">
                                @foreach($order->items()->get() as $item)
                                    <div class="product mb-2">
                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <img src="{{$item->Product()->first()->thumbnail}}" class="w-100">
                                            </div>
                                            <div class="col-md-10 col-12">
                                                <div class="text-success h3">{{$item->Product()->first()->name}}</div>
                                                <div>Số lượng: {{$item->quantity}}</div>
                                                <div class="text-danger h4">Giá tiền : {{number_format($item->Product()->first()->price)}} đ</div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <div>Tổng số tiền : {{$order->total}}</div>
                                <div>Địa chỉ : {{$order->ship_address}}</div>
                                <div>Phương thức : {{$order->payment_method}}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="tab-pane fade" id="pills-cancel" role="tabpanel" aria-labelledby="pills-contact-tab">
                @if($cancel !== null)
                    @foreach($cancel as $order)
                        <div class="card mb-3">
                            <div class="card-header">
                                Đơn hàng #{{$order->id}}
                            </div>
                            <div class="card-body">
                                @foreach($order->items()->get() as $item)
                                    <div class="product mb-2">
                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <img src="{{$item->Product()->first()->thumbnail}}" class="w-100">
                                            </div>
                                            <div class="col-md-10 col-12">
                                                <div class="text-success h3">{{$item->Product()->first()->name}}</div>
                                                <div>Số lượng: {{$item->quantity}}</div>
                                                <div class="text-danger h4">Giá tiền : {{number_format($item->Product()->first()->price)}} đ</div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <div>Tổng số tiền : {{$order->total}}</div>
                                <div>Địa chỉ : {{$order->ship_address}}</div>
                                <div>Phương thức : {{$order->payment_method}}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <style>
        .tab-pane{
            min-height: 80vh;
        }
    </style>
@endsection
