@extends('admin.admin_layouts')

@section('content')
    <div class="content">
<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title"> Occupied Houses </h4>
    </div>
    <div class="col-sm-7 col-7 text-right m-b-30">
    {{-- <a href="{{url('add-house')}}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add House</a> --}}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th>House Id</th>
                        <th>Property Name</th>
                        <th>Room Code</th>
                        <th>Unit Type</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($houses as $houses)

                    <tr>
                    <td>{{$houses->id}}</td>
                        <td>{{$houses->property_id}}</td>
                        <td>{{$houses->unit_name}}</td>
                        <td>{{$houses->unit_type}}</td>
                        <td>
                            @if ($houses->status==1)
                            <a class="btn btn-danger" href="{{URL::to('/unactive-house/'.$houses->id)}}">Vacant House
                                    <i class="fas fa-thumbs-down"></i>
                                </a>
                                @else
                                {{-- <a class="btn btn-success" href="{{URL::to('/unactive-house/'.$houses->id)}}">Vacate House
                                    <i class="fas fa-thumbs-up"></i>
                                </a> --}}
                                @endif
                        </td>
                        {{-- <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{url('edit-house',$houses->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="{{ url('/delete-house/'.$houses->id)}}" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td> --}}
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
