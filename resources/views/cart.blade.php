@extends('layout.master')
@section('content')

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" >
		<h2 class="l-text2 t-center" style="color:black">
			Cart
		</h2>
    </section>

    @if($carts->count() == 0)
    <p class="alert alert-warning">Your shopping cart is empty.</p>
@else
@php
$total = 0;
@endphp
	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
                        </tr>

                        @foreach($carts as $row)

						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">

									<img src="{{$row->product[0]->image}}" alt="IMG-PRODUCT">
								</div>
							</td>
                        <td class="column-2">{{$row->name}}</td>
                        <td class="column-3">${{$row->price}}</td>
							<td class="column-4">
								{{$row->quantity}}
								</div>
							</td>
							<td class="column-5">${{$row->price * $row->quantity}}.00</td>
                        </tr>
                        @php
                        $total =  $total +   $row->price * $row->quantity
                       @endphp
@endforeach

					</table>
				</div>
			</div>
        <form method="POST" action="{{route('processPayment')}}">
                @csrf
            <input value="{{$carts}}" name="product" type="hidden">
			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
                    <input type="hidden" value="{{$total}}" name="InvoiceValue" required>
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="CustomerName" placeholder="Name" required>
					</div>
                    <div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="CustomerMobile" placeholder="Your Phone" required>
					</div>
                    <div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="CustomerEmail" placeholder="Your Email" required>
					</div>




			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
                    ${{$total}}.00
					</span>
				</div>

				<!--  -->

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						${{$total}}.00
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proceed to Checkout
					</button>
                </form>
				</div>
			</div>
		</div>
    </section>
    @endif

    @endsection

    @section('script')
        <script>
function quantity() {
  var x = document.getElementById("quantity").value;
  alert(x);
  document.getElementById("total").innerHTML = (x * 28)+ ".00$";
}
        $('input[name=quantity]').change(function() {
            alert(this.value);
         });

        </script>
    @endsection


	<!-- Footer -->
