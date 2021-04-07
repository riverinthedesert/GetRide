
<!-- Création du formulaire d'inscription -->
<div class="row">
    <div class="column-responsive column-80">
        <div class="membre form content">
            <?= $this->Form->create($user, ['type' => 'file']); ?>
            <fieldset>
                <legend align="center"><?= __('Inscription') ?></legend>
                <?php
                    echo $this->Form->control('nom', ['pattern' => '[a-zA-Z\-]*',
                                                      'required title' => "Ce champ doit être rempli uniquement avec des lettres",
                                                      'autocomplete' => 'off',
                                                      'label' => 'Nom*']);
                    echo $this->Form->control('prenom', ['pattern' => '[a-zA-Z\-]*',
                                                         'required title' => "Ce champ doit être rempli uniquement avec des lettres",
                                                         'autocomplete' => 'off',
                                                         'label' => 'Prenom*']);
                    echo $this->Form->control('motDePasse', ['type' => 'password',
                                                             'pattern' => '(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,30}',
                                                             'required title' => "au moins une majuscule, un chiffre et un caractère spécial",
                                                             'autocomplete' => 'off',
                                                             'label' => 'Mot de passe*']);
                    echo $this->Form->control('confirmerMotDePasse', ['type' => 'password',
                                                                      'label' => 'Confirmer le mot de passe*']);
                    echo $this->Form->control('mail', ['type' => 'mail',
                                                        'autocomplete' => 'off',
                                                        'label' => 'Mail*',
                                                        'placeholder' => "exemple@xyz.com",
                                                        'pattern' => "^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$",
                                                        'required title' => "exemple@xyz.xyz"]);
                    echo $this->Form->control('telephone', ['autocomplete' => 'off',
                                                            'pattern' => '(^06|07)[0-9]{8}',
                                                            'label' => 'Téléphone*',
                                                            'required title' => 'doit contenir 10 chiffres et commencer par 06 ou 07']);
                    echo $this->Form->control('naissance', ['type' => 'date',
                                                            'autocomplete' => 'off',
                                                            'label' => 'Date de naissance*']);
                    echo "<label>Genre :</label>";
                    echo $this->Form->radio('genre', 
                    [
                        [ 'value' => 'm', 'text' => 'Homme'],
                        [ 'value' =>'f', 'text' => 'Femme'],
                        [ 'value' =>'a', 'text' => 'Autre'],
                    ]);
                    echo $this->Form->control('pathPhoto_file', ['type' => 'file']);
                    echo "<label>Possédez-vous une voiture ?</label>";
                    echo $this->Form->radio('estConducteur', 
                    [
                        [ 'value' => 'Oui', 'text' => 'Oui'],
                        [ 'value' => 'Non', 'text' => 'Non'],
                    ]);
                      
                ?>
            </fieldset>
            <?= $this->Form->button(__('S\'inscrire')) ?>
            <p>
            <?php echo "* champs obligatoires" ; ?></p>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
