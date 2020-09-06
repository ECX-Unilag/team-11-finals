@extends('layouts.main')

@section('content')
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Checkout</li>
			</ol>
		</div>
	</div>
<!---->
<div class="container">
	<div class="check-out">
		<h2>Checkout</h2>
    	    <table >
		  <tr>
			<th>Item</th>
			<th>Qty</th>		
			<th>Prices</th>
			<th>Delivery details</th>
			<th>Sub total</th>
		  </tr>
		  
        @php
            $productlist = array();
        @endphp
        @php
            $productlists = array();
        @endphp
        @foreach ($product as $product)
            @php
                $productlist[$product->id] = $product->name
            @endphp
            @php
                $imagelist[$product->id] = $product->image
            @endphp
        @endforeach
          @foreach ($cart as $cart)
          <tr>
			<td class="ring-in"><a href="single.html" class="at-in"><img src="/images/{{$imagelist[$cart->product_id]}}" class="img-responsive" alt=""></a>
			<div class="sed">
                <h5>{{$productlist[$cart->product_id]}}</h5>
                
			</div>
			<div class="clearfix"> </div></td>
			<td class="check"><input type="text" value="{{$cart->quantity}}" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}"></td>		
			<td>${{ $cart->price }}</td>
            <td>FREE SHIPPING</td>
            @php
                $total = $cart->quantity * $cart->price;
            @endphp
            <td>${{ $total }}</td>
            
          </tr>
          @endforeach
	</table>
	<a href="#" class=" to-buy">PROCEED TO BUY</a>
	<div class="clearfix"> </div>
    </div>
</div>