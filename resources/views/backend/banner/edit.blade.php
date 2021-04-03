@extends('layouts.app', ['activePage' => 'banner'])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                <h4 class="card-title">New banner</h4>
                <p class="card-category">You can create a banner</p>
                </div>
                <div class="card-body table-responsive">
                    <form method="POST" action="{{ route('backend.banner.update', $banner->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                        <div>
                                            <span class="btn btn-raised btn-round btn-default btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image" />
                                            </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                                <i class="fa fa-times"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Title</label>
                            <input type="text" class="form-control"  aria-describedby="titleHelper" name="title" value="{{ $banner->title }}">
                        </div>
                        <div class="form-group">
                            <label for="contentActu">Text</label>
                            <textarea class="form-control" id="contentActu" rows="3" name="text">{{ $banner->text }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="titleActu">Order</label>
                            <input type="number" class="form-control"  aria-describedby="titleHelper" name="order"  value="{{ $banner->order }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection
