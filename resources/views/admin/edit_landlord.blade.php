@extends('admin.admin_layouts')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Landlord</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
        <form  enctype="multipart/form-data" action="{{url('update-landlord',$landlords->id)}}" method="POST">
            @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input  name="first_name" class="form-control" type="text" value="{{ $landlords->first_name }}" required autocomplete="first_name" autofocus>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" name="last_name" value="{{ $landlords->last_name }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="email" value="{{ $landlords->email }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>National Id /PassPort <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="passport" value="{{ $landlords->passport }}">
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone  Number</label>
                            <input class="form-control" type="number" name="phone_number" value="{{ $landlords->phone_number }}">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="display-block">Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status" value="{{ $landlords->status }}" checked>
                        <label class="form-check-label" for="status">
                        Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status" value="{{ $landlords->status }}">
                        <label class="form-check-label" for="status">
                        Inactive
                        </label>
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Update Landlord</button>
                </div>
            </form>
        </div>
    </div>
@endsection
