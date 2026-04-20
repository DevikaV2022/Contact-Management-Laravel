@extends('layouts.layout')

@section('content')

<div class="container-fluid mt-4">
  <div class="row">
    <div class="col-lg-10">

      <table class="table table-bordered table-hover">
        <thead class="table-light">
          <tr>
            <th>Sl.No</th>
            <th>Name</th>
            <th>Message</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>

          @forelse($contacts as $i => $c)
          <tr>
            <td>{{ $i + 1 }}</td>

            <td>{{ $c->name }}</td>
            <td>{{ $c->message }}</td>
            <td>{{ $c->role }}</td>

            <td>
              <a href="/delete/{{ $c->id }}" 
                 class="btn btn-danger btn-sm"
                 onclick="return confirm('Delete this contact?')">
                 Delete
              </a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center">No contacts found</td>
          </tr>
          @endforelse

        </tbody>

      </table>

    </div>
  </div>
</div>

@endsection