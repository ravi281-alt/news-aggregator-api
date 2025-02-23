@extends('layouts.base')

@section('main')

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title">Add Product</h4></header>
		<form method = "post" action = "/addproduct">
			@CSRF
				<div class="form-row">
					<div class="col form-group">
						<label>Product Description</label>
					  	<input type="text" name = "pdesc" class="form-control" placeholder="">
					</div>
				</div> 

				<div class="form-group">
					<label>Price</label>
					<input type="number" name = "price" class="form-control" placeholder="">
				</div>

				<div class="form-group">
					<label class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input" checked="" type="radio" name="pactive" value="1">
					  <span class="custom-control-label"> Active </span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input" type="radio" name="pactive" value="0">
					  <span class="custom-control-label"> Inactive </span>
					</label>
				</div>
				
				<div class="form-row">
					
					<div class="form-group col-md-6">
					  <label>Category</label>
					  <select id="#" name = "cat" class="form-control">
					    <option> Choose...</option>
					      <option value = "1" >Grocery</option>
					      <option value = "2" >Electronics</option>
					      <option value = "3" >Fashion</option>
					  </select>
					</div> 
				</div>
				
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block"> Add  </button>
			    </div> 
			        
			</form>
		</article>
    </div> 
    
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

@endsection