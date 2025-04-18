<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sub Courses</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <!-- DataTables -->
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f4f0ea;
      font-family: 'Poppins', sans-serif;
    }

    .table-card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      padding: 20px;
    }

    .card-title {
      font-size: 24px;
      font-weight: 600;
    }

    .table thead th {
      color: #2f3e46;
      font-weight: 600;
    }

    .table tbody td {
      vertical-align: middle;
    }

    .btn-primary.rounded-circle {
      width: 40px;
      height: 40px;
      padding: 0;
      text-align: center;
      font-size: 18px;
    }

    .table img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }

    .modal-header {
      background-color: #0d6efd;
      color: white;
    }
  </style>
</head>
<body>

  <div class="container mt-5">
    <div class="card table-card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="card-title">Sub Courses</h4>
          <button class="btn btn-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fas fa-plus"></i>
          </button>
        </div>

        <div class="table-responsive">
          <table id="subCourseTable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Sr. NO</th>
                <th>Image</th>
                <th>Course Name</th>
                <th>Sub Course Name</th>
                <th>Slug</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td><img src="https://randomuser.me/api/portraits/women/1.jpg" alt="student"></td>
                <td>ONLINE BACHELOR OF ARTS</td>
                <td>BA IN ENGLISH</td>
                <td>ba-in-english</td>
                <td>
                  <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
              <!-- Add more rows here -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Modal -->
  <div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
      <form class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Sub Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control mb-2" placeholder="Course Name" required>
          <input type="text" class="form-control mb-2" placeholder="Sub Course Name" required>
          <input type="text" class="form-control mb-2" placeholder="Slug" required>
          <input type="url" class="form-control mb-2" placeholder="Image URL">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
      <form class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Sub Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control mb-2" placeholder="Course Name" required>
          <input type="text" class="form-control mb-2" placeholder="Sub Course Name" required>
          <input type="text" class="form-control mb-2" placeholder="Slug" required>
          <input type="url" class="form-control mb-2" placeholder="Image URL">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this sub course?
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button class="btn btn-danger">Delete</button>
        </div>
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
      $('#subCourseTable').DataTable();
    });
  </script>
</body>
</html>
