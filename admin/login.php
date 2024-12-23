<?php
session_start();

if(isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}


$admin_config = include '../includes/admin-config.php';
$error = '';

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email === $admin_config['email'] && $password === $admin_config['password']) {
        $_SESSION['admin'] = true;
        header('Location: index.php');
        exit();
    } else {
        $error = 'Identifiants incorrects';
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Sakura Blend</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
<div class="admin-login-container">
    <form class="admin-login-form" method="post" action="">
        <div class="logo-container">
            <h1>Sakura Blend</h1>
            <p class="japanese-text">サクラ ブレンド</p>
        </div>

        <?php if($error): ?>
            <div class="error-message">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" name="login" class="login-btn">
            <i class="fa-solid fa-right-to-bracket"></i> Connexion
        </button>

        <a href="../index.php" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Retour au site
        </a>
    </form>
</div>
</body>
</html>