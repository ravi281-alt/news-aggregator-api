@extends('layouts.base')

@section('main')

<section class="section-content padding-y bg">
<div class="container">

<!-- ============================ COMPONENT 1 ================================= -->

<div class="row">
	<aside class="col-lg-9">
<div class="card">
<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200"> </th>
</tr>
</thead>
<tbody>
<tr>
	<td>
		<figure class="itemside align-items-center">
			<div class="aside"><img src="./images/items/11.jpg" class="img-sm"></div>
			<figcaption class="info">
				<a href="#" class="title text-dark">Camera Canon EOS M50 Kit</a>
				<p class="text-muted small">Matrix: 25 Mpx <br> Brand: Canon</p>
			</figcaption>
		</figure>
	</td>
	<td> 
		<!-- col.// -->
					<div class="col"> 
						<div class="input-group input-spinner">
							<div class="input-group-prepend">
							<button class="btn btn-light" type="button" id="button-plus"> <i class="fa fa-minus"></i> </button>
							</div>
							<input type="text" class="form-control"  value="1">
							<div class="input-group-append">
							<button class="btn btn-light" type="button" id="button-minus"> <i class="fa fa-plus"></i> </button>
							</div>
						</div> <!-- input-group.// -->
					</div> <!-- col.// -->
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">$1156.00</var> 
			<small class="text-muted"> $315.20 each </small> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<a href="" class="btn btn-danger"> Remove</a>
	</td>
</tr>
<tr>
	<td>
		<figure class="itemside align-items-center">
			<div class="aside"><img src="./images/items/10.jpg" class="img-sm"></div>
			<figcaption class="info">
				<a href="#" class="title text-dark">ADATA Premier ONE microSDXC</a>
				<p class="text-muted small">Size: 256 GB  <br> Brand: ADATA </p>
			</figcaption>
		</figure>
	</td>
	<td> 
		<!-- col.// -->
					<div class="col"> 
						<div class="input-group input-spinner">
							<div class="input-group-prepend">
							<button class="btn btn-light" type="button" id="button-plus"> <i class="fa fa-minus"></i> </button>
							</div>
							<input type="text" class="form-control"  value="1">
							<div class="input-group-append">
							<button class="btn btn-light" type="button" id="button-minus"> <i class="fa fa-plus"></i> </button>
							</div>
						</div> <!-- input-group.// -->
					</div> <!-- col.// -->
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">$149.97</var> 
			<small  class="text-muted"> $75.00 each </small>  
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<a href="" class="btn btn-danger"> Remove</a>
	</td>
</tr>
<tr>
	<td>
		<figure class="itemside align-items-center">
			<div class="aside"><img src="./images/items/9.jpg" class="img-sm"></div>
			<figcaption class="info">
				<a href="#" class="title text-dark">Logitec headset for gaming</a>
				<p class="small text-muted">Version: CUH-ZCT2E  <br> Brand: Sony</p>
			</figcaption>
		</figure>
	</td>
	<td> 
		<!-- col.// -->
					<div class="col"> 
						<div class="input-group input-spinner">
							<div class="input-group-prepend">
							<button class="btn btn-light" type="button" id="button-plus"> <i class="fa fa-minus"></i> </button>
							</div>
							<input type="text" class="form-control"  value="1">
							<div class="input-group-append">
							<button class="btn btn-light" type="button" id="button-minus"> <i class="fa fa-plus"></i> </button>
							</div>
						</div> <!-- input-group.// -->
					</div> <!-- col.// -->
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">$98.00</var> 
			<small class="text-muted"> $578.00 each</small> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
		<a href="" class="btn btn-danger"> Remove</a>
	</td>
</tr>
</tbody>
</table>
</div> <!-- card.// -->

	</aside> <!-- col.// -->
	<aside class="col-lg-3">

		<div class="card">
		<div class="card-body">
			<dl class="dlist-align">
			  <dt>Total price:</dt>
			  <dd class="text-right">$69.97</dd>
			</dl>
			<dl class="dlist-align">
			  <dt>Tax:</dt>
			  <dd class="text-right"> $10.00</dd>
			</dl>
			<dl class="dlist-align">
			  <dt>Total:</dt>
			  <dd class="text-right text-dark b"><strong>$59.97</strong></dd>
			</dl>
			<hr>
			<p class="text-center mb-3">
				<img src="./images/misc/payments.png" height="26">
			</p>
			<a href="./place-order.html" class="btn btn-primary btn-block"> Checkout </a>
			<a href="./store.html" class="btn btn-light btn-block">Continue Shopping</a>
		</div> <!-- card-body.// -->
		</div> <!-- card.// -->

</aside> <!-- col.// -->


</div> <!-- row.// -->
<!-- ============================ COMPONENT 1 END .// ================================= -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
</body>
</html>

@endsection