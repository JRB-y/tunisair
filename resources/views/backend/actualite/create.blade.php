@extends('layouts.app', ['activePage' => 'actualite', 'titlePage' => __('Nouvelle Actualité')])
@push('css')
.ui-datepicker {
    position: relative !important;
    top: -290px !important;
    left: 0 !important;
}
@endpush

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                <h4 class="card-title">Create a news</h4>
                <p class="card-category">You can create a news</p>
                </div>
                <div class="card-body table-responsive">
                    <form method="POST" action="{{ route('backend.actualite.store') }}" enctype="multipart/form-data">
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
                                                <input type="file" name="image" required/>
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
                            <input type="text" class="form-control" id="titleActu" name="title" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="contentActu">Content</label>
                            <textarea class="form-control" id="contentActu" rows="3" name="content" required></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contentActu">Date of onset</label>
                                    <input type="text" class="form-control datepicker" name="start_date" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contentActu">Date of end</label>
                                    <input type="text" class="form-control datepicker" name="end_date" required>
                                </div>
                            </div>
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
@push('js')
  <script>
    $('.datepicker').datetimepicker({
        format: 'DD/MM/YYYY',
        widgetPositioning: {
            vertical: 'top'
        }
    });
  </script>
@endpush
