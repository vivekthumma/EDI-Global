<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Blog Table</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f1ec;
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
      font-weight: bold;
      border-bottom: 1px solid #eee;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .btn-add {
      background-color: #0d1b56;
      color: white;
      border-radius: 8px;
      width: 38px;
      height: 38px;
      font-size: 20px;
      padding: 0;
      text-align: center;
    }

    .btn-add:hover {
      background-color: #13297a;
    }

    .table thead {
      background-color: white;
      font-weight: 600;
    }

    .table tbody {
      background-color: white;
    }

    .modal-header {
      background-color: #f8f9fa;
    }

    .table-container {
      overflow-x: auto;
    }

    .form-control,
    .form-select {
      height: 30px;
      font-size: 14px;
    }

    .dataTables_wrapper .pagination {
      margin: 0;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card">
    <div class="card-header px-4 pt-4 pb-2">
      <span>Blog</span>
      <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addModal">+</button>
    </div>

    <div class="card-body table-container px-4 pt-0">
      <div class="d-flex justify-content-between align-items-center my-3">
        <div>
          Show 
          <select class="form-select d-inline-block w-auto ms-1 me-1">
            <option selected>10</option>
            <option>25</option>
            <option>50</option>
          </select>
          entries
        </div>
        <div>
          Search: <input type="text" class="form-control d-inline-block w-auto ms-1">
        </div>
      </div>

      <table class="table table-hover table-bordered text-center">
        <thead>
          <tr>
            <th>Sr. NO</th>
            <th>Blog Name</th>
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
        <h5 class="modal-title" id="addModalLabel">Add Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3"><input type="text" class="form-control" placeholder="Blog Name"></div>
        <div class="mb-3"><textarea class="form-control" placeholder="Question"></textarea></div>
        <div class="mb-3"><textarea class="form-control" placeholder="Answer"></textarea></div>
        <div class="mb-3">
          <select class="form-select">
            <option selected>Status</option>
            <option>Active</option>
            <option>Inactive</option>
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3"><input type="text" class="form-control" value="Blog Name"></div>
        <div class="mb-3"><textarea class="form-control">Question text...</textarea></div>
        <div class="mb-3"><textarea class="form-control">Answer text...</textarea></div>
        <div class="mb-3">
          <select class="form-select">
            <option>Active</option>
            <option selected>Inactive</option>
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
        <h5 class="modal-title" id="deleteModalLabel">Delete Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this blog entry?
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
