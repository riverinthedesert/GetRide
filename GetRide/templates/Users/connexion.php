<html lang="fr">

<head>
    <title>Se connecter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<form method="post">
    <div class="container">
        <?= $this->Flash->render() ?>
        <div class="text-center">
            <h1>Connectez-vous</h1>
            <h4>Heureux de vous revoir !</h4>
        </div>

        <br>

        <label for="mail">Adresse e-mail</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <div class="input text required">
                <input type="email" name="mail" required="required" title="xxx@yyy.zzz" 
                maxlength="50" pattern="^[a-zA-Z0-9]{3,20}@[a-zA-Z]{3,20}\.[a-zA-Z]{2,8}$" 
                placeholder="exemple@email.com" id="mail" />
            </div>

        </div>
        <br>
        <label for="motdepasse">Mot de passe</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

            <div class="input text required">
                <input type="password" name="motDePasse" required="required" 
                title="au moins une majuscule, un chiffre et un caractère spécial" 
                maxlength="30" pattern="(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,30}" 
                placeholder="8-30 caractères" id="motdepasse" />
            </div>


        </div>

        <br>
        <?= $this->Html->link("Mot de passe oublié ?", ['action' => 'recuperation']) ?>
        <br>
        <br>
        <?= $this->Form->submit(__('Se connecter')); ?>
</form>