@extends('layouts.app', ['activePage' => 'employe', 'titlePage' => __('New employee')])

@section('content')
@php
    $editMode = isset($user) ? true : false;
@endphp
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                <h4 class="card-title">{{ $editMode ? 'Edit employee' : 'New Employee'}}</h4>
                <p class="card-category">{{ $editMode ? 'You can edit this employee' : 'You can create a new employee'}}</p>
                </div>
                <div class="card-body table-responsive">
                    <h4>
                        <b>Employee</b>
                    </h4>
                    <form method="POST" action="{{ $editMode ? route('backend.employes.edit', $user->id) : route('backend.employes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="titleActu">Firstname</label>
                                    <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="firstname" required value="{{ $editMode ? $user->firstname : old('firstname') }}" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="titleActu">Lastname</label>
                                    <input type="text" class="form-control" id="titleActu" aria-describedby="titleHelper" name="lastname" required value="{{ $editMode ? $user->lastname : old('lastname') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="titleActu">Email</label>
                                    <input type="email" class="form-control" id="titleActu" aria-describedby="titleHelper" name="email" required value="{{ $editMode ? $user->email : old('email') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="titleActu">Password</label>
                                    <input type="password" class="form-control" id="titleActu" aria-describedby="titleHelper" name="password" {{ $editMode ? '' : 'required' }}>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="text" class="form-control" id="age" aria-describedby="age" name="age" required value="{{ $editMode ? $user->age :  old('age') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                 <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" id="phone" aria-describedby="titleHelper" name="phone" required value="{{ $editMode ? $user->phone : old('phone') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone">Situation</label>
                                    <select name="situation_id" class="form-control" id="situation_id">
                                        @foreach ($situations as $situation)
                                            <option value="{{ $situation->id }}" {{ ($editMode && $user->situation_id == $situation->id) ? 'selected="selected"' : ''}}>{{ $situation->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone">Gender</label>
                                    <select name="gender" class="form-control" id="gender">
                                        <option value="0" {{ ($editMode && $user->gender == 0) ? 'selected' : ''}}>Male</option>
                                        <option value="1" {{ ($editMode && $user->gender == 1) ? 'selected' : ''}}>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="post">Profession</label>
                                    <input type="text" class="form-control" id="post" aria-describedby="post" name="post" required value="{{ $editMode ? $user->post :  old('post') }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select name="emp_category" class="form-control" id="emp_category">
                                        <option value="0" selected disabled>--------</option>
                                        @foreach (config('quota.emp_categories') as $empCategory)
                                            <option value="{{ $empCategory['id'] }}" {{ ($editMode && $user->emp_category == $empCategory['id']) ? 'selected="selected"' : ''}}>{{ $empCategory['name'] }}, quota = {{$empCategory['quota']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select name="emp_function" class="form-control" id="emp_function">
                                        <option value="0" selected disabled>--------</option>
                                        @foreach (config('quota.emp_fonctions') as $empFunction)
                                            <option value="{{ $empFunction['id'] }}" {{ ($editMode && $user->emp_function == $empFunction['id']) ? 'selected="selected"' : ''}}>{{ $empFunction['name'] }}, quota = {{$empFunction['quota']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-6">
                                <div class="form-check mt-4">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="active" {{ $editMode && $user->active ? 'checked' : ''}}>
                                        Active employee
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div> --}}
                        </div>

                        {{-- SPOUSE --}}
                        <hr />
                        <h4>
                            <b>Spouse</b>
                        </h4>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="spouseFirstname">Firstname</label>
                                    <input type="text" class="form-control" id="spouseFirstname" aria-describedby="titleHelper" name="spouseFirstname" value="{{ $editMode && $user->conjoint ? $user->conjoint->firstname : old('spouseFirstname') }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="spouseLastname">Lastname</label>
                                    <input type="text" class="form-control" id="spouseLastname" aria-describedby="titleHelper" name="spouseLastname" value="{{ $editMode && $user->conjoint ? $user->conjoint->lastname :  old('spouseLastname') }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="spouseAge">Age</label>
                                    <input type="text" class="form-control" id="spouseAge" aria-describedby="titleHelper" name="spouseAge" value="{{ $editMode && $user->conjoint ? $user->conjoint->age :  old('spouseAge') }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <select name="spouseGender" class="form-control" id="spouseGender">
                                        <option value="0" {{ $editMode && $user->conjoint && $user->conjoint->gender === 0 ? 'selected' : '' }}>Male</option>
                                        <option value="1" {{ $editMode && $user->conjoint && $user->conjoint->gender === 1 ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- CHILDREN --}}
                         <h4>
                            <b>Children</b>
                        </h4>
                        <!-- HIDDEN DYNAMIC ELEMENT TO CLONE -->
                        <!-- you can replace it with any other elements -->
                        <div class="form-group dynamic-element" style="display:none">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="childFirstname">Firstname</label>
                                        <input type="text" class="form-control" id="childFirstname" aria-describedby="titleHelper" name="childFirstname[]">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="childLastname">Lastname</label>
                                        <input type="text" class="form-control" id="childLastname" aria-describedby="titleHelper" name="childLastname[]">
                                    </div>
                                </div>


                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="childAge">Age</label>
                                        <input type="text" class="form-control" id="childAge" aria-describedby="titleHelper" name="childAge[]">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <select name="childGender[]" class="form-control" id="childGender">
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <span class="btn btn-danger btn-sm delete">
                                        X
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="dynamic-stuff"></div>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                                <p class="add-one btn btn-info btn-sm">+ Add a child</p>
                            </div>
                            <div class="col-md-5"></div>
                            
                            </div>
                        </div>
                        <button type="cancel" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
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
        //Clone the hidden element and shows it
        $('.add-one').click(function(){
            console.log("dsfsdf")
            $('.dynamic-element').first().clone().appendTo('.dynamic-stuff').show();
            attach_delete();
        });


        //Attach functionality to delete buttons
        function attach_delete() {
            $('.delete').off();
            $('.delete').click(function(){
                $(this).closest('.form-group').remove();
            });
        }
        @if($editMode)
            const editMode = {!! json_encode($editMode) !!}
            const user = {!! isset($user) ? json_encode($user) : null !!}

            if (editMode && user) {
                const children = user.children
                for (const child of children) {
                    const formElement = $('.dynamic-element').first().clone()
                    formElement.find('#childFirstname')[0].value = child.firstname
                    formElement.find('#childLastname')[0].value = child.lastname
                    formElement.find('#childAge')[0].value = child.age
                    formElement.find('#childGender')[0].value = child.gender
                    formElement.appendTo('.dynamic-stuff').show();
                    attach_delete();
                }
            }
        @endif
    </script>
@endpush

