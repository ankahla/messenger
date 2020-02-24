<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="web/css/main.css">
</head>
<body>
    <div class="wrapper">
        <h2>Connexion</h2>
        <p>Veuillez saisir vos identifiants pour vous connecter.</p>
        <form action="login/process" method="post">
            <div class="form-group <?php echo (!empty($errors)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo implode(',', $errors) ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="passwd" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Se connecter">
            </div>
            <p>Pas encore de compte? <a href="register">Créer un compte</a>.</p>
            <input type="hidden" name="token" value="<?php echo $token ?>">
        </form>
    </div>    
</body>
</html>