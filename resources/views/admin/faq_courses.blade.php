<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Faq Courses Table</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f1ec;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      border-radius: 10px;
      margin: 30px auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .card-header {
      background-color: #ffffff;
      border-bottom: 1px solid #ddd;
      padding: 1.2rem 1.5rem;
      font-size: 24px;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .btn-add {
      background-color: #0d1b56;
      color: white;
      border-radius: 8px;
      width: 40px;
      height: 40px;
      font-size: 22px;
      line-height: 0;
      padding: 0;
    }

    .btn-add:hover {
      background-color: #11236d;
    }

    .table th, .table td {
      vertical-align: middle;
    }

    .table thead {
      background-color: #ffffff;
    }

    .table tbody tr td {
      color: #444;
    }

    .form-select, .form-control {
      display: inline-block;
      width: auto;
      height: 32px;
      font-size: 14px;
    }

    .dataTables-controls {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 10px 0 15px;
    }

    .pagination {
      margin-bottom: 0;
    }

    .modal-header {
      background-color: #f8f9fa;
    }

    .modal .form-control, .modal .form-select {
      width: 100%;
    }

    .text-muted {
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card">
    <div class="card-header">
      <span>Faq Courses</span>
      <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addModal">+</button>
    </div>
    <div class="card-body px-4">
      <div class="dataTables-controls">
        <div>
          Show 
          <select class="form-select">
            <option>10</option>
            <option>25</option>
            <option>50</option>
          </select>
          entries
        </div>
        <div>
          Search: <input type="text" class="form-control ms-1">
        </div>
      </div>

      <table class="table table-bordered table-hover text-center">
        <thead>
          <tr>
            <th>Sr. NO</th>
            <th>Course Name</th>
            <th>Questions</th>
            <th>Answer</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="6" class="text-muted">No data available in table</td>
          </tr>
        </tbody>
      </table>

      <div class="d-flex justify-content-between align-items-center mt-2">
        <div>Showing 0 to 0 of 0 entries</div>
        <div>
          <button class="btn btn-light btn-sm" disabled>&lt;</button>
          <button class="btn btn-light btn-sm" disabled>&gt;</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Course FAQ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control mb-2" placeholder="Course Name">
        <textarea class="form-control mb-2" placeholder="Question"></textarea>
        <textarea class="form-control mb-2" placeholder="Answer"></textarea>
        <select class="form-select mb-2">
          <option selected>Status</option>
          <option>Active</option>
          <option>Inactive</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success btn-sm">Add</button>
      </div>
    </form>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Course FAQ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control mb-2" value="Course Name">
        <textarea class="form-control mb-2">Question...</textarea>
        <textarea class="form-control mb-2">Answer...</textarea>
        <select class="form-select mb-2">
          <option>Active</option>
          <option selected>Inactive</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
      </div>
    </form>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Course FAQ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this FAQ entry?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
