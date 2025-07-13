<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAXIT-SA - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .card {
            background: linear-gradient(135deg, #374151 0%, #1f2937 100%);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.4);
        }
        
        .balance-card {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            box-shadow: 0 10px 25px -5px rgba(5, 150, 105, 0.3);
        }
        
        .balance-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px -10px rgba(5, 150, 105, 0.4);
        }
        
        .transaction-row {
            transition: all 0.2s ease;
        }
        
        .transaction-row:hover {
            background-color: #374151;
            transform: translateX(4px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            box-shadow: 0 4px 15px -5px rgba(59, 130, 246, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px -5px rgba(59, 130, 246, 0.5);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            box-shadow: 0 4px 15px -5px rgba(107, 114, 128, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px -5px rgba(107, 114, 128, 0.5);
        }
        
        .status-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }
        
        .status-pending {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        }
        
        .status-failed {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }
        
        .navbar {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px -5px rgba(0, 0, 0, 0.3);
        }
        
        .account-selector {
            background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
            border: 1px solid #6b7280;
        }
    </style>
</head>

<body>

    <?php echo $ContentForLayout; ?>
</body>

</html>