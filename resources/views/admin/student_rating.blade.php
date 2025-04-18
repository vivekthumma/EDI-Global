@extends('masterlayout.masteradmin')
@section('title','User')



@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillTech - Student Ratings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        .rating-box {
            display: inline-block;
            background-color: #f8f9fa;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
            color: #ffc107;
        }
        .status-active {
            color: #28a745;
        }
        .status-inactive {
            color: #dc3545;
        }
        .status-pending {
            color: #ffc107;
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-4">
        <h1 class="mb-4">SkillTech</h1>
        
        <div class="card">
            <div class="card-header">
                <h2>Programs</h2>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <label for="entries" class="form-label">Show</label>
                        <select id="entries" class="form-select form-select-sm" style="width: 80px;">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span>entries</span>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ratingModal">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="ratingsTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>University Name</th>
                                <th>Course Name</th>
                                <th>SubCourse Name</th>
                                <th>Student Name</th>
                                <th>Rating</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Modal -->
    <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ratingModalLabel">Add New Rating</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ratingForm">
                        <input type="hidden" id="rating_id" name="rating_id">
                        <div class="mb-3">
                            <label for="university_name" class="form-label">University Name</label>
                            <input type="text" class="form-control" id="university_name" name="university_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="course_name" class="form-label">Course Name</label>
                            <input type="text" class="form-control" id="course_name" name="course_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="subcourse_name" class="form-label">SubCourse Name</label>
                            <input type="text" class="form-control" id="subcourse_name" name="subcourse_name">
                        </div>
                        <div class="mb-3">
                            <label for="student_name" class="form-label">Student Name</label>
                            <input type="text" class="form-control" id="student_name" name="student_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating (0-5)</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="0" max="5" step="0.1" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveRating">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this rating?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#ratingsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('ratings.data') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'university_name', name: 'university_name' },
                    { data: 'course_name', name: 'course_name' },
                    { data: 'subcourse_name', name: 'subcourse_name' },
                    { data: 'student_name', name: 'student_name' },
                    { 
                        data: 'rating', 
                        name: 'rating',
                        render: function(data) {
                            return '<span class="rating-box">' + data + '</span>';
                        }
                    },
                    { data: 'content', name: 'content' },
                    { 
                        data: 'status', 
                        name: 'status',
                        render: function(data) {
                            var badgeClass = data === 'active' ? 'status-active' : 
                                            data === 'inactive' ? 'status-inactive' : 'status-pending';
                            return '<span class="' + badgeClass + '">' + data.charAt(0).toUpperCase() + data.slice(1) + '</span>';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                                <button class="btn btn-sm btn-primary edit-btn" data-id="${row.id}">Edit</button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="${row.id}">Delete</button>
                            `;
                        }
                    }
                ]
            });

            // Show add modal
            $('#addRating').click(function() {
                $('#ratingForm')[0].reset();
                $('#rating_id').val('');
                $('#ratingModalLabel').text('Add New Rating');
                $('#ratingModal').modal('show');
            });

            // Edit button click
            $(document).on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                $.get("{{ route('ratings.edit', '') }}/" + id, function(data) {
                    $('#ratingModalLabel').text('Edit Rating');
                    $('#rating_id').val(data.id);
                    $('#university_name').val(data.university_name);
                    $('#course_name').val(data.course_name);
                    $('#subcourse_name').val(data.subcourse_name);
                    $('#student_name').val(data.student_name);
                    $('#rating').val(data.rating);
                    $('#content').val(data.content);
                    $('#status').val(data.status);
                    $('#ratingModal').modal('show');
                });
            });

            // Save rating
            $('#saveRating').click(function() {
                var formData = $('#ratingForm').serialize();
                var url = $('#rating_id').val() ? "{{ route('ratings.update') }}" : "{{ route('ratings.store') }}";
                var method = $('#rating_id').val() ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    success: function(response) {
                        $('#ratingModal').modal('hide');
                        table.ajax.reload();
                        alert(response.message);
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            });

            // Delete button click
            var deleteId;
            $(document).on('click', '.delete-btn', function() {
                deleteId = $(this).data('id');
                $('#deleteModal').modal('show');
            });

            // Confirm delete
            $('#confirmDelete').click(function() {
                $.ajax({
                    url: "{{ route('ratings.destroy', '') }}/" + deleteId,
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#deleteModal').modal('hide');
                        table.ajax.reload();
                        alert(response.message);
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
</body>
</html>

</div>
<!-- /.content-wrapper -->
@endsection