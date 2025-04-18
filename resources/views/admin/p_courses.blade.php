<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f1ec;
      margin: 0;
      padding: 2rem;
    }

    .container {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      max-width: 1300px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    h2 {
      margin: 0;
    }

    .table-controls {
      display: flex;
      justify-content: space-between;
      margin-bottom: 1rem;
      flex-wrap: wrap;
    }

    .table-controls select,
    .table-controls input {
      padding: 0.3rem 0.6rem;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 1rem;
    }

    thead {
      background-color: #f0f0f0;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #eee;
      vertical-align: middle;
    }

    td img {
      width: 60px;
      height: 40px;
      border-radius: 5px;
      object-fit: cover;
    }

    .badge {
      padding: 5px 12px;
      border-radius: 5px;
      color: #fff;
      font-size: 0.9rem;
    }

    .badge.active {
      background-color: #2a9d8f;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>User Management</h2>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
        <i class="fas fa-plus"></i> Add User
      </button>
    </div>

    <div class="d-flex justify-content-between mb-4">
      <div>
        Show
        <select class="form-select w-auto">
          <option>10</option>
          <option>25</option>
          <option>50</option>
        </select>
        entries
      </div>
      <div>
        Search:
        <input type="text" class="form-control w-auto" placeholder="Search...">
      </div>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Sr. No</th>
          <th>Profile</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><img src="https://via.placeholder.com/60x40?text=Img1" alt="User1"></td>
          <td>John Doe</td>
          <mailto:td>john.doe@example.com</td>
          <td>Admin</td>
          <td><span class="badge bg-success">Active</span></td>
          <td>
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td><img src="https://via.placeholder.com/60x40?text=Img2" alt="User2"></td>
          <td>Jane Smith</td>
          <mailto:td>jane.smith@example.com</td>
          <td>User</td>
          <td><span class="badge bg-danger">Inactive</span></td>
          <td>
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <!-- Additional rows here -->
      </tbody>
    </table>
  </div>

  <!-- Modal for Add User -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="userName" class="form-label">User Name</label>
              <input type="text" class="form-control" id="userName" placeholder="Enter user name">
            </div>
            <div class="mb-3">
              <label for="userEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="userEmail" placeholder="Enter email">
            </div>
            <div class="mb-3">
              <label for="userRole" class="form-label">Role</label>
              <select class="form-select" id="userRole">
                <option>Admin</option>
                <option>User</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="userStatus" class="form-label">Status</label>
              <select class="form-select" id="userStatus">
                <option>Active</option>
                <option>Inactive</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save User</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for Edit User -->
  <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="editUserName" class="form-label">User Name</label>
              <input type="text" class="form-control" id="editUserName" placeholder="Enter user name">
            </div>
            <div class="mb-3">
              <label for="editUserEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="editUserEmail" placeholder="Enter email">
            </div>
            <div class="mb-3">
              <label for="editUserRole" class="form-label">Role</label>
              <select class="form-select" id="editUserRole">
                <option>Admin</option>
                <option>User</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="editUserStatus" class="form-label">Status</label>
              <select class="form-select" id="editUserStatus">
                <option>Active</option>
                <option>Inactive</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for Delete User -->
  <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this user?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
