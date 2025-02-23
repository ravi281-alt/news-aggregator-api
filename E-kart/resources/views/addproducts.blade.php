@extends('layouts.base')

@section('main')

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form method="POST" action="/addproduct">
                @csrf
                <div class="mb-3">
                    <label for="pname" class="form-label"><strong>Product Title</strong></label>
                    <input type="text" class="form-control" id="pname" name = "pname" placeholder="name">
                </div>
                
                <div class="mb-3">
                    <label for="pdesc" class="form-label"><strong>Product Description</strong></label>
                    <textarea class="form-control" id="pdesc" name = "pdesc" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label for="price" class="form-label"><strong>Price</strong></label>
                    <input type="number" class="form-control" id="price" name = "price" placeholder="123">
                </div>

                <div class="mb-3 ">
                    <label for="category" class="form-label"><strong>category</strong></label><br>
                    <select class="form-control" name="cat" id="category">
                        <option selected>Select Category</option>
                        <option value="1">Grocery</option>
                        <option value="2">Electronics</option>
                        <option value="3">Fashion</option>
                    </select>
                </div>

                <div class="mb-3">
                    <strong>Status</strong>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" name="pactive" id="activelabel" checked>
                        <label class="form-check-label" for="activelabel">
                            Active
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" name="pactive" id="inactivelabel">
                        <label class="form-check-label" for="inactivelabel">
                            Inactive
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Add Product">
                </div>

            </form>
        </div>

        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($data) == 0)
                        <tr>
                            <td>No Product Found</td>
                        </tr>
                    @else
                        @foreach($data as $x)
                            <tr>
                                <td>{{$x->title}}</td>
                                <td>{{$x->description}}</td>
                                <td>{{$x->price}}</td>
                                @if($x->category == 1)
                                    <td>Grocery</td>
                                @elseif($x->category == 2)
                                    <td>Electronics</td>
                                @elseif($x->category == 3)
                                    <td>Fashion</td>
                                @endif
                                @if($x->status == 0)
                                    <td>Active</td>
                                @else
                                    <td>Inactive</td>
                                @endif
                                <td><a href="edit/{{$x->id}}"><button class="btn btn-warning">Edit</button></a></td>
                                <td><a href="delete/{{$x->id}}"><button class="btn btn-danger">Delete</button></a></td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{$data->links()}}



        </div>
    </div>
</div>


<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

@endsection