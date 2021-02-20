@extends('layouts.app', ['activePage' => 'actualite', 'titlePage' => __('Nouvelle Actualité')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                <h4 class="card-title">Nouvelle Actualités</h4>
                <p class="card-category">Vous pouvez crée une nouvelle actualité</p>
                </div>
                <div class="card-body table-responsive">
                    <form method="POST" action="/actualite" enctype="multipart/form-data">
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
                            <label for="titleActu">Titre</label>
                            <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="title">
                        </div>
                        <div class="form-group">
                            <label for="contentActu">Contenu</label>
                            <textarea class="form-control" id="contentActu" rows="3" name="content"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection
