
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
                            </form>        

            <div class="col-sm-10">
            <label>Search By District:</label> 
            <form class="form-inline" method="post" action="{{url('/search')}}">
                <select  name="district_involved"  class="form-control" required>
                                            <option value=""  disabled selected>All Districts</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->district_name}}">{{$district->district_name}}</option>
                                                @endforeach                
                </select><br><br>
                <button  type="submit" class="btn btn-primary">Search</button>
            </form>
            </div>

        <div class="col-md-10"><br><br>
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
                            <a href="" class="approve" data-id="<?php echo $user->id;?>"><button class="btn btn-primary">Approve</button></a>
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
                            @if($user->id != auth()->user()->id)
                                <a href="" class="delete" data-id="<?php echo $user->id;?>"><button class="btn btn-danger">Delete</button>
                            @else
                                <a href="" class="delete" data-id="<?php echo $user->id;?>"><button class="btn btn-danger" disabled>Delete</button>
                            @endif                              
                        </td>
                    </tr>
                @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>
    
<script>

$(document).on('click', '.delete', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    swal({
            title: "Are you sure you!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function() {
           $.ajax({
                type:"POST",
                url: "{{url('/delete')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },

                success: function (data) {
                    var res=data;
                    if(res.status == true) {
                        swal("Member Removed", "", "success");
                        window.location.reload();
                    }
                }
            });
        },
        function() {
            window.location.reload();        }
    );
});


$(document).on('click', '.approve', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    swal({
            title: "Are you sure you!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function() {
           $.ajax({
                type:"POST",
                url: "{{url('/approve')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },

                success: function (data) {
                    var res=data;
                    if(res.status == true) {
                        swal("Member Approved", "", "success");
                        window.location.reload();
                    }
                }
            });
        },
        function() {
            window.location.reload();        }
    );
});


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
