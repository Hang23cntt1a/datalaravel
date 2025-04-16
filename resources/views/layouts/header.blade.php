<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
						@if(Auth::check())
                            <li><a href="#"><i class="fa fa-user"></i>Chào bạn {{ Auth::user()->username}}</a></li>
                            <li><a href="{{ route('getlogout') }} "><i class="fa fa-user"></i>Đăng xuất</a></li>
						@else
               			<form action="{{ route('admin.postLogin') }}" method="post" class="beta-form-checkout">
						@csrf
                        <li><a href="{{ route('getsignin') }}">Đăng kí</a></li>
                        <li><a href="{{ route('getlogin') }}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
    </div> <!-- .header-top -->
    
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img src="{{ asset('source/assets/dest/images/logo-cake.png')}}" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">

				<form role="search" method="GET" id="searchform" action="{{ route('products.search') }}">
					<input type="text" name="keyword" id="s" placeholder="Nhập từ khóa..." required />
					<button type="submit" id="searchsubmit">
						<i class="fa fa-search"></i> <!-- Hiển thị icon tìm kiếm -->
					</button>
				</form>



                </div>

                <div class="beta-comp">
					<div class="cart">
						<div class="beta-select">
							<i class="fa fa-shopping-cart"></i> Giỏ hàng 
							({{ $cart->totalQty ?? 0 }}) 
							<i class="fa fa-chevron-down"></i>
						</div>
						
						@if($cart->totalQty > 0) <!-- Kiểm tra có sản phẩm không -->
						<div class="beta-dropdown cart-body">
							<div class="cart-items-wrapper">
								@foreach($productCarts as $id => $product)
								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#">
											<img src="{{ asset('source/image/product/' . $product['item']['image']) }}" alt="{{ $product['item']['name'] }}" width="50">
										</a>
										<div class="media-body">
											<div class="cart-item-title">{{ $product['item']['name'] }}</div>
											<div class="cart-item-price">
												{{ $product['qty'] }} × 
												{{ number_format($product['price']) }}đ
											</div>
										</div>
									</div>
									<a class="cart-item-delete" href="{{ route('banhang.xoagiohang', $id) }}">
										<i class="fa fa-times"></i>
									</a>
								</div>
								@endforeach
							</div>

							<div class="cart-summary">
								<div class="cart-total">
									<span>Tổng tiền:</span>
									<span class="total-price">{{ number_format($cart->totalPrice) }}đ</span>
								</div>
								<a href="{{ route('banhang.getdathang') }}" class="btn-checkout">
									Đặt hàng <i class="fa fa-chevron-right"></i>
								</a>
								<a href="{{ route('cart') }}" class="btn-checkout">
									Xem giỏ hàng  <i class="fa fa-chevron-right"></i>
								</a>
							</div>
						</div>
						@endif
					</div>
				</div>
            </div> <!-- .beta-components -->
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
				<div class="header-bottom" style="background-color: #0277b8;">
					<div class="container">
						<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
						<div class="visible-xs clearfix"></div>
						<nav class="main-menu">
							<ul class="l-inline ov">
								<li><a href="{{ route('banhang.index') }}" style="font-family: Time new roman; font-size: 20px;">Trang chủ</a></li>
								<li>
    <a href="#" style="font-family: Time new roman; font-size: 20px;">Sản phẩm</a>
    <ul class="sub-menu">
    @foreach($categories as $category)
        <li>
            <a href="{{ route('category.show', $category->id) }}" style="font-family: Time new roman; font-size: 18px;">
                {{ $category->name }} {{-- Hoặc ten_loai nếu cột tên là vậy --}}
            </a>
        </li>
    @endforeach
</ul>

</li>


								<li><a href="about.html" style="font-family: Time new roman; font-size: 20px;">Giới thiệu</a></li>
								<li>
									<a href="{{ url('/lien-he') }}" style="font-family: 'Times New Roman'; font-size: 20px;">
										Liên hệ
									</a>
								</li>

							<div class="clearfix"></div>
						</nav>
					</div> <!-- .container -->
				</div> <!-- .header-bottom -->
			</div> <!-- #header -->