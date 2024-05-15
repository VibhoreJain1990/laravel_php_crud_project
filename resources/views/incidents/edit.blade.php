<!--
    Sample login details.     
    vibhore.mit@gmail.com
    Vibhore@123  //other users also i keep this same password. 
-->
@extends('layouts.app')
    @section('content')

    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('incidents.index') }}>Incident Management System - Edit Incident</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('incidents.create') }}>Add Incident</a>    
                </div>
            </div>
    </nav>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Update Incident</h3>
                <p><b>Incident ID: </b>{{ $incidents->incident_id }}</p>
                <p><b>Reporter Type: </b>{{ $incidents->reporter_type }}</p>
                <p><b>Reporter Name: </b>{{ $incidents->reporter_name }}</p>
                <!--<p><b>Incident Details: </b>{{ $incidents->incident_details }}</p>-->
                <p><b>Incident Report Date_Time: </b>{{ $incidents->incident_report_time }}</p>
                <!--<p><b>Priority: </b>{{ $incidents->priority }}</p>
                <p><b>Incident Status: </b>{{ $incidents->incident_status }}</p>-->
                <h4>Editable Fields below</h4>
                <form action="{{ route('incidents.update', $incidents->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="priority"><b>Priority</b></label>
                        <select class="form-select" id="priority" name="priority">
                            <option value="Medium" <?php if($incidents->priority=="Medium"){echo "selected";} ?> >Medium</option>
                            <option value="Low" <?php if($incidents->priority=="Low"){echo "selected";} ?>>Low</option>
                            <option value="High" <?php if($incidents->priority=="High"){echo "selected";} ?>>High</option>
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="incident_status"><b>Incident Status</b></label>
                        <select class="form-select" id="incident_status" name="incident_status">
                            <option value="Open" <?php if($incidents->incident_status=="Open"){echo "selected";} ?> >Open</option>
                            <option value="InProgress" <?php if($incidents->incident_status=="InProgress"){echo "selected";} ?> >InProgress</option>
                            <option value="Closed" <?php if($incidents->incident_status=="Closed"){echo "selected";} ?> >Closed</option>
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="incident_details"><b>Incident Details</b></label>
                        <textarea class="form-control" id="incident_details" name="incident_details" rows="3" required>{{ $incidents->incident_details }}</textarea>
                        @error('incident_details')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-1">Update Incident</button>
                </form>
            </div>
        </div>
    </div>
    @endsection