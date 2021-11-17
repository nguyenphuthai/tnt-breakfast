@extends("layout.app")
@section("content")
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3 class="display-5 mb-2 text-center">Giỏ hàng</h3>
                    <p class="mb-5 text-center">
                        <i class="text-info font-weight-bold">3</i>sản phẩm trong giỏ hàng</p>
                    <table id="shoppingCart" class="table table-condensed table-responsive">
                        <thead>
                        <tr>
                            <th style="width:60%">Tên sản phẩm</th>
                            <th style="width:12%">Giá</th>
                            <th style="width:10%">Số lượng</th>
                            <th style="width:16%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($items))
                            @foreach($items as $item)
                                @if($item->order_id == null)
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-md-3 text-left">
                                                    <img src="{{$item->Product()->first()->thumbnail}}" alt=""
                                                         class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                                </div>
                                                <div class="col-md-9 text-left mt-sm-2">
                                                    <h4>{{$item->Product()->first()->name}}</h4>
                                                    <p class="font-weight-light">{{$item->Product()->first()->Category()->first()->name}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">{{number_format($item->Product()->first()->price)}}</td>
                                        <td data-th="Quantity">
                                            <input type="number" onchange="changeQuantity({{$item->id}})" id="quantity-{{$item->id}}" class="form-control form-control-lg text-center" value="{{$item->quantity}}">
                                        </td>
                                        <td class="actions" data-th="">
                                            <div class="text-right">
                                                <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="float-right text-right">
                        <h4>Tổng thanh toán:</h4>
                        <h1>10.000đ</h1>
                    </div>
                </div>
            </div>
            <div class="row mt-4 d-flex align-items-center">
                <div class="col-sm-6 order-md-2 text-right">
                    <a href="#" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Checkout</a>
                </div>
                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                    <a href="{{route("menu")}}">
                        <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        function changeQuantity(id){
            let quantity = $("#quantity-"+id).val();
            $.ajax('http://tnt-breakfast.com.vn/changeQuantity/'+id+'/q/'+quantity,
                {
                    dataType: 'json', // type of response data
                    timeout: 500,     // timeout milliseconds
                    success: function (data,status,xhr) {   // success callback function
                        console.log(data);
                    },
                    error: function (jqXhr, textStatus, errorMessage) { // error callback
                        console.log(errorMessage)
                    }
                });
        }
    </script>
@endsection
