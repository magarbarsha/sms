<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #2c3e50;
            padding: 20px;
            color: white;
            position: fixed;
        }

        .logo {
            font-size: 24px;
            margin-bottom: 30px;
            text-align: center;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
        }

        .nav-item {
            padding: 15px;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 5px;
        }

        .nav-item:hover {
            background-color: #34495e;
        }

        .nav-item i {
            margin-right: 10px;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 250px; /* Shift the content right to fit sidebar */
            padding: 20px;
            background-color: #f5f6fa;
            width: 100%;
        }

        /* Navbar Styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: linear-gradient(45deg, #3498db, #2ecc71);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 20px;
            transition: all 0.3s;
        }

        .navbar:hover {
            background: linear-gradient(45deg, #2980b9, #27ae60);
        }

        .user-panel {
            display: flex;
            align-items: center;
            color: white;
        }

        .user-panel img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .user-panel span {
            font-weight: bold;
        }

        .navbar .logout {
            font-size: 18px;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .navbar .logout:hover {
            color: #e74c3c;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .chart-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .students-list {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
        }

        /* Footer Styles */
        .footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Quick Links Section */
        .quick-links {
            margin-bottom: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .quick-links ul {
            list-style: none;
        }

        .quick-links li {
            padding: 10px;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 5px;
        }

        .quick-links li:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">EduManage</div>
            <ul class="nav-menu">
                <li class="nav-item"><i class="fas fa-tachometer-alt"></i> Dashboard</li>
                <li class="nav-item"><i class="fas fa-users"></i> Students</li>
                <li class="nav-item"><i class="fas fa-book"></i> Courses</li>
                <li class="nav-item"><i class="fas fa-calendar-check"></i> Attendance</li>
                <li class="nav-item"><i class="fas fa-cogs"></i> Settings</li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <div class="navbar">
                <div class="user-panel">
                    <img src="https://via.placeholder.com/40" alt="User Avatar">
                    <span>Admin</span>
                </div>
                <div class="logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </div>
            </div>

            <div class="header">
                <h1>Student Dashboard</h1>
                <div class="search-box">
                    <input type="text" placeholder="Search...">
                </div>
            </div>

            <!-- Quick Links Section -->
            <div class="quick-links">
                <h3>Quick Links</h3>
                <ul>
                    <li>View All Students</li>
                    <li>View All Courses</li>
                    <li>Manage Attendance</li>
                    <li>Settings</li>
                </ul>
            </div>

            <!-- Stats Cards -->
            <div class="stats-container">
                <div class="stat-card">
                    <h3>Total Students</h3>
                    <p id="total-students">0</p>
                </div>
                <div class="stat-card">
                    <h3>Active Courses</h3>
                    <p id="total-courses">0</p>
                </div>
                <div class="stat-card">
                    <h3>Attendance %</h3>
                    <p id="attendance">0%</p>
                </div>
            </div>

            <!-- Chart -->
            <div class="chart-container">
                <canvas id="enrollmentChart"></canvas>
            </div>

            <!-- Students List -->
            <div class="students-list">
                <h2>Recent Students</h2>
                <table id="students-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- JS will populate this -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 EduManage. All Rights Reserved.</p>
    </div>

    <script>
        // Sample Data
        const students = [
            { id: 1, name: "John Doe", email: "john@example.com", course: "Mathematics", status: "Active" },
            { id: 2, name: "Jane Smith", email: "jane@example.com", course: "Physics", status: "Active" },
            { id: 3, name: "Bob Johnson", email: "bob@example.com", course: "Chemistry", status: "Inactive" }
        ];

        // Populate Stats
        document.getElementById('total-students').textContent = students.length;
        document.getElementById('total-courses').textContent = new Set(students.map(s => s.course)).size;
        document.getElementById('attendance').textContent = "85%";

        // Populate Table
        const tbody = document.querySelector('#students-table tbody');
        students.forEach(student => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${student.id}</td>
                <td>${student.name}</td>
                <td>${student.email}</td>
                <td>${student.course}</td>
                <td>${student.status}</td>
            `;
            tbody.appendChild(row);
        });

        // Enrollment Chart
        const ctx = document.getElementById('enrollmentChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mathematics', 'Physics', 'Chemistry', 'Biology'],
                datasets: [{
                    label: 'Student Enrollment',
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
