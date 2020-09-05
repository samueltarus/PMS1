@extends('admin.admin_layouts')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Assign Tenant House</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
        <form  enctype="multipart/form-data" action="{{url('save-tenant-house')}} " method="POST">

            @csrf
            <div class="form-group">

                <div class="form-group">
                    <label>Property Name</label>
                    {{-- <input class="form-control" type="text"  name="property_name"> --}}
                    <select name="property_name" class="property_name" id="property_name" class="form-control " value="property_name" required>

                        @foreach ($property_name as $property_name)

                         <option value="{{$property_name->id}} "> {{$property_name->property_name}}     </option>

                        @endforeach

                    </select>

                </div>
                <div class="form-group">
                    <label>Room Code</label>
                    <select name="house_id" class="unit_name" class="form-control" id="unit_name" class="form-control"  value="house_id" required>

                        <option value="0" disabled="true" selected="true">Select House Number</option>

                     </select>
                </div>
                <label>Tenant National ID/Passwoprt</label>
                {{-- <input class="form-control" type="text"  name="passport"> --}}
                <select name="passport" class="passport" id="passport" class="form-control " value="passport" required>

                    @foreach ($passport as $passport)

                     <option value="{{$passport->id}} "> {{$passport->passport}}     </option>

                    @endforeach

                </select>

            </div>
            <div class="form-group">
                <label>Tenant Names</label>

                <select name="username"   class="username" id="username" class="form-control"  value="username" required>

                    <option value="0" disabled="true" selected="true">Tenant User Names</option>

                 </select>

            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Placement Date <span class="text-danger">*</span></label>
                    <input class="form-control" type="date" name="placement_date">
                </div>
            </div>

       <div class="form-group">
        <label> Deposit Amount <span class="text-danger">*</span></label>
             <input class="form-control" type="number" name="house_deposit" required>
        </div>
       <div class="form-group">
        <label> Monthly Rent Amount <span class="text-danger">*</span></label>
             <input class="form-control" type="number" name="monthly_rent" required>
        </div>

                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Create House</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script type="text/javascript">

    $(document).ready(function(){
      $(document).on('change','.passport',function(){
        var id=$(this).val();
        var div=$(this).parents();
        var op= "";
         $.ajax({
          type:'get',
          url:'{!!URL::to('find-tenant')!!}',
          data:{'id':id},
          success:function(data){

            //   op+='<option value ="0" selected disabled><Chose Property </option>';
               for(var i=0; i<data.length;i++){
              op+='<option value="'+data[i].id+'">'+data[i].username+'</option>';
              console.log(op);
               }

            div.find('.username').html(" ");
            div.find('.username').append(op);
          },

          error:function(){
          }
        });
      });

    });



    $(document).ready(function(){
      $(document).on('change','.property_name',function(){
        var id=$(this).val();
        var div=$(this).parents();
        var op= "";
         $.ajax({
          type:'get',
          url:'{!!URL::to('find-unit-name')!!}',
          data:{'id':id},
          success:function(data){

              op+='<option value ="0" selected disabled><Chose Property </option>';
               for(var i=0; i<data.length;i++){
              op+='<option value="'+data[i].id+'">'+data[i].unit_name+'</option>';
              console.log(op);
               }

            div.find('.unit_name').html(" ");
            div.find('.unit_name').append(op);
          },

          error:function(){
          }
        });
      });

    });





</script>
@endsection

