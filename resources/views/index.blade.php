@extends('layout.master')
@section('content')
	<!-- Title Page -->
    <section class="bgwhite p-t-45 p-b-58">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					Our Products
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab" aria-expanded="flase">Best Seller</a>
					</li>
				</ul>

				<!-- Tab panes -->
						<div class="row">
                            @foreach ($products as $product)
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                                <!-- Block2 -->

								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                    <img src="{{$product->image}}" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
                                                <!-- or add to cart via ajax on bottom code  -->

                                                    <form  method="POST" action="{{route('cart.store')}}">
                                                        @csrf
                                                    <input name="product_id" value="{{$product->id}}" type="hidden">
                                                        <button  data-="{{$product->id}}" type="submit" id="addtocart" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                            Add to Cart
                                                        </button>
                                                    </form>

											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                                {{$product->name}}
                                        </a>

										<span class="block2-price m-text6 p-r-5">
                                            {{$product->price}}
                                        </span>
									</div>
								</div>
							</div>
                            @endforeach

						</div>
					</div>

					<!-- - -->

				</div>
			</div>
		</div>
	</section>
    @endsection
<!-- or user ajax to add to cart -->

    @section('script')
        <script>

           $(document).ready(function() {

            $('#addtocart').click(function(){
                alert('asd');
            });
$('#addtocart').click( function() {
    var product_id = $(this).data('id');
    var url = "/cart/store";
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({

    type: "POST",
    url: url,
    data: { id: product_id },
    success: function (data) {
        alert(data);

    },
    error: function (data) {
        alert(data);
    }
    });
});
});

            </script>
    @endsection

	<!-- Footer -->
