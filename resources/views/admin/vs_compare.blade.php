@extends('masterlayout.masteradmin')
@section('title', 'VS Compare')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container mt-5">
        <div class="card table-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">VS Compare</h4>
                    <button class="btn btn-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table id="vsCompareTable" class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>First University</th>
                                <th>Second University</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vscompares as $index => $vscompare)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $vscompare->university_first_name }}</td>
                                <td>{{ $vscompare->university_second_name }}</td>
                                <td>{{ Str::slug($vscompare->university_first_name.'-'.$vscompare->university_second_name) }}</td>
                                <td>
                                    <span class="badge {{ $vscompare->status == 'active' ? 'badge-active' : 'badge-secondary' }}">
                                        {{ ucfirst($vscompare->status) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-action me-1 edit-btn" 
                                        data-id="{{ $vscompare->id }}"
                                        data-university_first_name="{{ $vscompare->university_first_name }}"
                                        data-university_second_name="{{ $vscompare->university_second_name }}"
                                        data-status="{{ $vscompare->status }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-delete btn-action delete-btn" 
                                        data-id="{{ $vscompare->id }}">
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
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('vscompare_details.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add VS Compare</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>First University Name *</label>
                        <input type="text" name="university_first_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Second University Name *</label>
                        <input type="text" name="university_second_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Status *</label>
                        <select name="status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Comparison</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="editForm" method="POST" class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit VS Compare</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>First University Name *</label>
                        <input type="text" name="university_first_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Second University Name *</label>
                        <input type="text" name="university_second_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Status *</label>
                        <select name="status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update Comparison</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="deleteForm" method="POST" class="modal-content">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Delete Comparison</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this comparison?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#vsCompareTable').DataTable();

        // Edit button click handler
        $('.edit-btn').click(function() {
            var id = $(this).data('id');
            var formAction = "{{ route('vscompare_details.update', ':id') }}".replace(':id', id);
            
            $('#editForm').attr('action', formAction);
            
            // Populate form fields
            $('#editForm input[name="university_first_name"]').val($(this).data('university_first_name'));
            $('#editForm input[name="university_second_name"]').val($(this).data('university_second_name'));
            $('#editForm select[name="status"]').val($(this).data('status'));
            
            // Show modal
            $('#editModal').modal('show');
        });

        // Delete button click handler
        $('.delete-btn').click(function() {
            var id = $(this).data('id');
            var formAction = "{{ route('vscompare_details.destroy', ':id') }}".replace(':id', id);
            
            $('#deleteForm').attr('action', formAction);
            $('#deleteModal').modal('show');
        });
    });
</script>
@endsection