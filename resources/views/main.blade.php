<!DOCTYPE html>
<html lang="en">
<head>
<title>NYFN APP</title>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="{{asset('public/jquery.min.js')}}"></script>
<script src="{{asset('public/jquery.validate.min.js')}}"></script>
<link href="{{asset('public/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
<script src="{{asset('public/bootstrap/js/bootstrap.js')}}"></script>
<link href="{{asset('public/sweetalert.css')}}" rel="stylesheet">
<script src="{{asset('public/sweetalert.js')}}"></script>
<link href="{{asset('public/datepicker/css/datepicker.css')}}" rel="stylesheet">
<script src="{{asset('public/datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('public/fileinput/fileinput.js')}}"></script>
<link href="{{asset('public/fileinput/fileinput.css')}}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('public/datatables.min.css')}}">
<script type="text/javascript" src="{{asset('public/datatables.min.js')}}"></script>

<style>
img
{
	border:3px solid black;
}
.error {
    color:red;
}
.valid {
    color:green;
}

.img-wrap {
    position: relative;
    ...
}
.img-wrap .close {
    position: absolute;
    top: 2px;
    right: 2px;
    z-index: 100;
    ...
}

</style>
</head>

<body>
@yield('content')

</body>
</html>