@extends('backend.layouts.master')
@section('content')
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded p-4">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h6 class="mb-4">Category Form</h6>
                    <form method="POST" action="{{route('categories.store')}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
              </div>

        </div>
    </div>
</div>

@endsection
