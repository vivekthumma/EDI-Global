@extends('masterlayout.masteradmin')
@section('title','Blogs')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container mt-5">
        <div class="card table-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">Blogs</h4>
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
                    <table id="blogTable" class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Sr. NO</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Promoted</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $index => $blog)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if($blog->image)
                                        <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image" class="blog-image">
                                    @else
                                        <img src="https://via.placeholder.com/50" alt="Blog Image" class="blog-image">
                                    @endif
                                </td>
                                <td>{{ $blog->name }}</td>
                                <td>{{ $blog->slug }}</td>
                                <td>
                                    <input type="checkbox" disabled {{ $blog->promoted ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <span class="badge {{ $blog->status ? 'badge-active' : 'badge-secondary' }}">
                                        {{ $blog->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-action me-1" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModal"
                                        data-id="{{ $blog->id }}"
                                        data-name="{{ $blog->name }}"
                                        data-slug="{{ $blog->slug }}"
                                        data-blog_cat="{{ $blog->blog_cat }}"
                                        data-meta_title="{{ $blog->meta_title }}"
                                        data-meta_description="{{ $blog->meta_description }}"
                                        data-short_content="{{ $blog->short_content }}"
                                        data-content="{{ $blog->content }}"
                                        data-promoted="{{ $blog->promoted }}"
                                        data-status="{{ $blog->status }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-delete btn-action" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal"
                                        data-id="{{ $blog->id }}">
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
    <!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
      <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
          @csrf
          <div class="modal-header">
              <h5 class="modal-title">Add Blog</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="file" name="image" class="form-control mb-2">
            <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
            <input type="text" name="slug" class="form-control mb-2" placeholder="Slug" required>
            <input type="text" name="blog_cat" class="form-control mb-2" placeholder="Category (blog_cat)">
            <input type="text" name="meta_title" class="form-control mb-2" placeholder="Meta Title">
            <textarea name="meta_description" class="form-control mb-2" rows="2"
                placeholder="Meta Description"></textarea>
            <textarea name="short_content" class="form-control mb-2" rows="2"
                placeholder="Short Content"></textarea>
            <textarea name="content" class="form-control mb-2" rows="4" placeholder="Content"></textarea>

            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="promoted" id="promotedAdd" value="1">
                <label class="form-check-label" for="promotedAdd">Promoted</label>
            </div>

            <select name="status" id="statusAdd" class="form-control mb-2">
                <option value="0">Active</option>
                <option value="1">Inactive</option>
            </select>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
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
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
          <form id="editForm" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="file" name="image" class="form-control mb-2">
                    <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
                    <input type="text" name="slug" class="form-control mb-2" placeholder="Slug" required>
                    <input type="text" name="blog_cat" class="form-control mb-2" placeholder="Category (blog_cat)">
                    <input type="text" name="meta_title" class="form-control mb-2" placeholder="Meta Title">
                    <textarea name="meta_description" class="form-control mb-2" rows="2" placeholder="Meta Description"></textarea>
                    <textarea name="short_content" class="form-control mb-2" rows="2" placeholder="Short Content"></textarea>
                    <textarea name="content" class="form-control mb-2" rows="4" placeholder="Content"></textarea>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="promoted" id="promotedEdit" value="1">
                        <label class="form-check-label" for="promotedEdit">Promoted</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="status" id="statusEdit" value="1">
                        <label class="form-check-label" for="statusEdit">Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
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
                    <h5 class="modal-title">Delete Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this blog?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<!-- Scripts -->
<!-- Move these scripts to just before </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize DataTable
        $('#blogTable').DataTable();

        // Edit modal handling
        $(document).on('click', '[data-bs-target="#editModal"]', function () {
            var button = $(this);
            var id = button.data('id');
            var formAction = "{{ route('blogs.update', ':id') }}".replace(':id', id);
            
            $('#editForm').attr('action', formAction);
            
            // Populate form fields
            $('#editForm input[name="name"]').val(button.data('name'));
            $('#editForm input[name="slug"]').val(button.data('slug'));
            $('#editForm input[name="blog_cat"]').val(button.data('blog_cat'));
            $('#editForm input[name="meta_title"]').val(button.data('meta_title'));
            $('#editForm textarea[name="meta_description"]').val(button.data('meta_description'));
            $('#editForm textarea[name="short_content"]').val(button.data('short_content'));
            $('#editForm textarea[name="content"]').val(button.data('content'));
            
            // Set checkbox states
            $('#editForm input[name="promoted"]').prop('checked', button.data('promoted') == 1);
            $('#editForm input[name="status"]').prop('checked', button.data('status') == 1);
        });

        // Delete modal handling
        $(document).on('click', '[data-bs-target="#deleteModal"]', function () {
            var button = $(this);
            var id = button.data('id');
            var formAction = "{{ route('blogs.destroy', ':id') }}".replace(':id', id);
            $('#deleteForm').attr('action', formAction);
        });

    });
</script>
@endsection