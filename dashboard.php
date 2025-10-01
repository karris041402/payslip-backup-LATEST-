<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip History</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ffffff 0%, #e6ecf5 50%, #cddffb 100%);
            padding: 20px;
            transition: background-color 0.3s ease, color 0.3s ease;
            min-height: 100vh;
        }
        
        .main-content {
            margin-left: 280px; /* Account for sidebar width + margin */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 40px); /* Account for body padding */
        }
        
        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 45px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1), 
                        0 15px 30px rgba(0,0,0,0.15), 
                        0 20px 40px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0,0,0,0.05);
            padding: 60px 80px;
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        .container:hover{
            transform: scale(1.02);
            transition: transform 0.3s ease;
        }

        .container h2 {
            text-transform: uppercase;
            font-size: 2.5em;
            color: #2c3e50;
            letter-spacing: 3px;
            margin-bottom: 20px;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100%;
            background: rgba(44, 62, 80, 0.98);
            color: #fff;
            box-shadow: 2px 0 16px rgba(0,0,0,0.12);
            z-index: 999;
            display: flex;
            flex-direction: column;
            padding-top: 0;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .sidebar-header {
            display: flex;
            padding: 35px 10px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            position: relative;
        }

        .sidebar-logo {
            width: 60px;
            height: 60px;
            margin-left: 5px;
            object-fit: contain;
            margin-top: 15px;
        }

        .sidebar-title {
            font-size: 17px;
            font-weight: bold;
            letter-spacing: 2px;
            flex: 1;
            margin-left: 17px;
        }

        .close-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 2em;
            cursor: pointer;
            position: absolute;
            right: 12px;
            top: 10px;
            display: none;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .sidebar-menu li {
            padding: 16px 28px;
            font-size: 1.08em;
            cursor: pointer;
            border-radius: 8px;
            transition: background 0.2s, color 0.2s;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-menu li:hover {
            background: #3498db;
            color: #fff;
        }

        .sidebar-menu .activeTab {
            background: #3498db;
            color: #fff;
        }

        .sidebar-menu .logout {
            color: #ffd1d1;
            margin-top: auto;
        }

        .sidebar-menu .mode-toggle {
            color: #ffe;
        }

        .credit {
            bottom: 15px;
            position: absolute;
            font-size: 11px;
            color: #ccc;
            text-align: center;
            width: 230px;
            opacity: 0.4;
            left: 12px;
            letter-spacing: 1px;
        }

        body.dark-mode {
            background: #181c23 !important;
            color: #e0e6ef !important;
        }
        
        body.dark-mode .container {
            background: #232b36 !important;
            color: #e0e6ef !important;
        }
        
        body.dark-mode .container h2 {
            color: #e0e6ef !important;
        }
        
        body.dark-mode .sidebar {
            background: #181c23 !important;
            color: #fff !important;
            box-shadow: 2px 0 20px rgba(207, 194, 194, 0.12) !important;
        }

        body.dark-mode .sidebar-menu li:hover {
            background: #3498db !important;
            color: #fff !important;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            .container {
                padding: 40px 30px;
            }
            
            .container h2 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="container">
            <h2>Under Maintenance</h2>
            <p>We're currently working on improving this feature. Please check back soon.</p>
        </div>
    </div>

    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="EARIST_Logo (1).png" alt="Logo" class="sidebar-logo">
            <span class="sidebar-title">HUMAN RESOURCES MANAGEMENT SYSTEM</span>
        </div>
        <ul class="sidebar-menu">
            <li class="activeTab"><i class="fas fa-tachometer-alt"></i> Dashboard</li>
            <li><i class="fas fa-file-excel"></i> Excel Management</li>
            <li><i class="fas fa-file-invoice"></i> Payslip Generator</li>
            <li ><i class="fas fa-history"></i> Payslip History</li>
            <li ><i class="fas fa-chart-bar"></i> Reports</li>
            <li class="mode-toggle"><i class="fas fa-moon"></i> Dark/Light Mode</li>
        </ul>
        <h5 class="credit">Payslip Generator System © 2025 Karris Project.  
    Developed for EARIST HRMS. All Rights Reserved.</h5>
    </nav>

<script>
    document.querySelectorAll('.sidebar-menu li').forEach(item => {
        item.addEventListener('click', function() {
            if (this.textContent.includes('Dashboard')) window.location.href = 'dashboard.php';
            if (this.textContent.includes('Excel')) window.location.href = 'manage_excells.php';
            if (this.textContent.includes('Payslip Generator')) window.location.href = 'index.php';
            if (this.textContent.includes('Payslip History')) window.location.href = 'payslip_history.php';
            if (this.textContent.includes('Reports')) window.location.href = 'reports.php';
            if (this.textContent.includes('Account Settings')) window.location.href = 'account_settings.php';
            if (this.classList.contains('mode-toggle')) toggleMode();
        });
    });

    function toggleMode() {
        document.body.classList.toggle('dark-mode');
        const isDarkMode = document.body.classList.contains('dark-mode');
        localStorage.setItem('themeMode', isDarkMode ? 'dark' : 'light');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('themeMode');
        if (savedTheme === 'dark') {
            document.body.classList.add('dark-mode');
        }
    }); 
</script>
</body>
</html>