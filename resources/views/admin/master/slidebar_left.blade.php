<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
    </form>
                   <ul class="nav menu">
        <li class="{{ Route::is('admin.*') ? 'active' : '' }}"><a href="{{route('admin.index')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Tổng quan</a></li>
        <li class="{{ Route::is('category.*') ? 'active' : '' }}"><a href="{{route('category.index')}}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper" /></svg> Danh Mục</a></li>
        <li class="{{ Route::is('product.*') ? 'active' : '' }}"><a href="{{route('product.index')}}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Sản phẩm</a></li>
        <li class="{{ Route::is('order.*') ? 'active' : '' }}"><a href="{{route('order.index')}}"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad" /></svg> Đơn hàng</a></li>
        <li role="presentation" class="divider"></li>
        <li class="{{ Route::is('users.*','permissions.*','roles.*') ? 'active' : '' }}"><a href="{{route('users.index')}}"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Quản lý thành viên</a></li>

    </ul>

</div>
