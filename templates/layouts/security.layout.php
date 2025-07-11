<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
    />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Max IT</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .login-container {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        
        .input-focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.3);
        }
        
        .btn-hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px -5px rgba(34, 197, 94, 0.4);
        }
        
        .forgot-link {
            position: relative;
            overflow: hidden;
        }
        
        .forgot-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #06b6d4);
            transition: width 0.3s ease;
        }
        
        .forgot-link:hover::before {
            width: 100%;
        }
        
        .upload-area {
            border: 2px dashed #4b5563;
            transition: all 0.3s ease;
        }
        
        .upload-area:hover {
            border-color: #6b7280;
            background-color: #374151;
        }
        
        .upload-area.dragover {
            border-color: #3b82f6;
            background-color: #1e3a8a;
        }
    </style>
    </style>
  </head>
  <!-- <body> -->

        <?php echo $ContentForLayout; ?>

  <!-- </body> -->
</html>
