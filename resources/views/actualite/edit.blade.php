@extends('layouts.app', ['activePage' => 'actualite', 'titlePage' => __('Nouvelle Actualité')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                <h4 class="card-title">Edit {{ $actualite->title }}</h4>
                <p class="card-category">You can edit this news</p>
                </div>
                <div class="card-body table-responsive">
                    <form method="POST" action="/actualite/edit/{{$actualite->id}}" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="title" value="{{$actualite->title}}" required>
                        </div>
                        <div class="form-group">
                            <label for="contentActu">Content</label>
                            <textarea class="form-control" id="contentActu" rows="3" name="content" required>{{ $actualite->content }}</textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contentActu">Date of onset</label>
                                    <input type="text" class="form-control datepicker" aria-describedby="titleHelper" name="start_date" 
                                    value="{{ $actualite->start_date ? $actualite->start_date->format('d/m/Y H:m') : '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contentActu">Date of end</label>
                                    <input type="text" class="form-control datepicker" aria-describedby="titleHelper" name="end_date" 
                                    value="{{ $actualite->end_date ? $actualite->end_date->format('d/m/Y H:m') : '' }}">
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Edit</button>
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
        format: 'DD/MM/YYYY'
    });
  </script>
@endpush
