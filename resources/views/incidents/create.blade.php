<!--<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Create Incident</title>
</head>

<body>-->
@extends('layouts.app')
    @section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('incidents.index') }}>Incident Management System</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('incidents.create') }}>Add Incident</a>
                </div>
            </div>
    </nav>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Add Incident</h3>
                <form action="{{ route('incidents.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title"><b>Reporter Type(Individual/Organization/Government)</b></label>
                        <input type="text" class="form-control" id="reporter_type" name="reporter_type" value="{{ Auth::user()->user_reporter_type }}" readonly>       
                    </div>
                    <div class="form-group">
                        <label for="title"><b>Reporting Person</b></label>
                        <input type="text" class="form-control" id="reporter_name" name="reporter_name" value="{{ Auth::user()->name.' '.Auth::user()->last_name }}" readonly>       
                    </div>
                    <div class="form-group">
                        <label for="title"><b>Incident ID</b></label>
                        <input type="text" class="form-control" id="incident_id" name="incident_id" value="{{ 'RMS'.str_pad(rand(0, pow(10, 5)-1), 5, '0', STR_PAD_LEFT).date('Y') }}" readonly>       
                    </div>
                    <div class="form-group">
                        <label for="title"><b>Incident Details*</b></label>
                        <textarea class="form-control" id="incident_details" name="incident_details" rows="3">{{ old('incident_details') }}</textarea>
                        <!--<input type="text" class="form-control" id="incident_details" name="incident_details" value="{{ old('incident_details') }}" required>-->
                        @error('incident_details')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title"><b>Incident Report Date_Time*</b></label>
                        <input type="datetime-local" class="form-control" id="incident_report_time" name="incident_report_time">
                        @error('incident_report_time')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="priority"><b>Priority</b></label>
                        <select class="form-select" id="priority" name="priority">
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                            <option value="High">High</option>
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="incident_status"><b>Incident Status</b></label>
                        <select class="form-select" id="incident_status" name="incident_status">
                            <option value="Open">Open</option>
                            <option value="InProgress">InProgress</option>
                            <option value="Closed">Closed</option>
                        </select>                        
                    </div>
                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}" >       
                    <br>
                    <button type="submit" class="btn btn-primary">Create Incident</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
<!--</body>

</html>-->