@extends("layout.app")
@section("content")
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3 class="display-5 mb-2 text-center">Giỏ hàng</h3>
                    <p class="mb-5 text-center">
                    {{--                        <i class="text-info font-weight-bold">{{$items->count()}}</i>  sản phẩm trong giỏ hàng</p>--}}
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
                                            <input type="number" onchange="changeQuantity({{$item->id}})" min="1"
                                                   id="quantity-{{$item->id}}"
                                                   class="form-control form-control-lg text-center"
                                                   value="{{$item->quantity}}" required>
                                        </td>
                                        <td class="actions" data-th="">
                                            <div class="text-right">
                                                <a href="{{route("destroyItem",$item->id)}}">
                                                    <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </a>
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
                        <h1 id="totalCost">{{$totalCost}}</h1>
                    </div>
                </div>
            </div>
            <div class="row mt-4 d-flex align-items-center">
                <div class="col-sm-6 order-md-2 text-right">
                    <button data-toggle="modal" data-target="#orderBill" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">
                        Thanh toán
                    </button>
                </div>
                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                    <a href="{{route("menu")}}">
                        <i class="fas fa-arrow-left mr-2"></i> Tiếp tục mua sắm</a>
                    <div></div>
                    <a href="{{route("order.history")}}">
                        Xem lịch sử mua hàng <i class="fas fa-arrow-right mr-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="orderBill" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Giao hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route("orderBill")}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Địa chỉ giao hàng</label>
                            <input type="hidden" id="formCost" name="total" value="{{$totalCost}}">
                            <input type="text" name="address" class="form-control" id="exampleInputPassword1"
                                   placeholder="Bắt buộc có số điện thoại + địa chỉ">
                            <small>Nếu không điền đủ thông tin, đơn hàng sẽ bị huỷ !</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chọn phương thức giao hàng</label>
                            <select class="form-control w-100" name="payment" id="exampleFormControlSelect1">
                                <option>Thanh toán khi nhận hàng</option>
                                <option>Cho nợ đê !!!</option>
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Mua</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function changeQuantity(id) {
            let quantity = $("#quantity-" + id).val();
            if (quantity < 1) {
                quantity = 1;
                $("#quantity-" + id).val(1);
            }
            $.ajax('http://tnt-breakfast.com.vn/changeQuantity/' + id + '/q/' + quantity,
                {
                    dataType: 'json', // type of response data
                    timeout: 500,     // timeout milliseconds
                    success: function (data, status, xhr) {   // success callback function
                        console.log(data);
                        $("#totalCost").text(data.cost);
                        $("#formCost").val(data.cost);
                    },
                    error: function (jqXhr, textStatus, errorMessage) { // error callback
                        console.log(errorMessage)
                    }
                });
        }
    </script>
@endsection
