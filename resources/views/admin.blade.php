
@extends('main')
@section('content')


                            
<div class="container">
    <div class="row">
     You are logged in!
                      <a href="{{ url('/logout') }}"  onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout</a>
            
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>        <div class="col-md-10">
            <table class="table table-hover table1">
                <h3>Members Awaiting Approval:</h3><br>
                <thead><tr><td>S.N.</td><td>Name</td><td>Date of Birth</td><td>Created At</td><td>Involving District</td><td>Options</td></tr></thead>
                <?php $i=1;?>
                
                <tbody>
                @foreach($users->where('is_approved',0) as $user)
               
                    <tr><td>{{$i++}}</td><td>{{$user->name}}</td><td>{{$user->dob}}</td><td>{{$user->created_at->toDateString()}}</td>
                        <td>{{$user->district_involved}}</td>
                        <td>
                            <a href="{{url('/show', [$user->id])}}"><button class="btn btn-info">Show Details</button></a>
                            <a href="{{url('/approve', [$user->id])}}"><button class="btn btn-primary">Approve</button></a>
                            <a href="" class="delete" data-id="<?php echo $user->id;?>"><button class="btn btn-danger">Delete</button>                              
                        </td>
                    </tr>
                @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <table class="table table-hover table2">
                <h3>All Approved Members:</h3><br>
                <thead><tr><td>S.N.</td><td>Name</td><td>Date of Birth</td><td>Created At</td><td>Involving District</td><td>Options</td></tr></thead>
                <?php $i=1;?>
                
                <tbody>
                @foreach($users->where('is_approved',1) as $user)
               
                    <tr><td>{{$i++}}</td><td>{{$user->name}}</td><td>{{$user->dob}}</td><td>{{$user->created_at->toDateString()}}</td>   <td>{{$user->district_involved}}</td><td>
                            <a href="{{url('/show', [$user->id])}}"><button class="btn btn-info">Show Details</button></a>
                            <a href="" class="delete" data-id="<?php echo $user->id;?>"><button class="btn btn-danger">Delete</button>                              
                        </td>
                    </tr>
                @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>
    
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var table1=$('.table1').DataTable({
        "aLengthMenu": [[2, 5, 7, -1], [2, 5, 7, "All"]],
        "iDisplayLength": 2
    });


var table2=$('.table2').DataTable({
        "aLengthMenu": [[2, 5, 7, -1], [2, 5, 7, "All"]],
        "iDisplayLength": 5
    });

</script>

@endsection
