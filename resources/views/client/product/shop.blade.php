@extends('client.master.master')
@section('title','Vietpro Shop')
@section('content')
<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="row row-pb-lg">
                    @foreach ($products as $product)
                    <div class="col-md-4 text-center">
                        <div class="product-entry">
                            <div class="product-img"
                                style="background-image: url(../upload/image/{{$product->image}});">

                                <div class="cart">
                                    <p>
                                        <span class="addtocart"><a href="cart.html"><i
                                                    class="icon-shopping-cart"></i></a></span>
                                        <span><a href="{{route('product.detail',['slug'=>$product->slug])}}"><i class="icon-eye"></i></a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3><a href="{{route('product.detail',['slug'=>$product->slug])}}">{{$product->name}}</a></h3>
                            <p class="price"><span>{{number_format($product->price,0,'','.')}} VND</span></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-md-pull-9">
                <div class="sidebar">
                    <div class="side">
                        <h2>Danh mục</h2>
                        <div class="fancy-collapse-panel">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#menu1"
                                                aria-expanded="true" aria-controls="collapseOne">Quần
                                                Áo Nam
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="menu1" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#">Áo Sơ mi nam</a></li>
                                                <li><a href="#">Áo thun nam</a></li>
                                                <li><a href="#">Áo Khoác nam</a></li>
                                                <li><a href="#">Áo vest Nam</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#menu2"
                                                aria-expanded="true" aria-controls="collapseOne">Quần
                                                Áo Nữ
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="menu2" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#">Áo Sơ mi Nữ</a></li>
                                                <li><a href="#">Áo thun Nữ</a></li>
                                                <li><a href="#">Áo Khoác Nữ</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="side">
                        <h2>Khoảng giá</h2>
                        <form method="post" class="colorlib-form-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">Từ:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="start" id="people" class="form-control">
                                                <option value="#">100.000 VNĐ</option>
                                                <option value="#">200.000 VNĐ</option>
                                                <option value="#">300.000 VNĐ</option>
                                                <option value="#">500.000 VNĐ</option>
                                                <option value="#">1.000.000 VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">Đến:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="end" id="people" class="form-control">
                                                <option value="#">2.000.000 VNĐ</option>
                                                <option value="#">4.000.000 VNĐ</option>
                                                <option value="#">6.000.000 VNĐ</option>
                                                <option value="#">8.000.000 VNĐ</option>
                                                <option value="#">10.000.000 VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" style="width: 100%;border: none;height: 40px;">Tìm
                                kiếm</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@parent
<script>
    $(document).ready(function () {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function (e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);

            // Increment

        });

        $('.quantity-left-minus').click(function (e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });

    });

</script>

@endsection
