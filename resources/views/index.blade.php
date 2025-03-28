@extends('layouts.master')

@section('content')

	<div class="rev-slider">
	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									<!-- THE FIRST SLIDE (BANNER) -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/assets/dest/images/thumbs/banner1.png" data-src="source/assets/dest/images/thumbs/banner1.png" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/assets/dest/images/thumbs/banner1.png'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
								<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						          <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
												<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/assets/dest/images/thumbs/banner2.webp" data-src="source/assets/dest/images/thumbs/banner2.webp" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/assets/dest/images/thumbs/banner2.webp'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
											</div>
											</div>

								<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/assets/dest/images/thumbs/banner3.webp" data-src="source/assets/dest/images/thumbs/banner3.webp" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/assets/dest/images/thumbs/banner3.webp'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
												</div>
											</div>

						        </li>
								<li data-transition="boxfade" data-slotamount="20" class="active-revslide current-sr-slide-visible" style="width: 100%; height: 100%; overflow: hidden; visibility: inherit; opacity: 1; z-index: 20;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/assets/dest/images/thumbs/banner4.png" data-src="source/assets/dest/images/thumbs/banner4.png" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/assets/dest/images/thumbs/banner4.png'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
												</div>
											</div>

						        </li>
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4 style="font-family: Time new roman;">New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($new_products)}} sản phẩm được tìm thấy</p>	
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@php $stt=0; @endphp
                            @foreach($new_products as $new_product)
                            @php $stt++; @endphp
								<div class="col-sm-3">
									<div class="single-item">
									@if($new_product->promotion_price!=0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('banhang.product', $new_product->id)}}"><img src="{{ asset('source/image/product/' . $new_product->image) }}" alt="" height="200px"></a>
										</div>
										<div class="single-item-body">
										<p class="single-item-title">{{$new_product->name}}</p>
											<p class="single-item-price">
											@if($new_product->promotion_price==0)
											<span class="flash-sale">{{ number_format($new_product->unit_price) }} đồng</span>
                                            @else
                                            <span class="flash-del">{{ number_format($new_product->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{ number_format($new_product->promotion_price) }} đồng</span>
                                            @endif
                                        </p>
										</div>
										<div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart',$new_product->id) }}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('banhang.chitiet', $new_product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
<!-- .-cứ 4 sản phẩm thì ngắt dòng ------------------------------------------------------------------------------------------------------------------------------------------->
                            @if($stt % 4==0)
                            <div class="space40">&nbsp;</div>
                            @endif
                            @endforeach
                        </div> 
 <!-- .beta-products-list ------------------------------------------------------------------------------------------------------------------------------------------->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4 style="font-family: Time new roman;">Best Sellers</h4>
							<div class="beta-products-details">
								<p class="pull-left">438 styles found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('banhang.product', $new_product->id)}}"><img src="{{ asset('source/image/product/banhkem4.png') }}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">HAWAII MOUSSE</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('banhang.product', $new_product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="{{route('banhang.product', $new_product->id)}}"><img src="{{ asset('source/image/product/banhkem5.png') }}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">PASSION FRUIT MOUSSE</p>
											<p class="single-item-price">
												<span class="flash-del">$34.55</span>
												<span class="flash-sale">$33.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('banhang.product', $new_product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('banhang.product', $new_product->id)}}"><img src="{{ asset('source/image/product/banhkem6.png') }}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">TIRAMISU CAKE MOUSSE</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('banhang.product', $new_product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('banhang.product', $new_product->id)}}"><img src="{{ asset('source/image/product/banhkem7.png') }}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">CAPUCCINO</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('banhang.product', $new_product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="space40">&nbsp;</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('banhang.product', $new_product->id)}}"><img src="{{ asset('source/image/product/k1.png') }}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">PETIT MIX VỊ</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('banhang.product', $new_product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="{{route('banhang.product', $new_product->id)}}"><img src="{{ asset('source/image/product/k2.png') }}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">PETIT  FLAN</p>
											<p class="single-item-price">
												<span class="flash-del">$34.55</span>
												<span class="flash-sale">$33.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('banhang.product', $new_product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('banhang.product', $new_product->id)}}"><img src="{{ asset('source/image/product/k3.png') }}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">PETIT MATCHA</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('banhang.product', $new_product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('banhang.product', $new_product->id)}}"><img src="{{ asset('source/image/product/k4.png') }}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">PETIT SOCOLA</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('banhang.product', $new_product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection