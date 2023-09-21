@extends('backend.layouts.master')
@section('content')
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded p-4">
            <div class="row justify-content-md-center">

                <div class="col-md-8">
                    <h6 class="mb-4">Product Form</h6>
                    <form method="POST" action="{{route('settings.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="ProductTitle" class="col-sm-3 col-form-label">Website Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="Product-Title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-3 col-form-label"> Logo</label>
                            <div class="col-sm-9">
                                <input class="form-control bg-dark" name="image"  type="file" id="formFile">
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
