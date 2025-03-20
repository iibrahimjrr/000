<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sehty</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="css/auth.css">
</head>

<body>
    

    <main class="auth-container">
        <div class="auth-box">
            <h2>Sign in to your account</h2>
            <form id="loginForm" class="auth-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-button">Sign in</button>
            </form>
        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
    <script src="js/auth.js"></script>
    <script src="js/login.js"></script>
</body>

</html>