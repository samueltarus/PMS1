@extends('admin.admin_layouts')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Tenants</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{url('add-tenant')}}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Tenant</a>
        </div>
    </div>
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">Tenant ID</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">Tenant Name</label>
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
                            <th style="min-width:200px;">Names</th>

                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Unit Name</th>
                            <th style="min-width: 110px;">Lease Start Date</th>
                            <th style="min-width: 110px;">Lease End Date</th>
                            <th>Montly Rent Amount</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenants as $tenants)
                        <tr>
                            <td>
                            <img width="28" height="28" src="{{URL::to($tenants->avatar)}}" class="rounded-circle" alt=""> <h2> {{$tenants->username}}</h2>
                            </td>
                            <td>{{$tenants->email }}</td>
                            <td>{{$tenants->phone_number }}</td>
                            <td>{{$tenants->unit_name}}</td>
                            <td>{{$tenants->lease_start_date }}</td>
                            <td>{{$tenants->lease_end_date }}</td>
                            <td>{{$tenants->monthly_rent }}</td>

                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{url('edit-tenant/',$tenants->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="{{url ('/delete-tenant/'.$tenants->id)}}" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
