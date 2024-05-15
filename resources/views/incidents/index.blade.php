<!--
    login details.     
    vibhore.mit@gmail.com
    Vibhore@123         --
    
-->
@extends('layouts.app')
    @section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('incidents.index') }}>Incident Management System - All Incidents</a>
            <div class="justify-end ">
                <div class="col">
                    <!--<form action="incidents/search" method="post">
        <input class="form-control form-control-dark w-100" name="inci_id" id="inci_id" type="search" placeholder="Search" aria-label="Search">
                    </form>-->
                    <a class="btn btn-sm btn-success" href={{ route('incidents.search') }}>Search Incident</a>
                    <a class="btn btn-sm btn-success" href={{ route('incidents.create') }}>Add Incident</a>
                </div>
            </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            @foreach ($incidents as $index => $incident)
                @if ($index % 3 === 0)
                    </div><div class="row"> <!-- Close previous row and start a new row -->
                @endif
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Incident ID: {{ $incident->incident_id }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Reporter Type: {{ $incident->reporter_type }}</p>
                            <p>Reporter Name: {{ $incident->reporter_name }}</p>
                            <p>Incident Details: {{ $incident->incident_details }}</p>
                            <p>Incident Status: {{ $incident->incident_status }}</p>
                            <p>(Please click on "Show" button to view all other details)</p>
                        </div>
                        
                        
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm">
                                    <a href="{{ route('incidents.show', $incident->id) }}"
                                    class="btn btn-primary btn-sm">Show</a>
                                </div>
                                <div class="col-sm">
                                    @if($incident->incident_status=='Closed')
                                    <a href="#"
                                        class="btn btn-warning btn-sm">UnEditable due to Incident Status is closed</a>
                                    @else
                                    <a href="{{ route('incidents.edit', $incident->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    @endif
                                </div>
                                <div class="col-sm">
                                    <form action="{{ route('incidents.destroy', $incident->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
            @endif
        </div>
    </div>
    @endsection
<!--</body>

</html>-->