@extends('masterlayout.masteradmin')
@section('title', 'University Comparison')

@section('content')
<div class="content-wrapper">
    <div class="container mt-5">
        <div class="card table-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">University Comparison</h4>
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
                    <table id="universityTable" class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>University Name</th>
                                <th>NAAC Score</th>
                                <th>NAAC Grade</th>
                                <th>Student Rating</th>
                                <th>Satisfaction Rate</th>
                                <th>NIRF Ranking</th>
                                <th>WES</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($universities as $index => $university)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $university->university }}</td>
                                <td>{{ $university->naac_score }}</td>
                                <td>{{ $university->naac_grade }}</td>
                                <td>{{ $university->student_rating }}</td>
                                <td>{{ $university->satisfaction_rate }}</td>
                                <td>{{ $university->nirf_ranking }}</td>
                                <td>
                                    @if($university->wes)
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-secondary">No</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $university->status ? 'badge-active' : 'badge-secondary' }}">
                                        {{ $university->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-action me-1 edit-btn" 
                                        data-id="{{ $university->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-delete btn-action delete-btn" 
                                        data-id="{{ $university->id }}">
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
        <div class="modal-dialog modal-lg">
            <form action="{{ route('compare_details.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add University</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>University Name *</label>
                                <input type="text" name="university" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Student Rating (0-5)</label>
                                <input type="number" name="student_rating" class="form-control" step="0.1" min="0" max="5">
                            </div>
                            <div class="form-group mb-3">
                                <label>Satisfaction Rate (%)</label>
                                <input type="number" name="satisfaction_rate" class="form-control" step="0.1" min="0" max="100">
                            </div>
                            <div class="form-group mb-3">
                                <label>NAAC Score</label>
                                <input type="number" name="naac_score" class="form-control" step="0.01" min="0" max="100">
                            </div>
                            <div class="form-group mb-3">
                                <label>NAAC Grade</label>
                                <input type="text" name="naac_grade" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Credit Points</label>
                                <input type="text" name="credite_points" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>NIRF Ranking</label>
                                <input type="number" name="nirf_ranking" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Examination Mode</label>
                                <input type="text" name="examination_mode" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sample Certificate URL</label>
                                <input type="text" name="sample_certificate" class="form-control">
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="wes" value="1">
                                <label class="form-check-label">WES Recognized</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="online_classes" value="1">
                                <label class="form-check-label">Online Classes</label>
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label>Eligibility</label>
                                <textarea name="eligibility" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Examination Pattern</label>
                                <textarea name="examination_pattern" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Pros</label>
                                <textarea name="pros" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Learning Facility</label>
                                <textarea name="learning_facility" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Placement</label>
                                <textarea name="placement" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add University</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form id="editForm" method="POST" class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit University</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>University Name *</label>
                                <input type="text" name="university" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Student Rating (0-5)</label>
                                <input type="number" name="student_rating" class="form-control" step="0.1" min="0" max="5">
                            </div>
                            <div class="form-group mb-3">
                                <label>Satisfaction Rate (%)</label>
                                <input type="number" name="satisfaction_rate" class="form-control" step="0.1" min="0" max="100">
                            </div>
                            <div class="form-group mb-3">
                                <label>NAAC Score</label>
                                <input type="number" name="naac_score" class="form-control" step="0.01" min="0" max="100">
                            </div>
                            <div class="form-group mb-3">
                                <label>NAAC Grade</label>
                                <input type="text" name="naac_grade" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Credit Points</label>
                                <input type="text" name="credite_points" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>NIRF Ranking</label>
                                <input type="number" name="nirf_ranking" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Examination Mode</label>
                                <input type="text" name="examination_mode" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sample Certificate URL</label>
                                <input type="text" name="sample_certificate" class="form-control">
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="wes" value="1">
                                <label class="form-check-label">WES Recognized</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="online_classes" value="1">
                                <label class="form-check-label">Online Classes</label>
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label>Eligibility</label>
                                <textarea name="eligibility" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Examination Pattern</label>
                                <textarea name="examination_pattern" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Pros</label>
                                <textarea name="pros" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Learning Facility</label>
                                <textarea name="learning_facility" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Placement</label>
                                <textarea name="placement" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update University</button>
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
                    <h5 class="modal-title">Delete University</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this university?
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
        $('#universityTable').DataTable();

        // Edit button click handler
        $('.edit-btn').click(function() {
            var id = $(this).data('id');
            
            // Fetch university data
            $.get('/compare-details/' + id + '/edit', function(data) {
                // Set form action
                $('#editForm').attr('action', '/compare-details/' + id);
                
                // Populate form fields
                $('#editForm input[name="university"]').val(data.university);
                $('#editForm input[name="student_rating"]').val(data.student_rating);
                $('#editForm input[name="satisfaction_rate"]').val(data.satisfaction_rate);
                $('#editForm input[name="naac_score"]').val(data.naac_score);
                $('#editForm input[name="naac_grade"]').val(data.naac_grade);
                $('#editForm input[name="credite_points"]').val(data.credite_points);
                $('#editForm input[name="nirf_ranking"]').val(data.nirf_ranking);
                $('#editForm input[name="examination_mode"]').val(data.examination_mode);
                $('#editForm input[name="sample_certificate"]').val(data.sample_certificate);
                
                // Set textareas
                $('#editForm textarea[name="eligibility"]').val(data.eligibility);
                $('#editForm textarea[name="examination_pattern"]').val(data.examination_pattern);
                $('#editForm textarea[name="pros"]').val(data.pros);
                $('#editForm textarea[name="learning_facility"]').val(data.learning_facility);
                $('#editForm textarea[name="placement"]').val(data.placement);
                
                // Set checkboxes
                $('#editForm input[name="wes"]').prop('checked', data.wes == 1);
                $('#editForm input[name="online_classes"]').prop('checked', data.online_classes == 1);
                $('#editForm input[name="industry_ready"]').prop('checked', data.industry_ready == 1);
                $('#editForm input[name="emi_facility"]').prop('checked', data.emi_facility == 1);
                
                // Set status
                $('#editForm select[name="status"]').val(data.status);
                
                // Show modal
                $('#editModal').modal('show');
            });
        });

        // Delete button click handler
        $('.delete-btn').click(function() {
            var id = $(this).data('id');
            $('#deleteForm').attr('action', '/compare-details/' + id);
            $('#deleteModal').modal('show');
        });
    });
</script>
@endsection