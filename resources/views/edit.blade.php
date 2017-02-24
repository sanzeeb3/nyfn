@extends('main')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Form</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/update', [$user->id]) }}">
                        {{ csrf_field() }}


                        @if(!empty($user->image))
                                
                        <div class="image">
                        <label class="col-md-4 control-label">Image</label>                            
                            <div class="col-md-6">
                                    <span class="close">&times;</span>
                                    <img width="100%" height="100%" src="{{asset("public/newuploads/{$user->image}")}}"><br><br>
                            </div>
                        </div>

                        @else

                        <div class="uploadabc">
                            <label class="col-md-4 control-label">Upload Image</label>
                                <div class="col-md-6">
                                    <input  id="input-id" type="file" class="file" name="image" data-preview-file-type="text">
                                    <input type="hidden" id="getimagename" name="uploadedimage1" value="" ><br><br>    
                                </div>
                        </div>

                        @endif


                        <div class="upload">
                            <label class="col-md-4 control-label">Upload Image</label>
                                <div class="col-md-6">
                                    <input  id="input-id" type="file" class="file" name="image" data-preview-file-type="text">
                                    <input type="hidden" id="getimagename" name="uploadedimage" value="" ><br><br>    
                                </div>
                        </div>
                      

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('father_name') ? ' has-error' : '' }}">
                            <label for="father_name" class="col-md-4 control-label">Father's Name</label>

                            <div class="col-md-6">
                                    <input id="father_name" class="form-control" type="text" name="father_name" value="{{ $user->father_name }}" required autofocus>
                                
                                @if ($errors->has('father_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mother_name') ? ' has-error' : '' }}">
                            <label for="mother_name" class="col-md-4 control-label">Mother's Name</label>

                            <div class="col-md-6">                                
                                    <input id="mother_name" class="form-control" type="text" name="mother_name" value="{{ $user->mother_name }}" required autofocus>
                                
                                @if ($errors->has('mother_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mother_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">Date Of Birth</label>

                            <div class="col-md-6">
                                <div class="input-group date">
                                    <input id="dob" class="form-control datepicker" placeholder="2012-02-12" type="text" name="dob" value="{{$user->dob}}" required autofocus>
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <select class="form-control" name="gender"" required autofocus>
                                    <option value="{{$user->gender}}" selected>{{$user->gender}}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group">
                            <fieldset>
                                <label class="col-md-4 control-label">Permanent Address</label><br>
                                    <div class="col-md-6">

                                            <label>Region:</label>
                                            <select  name="region" id="region" class="form-control" required>

                                            <option value="{{ $user->region_id}}" selected>{{$user->region->region_name}}</option>
                                                @foreach($region as $reg)
                                                    <option value="{{$reg->id}}">{{$reg->region_name}}</option>
                                                @endforeach                
                                            </select><br>
                                                @if ($errors->has('region'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('region') }}</strong>
                                                    </span>
                                                @endif

                                            <label>Zone:</label>
                                                <select name="zone" id="zone" class="form-control zone" required> 

                                                <option value="{{$user->zone_id}}" selected>{{$user->zone->zone_name}}</option>
                                            </select><br>
                                              @if ($errors->has('zone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('zone') }}</strong>
                                                    </span>
                                                @endif

                                            <label>District:</label>
                                                <select name="district" id="district"  class="form-control district" required>
                                                <option value="{{$user->district_id}}" selected>{{$user->district->district_name}}</option>
                                            </select><br>
                                                @if ($errors->has('district'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('district') }}</strong>
                                                    </span>
                                                @endif
                                            

                                            <label>VDC/Municipality:</label>
                                                <input type="text" name="vdc_mun" value="{{ $user->vdc_mun }}"  class="form-control vdc_mun" required>
                                            <br>
                                                @if ($errors->has('vdc_mun'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('vdc_mun') }}</strong>
                                                    </span>
                                                @endif
                                            

                                             <label>Ward No.:</label>
                                                <input type="number" value="{{$user->ward_no}}"  name="ward_no" class="form-control ward_no" required>
                                            <br>

                                                @if ($errors->has('ward_no'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('ward_no') }}</strong>
                                                    </span>
                                                @endif
                                            

                                    </div>
                            </fieldset>
                        </div>


                         <div class="form-group">
                            <fieldset>
                                <label class="col-md-4 control-label">Temporary Address</label><br>
                                    <div class="col-md-6">

                                            <label>Region:</label>
                                            <select  name="tregion" id="tregion"  class="form-control" required>
                                            <option value="{{$user->tregion_id}}" selected>{{$user->tempRegion->region_name}}</option>
                                                @foreach($region as $reg)
                                                    <option value="{{$reg->id}}">{{$reg->region_name}}</option>
                                                @endforeach                
                                            </select><br>
                                                @if ($errors->has('tregion'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('tregion') }}</strong>
                                                    </span>
                                                @endif
                                            

                                            <label>Zone:</label>
                                                <select name="tzone" id="tzone" class="form-control zone" required>
                                                <option value="{{$user->tzone_id}}" selected>{{$user->tempZone->zone_name}}</option>
                                            </select><br>
                                                 @if ($errors->has('tzone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('tzone') }}</strong>
                                                    </span>
                                                @endif
                                            

                                            <label>District:</label>
                                                <select name="tdistrict" id="tdistrict" class="form-control district" required>
                                                    <option value="{{$user->tdistrict_id}}" selected>{{$user->tempDistrict->district_name}}</option>

                                            </select><br>
                                                @if ($errors->has('tdistrict'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('tdistrict') }}</strong>
                                                    </span>
                                                @endif
                                            
                                            

                                            <label>VDC/Municipality:</label>
                                                <input type="text" value="{{ $user->tvdc_mun }}" name="tvdc_mun" class="form-control vdc_mun">
                                            <br>
                                                @if ($errors->has('tvdc_mun'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('tvdc_mun') }}</strong>
                                                    </span>
                                                @endif
                                            

                                             <label>Ward No.:</label>
                                                <input type="number" value="{{ $user->tward_no }}"  name="tward_no" class="form-control ward_no">
                                            <br>
                                             @if ($errors->has('tward_no'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('tward_no') }}</strong>
                                                    </span>
                                                @endif
                                            

                                    </div>
                            </fieldset>
                        </div>

                        <div class="form-group{{ $errors->has('district_involved') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">Involving District</label>
                                <div class="col-md-6">
                                            <select  name="district_involved"  class="form-control" required>
                                            <option value="{{$user->district_involved}}"  selected>{{$user->district_involved}}</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->district_name}}">{{$district->district_name}}</option>
                                                @endforeach                
                                            </select><br>
                                    @if ($errors->has('district_involved'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('district_involved') }}</strong>
                                        </span>
                                    @endif
                                </div>                              
                        </div>
                     

                        <div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Profession and Workplace</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="profession" autofocus>@if($user->profession){{$user->profession}}@endif</textarea>
                                     @if ($errors->has('profession'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('profession') }}</strong>
                                        </span>
                                    @endif
                                            
                            </div>
                        </div>

                     
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Contact Numbers</label><br>
                            <div class="col-md-6">
                                <label>Mobile:</label><br>
                                    <input type="number" value="{{ $user->mobile}}"  name="mobile" class="form-control" required><br>
                                                @if ($errors->has('mobile'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('mobile') }}</strong>
                                                    </span>
                                                @endif
                                            
                                <label>Home Phone:</label><br>
                                    <input type="number" name="phone" value="{{ $user->phone }}"  class="form-control"><br>
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            
                                <label>Office Phone:</label><br>
                                <input type="number" name="office_phone"  value="{{ $user->office_phone }}" class="form-control"><br>
                                                @if ($errors->has('office_phone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('office_phone') }}</strong>
                                                    </span>
                                                @endif
                                            
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('refrence_name') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">Refrence Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $user->refrence_name }}"  name="refrence_name" value="{{ old('refrence_name') }}" >

                                @if ($errors->has('refrence_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('refrence_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="form-group{{ $errors->has('refrence_no') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">Refrence Membership Number</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" value="{{ $user->refrence_no }}"  name="refrence_no" value="{{ old('refrence_no') }}" >

                                @if ($errors->has('refrence_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('refrence_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div><br>

                        
                      

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
      $('.datepicker').datepicker({
      format: 'yyyy-mm-dd'
    });


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(document).on('change', '#region', function (e) {
          e.preventDefault();
          $.ajax({
            type:"POST",
            url:"{{url('/getZone')}}",
            data:{id:$(this).val()},
            success: function(response){
              var res=response;

                      if(res.status == true)
                      {
                            var zone ='<option value="">--Select a Zone--</option>';
                            for(var i=0;  i<res.zone.length;  i++) 
                            {
                                zone += '<option value="' + res.zone[i].id + '">'+res.zone[i].zone_name+'</option>';
                                $('#zone').html(zone);                                                                    
                            }
                      }
                    }

                  });
        });

       $(document).on('change', '#zone', function (e) {
          e.preventDefault();

          $.ajax({
            type:"POST",
            url:"{{url('/getDistrict')}}",
            data:{id:$(this).val()},
            success: function(response){
              var res=response;
              
                      if(res.status == true)
                      {
                            var district = '';
                            for(var i=0;  i<res.district.length;  i++) 
                            {
                                district += '<option value="'+ res.district[i].id+'">'+res.district[i].district_name+'</option>';
                                  $('#district').html(district);                                                                    
                            }
                      }
                    }

                  });
        });


        $('.upload').hide();
        $(document).on('click', '.close', function (e) {
          e.preventDefault();

            $('.upload').show();
            $('.image').hide();
        });



    $(document).on('change', '#tregion', function (e) {
          e.preventDefault();
          $.ajax({
            type:"POST",
            url:"{{url('/getZone')}}",
            data:{id:$(this).val()},
            success: function(response){
              var res=response;

                      if(res.status == true)
                      {
                            var zone = '';
                            for(var i=0;  i<res.zone.length;  i++) 
                            {
                                zone += '<option value="' + res.zone[i].id + '">'+res.zone[i].zone_name+'</option>';
                                $('#tzone').html(zone);                                                                    
                            }
                      }
                    }

                  });
        });

       $(document).on('change', '#tzone', function (e) {
          e.preventDefault();

          $.ajax({
            type:"POST",
            url:"{{url('/getDistrict')}}",
            data:{id:$(this).val()},
            success: function(response){
              var res=response;
              
                      if(res.status == true)
                      {
                            var district = '';
                            for(var i=0;  i<res.district.length;  i++) 
                            {
                                district += '<option value= "'+res.district[i].id+'">'+res.district[i].district_name+'</option>';
                                  $('#tdistrict').html(district);                                                                    
                            }
                      }
                    }

                  });
        });



$("#input-id").fileinput({
        maxFileSize: 24000,
        uploadUrl: "{{url('/uploadimage')}}", // server upload action
        uploadAsync: true,
        allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
        maxFileCount: 1,
        showUpload: true,
        dropZoneEnabled: true
});

// CATCH RESPONSE
$("#input-id").on('fileuploaderror', function(event, data, previewId, index) {
    var form = data.form, files = data.files, extra = data.extra,
        response = data.response, reader = data.reader;
    console.log(data.response.upload_error);
});

$("#input-id").on('fileuploaded', function(event, data, previewId, index) {
    var form = data.form, files = data.files, extra = data.extra,
        response = data.response, reader = data.reader;
    console.log(response);
    $('#getimagename').val(response);
});


</script>
@endsection
