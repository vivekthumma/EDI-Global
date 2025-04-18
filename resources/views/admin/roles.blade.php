@extends('masterlayout.masteradmin')
@section('title','User')



@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Roles</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f2ede8;
    }

    .user-icon {
      position: absolute;
      top: 20px;
      right: 20px;
      background-color: #fff;
      border-radius: 8px;
      padding: 10px 12px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .user-icon i {
      font-size: 24px;
      color: #000;
    }

    .container {
      margin-top: 100px;
    }

    .add-btn {
      background: #0c1f55;
      color: white;
    }

    .edit {
      background-color: #1e2e7a;
      color: white;
    }

    .delete {
      background-color: #fc5b5b;
      color: white;
    }
  </style>
</head>
<body>

  <!-- Admin User Icon -->
  <div class="user-icon">
    <i class="fas fa-user"></i>
  </div>

  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2>Roles</h2>
      <button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="fas fa-plus"></i> Add Role
      </button>
    </div>

    <table class="table table-bordered bg-white">
      <thead class="table-light">
        <tr>
          <th>Sr.No</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($roles as $key => $role)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $role->name }}</td>
            <td>
              <button class="btn btn-sm edit" data-bs-toggle="modal" data-bs-target="#editModal{{ $role->id }}">
                <i class="fas fa-pen"></i>
              </button>
              <button class="btn btn-sm delete" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $role->id }}">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
        
          <!-- Edit Modal -->
          <div class="modal fade" id="editModal{{ $role->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $role->id }}" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Role Name</label>
                      <input type="text" class="form-control" name="edit_role_name" value="{{ $role->name }}" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        
          <!-- Delete Modal -->
          <div class="modal fade" id="deleteModal{{ $role->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $role->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Role</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  Are you sure you want to delete this role?
                </div>
                <div class="modal-footer">
                  <a href="{{ route('roles.delete', $role->id) }}" class="btn btn-danger">Yes, Delete</a>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </tbody>
        
    </table>
  </div>

  <!-- Add Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('roles.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add Role</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="roleName" class="form-label">Role Name</label>
              <input type="text" class="form-control" name="role_name" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>

 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</div>
<!-- /.content-wrapper -->
@endsection