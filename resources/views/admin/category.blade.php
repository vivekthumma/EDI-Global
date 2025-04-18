@extends('masterlayout.masteradmin')
@section('title','User')



@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Category Table</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f3f0ec;
      padding: 2rem;
    }

    .table-container {
      background-color: white;
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      max-width: 1100px;
      margin: auto;
    }

    .table-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .add-btn {
      background-color: #071952;
      color: white;
      padding: 8px 12px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }

    .status.active {
      background-color: #28a745;
      padding: 5px 10px;
      border-radius: 5px;
      color: white;
    }

    .edit, .delete {
      border: none;
      padding: 6px 10px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
      color: white;
    }

    .edit {
      background-color: #2c9faf;
    }

    .delete {
      background-color: #ff6666;
    }

    .pagination button.current {
      background-color: #262161 !important;
    }

    .pagination .page-item .page-link {
      background-color: #40398e;
      color: white;
      border: none;
      border-radius: 6px;
      margin: 0 2px;
    }

    .pagination .page-item.disabled .page-link {
      background-color: #ccc;
    }
  </style>
</head>
<body>

<div class="table-container">
  <div class="table-header mb-3">
    <h2>Category</h2>
    <button class="add-btn" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i></button>
  </div>

  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      Show
      <select class="form-select d-inline-block w-auto">
        <option>10</option>
        <option>25</option>
        <option>50</option>
      </select>
      entries
    </div>
    <div>
      Search: <input type="text" class="form-control d-inline-block w-auto" placeholder="Search...">
    </div>
  </div>

  <table class="table table-bordered align-middle text-center">
    <thead class="table-light">
      <tr>
        <th>Sr. NO</th>
        <th>Category Name</th>
        <th>Slug</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
      <tbody>
        @foreach ($categories as $index => $cat)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $cat->category_name }}</td>
          <td>{{ $cat->slug }}</td>
          <td>
            <span class="status {{ $cat->status == 0 ? 'active' : '' }}">
              {{ $cat->status == 0 ? 'Active' : 'Inactive' }}
            </span>
          </td>
          <td>
            <button class="edit"
                    data-id="{{ $cat->id }}"
                    data-name="{{ $cat->category_name }}"
                    data-slug="{{ $cat->slug }}"
                    data-status="{{ $cat->status }}"
                    data-bs-toggle="modal" data-bs-target="#editModal">
              <i class="fa fa-pen"></i>
            </button>
            <button class="delete"
                    data-id="{{ $cat->id }}"
                    data-bs-toggle="modal" data-bs-target="#deleteModal">
              <i class="fa fa-trash"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
      
  </table>

  <div class="d-flex justify-content-between align-items-center">
    <span>Showing 1 to 2 of 2 entries</span>
    <nav>
      <ul class="pagination mb-0">
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-chevron-left"></i></a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-chevron-right"></i></a></li>
      </ul>
    </nav>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="{{ route('categories.store') }}">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Category Name</label>
          <input type="text" name="category_name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Slug</label>
          <input type="text" name="slug" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select class="form-select" name="status">
            <option value="active" selected>Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- Edit Modal -->
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <form id="editForm" class="modal-content" method="POST" action="">
      @csrf
      <input type="hidden" name="id" id="edit-id">
      <div class="modal-header">
        <h5 class="modal-title">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Category Name</label>
          <input type="text" class="form-control" name="category_name" id="edit-name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Slug</label>
          <input type="text" class="form-control" name="slug" id="edit-slug" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select class="form-select" name="status" id="edit-status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form method="POST" id="deleteForm" action="">
      @csrf
      <input type="hidden" name="id" id="delete-id">
    
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this category?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="confirmDelete">Yes, Delete</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.querySelectorAll('.edit').forEach(button => {
    button.addEventListener('click', () => {
      const id = button.dataset.id;
      const name = button.dataset.name;
      const slug = button.dataset.slug;
      const status = button.dataset.status == 0 ? 'active' : 'inactive';

      document.getElementById('edit-id').value = id;
      document.getElementById('edit-name').value = name;
      document.getElementById('edit-slug').value = slug;
      document.getElementById('edit-status').value = status;

      document.getElementById('editForm').action = '/categories/update';
    });
  });
</script>

<script>
  document.querySelectorAll('.delete').forEach(button => {
    button.addEventListener('click', () => {
      const id = button.dataset.id;
      document.getElementById('delete-id').value = id;
      document.getElementById('deleteForm').action = '/categories/delete';
    });
  });

  // Trigger form submission on 'Yes, Delete' click
  document.getElementById('confirmDelete').addEventListener('click', function () {
    document.getElementById('deleteForm').submit();
  });
</script>



</body>
</html>


</div>
<!-- /.content-wrapper -->
@endsection