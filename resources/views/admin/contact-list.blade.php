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
            <th>Action</th>
          </tr>
        </thead>

        <tbody>

          @forelse($contacts as $i => $c)
        <tr>
    <td>{{ $i + 1 }}</td>

    <td>
        <a href="#" data-bs-toggle="modal" data-bs-target="#contactModal{{ $c->id }}">
            {{ $c->name }}
        </a>
    </td>

    <td>{{ $c->message }}</td>

    <td>
        <a href="/delete/{{ $c->id }}" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Delete this contact?')">
           Delete
        </a>
    </td>
</tr>

          <div class="modal fade" id="contactModal{{ $c->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Contact Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <p><strong>Name:</strong> {{ $c->name }}</p>
        <p><strong>Email:</strong> {{ $c->email }}</p>
        <p><strong>Phone:</strong> {{ $c->phone }}</p>
        <p><strong>Message:</strong> {{ $c->message }}</p>
      </div>

    </div>
  </div>
</div>
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