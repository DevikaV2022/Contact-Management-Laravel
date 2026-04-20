@extends('layouts.layout')

@section('content')

<div class="container-fluid mt-4">

    <!-- FILTER + SEARCH -->
    <div class="card p-3 mb-3">

        <div class="d-flex justify-content-between">

            <!-- FILTER -->
            <div>
                <a href="?status=All" class="btn btn-outline-dark">All</a>
                <a href="?status=New" class="btn btn-outline-primary">New</a>
                <a href="?status=Accepted" class="btn btn-outline-success">Accepted</a>
                <a href="?status=Rejected" class="btn btn-outline-danger">Rejected</a>
            </div>

            <!-- SEARCH -->
            <form method="GET">
                <input type="text" name="search" placeholder="Search..."
                    class="form-control"
                    value="{{ request('search') }}">
            </form>

        </div>

    </div>

    <!-- TABLE -->
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Sl.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($contacts as $i => $c)

            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->phone }}</td>
                <td>{{ $c->message }}</td>

                <td>
                    @if($c->status == 'Accepted')
                        <span class="text-success">✔ Accepted</span>
                    @elseif($c->status == 'Rejected')
                        <span class="text-danger">✖ Rejected</span>
                    @else
                        <span class="text-warning">New</span>
                    @endif
                </td>

                <td>
                    @if($c->status == 'New')
                        <a href="/accept/{{ $c->id }}" class="btn btn-sm btn-success">✔</a>
                        <a href="/reject/{{ $c->id }}" class="btn btn-sm btn-danger">✖</a>
                    @endif
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="7" class="text-center">No Data</td>
            </tr>
            @endforelse

        </tbody>

    </table>

</div>

@endsection