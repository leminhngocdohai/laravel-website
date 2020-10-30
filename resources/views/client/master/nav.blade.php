<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div id="colorlib-logo"><a href="index.html"><img src="images/logo.png" alt=""
                                style="width: 300px;height: 50px;"></a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li class="active"><a href="{{route('client.index')}}">Trang chủ</a></li>
                        <li class="has-dropdown">
                            <a href="{{route('product.shop')}}">Cửa hàng</a>
                            <ul class="dropdown">
                                <li><a href="{{route('cart.index')}}">Giỏ hàng</a></li>
                                <li><a href="{{route('cart.checkout')}}">Thanh toán</a></li>

                            </ul>
                        </li>
                        <li><a href="{{route('client.about')}}">Giới thiệu</a></li>
                        <li><a href="{{route('client.contact')}}">Liên hệ</a></li>
                        <li><a href="{{route('cart.index')}}"><i class="icon-shopping-cart"></i> Giỏ hàng [0]</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
