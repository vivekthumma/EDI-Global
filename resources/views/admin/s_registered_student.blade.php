@extends('masterlayout.masteradmin')
@section('title', 'User')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Students Table</title>

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- DataTables -->
            <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
            <!-- FontAwesome -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

            <style>
                body {
                    background-color: #f4f0ea;
                    font-family: 'Poppins', sans-serif;
                }

                .table-card {
                    background-color: #fff;
                    border-radius: 12px;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                    padding: 20px;
                    margin-top: 50px;
                }

                .card-title {
                    font-size: 24px;
                    font-weight: 600;
                }

                .btn-primary.rounded-circle {
                    width: 40px;
                    height: 40px;
                    font-size: 18px;
                    padding: 0;
                }

                .btn-action {
                    padding: 6px 10px;
                }

                .btn-delete {
                    background-color: #f44336;
                    color: white;
                }

                .modal-header {
                    background-color: #0d6efd;
                    color: white;
                }
            </style>
        </head>

        <body>

            <div class="container">
                <div class="card table-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Students</h4>
                            <button class="btn btn-primary rounded-circle" data-bs-toggle="modal"
                                data-bs-target="#addModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table id="studentsTable" class="table table-bordered table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Sr.NO</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>State</th>
                                        <th>Registered On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Sample Row (Uncomment if you want data prefilled)
                    <tr>
                      <td>1</td>
                      <td>John Doe</td>
                      <td>+91-9876543210</td>
                      <mailto:td>john@example.com</td>
                      <td>Delhi</td>
                      <td>2025-04-14</td>
                      <td>
                        <button class="btn btn-success btn-sm btn-action me-1" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-delete btn-action" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                    -->
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
                            <h5 class="modal-title">Add Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control mb-2" placeholder="Name" required>
                            <input type="text" class="form-control mb-2" placeholder="Contact" required>
                            <input type="email" class="form-control mb-2" placeholder="Email" required>
                            <input type="text" class="form-control mb-2" placeholder="State" required>
                            <input type="date" class="form-control mb-2" placeholder="Registered On" required>
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
                            <h5 class="modal-title">Edit Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control mb-2" value="John Doe">
                            <input type="text" class="form-control mb-2" value="+91-9876543210">
                            <input type="email" class="form-control mb-2" mailto:value="john@example.com">
                            <input type="text" class="form-control mb-2" value="Delhi">
                            <input type="date" class="form-control mb-2" value="2025-04-14">
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
                            <h5 class="modal-title">Delete Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this student?
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
                $(document).ready(function() {
                    $('#studentsTable').DataTable();
                });
            </script>
        </body>

        </html>


    </div>
    <!-- /.content-wrapper -->
@endsection
