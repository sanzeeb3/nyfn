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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<style>
img
{
	border:3px solid black;
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