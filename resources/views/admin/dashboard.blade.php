@extends('layouts.layout')

@section('styles')
<style>
/* Page container */
.container {
    padding: 20px;
}

/* Layout wrapper */
.row-box {
    width: 100%;
}

/* Cards row (Angular flex equivalent) */
.card-row {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

/* Card design */
.card-box {
    flex: 1;
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    text-align: center;
}

/* Colored cards like Angular logic */
.card-accepted {
    background: linear-gradient(45deg, #28a745, #218838);
    color: white;
}

.card-new {
    background: linear-gradient(45deg, #ffc107, #e0a800);
    color: white;
}

/* Table */
.custom-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.custom-table th,
.custom-table td {
    padding: 12px;
    border-bottom: 1px solid #eee;
    text-align: left;
}

.custom-table th {
    background: #f5f5f5;
}
</style>
@endsection

@section('content')

<div class="container">

    <div class="row-box">

        <!-- CARDS -->
        <div class="card-row">

            <div class="card-box card-accepted">
                <h6>Accepted Contacts</h6>
                <h2>{{ $acceptedCount }}</h2>
            </div>

            <div class="card-box card-new">
                <h6>New Requests</h6>
                <h2>{{ $newRequests }}</h2>
            </div>

        </div>

        <!-- TABLE -->
        <table class="custom-table">

            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Message</th>
                    <th>Role</th>
                    <th>Updated At</th>
                </tr>
            </thead>

            <tbody>
                @forelse($contacts as $i => $c)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->message }}</td>
                    <td>{{ $c->role }}</td>
                    <td>{{ $c->updated_at }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;">No Data Found</td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

@endsection