@extends('admin.admin_layouts')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Property</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
        <form  enctype="multipart/form-data" action="{{url('update-property',$properties->id)}}" method="POST">
            @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Property Name <span class="text-danger">*</span></label>
                            <input  name="property_name" class="form-control" type="text" value="{{ $properties->property_name }}" required autocomplete="first_name" autofocus>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Property Type</label>
                            <select class="form-control select" name="property_type" value="{{ $properties->property_type }}">
                                <option>Retirement</option>
                                <option>Apartments</option>
                                <option>Flats</option>
                                <option>Bungalow</option>
                                <option>Mansiontte</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Property Description</label>
                            <input class="form-control" type="text" name="property_description" value="{{ $properties->property_description }}">
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Number of Units <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="number_of_units" value="{{ $properties->number_of_units }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Projected Monthly Rev <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="projected_monthly_rev" value="{{ $properties->projected_monthly_rev }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Projected Annualized Rev <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="projected_annulized_rev" value="{{ $properties->projected_annulized_rev }}">
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control " name="address" value="{{ $properties->address }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>County</label>
                                    <select class="form-control select" name="county" value="{{ $properties->county }}">
                                        <option>Nairobi</option>
                                        <option>Kirinyaga</option>
                                        <option>Kiambu</option>
                                        <option>Nakuru</option>
                                        <option>Laikipia</option>
                                        <option>Baringo</option>
                                        <option>Machakos</option>
                                        <option>Kilifi</option>
                                        <option>Mombasa</option>
                                        <option>Kisumu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Constituency</label>
                                    <input type="text" class="form-control" name="constituency" value="{{ $properties->constituency }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Town</label>
                                    <select class="form-control select" name="town" value="{{ $properties->town }}">
                                        <option>Nairobi</option>
                                        <option>Limuru</option>
                                        <option>Kabarnet</option>
                                        <option>Nakuru</option>
                                        <option>Kikuyu</option>
                                        <option>Machakos</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone  Number</label>
                            <input class="form-control" type="number" name="phone_number" value="{{ $properties->phone_number }}">
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
                                    <input type="file" class="form-control" name="avatar" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="display-block">Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status" value="{{ $properties->status }}" checked>
                        <label class="form-check-label" for="status">
                        Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status" value="{{ $properties->status }}">
                        <label class="form-check-label" for="status">
                        Inactive
                        </label>
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Update Property</button>
                </div>
            </form>
        </div>
    </div>
@endsection
