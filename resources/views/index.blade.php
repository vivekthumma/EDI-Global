@extends('masterlayout.masteradmin')
@section('title', 'Home')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #4e73df;
      --secondary-color: #f8f9fc;
      --accent-color: #dddfeb;
    }

    .py-4 {
      width: 80%;
      margin-left: 19%;
    }

    body {
      background-color: var(--secondary-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
      border-radius: 0.5rem;
      border: none;
      box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
      margin-bottom: 1.5rem;
    }

    .card-header {
      background-color: #f8f9fc;
      border-bottom: 1px solid #e3e6f0;
      padding: 1rem 1.35rem;
      font-weight: 600;
      color: #4e73df;
    }

    .stat-card {
      border-left: 0.25rem solid var(--primary-color);
      transition: transform 0.3s;
    }

    .stat-card:hover {
      transform: translateY(-5px);
    }

    .stat-card .card-body {
      padding: 1.5rem;
    }

    .stat-number {
      font-size: 1.8rem;
      font-weight: 700;
      color: #5a5c69;
    }

    .stat-title {
      font-size: 0.9rem;
      color: #858796;
      text-transform: uppercase;
      font-weight: 600;
    }

    .stat-link {
      color: var(--primary-color);
      text-decoration: none;
      font-size: 0.8rem;
      font-weight: 600;
      display: flex;
      align-items: center;
    }

    .stat-link i {
      margin-left: 0.3rem;
      font-size: 0.7rem;
    }

    .recent-registrations {
      min-height: 300px;
    }

    .table {
      margin-bottom: 0;
    }

    .table th {
      border-top: none;
      font-weight: 600;
      color: #4e73df;
      font-size: 0.8rem;
      text-transform: uppercase;
    }

    .counselor-card {
      background-color: white;
      border-radius: 0.5rem;
      padding: 1rem;
      box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
    }

    .view-all {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 600;
      font-size: 0.9rem;
    }
  </style>
</head>

<body>
  <div class="container-fluid py-4">
    <div class="row">
      <!-- Stat Cards -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <div class="stat-title">Total Registrations</div>
                <div class="stat-number">0</div>
              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent">
            <a href="#" class="stat-link">
              See List <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <div class="stat-title">Total Users</div>
                <div class="stat-number">2</div>
              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent">
            <a href="#" class="stat-link">
              See Users <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <div class="stat-title">Universities Added</div>
                <div class="stat-number">21</div>
              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent">
            <a href="#" class="stat-link">
              See Universities <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <div class="stat-title">Programs Added</div>
                <div class="stat-number">12</div>
              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent">
            <a href="#" class="stat-link">
              See Programs <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Second Row of Stat Cards -->
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <div class="stat-title">Courses Added</div>
                <div class="stat-number">48</div>
              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent">
            <a href="#" class="stat-link">
              See Courses <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <div class="stat-title">Specializations Added</div>
                <div class="stat-number">120</div>
              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent">
            <a href="#" class="stat-link">
              See Specializations <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <div class="stat-title">Blogs Added</div>
                <div class="stat-number">1</div>
              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent">
            <a href="#" class="stat-link">
              See Blogs <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Empty column to maintain grid -->
      <div class="col-xl-3 col-md-6 mb-4">
        <!-- This column is empty to maintain the grid layout -->
      </div>
    </div>

    <!-- Recent Registrations and Counselors -->
    <div class="row">
      <!-- Recent Registrations -->
      <div class="col-lg-8 mb-4">
        <div class="card recent-registrations h-100">
          <div class="card-header">
            Recently Registered Students
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Course</th>
                    <th>Specialization</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="4" class="text-center text-muted py-4">
                      No recent registrations to display
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer bg-transparent">
            <a href="#" class="stat-link">
              See List <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Counselors -->
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex justify-content-between align-items-center">
            <span>Counselors</span>
            <a href="#" class="view-all">View All</a>
          </div>
          <div class="card-body">
            <div class="counselor-card mb-3">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                  <div class="fw-bold">text</div>
                  <div class="text-muted small">
                    <i class="fas fa-phone-alt me-1"></i> Phone: 9555788744
                  </div>
                </div>
              </div>
            </div>

            <!-- Additional counselors would be listed here -->
            <div class="text-center mt-3">
              <a href="#" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-plus me-1"></i> Add Counselor
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection