@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<h3 class="mb-4">Dashboard</h3>

<div class="row">
    <div class="col-md-3">
        <div class="card text-bg-primary">
            <div class="card-body">
                <h5>Users</h5>
                <h3>120</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-success">
            <div class="card-body">
                <h5>Orders</h5>
                <h3>58</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-warning">
            <div class="card-body">
                <h5>Revenue</h5>
                <h3>12,500,000₫</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-danger">
            <div class="card-body">
                <h5>Errors</h5>
                <h3>2</h3>
            </div>
        </div>
    </div>
</div>
@endsection
