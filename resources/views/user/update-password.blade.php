<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(#EECFC0, #F6F6F6);
        }
        .password-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        .password-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .password-header {
            background-color: #0d6efd;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 15px;
        }
        .password-body {
            padding: 20px;
            background-color: white;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-update {
            background-color: #0d6efd;
            color: white;
            font-weight: 500;
        }
        .btn-update:hover {
            background-color: #0b5ed7;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container password-container mt-5">
        <div class="password-card">
            <div class="password-header text-center">
                <h2>Update Password</h2>
            </div>
            <div class="password-body">
                <form action="{{ route('update.password.post') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <!-- Current Password -->
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                        <div class="form-text">Enter your current password</div>
                    </div>
                    
                    <!-- New Password -->
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        <div class="form-text">Minimum 8 characters</div>
                    </div>
                    
                    <!-- Confirm New Password -->
                    <div class="mb-4">
                        <label for="confirmPassword" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        <div class="form-text">Re-enter your new password</div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-update">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        


    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>