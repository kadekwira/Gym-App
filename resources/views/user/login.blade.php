<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Fitnes</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #000;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    background-color: #222;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    text-align: center;
    width: 100%;
    max-width: 300px;
}

.login-logo i {
    width: 50%;
    height: 50%;
    border-radius: 50%;
}

.login-logo h1 {
    margin: 0;
    font-size: 2.5em;
    color: #ffcc00; 
}

.login-form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 1.2em;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #333;
    color: #fff;
    font-size: 1em;
}

.login-button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #ff0000;
    color: #fff;
    font-size: 1.2em;
    cursor: pointer;
}

.login-button:hover {
    background-color: #cc0000;
}

</style>
<body>
    <div class="login-container">
        <div class="login-logo">
        <i class="fa-solid fa-dumbbell"></i>
            <h1>Fitnes</h1>
        </div>
        <form class="login-form" action="/login" method="POST">
            @csrf
        <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>
</html>
