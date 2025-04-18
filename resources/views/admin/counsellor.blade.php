@extends('masterlayout.masteradmin')
@section('title', 'Counsellor')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<div class="content-wrapper">
    <div class="container table-container shadow mt-4 p-4 bg-white rounded">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4><strong>Counsellors</strong></h4>
            <button class="btn btn-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus"></i>
            </button>
        </div>

        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>Sr. NO</th>
                    <th>Name</th>
                    <th>Experience</th>
                    <th>Rating</th>
                    <th>Image</th>
                    <th>Designation</th>
                    <th>About Us</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($counsellors as $index => $c)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $c->counsellor }}</td>
                    <td>{{ $c->experience }}</td>
                    <td>{{ $c->rating }}</td>
                    <td>
                        @if($c->image)
                        <img src="{{ asset('storage/' . $c->image) }}" width="50" height="50" alt="Image">
                        @else
                        N/A
                        @endif
                    </td>
                    <td>{{ $c->designation }}</td>
                    <td>{{ $c->aboutus }}</td>
                    <td>
                        <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $c->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>

                        <form action="{{ route('counsellors.delete', $c->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $c->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('counsellors.update', $c->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5>Edit Counsellor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="_method" value="POST">
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="counsellor" class="form-control" value="{{ $c->counsellor }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>Experience</label>
                                        <input type="number" name="experience" class="form-control" value="{{ $c->experience }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>Rating</label>
                                        <input type="number" step="0.1" max="5" name="rating" class="form-control" value="{{ $c->rating }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>Profile Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Designation</label>
                                        <input type="text" name="designation" class="form-control" value="{{ $c->designation }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>About Us</label>
                                        <textarea name="aboutus" class="form-control">{{ $c->aboutus }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('counsellors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add Counsellor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="counsellor" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Experience</label>
                        <input type="number" name="experience" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Rating</label>
                        <input type="number" step="0.1" max="5" name="rating" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Designation</label>
                        <input type="text" name="designation" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>About Us</label>
                        <textarea name="aboutus" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .table-container {
        background-color: #fff;
        border-radius: 16px;
    }

    .table th, .table td {
        vertical-align: middle;
    }
</style>
@endsection
