@extends('client.master.master')
@section('title','Vietpro detail')
@section('content')
<div class="colorlib-shop">
            <div class="container">
                <div class="row row-pb-lg">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="product-detail-wrap">
                            <div class="row">
                                <form action="{{route('cart.addcart')}}" method="post">
                                    @csrf
                                    <div class="col-md-5">
                                        <div class="product-entry">
                                            <div class="product-img" style="background-image: url(../upload/image/{{$product->image}});">

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                            <div class="desc">
                                                <h3>{{$product->name}}</h3>
                                                <p class="price">
                                                    <span>{{number_format($product->price)}}</span>
                                                </p>
                                                <p>thông tin</p>
                                                <p style="text-align: justify;">
                                                    VIETPRO STORE sẽ giao hàng tận nơi khi chọn mua sản phẩm:{{$product->name}}. Hoặc quí khách có thể đến tại địa chỉ shop có hiển thị bên dưới, khi chọn size phù hợp để xem và thử trực tiếp.

                                                </p>


                                                <div class="row row-pb-sm">
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                                                    <i class="icon-minus2"></i>
                                                                </button>
                                                            </span>
                                                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                                            <span class="input-group-btn">
                                                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                                                    <i class="icon-plus2"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_product" value="{{$product->id}}">
                                                <p><button class="btn btn-primary btn-addtocart" type="submit"> Thêm vào giỏ hàng</button></p>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-12 tabulation">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="description" class="tab-pane fade in active">
                                        Đây là sản phẩm đẹp
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="colorlib-shop">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                        <h2><span>Sản phẩm Mới</span></h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products_state as $ps)
                    <div class="col-md-3 text-center">
                        <div class="product-entry">
                            <div class="product-img" style="background-image: url(../upload/image/{{$ps->image}});">
                                <div class="cart">
                                    <p>
                                        <span class="addtocart"><a href="cart.html"><i
                                                    class="icon-shopping-cart"></i></a></span>
                                        <span><a href="{{route('product.detail',['slug'=>$ps->slug])}}"><i class="icon-eye"></i></a></span>

                                    </p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3><a href="{{route('product.detail',['slug'=>$ps->slug])}}">{{$ps->name}}</a></h3>
                                <p class="price"><span>{{number_format($ps->price,0,'','.')}}</span></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

@endsection
@section('script')
@parent
<script>
                var quantity=1;
                $('.quantity-right-plus').click(function () {
                    var quantity = parseInt($('#quantity').val());
                    $('#quantity').val(quantity + 1);
                });

                $('.quantity-left-minus').click(function (e) {
                    var quantity = parseInt($('#quantity').val());
                        if (quantity > 1) {
                            $('#quantity').val(quantity - 1);
                        }
                });
            </script>

@endsection
