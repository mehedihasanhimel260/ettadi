@extends('backend.layouts.master')
@section('content')
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded p-4">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <h6 class="mb-4">Category Form</h6>
                    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="text" class="col-sm-3 col-form-label">Product Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" value="{{$product->title}}" class="form-control" id="text">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="text" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-select mb-3" aria-label="Default select example"  name="category">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="text" class="col-sm-3 col-form-label"> Image</label>
                            <div class="col-sm-9">
                                <input class="form-control bg-dark" name="image"  type="file" id="formFile">
                                <img src="{{asset('inc/frontend/img').'/' .$product->image}}" height="200px" width="200px">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="text" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" placeholder="Product description here" name="description"  id="floatingTextarea" style="height: 100px;">
                                    {{$product->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="number" class="col-sm-3 col-form-label">Regular Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control"  value="{{$product->price}}"  id="number">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="number" class="col-sm-3 col-form-label">Discount Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="discount_price" class="form-control"  value="{{$product->discount_price}}"  id="number">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="number" class="col-sm-3 col-form-label">Product Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" name="qty"  value="{{$product->qty}}"  class="form-control" id="number">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="number" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>

        </div>
    </div>
</div>

@endsection
