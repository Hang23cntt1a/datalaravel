@extends('layouts.master')

@section('content')
<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
				<ul>
    @foreach ($slides as $slide)
        <li data-transition="boxfade" data-slotamount="20" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
            <div class="slotholder" style="width:100%;height:100%;" 
                data-duration="undefined" 
                data-zoomstart="undefined" 
                data-zoomend="undefined" 
                data-rotationstart="undefined" 
                data-rotationend="undefined" 
                data-ease="undefined" 
                data-bgpositionend="undefined" 
                data-bgposition="undefined" 
                data-kenburns="undefined" 
                data-easeme="undefined" 
                data-bgfit="undefined" 
                data-bgfitend="undefined" 
                data-owidth="undefined" 
                data-oheight="undefined">
                
                <div class="tp-bgimg defaultimg"
                    data-lazyload="undefined"
                    data-bgfit="cover"
                    data-bgposition="center center"
                    data-bgrepeat="no-repeat"
                    data-lazydone="undefined"
                    src="{{ asset('images/' . $slide->image) }}"
                    data-src="{{ asset('images/' . $slide->image) }}"
                    style="background-color: rgba(0, 0, 0, 0); 
                           background-repeat: no-repeat; 
                           background-image: url('{{ asset('images/' . $slide->image) }}'); 
                           background-size: cover; 
                           background-position: center center; 
                           width: 100%; 
                           height: 100%; 
                           opacity: 1; 
                           visibility: inherit;">
                </div>
            </div>
        </li>
    @endforeach
</ul>

                </div>
            </div>
        </div>
    </div>
</div>




                <div class="tp-bannertimer"></div>
            </div> <!-- end .bannercontainer -->
        </div> <!-- end .fullwidthbanner -->
    </div> <!-- end .fullwidthbanner-container -->
</div> <!-- end .rev-slider -->

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
											<a href="{{route('banhang.product', $new_product->id)}}"><img src="{{ asset('source/image/product/' . $new_product->image) }}" alt="" height="200px" width="250px></a>
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
											@if(Auth::check())
												<a class="add-to-cart pull-left" href="{{ route('banhang.addtocart',$new_product->id) }}"><i class="fa fa-shopping-cart"></i></a>
											@else
											<a class="add-to-cart pull-left"><i class="fa fa-shopping-cart"></i></a>
											@endif
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
<!-------------------SẢN PHẨM ĐỀ NGHỊ-------------------------------------------------------------------------------->	
<div class="beta-products-list">
							<h4 style="font-family: Time new roman;">Promotional product</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($promotion_products)}} sản phẩm được tìm thấy</p>	
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@php $stt=0; @endphp
                            @foreach($promotion_products as $promotion_product)
                            @php $stt++; @endphp
								<div class="col-sm-3">
									<div class="single-item">
									@if($promotion_product->promotion_price!=0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('banhang.product', $promotion_product->id)}}"><img src="{{ asset('source/image/product/' . $promotion_product->image) }}" alt="" height="200px" width="250px"></a>
										</div>
										<div class="single-item-body">
										<p class="single-item-title">{{$promotion_product->name}}</p>
											<p class="single-item-price">
											@if($promotion_product->promotion_price==0)
											<span class="flash-sale">{{ number_format($promotion_product->unit_price) }} đồng</span>
                                            @else
                                            <span class="flash-del">{{ number_format($promotion_product->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{ number_format($promotion_product->promotion_price) }} đồng</span>
                                            @endif
                                        </p>
										</div>
										<div class="single-item-caption">
											@if(Auth::check())
												<a class="add-to-cart pull-left" href="{{ route('banhang.addtocart',$promotion_product->id) }}"><i class="fa fa-shopping-cart"></i></a>
											@else
											<a class="add-to-cart pull-left"><i class="fa fa-shopping-cart"></i></a>
											@endif
										<a class="beta-btn primary" href="{{ route('banhang.chitiet', $promotion_product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
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
<!-------------------SẢN PHẨM NỔI BẬT-------------------------------------------------------------------------------->	
							<div class="beta-products-list">
							<h4 style="font-family: Time new roman;">Best Sellers </h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($top_products)}} sản phẩm được tìm thấy</p>	
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@php $stt=0; @endphp
                            @foreach($top_products as $top_product)
                            @php $stt++; @endphp
								<div class="col-sm-3">
									<div class="single-item">
									@if($top_product->promotion_price!=0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
										<a href="{{route('banhang.product', $top_product->id)}}">
											<img src="{{ asset('source/image/product/' . $top_product->image) }}" alt="" height="200px" width="250px">
										</a>
										</div>
										<div class="single-item-body">
										<p class="single-item-title">{{$top_product ->name}}</p>
											<p class="single-item-price">
											@if($top_product ->promotion_price==0)
											<span class="flash-sale">{{ number_format($top_product ->unit_price) }} đồng</span>
                                            @else
                                            <span class="flash-del">{{ number_format($top_product ->unit_price) }} đồng</span>
                                            <span class="flash-sale">{{ number_format($top_product ->promotion_price) }} đồng</span>
                                            @endif
                                        </p>
										</div>
										<div class="single-item-caption">
											@if(Auth::check())
												<a class="add-to-cart pull-left" href="{{ route('banhang.addtocart',$top_product ->id) }}"><i class="fa fa-shopping-cart"></i></a>
											@else
											<a class="add-to-cart pull-left"><i class="fa fa-shopping-cart"></i></a>
											@endif
											<a class="beta-btn primary" href="{{ route('banhang.chitiet', $top_product ->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
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

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
</div>
@endsection