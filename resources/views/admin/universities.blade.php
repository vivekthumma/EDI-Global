@extends('masterlayout.masteradmin')
@section('title','Universities')

@section('content')
<div class="content-wrapper">
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>University Table</title>
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
        max-width: 1200px;
        margin: auto;
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
    </style>
  </head>
  <body>

  <div class="table-container">
    <div class="d-flex justify-content-between mb-3">
      <h2>Universities</h2>
      <button class="add-btn" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i></button>
    </div>

    <table class="table table-bordered text-center align-middle">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Category</th>
          <th>Fees</th>
          <th>Location</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($universities as $index => $uni)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $uni->name }}</td>
          <td>{{ $uni->category }}</td>
          <td>{{ $uni->fees }}</td>
          <td>{{ $uni->city }}, {{ $uni->state }}</td>
          <td>
            <span class="status {{ $uni->status == 'active' ? 'active' : '' }}">
              {{ ucfirst($uni->status) }}
            </span>
          </td>
          <td>
            <button class="edit" 
                    data-id="{{ $uni->id }}"
                    data-name="{{ $uni->name }}"
                    data-category="{{ $uni->category }}"
                    data-fees="{{ $uni->fees }}"
                    data-slug="{{ $uni->slug }}"
                    data-status="{{ $uni->status }}"
                    data-bs-toggle="modal" data-bs-target="#editModal">
              <i class="fa fa-pen"></i>
            </button>
            <button class="delete" 
                    data-id="{{ $uni->id }}" 
                    data-bs-toggle="modal" data-bs-target="#deleteModal">
              <i class="fa fa-trash"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Add Modal --}}
  <div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <form class="modal-content" method="POST" action="{{ route('universities.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Add University</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6"><input class="form-control" name="name" placeholder="University Name" required></div>
          <div class="col-md-6"><input class="form-control" name="category" placeholder="Category" required></div>
          <div class="col-md-6"><input class="form-control" name="fees" placeholder="Fees"></div>
          <div class="col-md-6"><input class="form-control" name="slug" placeholder="Slug"></div>
          <div class="col-md-6"><input class="form-control" name="pincode" placeholder="Pincode"></div>
          <div class="col-md-6"><input class="form-control" name="country" placeholder="Country"></div>
          <div class="col-md-6"><input class="form-control" name="state" placeholder="State"></div>
          <div class="col-md-6"><input class="form-control" name="district" placeholder="District"></div>
          <div class="col-md-6"><input class="form-control" name="city" placeholder="City"></div>
          <div class="col-md-6"><input class="form-control" name="address" placeholder="Address"></div>
          <div class="col-md-6"><input class="form-control" name="established_year" placeholder="Established Year"></div>
          <div class="col-md-6"><input class="form-control" type="file" name="logo"></div>
          <div class="col-md-6"><input class="form-control" type="file" name="banner"></div>
          <div class="col-md-6"><input class="form-control" name="working_status" placeholder="Working Status"></div>
          <div class="col-md-6"><input class="form-control" name="emi" placeholder="EMI"></div>
          <div class="col-md-6">
            <select class="form-select" name="status">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>

 {{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <form id="editForm" class="modal-content" method="POST" action="{{ route('universities.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="edit-id">
        <div class="modal-header">
          <h5 class="modal-title">Edit University</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6"><input type="text" class="form-control" name="name" id="edit-name" placeholder="Name" required></div>
          <div class="col-md-6"><input type="text" class="form-control" name="category" id="edit-category" placeholder="Category"></div>
          <div class="col-md-6"><input type="text" class="form-control" name="fees" id="edit-fees" placeholder="Fees"></div>
          <div class="col-md-6"><input type="text" class="form-control" name="slug" id="edit-slug" placeholder="Slug"></div>
          <div class="col-md-6"><input type="text" class="form-control" name="pincode" id="edit-pincode" placeholder="Pincode"></div>
          <div class="col-md-6"><input type="text" class="form-control" name="country" id="edit-country" placeholder="Country"></div>
          <div class="col-md-6"><input type="text" class="form-control" name="state" id="edit-state" placeholder="State"></div>
          <div class="col-md-6"><input type="text" class="form-control" name="district" id="edit-district" placeholder="District"></div>
          <div class="col-md-6"><input type="text" class="form-control" name="city" id="edit-city" placeholder="City"></div>
          <div class="col-md-6"><input type="text" class="form-control" name="address" id="edit-address" placeholder="Address"></div>
          <div class="col-md-6"><input type="text" class="form-control" name="established_year" id="edit-established_year" placeholder="Established Year"></div>
          <div class="col-md-6"><input class="form-control" type="file" name="logo"></div>
          <div class="col-md-6"><input class="form-control" type="file" name="banner"></div>
          <div class="col-md-6"><input class="form-control" name="working_status" id="edit-working_status" placeholder="Working Status"></div>
          <div class="col-md-6"><input class="form-control" name="emi" id="edit-emi" placeholder="EMI"></div>
          <div class="col-md-6">
            <select class="form-select" name="status" id="edit-status">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
  

  {{-- Delete Modal --}}
  <div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <form method="POST" id="deleteForm" action="{{ route('universities.delete') }}">
        @csrf
        <input type="hidden" name="id" id="delete-id">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete University</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this university?
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
      document.getElementById('edit-id').value = button.dataset.id;
      document.getElementById('edit-name').value = button.dataset.name;
      document.getElementById('edit-category').value = button.dataset.category;
      document.getElementById('edit-fees').value = button.dataset.fees;
      document.getElementById('edit-slug').value = button.dataset.slug;
      document.getElementById('edit-pincode').value = button.dataset.pincode;
      document.getElementById('edit-country').value = button.dataset.country;
      document.getElementById('edit-state').value = button.dataset.state;
      document.getElementById('edit-district').value = button.dataset.district;
      document.getElementById('edit-city').value = button.dataset.city;
      document.getElementById('edit-address').value = button.dataset.address;
      document.getElementById('edit-established_year').value = button.dataset.established_year;
      document.getElementById('edit-working_status').value = button.dataset.working_status;
      document.getElementById('edit-emi').value = button.dataset.emi;
      document.getElementById('edit-status').value = button.dataset.status;
    });
  });

    document.querySelectorAll('.delete').forEach(button => {
      button.addEventListener('click', () => {
        document.getElementById('delete-id').value = button.dataset.id;
      });
    });

    document.getElementById('confirmDelete').addEventListener('click', function () {
      document.getElementById('deleteForm').submit();
    });
  </script>

  </body>
  </html>
</div>
@endsection
