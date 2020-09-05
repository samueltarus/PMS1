@extends('admin.admin_layouts')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Tenant</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
        <form  enctype="multipart/form-data" action="{{url('save-tenant')}}" method="POST">
            @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input  name="first_name" class="form-control" type="text" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>last Name <span class="text-danger">*</span></label>
                            <input  name="last_name" class="form-control" type="text" value="{{ old('last_name') }}" required autocomplete="first_name" autofocus>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>National Id /PassPort <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="passport" value="{{ old('passport') }}" required autocomplete="passport" autofocus>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input  name="email" class="form-control" type="email" value="{{ old('email') }}" required autocomplete="first_name" autofocus>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Occupation</label>
                            <select class="form-control select" name="occupation">
                                <option>Student</option>
                                <option>Employed</option>
                                <option>Self Employed</option>

                            </select>

                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date Of Birth <span class="text-danger">*</span></label>
                            <input class="form-control" type="date" name="date_of_birth">
                        </div>
                    </div>





                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control " name="address">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>County</label>
                                    <select class="form-control select" name="county">
                                        <option>Nairobi</option>
                                        <option>Kirinyaga</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Constituency</label>
                                    <input type="text" class="form-control" name="constituency">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Town</label>
                                    <select class="form-control select" name="town">
                                        <option>Nairobi</option>
                                        <option>Limuru</option>

                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone  Number</label>
                            <input class="form-control" type="number" name="phone_number">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Avatar</label>
                            <div class="profile-upload">
                                <div class="upload-img">
                                    <img alt="" src="{{asset('backend/img/user.jpg')}}">
                                </div>
                                <div class="upload-input">
                                    <input type="file" class="form-control" name="avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="display-block">Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
                        <label class="form-check-label" for="status">
                        Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status" value="0">
                        <label class="form-check-label" for="status">
                        Inactive
                        </label>
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Create Tenant</button>
                </div>
            </form>
        </div>
    </div>
@endsection
