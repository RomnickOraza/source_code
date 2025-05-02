<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sidebar Styles */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            background-color: #2c3e50;
            color: #fff;
            padding-top: 30px;
            transition: width 0.3s ease;
        }
    
        .sidebar a {
            color: #bdc3c7;
            padding: 12px;
            text-decoration: none;
            display: block;
            font-size: 16px;
            border-bottom: 1px solid #34495e;
        }
        .sidebar a:hover {
            background-color: #34495e;
            color: white;
        }
        .sidebar h2 {
            font-size: 20px;
            color: #ecf0f1;
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-left: 220px;
            padding: 30px;
            background-color: #f5f5f5;
        }
        .navbar {
            background-color: #34495e;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        .navbar-brand {
            font-size: 22px;
        }
        .navbar-toggler-icon {
            background-color: white;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                padding-top: 10px;
            }
            .sidebar a {
                font-size: 14px;
            }
            .sidebar.active {
                width: 220px;
            }
            .content {
                margin-left: 0;
                padding: 15px;
            }
            .sidebar a.active {
    background-color: #16a085; /* Highlight color for the active link */
    color: white;
}

        }
    </style>
</head>
<body>

<!-- Sidebar -->
<!-- Sidebar -->
<div class="sidebar">
    <h2>Stock Management</h2>
    <a href="{{ route('stocks.index') }}" class="{{ request()->is('stocks*') ? 'active' : '' }}">Stocks</a>
    <a href="{{ route('items.index') }}" class="{{ request()->is('items*') ? 'active' : '' }}">Items</a>
    <a href="{{ route('issuances.index') }}" class="{{ request()->is('issuances*') ? 'active' : '' }}">Issuances</a>
    <a href="{{ route('inventory.index') }}" class="{{ request()->is('inventory*') ? 'active' : '' }}">Inventory</a>
    <a href="#">Settings</a> <!-- Placeholder for future settings section -->
</div>


<!-- Main Content -->
<div class="content">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Inventory Management</a>
    </nav>

    <!-- Page Content -->
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
