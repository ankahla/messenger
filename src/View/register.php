<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="web/css/main.css">
</head>
<body>
    <div class="wrapper">
        <h2>Créer un compte</h2>
        <p>Veuillez saisir vos informations.</p>
        <form action="register/process" method="post">
            <div class="form-group <?php echo (!empty($errors)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo implode(',', $errors) ?></span>
            </div> 
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="first_name" class="form-control" value="<?php echo $firstName; ?>">
            </div>
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="last_name" class="form-control" value="<?php echo $lastName; ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="passwd" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Créer le compte">
            </div>
            <p>Vous avez déjà un compte? <a href="login">Se connecter</a>.</p>
            <input type="hidden" name="token" value="<?php echo $token ?>">
        </form>
    </div>    
</body>
</html>