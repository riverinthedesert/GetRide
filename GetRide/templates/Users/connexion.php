<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Se connecter</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>

</head>

<body>
    <div class="container">

        <div style="margin-left: 20%; margin-right: 35%">
            <h1>Connectez-vous</h1>
            <h4>Heureux de vous revoir !</h4>
        </div>

        <br>

        <form method="post">

            <div style="margin-left: 20%; margin-right: 35%">
                <label for="email">Adresse e-mail</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="email" name="mail" required="required" title="xxx@yyy.zzz" 
                    maxlength="50" pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$" 
                    placeholder="exemple@email.com" id="mail" class="form-control" />
                </div>

                <br />

                <label for="password">Mot de passe</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" name="motDePasse" required="required" 
                    title="au moins une majuscule, un chiffre et un caractère spécial" 
                    maxlength="30" pattern="(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,30}" 
                    placeholder="8-30 caractères" id="motdepasse" data-toggle="password" 
                    class="form-control" />
                </div>

                <br />

                <?= $this->Html->link("Mot de passe oublié ?", ['action' => 'recuperation']) ?>
                <br />
                <br />
                <?= $this->Form->submit(__('Se connecter')); ?>

            </div>

        </form>

        <!-- Permet d'afficher/cacher le mot de passe -->
        <script type="text/javascript">
            $('.password').collapse();
        </script>

    </div>

</body>

</html>