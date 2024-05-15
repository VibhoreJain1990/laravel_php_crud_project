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
                <h3>Search Incident</h3>
                <p style="color:red">Note: A logged in person can search only his Incident id</p>
                <form action="{{ route('incidents.search2') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title"><b>Incident ID</b></label>
                        <input type="text" class="form-control" id="incident_id" name="incident_id">       
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @error('incident_id')
                            <div style="color:red;">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3">Search Incident</button>
                </form>
            </div>
        </div>
    </div>
@endsection