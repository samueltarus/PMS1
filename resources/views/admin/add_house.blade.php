@extends('admin.admin_layouts')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add House</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
        <form  enctype="multipart/form-data" action="{{url('save-house')}} " method="POST">

            @csrf

                <div class="form-group">
                    <label>Property Name</label>
                    <select class="form-control select"  name="property_id" class="form-control" required >
                        @foreach ($houses as $houses)
                         <option value="{{$houses->id}}">{{$houses->property_name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label>Unit Name</label>
                    <input class="form-control" type="text"  name="unit_name">
                </div>

                <div class="form-group">
                    <label>Unit Type</label>
                    <select class="form-control select" name="unit_type">
                        <option>Single</option>
                        <option>Double Room</option>
                        <option>Bedsitter</option>
                        <option>One Bedroom</option>
                        <option>Two Bedrooms</option>
                        <option>Maisonette</option>
                        <option>Bungalow</option>

                    </select>
                </div>

                <div class="form-group">
                    <label class="display-block">Department Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="product_active" value="0" checked>
                        <label class="form-check-label" for="product_active">

                        Inactive
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="product_inactive" value="1">
                        <label class="form-check-label" for="product_inactive">
                            Active
                        </label>
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
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Create House</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
