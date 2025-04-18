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
      background-color: #f3eee9;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      margin: 30px auto;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .card-header {
      background-color: #fff;
      padding: 1rem 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #eee;
    }

    .card-header h5 {
      margin: 0;
      font-size: 1.25rem;
      font-weight: 600;
    }

    .btn-add {
      background-color: #0d1b56;
      color: white;
      border-radius: 8px;
      width: 40px;
      height: 40px;
      font-size: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0;
    }

    .btn-add:hover {
      background-color: #13236f;
    }

    .table th {
      font-weight: 600;
      font-size: 14px;
      color: #333;
    }

    .table td {
      font-size: 14px;
      color: #555;
    }

    .form-select,
    .form-control {
      height: 32px;
      font-size: 14px;
      width: auto;
      display: inline-block;
    }

    .dataTables-controls {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 10px 0;
    }

    .pagination {
      margin: 0;
    }

    .modal-header {
      background-color: #f8f9fa;
    }

    .modal .form-control,
    .modal .form-select {
      width: 100%;
    }

    .table-container {
      overflow-x: auto;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card">
    <div class="card-header">
      <h5>Faq Courses</h5>
      <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addModal">+</button>
    </div>
    <div class="card-body px-4">
      <div class="dataTables-controls mb-2">
        <div>
          Show 
          <select class="form-select d-inline mx-1">
            <option>10</option>
            <option>25</option>
            <option>50</option>
          </select>
          entries
        </div>
        <div>
          Search:
          <input type="text" class="form-control d-inline ms-1">
        </div>
      </div>

      <div class="table-container">
        <table class="table table-bordered table-hover text-center">
          <thead>
            <tr>
              <th>Sr. NO</th>
              <th>Sub Course Name</th>
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
      </div>

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
        <h5 class="modal-title">Add FAQ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control mb-2" placeholder="Sub Course Name">
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
        <h5 class="modal-title">Edit FAQ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control mb-2" value="Sub Course Name">
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
        <h5 class="modal-title">Delete FAQ</h5>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
