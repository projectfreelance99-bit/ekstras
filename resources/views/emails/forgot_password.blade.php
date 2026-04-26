<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <p>Halo {{ $user->name }},</p>
    <p>Anda telah meminta untuk mereset password Anda. Silakan klik link di bawah ini untuk mereset password Anda:</p>
    <p>
        <a href="{{ url('reset-password/'.$user->remember_token) }}">Reset Password</a>
    </p>
    <p>Link ini akan kadaluarsa dalam 24 jam.</p>
    <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
    <br>
    <p>Terima kasih,</p>
    <p>Tim Admin</p>
</body>
</html> 