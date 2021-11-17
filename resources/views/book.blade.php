@extends("layout.app")
@section("content")

    <!-- book section -->
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2 style="color: white">
                    Đặt món
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form_container">
                        <form action="">
                            <div>
                                <input type="text" class="form-control" placeholder="Họ và tên"/>
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="Số điện thoại"/>
                            </div>
                            <div>
                                <input type="email" class="form-control" placeholder="Email"/>
                            </div>
                            <div>
                                <select class="form-control nice-select wide">
                                    <option value="" disabled selected>
                                        Bạn có mấy người ?
                                    </option>
                                    <option value="">
                                        2
                                    </option>
                                    <option value="">
                                        3
                                    </option>
                                    <option value="">
                                        4
                                    </option>
                                    <option value="">
                                        5
                                    </option>
                                </select>
                            </div>
                            <div>
                                <input type="date" class="form-control">
                            </div>
                            <div class="btn_box">
                                <button>
                                    Đặt ngay
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map_container ">
                        <div id="">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d935.2488965719257!2d105.89302801887173!3d20.34180101048963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf5669d252890c28a!2zMjDCsDIwJzMwLjUiTiAxMDXCsDUzJzM0LjkiRQ!5e0!3m2!1svi!2s!4v1637096433235!5m2!1svi!2s"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end book section -->


@endsection
