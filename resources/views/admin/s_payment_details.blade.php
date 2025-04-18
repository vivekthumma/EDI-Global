<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Students Table</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f4f0eb;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      margin: 30px auto;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    .card-header {
      background-color: white;
      font-size: 24px;
      font-weight: 600;
      border-bottom: 1px solid #eee;
    }

    table thead {
      background-color: white;
      font-weight: 600;
    }

    table tbody tr {
      background-color: white;
    }

    .modal-header {
      background-color: #f8f9fa;
    }

    .btn-action {
      margin-right: 5px;
    }

    .table-container {
      overflow-x: auto;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span>Students</span>
      <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">Add User</button>
    </div>

    <div class="card-body table-container">
      <div class="d-flex justify-content-between mb-2">
        <div>
          Show 
          <select class="form-select d-inline-block w-auto ms-1 me-1" style="height: 30px;">
            <option selected>10</option>
            <option>25</option>
            <option>50</option>
          </select>
          entries
        </div>
        <div>
          Search:
          <input type="text" class="form-control d-inline-block w-auto ms-1" style="height: 30px;">
        </div>
      </div>

      <table class="table table-hover table-bordered text-center">
        <thead>
          <tr>
            <th>Sr.NO</th>
            <th>Counsellor Name</th>
            <th>Student Name</th>
            <th>Booking Date</th>
            <th>Booking Time</th>
            <th>Amount</th>
            <th>Transaction Id</th>
            <th>Transaction Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="9" class="text-center text-muted">No data available in table</td>
          </tr>
        </tbody>
      </table>

      <div class="d-flex justify-content-between">
        <div>Showing 0 to 0 of 0 entries</div>
        <div>
          <button class="btn btn-light btn-sm" disabled>&lt;</button>
          <button class="btn btn-light btn-sm" disabled>&gt;</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add Form Fields -->
        <div class="mb-3"><input type="text" class="form-control" placeholder="Counsellor Name"></div>
        <div class="mb-3"><input type="text" class="form-control" placeholder="Student Name"></div>
        <div class="mb-3"><input type="date" class="form-control"></div>
        <div class="mb-3"><input type="time" class="form-control"></div>
        <div class="mb-3"><input type="number" class="form-control" placeholder="Amount"></div>
        <div class="mb-3"><input type="text" class="form-control" placeholder="Transaction Id"></div>
        <div class="mb-3">
          <select class="form-select">
            <option selected>Status</option>
            <option>Success</option>
            <option>Pending</option>
            <option>Failed</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success btn-sm">Add</button>
      </div>
    </form>
  </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Same form as Add -->
        <!-- Just placeholders for demonstration -->
        <div class="mb-3"><input type="text" class="form-control" value="Counsellor Name"></div>
        <div class="mb-3"><input type="text" class="form-control" value="Student Name"></div>
        <div class="mb-3"><input type="date" class="form-control"></div>
        <div class="mb-3"><input type="time" class="form-control"></div>
        <div class="mb-3"><input type="number" class="form-control" value="0"></div>
        <div class="mb-3"><input type="text" class="form-control" value="TXN12345"></div>
        <div class="mb-3">
          <select class="form-select">
            <option>Success</option>
            <option selected>Pending</option>
            <option>Failed</option>
          </select>
        </div>
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
        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this entry?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap JS (for modal functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
