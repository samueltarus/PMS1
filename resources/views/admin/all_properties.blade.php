@extends('admin.admin_layouts')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Properties</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{url('add-property')}}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Property</a>
        </div>
    </div>
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">Property Name</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">County</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        {{-- <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus select-focus">
                <label class="focus-label">Role</label>
                <select class="select floating">
                    <option>Select Role</option>
                    <option>Nurse</option>
                    <option>Pharmacist</option>
                    <option>Laboratorist</option>
                    <option>Accountant</option>
                    <option>Receptionist</option>
                </select>
            </div>
        </div> --}}
        <div class="col-sm-6 col-md-3">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">


            <div class="table-responsive">

                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th style="min-width:200px;">Property Name</th>
                            <th>Property Type</th>
                            <th>Property Description</th>
                            <th>Number of Units</th>
                            <th>Address</th>
                            <th>Property Manager</th>
                            <th>Projected Monthly Rev</th>
                            <th>Projected Annualized Rev</th>


                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $properties)
                        <tr>
                            <td>
                            <img width="28" height="28" src="{{URL::to($properties->avatar)}}" class="rounded-circle" alt=""> <h2>{{$properties->property_name}}</h2>
                            </td>
                        <td>{{$properties->property_type}}</td>
                            <td>{{$properties->property_description}}</td>
                            <td>{{$properties->number_of_units}}</td>
                            <td>{{$properties->address }}</td>
                            <td>{{$properties->username }}</td>
                            <td>{{$properties->projected_monthly_rev }}</td>
                            <td>{{$properties->projected_annulized_rev }}</td>

                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{url('edit-property',$properties->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="{{url ('/delete-property/'.$properties->id)}}" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


        </div>

    </div>
</div>
@endsection
