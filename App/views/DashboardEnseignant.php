<?php
session_start();

if (!isset($_SESSION['user']['id']) ||  $_SESSION['user']['id_role'] != '2') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduAdmin Dashboard - Enseignant</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
/* General Body Styles */
body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f6f9;
  color: #333;
}

/* Sidebar Styles */
.sidebar {
  width: 250px;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #007bff; /* Sidebar blue color */
  padding-top: 50px;
  transition: all 0.3s ease;
}

.sidebar a {
  display: block;
  padding: 10px 20px;
  text-decoration: none;
  color: #fff;
  font-size: 16px;
  margin: 10px 0;
  border-radius: 5px;
  transition: background-color 0.3s;
}

.sidebar a:hover,
.sidebar a.active {
  background-color: #0056b3; /* Darker shade when hovered or active */
}

.sidebar .brand-logo {
  text-align: center;
  font-size: 24px;
  color: #fff;
  margin-bottom: 30px;
}

/* Main Content Area */
.main-content {
  margin-left: 250px;
  padding: 30px;
  transition: margin-left 0.3s ease;
}

/* Navbar Styles */
.navbar {
  background-color: #fff;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  margin-bottom: 30px;
}

.navbar .navbar-brand {
  font-size: 24px;
  color: #007bff;
}

.navbar-nav .nav-link {
  font-size: 16px;
  color: #007bff;
}

.navbar-nav .nav-link:hover {
  color: #0056b3;
}

/* Cards */
.card {
  border-radius: 10px;
  border: none;
  padding: 20px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  background-color: #fff;
  margin-bottom: 30px;
  text-align: center;
}

.card i {
  font-size: 50px;
  margin-bottom: 10px;
}

.card h5 {
  font-size: 18px;
  color: #333;
}

.card h2 {
  font-size: 30px;
  font-weight: bold;
  color: #007bff;
}

/* Chart Container */
.chart-container {
  width: 100%;
  height: 400px;
  margin-bottom: 30px;
}

/* Data Table */
.table {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.table thead {
  background-color: #007bff;
  color: #fff;
}

.table th, .table td {
  padding: 15px;
  text-align: center;
}

.table-striped tbody tr:nth-child(odd) {
  background-color: #f9f9f9;
}

/* Responsive Styling */
@media (max-width: 768px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
    padding-top: 20px;
  }

  .main-content {
    margin-left: 0;
  }

  .navbar {
    padding: 10px;
  }

  .card {
    margin-bottom: 20px;
  }

  .table th, .table td {
    font-size: 14px;
  }
}

@media (max-width: 576px) {
  .sidebar a {
    font-size: 14px;
    padding: 10px 15px;
  }

  .navbar-brand {
    font-size: 20px;
  }

  .card h5, .card h2 {
    font-size: 16px;
  }
}

</style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h4 class="text-center text-white">EduAdmin</h4>
    <a href="DashboardEnseignant.php" class="active"><i class="fas fa-home me-2"></i> Dashboard</a>
    <a href="my_courses.php"><i class="fas fa-book me-2"></i> My Courses</a>
    <a href="student_progress.php"><i class="fas fa-users me-2"></i> Student Progress</a>
    <!-- Add other links as needed -->
    <a href="?logout=true" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
      <div class="container-fluid">
        <h3 class="navbar-brand">Teacher Dashboard</h3>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item me-3">
            <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-user-circle"></i> Profile</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container py-4">
      <!-- Cards for Teacher Dashboard -->
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="card text-center p-4 shadow-sm">
            <h5>Your Courses</h5>
            <h2>5</h2>
            <i class="fas fa-book fa-3x text-primary"></i>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center p-4 shadow-sm">
            <h5>Students Enrolled</h5>
            <h2>200</h2>
            <i class="fas fa-users fa-3x text-success"></i>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center p-4 shadow-sm">
            <h5>Your Revenue</h5>
            <h2>$8,320</h2>
            <i class="fas fa-dollar-sign fa-3x text-warning"></i>
          </div>
        </div>
      </div>

      <!-- Data Table (Example of My Courses) -->
      <div class="row">
        <div class="col-12">
          <table id="myCoursesTable" class="display">
            <thead>
              <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Enrolled Students</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>101</td>
                <td>Math 101</td>
                <td>50</td>
                <td>Active</td>
              </tr>
              <!-- Add more courses dynamically here -->
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myCoursesTable').DataTable();
    });
  </script>
</body>
</html>
