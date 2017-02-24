
@extends('main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                  You are logged in!
                      <a href="{{ url('/logout') }}"  onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout</a><br>
            
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form><br>
                            <a href="{{url('/edit', [$user->id])}}"><button class="btn btn-info">Edit Profile</button></a><br>
                        <table class="table table-bordered"><br>
                            
                        
                        <h4>{{$user->name}}</h4>

                        @if(!empty($user->image))
                            <img width="50%" height="50%" src="{{asset("public/newuploads/{$user->image}")}}"><br><br>
                        @else
                            <img width="50%" height="50%" src="{{asset('public/newuploads/nouploaded.bmp')}}"><br><br>
                        @endif

                        <table class="table table-bordered">
                            
                            <tr><td>1. </td><td>Name</td><td class="name" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/name')}}">{{$user->name}}</td><tr>
                            
                            <tr><td>2. </td><td>Father's Name</td><td class="father_name" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/father_name')}}">{{$user->father_name}}</td><tr>
                             
                            <tr><td>3. </td><td>Mother's Name</td><td class="mother_name" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/mother_name')}}">{{$user->mother_name}}</td><tr>

                            <tr><td>4. </td><td>Date of Birth</td><td class="dob" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/dob')}}">{{$user->dob}}</td><tr>

                            <tr><td>5. </td><td>Gender</td><td class="gender" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/gender')}}">{{$user->gender}}</td><tr>

                            <tr><td>6.</td><td>Permanent Address</tr>
                            <tr><td> </td><td>Region</td>

                            <td class="region" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/region')}}">{{$user->region->region_name}}</td><tr>


                            <tr><td> </td><td>Zone</td><td class="zone" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/zone')}}">{{$user->zone->zone_name}}</td><tr>    
                            
                            <tr><td> </td><td>District</td><td class="district" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/district')}}">{{$user->district->district_name}}</td><tr>

                            <tr><td> </td><td>VDC/Municipality</td><td class="vdc_mun" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/vdc_mun')}}">{{$user->vdc_mun}}</td><tr>

                            <tr><td> </td><td>Ward Number</td><td class="ward_no" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/ward_no')}}">{{$user->ward_no}}</td><tr>

                            <tr><td>7.</td><td>Temporary Address</tr>
                            <tr><td> </td><td>Region</td><td class="tregion" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/tregion')}}">{{$user->tempRegion->region_name}}</td><tr>

                            <tr><td> </td><td>Zone</td><td class="tzone" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/tzone')}}">{{$user->tempZone->zone_name}}</td><tr>    
                            
                            <tr><td> </td><td>District</td><td class="tdistrict" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/tdistrict')}}">{{$user->tempDistrict->district_name}}</td><tr>

                             <tr><td> </td><td>VDV/Municipality</td><td class="tvdc_mun" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/tvdc_mun')}}">{{$user->tvdc_mun}}</td><tr>

                             <tr><td> </td><td>Ward Number</td><td class="tward_no" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/tward_no')}}">{{$user->tward_no}}</td><tr>

                            <tr><td>8. </td><td>Involving District</td><td class="district_involved" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/district_involved')}}">{{$user->district_involved}}</td><tr>

                            <tr><td>9.</td><td>Contact Numbers</tr>
                            <tr><td> </td><td>Mobile Number</td><td class="mobile" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/mobile')}}">{{$user->mobile}}</td><tr>

                            <tr><td> </td><td>Home Phone</td><td class="phone" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/phone')}}">{{$user->phone}}</td><tr>    
                            
                            <tr><td> </td><td>Office Phone</td><td class="office_phone" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/office_phone')}}">{{$user->office_pphone}}</td><tr>

                            <tr><td>10. </td><td>Email</td><td class="email" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/email')}}">{{$user->email}}</td><tr>

                            <tr><td>11. </td><td>Profession</td><td class="profession" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/profession')}}">{{$user->profession}}</td><tr>

                            <tr><td>12. </td><td>Membership Registration Date</td><td class="created_at" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/created_at')}}">{{$user->created_at}}</td><tr>
                            
                            <tr><td>13. </td><td>Updated at</td><td class="updated_at" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/updated_at')}}">{{$user->updated_at}}</td><tr>
                            
                            
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// $.fn.editable.defaults.mode = 'inline'; //or popup

// $('.name').editable();
// $('.dob').editable();
// $('.father_name').editable();
// $('.mother_name').editable();

// $('.profession').editable();
// $('.email').editable();
// $('.phone').editable();
// $('.mobile').editable();
// $('.office_phone').editable();

</script>

@endsection
