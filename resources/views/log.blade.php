@extends('layout.master')
@section('style')
    <style>

        </style>
@endsection
@section('content')


	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" >
		<h2 class="l-text2 t-center" style="color:black">
            Log
        </h2>
    </section>

    <section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
                <div class="size15 trans-0-4">

                    <a href="{{route('export')}}"   class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Export to Exel
                        </a>
                        </div>
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart" style="font-size:15px">
						<tr class="table-head">
							<th class="column-1"></th>
                            <th class="column-2">PaymentGateway</th>
                            <th class="column-3">ReferenceId</th>
							<th class="column-4">TrackId</th>
							<th class="column-5">InvoiceStatus</th>
							<th class="column-6">PaymentId</th>
							<th class="column-7">AuthorizationId</th>
							<th class="column-8">TransactionStatus</th>
							<th class="column-9">TransationValue</th>
							<th class="column-10">CustomerName</th>
							<th class="column-11">CustomerMobile</th>
							<th class="column-12">PaidCurrency</th>
							<th class="column-13">CustomerEmail</th>
							<th class="column-14">InvoiceId</th>
                            <th class="column-15">InvoiceReference</th>
                            <th class="column-16">InvoiceDisplayValue</th>
							<th class="column-17">TransactionId</th>
							<th class="column-16">created_at</th>
							<th class="column-16">Error</th>
                        </tr>

                        @foreach($log as $row)

						<tr class="table-row">
                            <td class="column-1"></td>

                            <td class="column-2">{{$row->PaymentGateway}}</td>
                            <td class="column-3">{{$row->ReferenceId}}</td>
							<td class="column-4">{{$row->TrackId}}</td>
							<td class="column-5">{{$row->InvoiceStatus}}</td>
							<td class="column-6">{{$row->PaymentId}}</td>
							<td class="column-7">{{$row->AuthorizationId}}</td>
							<td class="column-8">{{$row->TransactionStatus}}</td>
							<td class="column-9">{{$row->TransationValue}}</td>
							<td class="column-10">{{$row->CustomerName}}</td>
							<td class="column-11">{{$row->CustomerMobile}}</td>
							<td class="column-12">{{$row->PaidCurrency}}</td>
							<td class="column-13">{{$row->CustomerEmail}}</td>
							<td class="column-14">{{$row->InvoiceId}}</td>
                            <td class="column-15">{{$row->InvoiceReference}}</td>
                            <td class="column-16">{{$row->InvoiceDisplayValue}}</td>
							<td class="column-17">{{$row->TransactionId}}</td>
							<td class="column-16">{{$row->created_at}}</td>
							<td class="column-16">{{$row->Error}}</td>
@endforeach

					</table>
				</div>
            </div>
    </section>
    @endsection




	<!-- Footer -->
