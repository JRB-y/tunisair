@extends('layouts.frontend', ['page_title' => 'agencies'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="my-3 p-3 bg-body rounded shadow-sm pb-3">
                <h6 class="border-bottom pb-2 mb-0 tun-red--text">List of agencies in Tunisia</h6>
                <iframe src="https://www.google.com/maps/d/embed?mid=1GXcHrceCusCtdN1qyrso_8vksZUMOAXE&hl=fr" width="100%" height="700"
                style="border: 0 !important; margin-top: 70px;"></iframe>
            </div>
        </div>
    </div>
@endsection
