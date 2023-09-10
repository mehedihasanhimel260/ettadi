@extends('backend.layouts.master')
@section('content')
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded p-4">
            <nav class="navbar navbar-expand-sm ">
                <div class="container-fluid">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                        <h6 class="mb-4">Products Table</h6>
                    </li>
                  </ul>
                  <li class="d-flex">
                      <a class="btn btn-outline-primary" href="{{route('products.create')}}">Create products</a>
                    </li>
                </div>
              </nav>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">D.Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{asset('inc/backend/img').'/' .$product->image}}" height="50px" width="50px"> </td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">

                                <form action="{{ route('products.destroy',$product->id) }}" method="Post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('products.edit',$product->id)}}" type="button" class="btn btn-outline-primary">Edit</a>
                                    <button type="submit" class="btn btn-outline-primary">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
