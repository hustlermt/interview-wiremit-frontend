<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container p-4">
        <div class="card">
            <div class="card-body">
                <h2>Password Reset Request</h2>
                <p>We received a request to reset your password.</p>
                <a href="{{ url('/reset-password?email=' . urlencode($email) . '&token=' . urlencode($token)) }}" class="btn btn-primary">
                    Reset Your Password
                </a>
                <p>If you did not request this, please ignore this email.</p>
            </div>
        </div>
    </div>
</body>
</html>
