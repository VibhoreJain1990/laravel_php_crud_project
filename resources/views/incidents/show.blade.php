<!--
    login details.     
    vibhore.mit@gmail.com
    Vibhore@123         --
-->
@extends('layouts.app')
    @section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('incidents.index') }}>Incident Management System - Show Incident</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('incidents.create') }}>Add Incident</a>
                </div>
            </div>
    </nav>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <?php
            
            ?>
            <div class="card">
            <div class="card-header">
                            <h5 class="card-title"><b>Incident ID: </b>{{ $incidents->incident_id }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><b>Reporter Type: </b>{{ $incidents->reporter_type }}</p>
                            <p><b>Reporter Name: </b>{{ $incidents->reporter_name }}</p>
                            <p><b>Incident Details: </b>{{ $incidents->incident_details }}</p>
                            <p><b>Incident Report Date_Time: </b>{{ $incidents->incident_report_time }}</p>
                            <p><b>Priority: </b>{{ $incidents->priority }}</p>
                            <p><b>Incident Status: </b>{{ $incidents->incident_status }}</p>
                        </div>
                        
                <div class="card-footer">
                    @if($incidents->incident_status=='Closed')
                    <a href="#"
                        class="btn btn-warning btn-sm mb-3">UnEditable due to Incident Status is closed</a>
                    @else
                    <a href="{{ route('incidents.edit', $incidents->id) }}" class="btn btn-primary btn-sm mb-3">Edit</a>
                    @endif
                    <br>
                    <form action="{{ route('incidents.destroy', $incidents->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection