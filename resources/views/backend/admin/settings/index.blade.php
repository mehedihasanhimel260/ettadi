@extends('backend.layouts.master')
@section('content')
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded p-4">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <h6 class="mb-4">Product Form</h6>
                    <form method="POST" action="{{ route('settings.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="website_title" class="col-sm-3 col-form-label">Website Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="website_title" value="{{ $settings->website_title ?? '' }}" class="form-control" id="website_title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fb_link" class="col-sm-3 col-form-label">Facebook link</label>
                            <div class="col-sm-9">
                                <input type="text" name="fb_link" value="{{ $settings->fb_link ?? '' }}" class="form-control" id="fb_link">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="yt_link" class="col-sm-3 col-form-label">Youtube link</label>
                            <div class="col-sm-9">
                                <input type="text" name="yt_link" value="{{ $settings->yt_link ?? '' }}" class="form-control" id="yt_link">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="LinkedIn" class="col-sm-3 col-form-label">LinkedIn link</label>
                            <div class="col-sm-9">
                                <input type="text" name="LinkedIn" value="{{ $settings->LinkedIn ?? '' }}" class="form-control" id="LinkedIn">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="logo" class="col-sm-3 col-form-label">Logo</label>
                            <div class="col-sm-9">
                                <input class="form-control bg-dark" name="logo" type="file" id="logo">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"></label>
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
