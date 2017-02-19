
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
                                Logout</a>
            
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        <br><br>
                        <h4>My Profile</h4>
                        <table class="table table-bordered">
                            <tr><td>1. </td><td>Name</td><td class="name" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/name')}}">{{$user->name}}</td><tr>
                            <tr><td>2. </td><td>Date of Birth</td><td class="dob" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/dob')}}">{{$user->dob}}</td><tr>
                            <tr><td>3. </td><td>Gender</td><td class="gender" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/gender')}}">{{$user->gender}}</td><tr>
                            <tr><td>4. </td><td>Permanent Address</td><td class="p_address" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/p_address')}}">{{$user->p_address}}</td><tr>
                            <tr><td>5. </td><td>Temporary Address</td><td class="t_address" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/t_address')}}">{{$user->gender}}</td><tr>
                            <tr><td>6. </td><td>Mobile Number</td><td class="mobile" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/mobile')}}">{{$user->mobile}}</td><tr>
                            <tr><td>7. </td><td>Home Contact Number</td><td class="office_phone" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/phone')}}">{{$user->phone}}</td><tr>
                            <tr><td>9. </td><td>Email</td><td class="email" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/email')}}">{{$user->email}}</td><tr>
                            <tr><td>10. </td><td>Profession</td><td class="profession" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/profession')}}">{{$user->profession}}</td><tr>
                            <tr><td>11. </td><td>Father's Name</td><td class="father_name" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/father_name')}}">{{$user->father_name}}</td><tr>
                            <tr><td>12. </td><td>Mother's Name</td><td class="mother_name" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/mother_name')}}">{{$user->mother_name}}</td><tr>
                            <tr><td>13. </td><td>Involving District</td><td class="district_involved" data-pk="<?php echo auth()->user()->id;?>" data-url="{{url('/edit/district_involved')}}">{{$user->district_involved}}</td><tr>
                            
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

$.fn.editable.defaults.mode = 'inline'; //or popup

$('.name').editable();
$('.dob').editable();
</script>

@endsection
