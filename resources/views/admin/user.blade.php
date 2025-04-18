@extends('masterlayout.masteradmin')
@section('title','User')



@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Admin Users</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <style>
            .user-icon {
                position: sticky;
                top: 10px;
                right: 20px;
                float: right;
                z-index: 1030;
                background: #fff;
                padding: 10px 12px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .badge-active {
                background-color: #239b88;
            }
        </style>
    </head>

    <body class="bg-light">

        <!-- Sticky User Icon -->
        

        <div class="container my-5 bg-white rounded p-4 shadow">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Users</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fas fa-plus"></i>
                </button>
            </div>

            <!-- Table Controls -->
            <div class="row mb-3">
                <div class="col-md-6">
                    Show
                    <select class="form-select d-inline w-auto">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                    entries
                </div>
                <div class="col-md-6 text-end">
                    Search:
                    <input type="text" class="form-control d-inline w-auto">
                </div>
            </div>

            <!-- Table -->
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Sr. NO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mob }}</td>
                        <td>
                            <span class="badge {{ $user->status == 0 ? 'badge-active text-white' : 'bg-danger' }}">
                                {{ $user->status == 0 ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}"><i class="fas fa-pen"></i></button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                
                    {{-- Edit Modal --}}
                    <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="{{ route('users.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control mb-2" name="name" value="{{ $user->name }}" required>
                                        <input type="email" class="form-control mb-2" name="email" value="{{ $user->email }}" required>
                                        <input type="text" class="form-control mb-2" name="mob" value="{{ $user->mob }}" required>
                                        <select name="status" class="form-select mb-2">
                                            <option value="active" {{ $user->status == 0 ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $user->status == 1 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
                    {{-- Delete Modal --}}
                    <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1">
                        <div class="modal-dialog modal-sm">
                            <form action="{{ route('users.delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <p>Are you sure you want to delete this user?</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </tbody>
                
            </table>

            <!-- Footer Info -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>Showing 1 to 2 of 2 entries</div>
                <div>
                    <button class="btn btn-secondary btn-sm" disabled><i class="fas fa-chevron-left"></i></button>
                    <span class="badge bg-primary text-white px-3 py-2">1</span>
                    <button class="btn btn-secondary btn-sm" disabled><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>

        <!-- Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control mb-2" name="name" placeholder="Name" required>
                            <input type="email" class="form-control mb-2" name="email" placeholder="Email" required>
                            <input type="text" class="form-control mb-2" name="mob" placeholder="Mobile Number" required>
                            <select name="status" class="form-select mb-2">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control mb-2" value="admin">
                            <input type="email" class="form-control mb-2" value="skilltech@gmail.com">
                            <input type="text" class="form-control mb-2" value="1234567890">
                            <select class="form-select mb-2">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save Changes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteUserModal" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Are you sure you want to delete this user?</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger">Yes, Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

</div>
<!-- /.content-wrapper -->
@endsection