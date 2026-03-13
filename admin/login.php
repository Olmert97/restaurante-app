<?php
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="RESTAURANTE - Login">
<meta name="author" content="RESTAURANTE">
<title>RESTAURANTE - Iniciar sesión</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background: #f5f5f5;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.login-container {
    display: flex;
    width: 100%;
    max-width: 1000px;
    height: 600px;
    background: #ffffff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}

.left-section {
    flex: 1;
    background: #ffffff;
    padding: 60px 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.logo {
    margin-bottom: 50px;
}

.logo h1 {
    color: #2d3436;
    font-size: 32px;
    font-weight: 700;
    letter-spacing: 2px;
}

.form-group {
    margin-bottom: 25px;
    position: relative;
}

.form-group label {
    display: block;
    color: #636e72;
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 8px;
}

.form-group input {
    width: 100%;
    padding: 15px 50px 15px 20px;
    border: none;
    border-radius: 10px;
    font-size: 15px;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

.form-group input:focus {
    outline: none;
    background: #f0f0f0;
    box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
}

.password-toggle {
    position: absolute;
    right: 15px;
    top: 42px;
    cursor: pointer;
    color: #636e72;
    font-size: 18px;
    transition: color 0.3s ease;
    background: none;
    border: none;
    padding: 5px;
}

.password-toggle:hover {
    color: #2d3436;
}

.btn-login {
    width: 100%;
    padding: 15px;
    background: #2d3436;
    border: none;
    color: white;
    font-size: 16px;
    font-weight: 600;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.btn-login:hover {
    background: #000000;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.register-link {
    text-align: center;
    margin-top: 25px;
    color: #636e72;
    font-size: 14px;
}

.register-link a {
    color: #2d3436;
    text-decoration: none;
    font-weight: 600;
}

.register-link a:hover {
    text-decoration: underline;
}

.footer {
    text-align: center;
    margin-top: 40px;
    color: #b2bec3;
    font-size: 12px;
}

.right-section {
    flex: 1;
    background: url('img/pollo.jpg') no-repeat center center;
    background-size: cover;
    position: relative;
}

.right-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.3);
}

@media (max-width: 768px) {
    .login-container {
        flex-direction: column;
        height: auto;
        max-width: 400px;
    }
    
    .left-section {
        padding: 40px 30px;
    }
    
    .right-section {
        min-height: 300px;
    }
}
</style>
</head>
<body>
<div class="login-container">
    <div class="left-section">
        <div class="logo">
            <h1>RESTAURANTE</h1>
        </div>
        <main class="form-signin">
            <form>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" class="form-control" id="correo" placeholder="tu@correo.com">
                </div>
                <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <input type="password" class="form-control" id="clave" placeholder="••••••••">
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        <i class="fas fa-eye" id="toggleIcon"></i>
                    </button>
                </div>
                <button class="btn-login" type="button" onclick="login();">LOGIN</button>
                <p class="register-link">
                    
                </p>
                <p class="footer">&copy; 2026 RESTAURANTE</p>
            </form>
        </main>
    </div>
    <div class="right-section">
        <!-- Espacio para imagen del restaurante -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./js/funciones.js" type="text/javascript"></script>
<script>
function togglePassword() {
    const passwordInput = document.getElementById('clave');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}
</script>
</body>
</html>