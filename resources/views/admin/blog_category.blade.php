@extends('masterlayout.masteradmin')
@section('title','Blog Category')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="content-wrapper">
  <div class="container mt-5">
    <div class="card table-card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="card-title">Blog Categories</h4>
          <button class="btn btn-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fas fa-plus"></i>
          </button>
        </div>

        <div class="table-responsive">
          <table id="categoryTable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Sr. No</th>
                <th>Category Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->slug }}</td>
                  <td>
                    <span class="badge {{ $category->status == 0 ? 'badge-active' : 'badge-secondary' }}">
                      {{ $category->status == 0 ? 'Active' : 'Inactive' }}
                    </span>
                  </td>
                  <td>
                    <!-- Edit Button -->
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" 
                            data-id="{{ $category->id }}" data-name="{{ $category->name }}" 
                            data-slug="{{ $category->slug }}" data-status="{{ $category->status }}">
                      <i class="fas fa-edit"></i>
                    </button>

                    <!-- Delete Button -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                            data-id="{{ $category->id }}">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                  <!-- Edit Category Modal -->

                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="{{ url('/blog-category/{id}') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" id="editCategoryId">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <input type="text" name="name" id="editName" class="form-control mb-2" placeholder="Category Name" required>
                          <input type="text" name="slug" id="editSlug" class="form-control mb-2" placeholder="Slug" required>
                          <select name="status" id="editStatus" class="form-control mb-2">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                
                
                  <!-- Delete Category Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="{{ url('/blog-category/{id}') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" id="deleteCategoryId">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this category?
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger">Delete</button>
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
    </div>
  </div>

  <!-- Add Category Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ url('blog-category') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="text" name="name" class="form-control mb-2" placeholder="Category Name" required>
            <input type="text" name="slug" class="form-control mb-2" placeholder="Slug" required>
            <select name="status" class="form-control mb-2">
              <option value="0">Active</option>
              <option value="1">Inactive</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>



  <!-- jQuery (optional but useful for simplicity) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 5 JS Bundle (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Pre-fill Edit Modal with category data
 // Edit modal
$('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id = button.data('id');
  var name = button.data('name');
  var slug = button.data('slug');
  var status = button.data('status');

  $('#editCategoryId').val(id);
  $('#editName').val(name);
  $('#editSlug').val(slug);
  $('#editStatus').val(status);
});

// Delete modal
$('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id = button.data('id');
  $('#deleteCategoryId').val(id);
});


</script>
</div>
@endsection


