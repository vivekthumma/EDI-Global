@extends('masterlayout.masteradmin')
@section('title','Programs')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<div class="content-wrapper">
    <div class="container mt-5">
        <div class="card table-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">Programs</h4>
                    <button class="btn btn-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#addModal">
                      <i class="fas fa-plus"></i>
                  </button>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table id="programTable" class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Sr. NO</th>
                                <th>Name</th>
                                <th>Duractions</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($programs as $index => $program)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $program->name }}</td>
                                    <td>{{ $program->duractions }}</td>
                                    <td>
                                        <span class="badge {{ $program->status == 0 ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $program->status == 0 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>

                                    <td>
                                        <button 
                                            class="btn btn-success btn-sm btn-action me-1 editBtn"
                                            data-id="{{ $program->id }}"
                                            data-name="{{ $program->name }}"
                                            data-duractions="{{ $program->duractions }}"
                                            data-status="{{ $program->status }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editModal" >
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <button class="btn btn-sm btn-danger btn-action"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-id="{{ $program->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
          <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="form_type" value="add">
                    <div class="form-group">
                        <label class="form-lable">Name</label><span class="text-danger">*</span>
                        <input type="text" name="name" class="form-control mb-2" placeholder="Name" >
                    </div>
                    <div class="form-group">
                        <label class="form-lable">Duractions</label><span class="text-danger">*</span>
                        <input type="text" name="duractions" class="form-control mb-2" placeholder="duractions">
                    </div>
                    <div class="form-group">
                        <label class="form-lable">Status</label>
                        <select name="status" id="statusAdd" class="form-select mb-2">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
          </form>
      </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog">
            <form id="editForm" method="POST" class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="form_type" value="edit">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group">
                        <label class="form-label">Name</label><span class="text-danger">*</span>
                        <input type="text" name="name" id="edit_name" class="form-control mb-2">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Duractions</label><span class="text-danger">*</span>
                        <input type="text" name="duractions" id="edit_duractions" class="form-control mb-2">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select name="status" id="edit_status" class="form-select mb-2">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form id="deleteForm" method="POST" class="modal-content">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Delete Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this program?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('.editBtn').on('click', function () {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const duractions = $(this).data('duractions');
            const status = $(this).data('status');

            $('#edit_id').val(id);
            $('#edit_name').val(name);
            $('#edit_duractions').val(duractions);
            $('#edit_status').val(status);

            // Update form action dynamically
            $('#editForm').attr('action', `/programs/${id}`);
        });

        @if ($errors->any() && old('form_type') === 'add')
            const addModal = new bootstrap.Modal(document.getElementById('addModal'));
            addModal.show();
        @elseif ($errors->any() && old('form_type') === 'edit')
            const editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        @endif

        /*------------------------------------------
        --------------------------------------------
        Delete Js
        --------------------------------------------
        --------------------------------------------*/
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var id = button.data('id'); 
            var action = "{{ url('programs') }}/" + id;
            $('#deleteForm').attr('action', action);
        });


    });
</script>


@endsection