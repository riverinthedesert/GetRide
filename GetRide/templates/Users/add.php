<?= $this->Html->css(['inscription']) ?>
<?= $this->Html->script(['inscription']) ?>
<!-- Création du formulaire d'inscription -->
<div class="row">
    <div class="column-responsive column-80">
        <div class="membre form content">

            <?= $this->Form->create($user, ['type' => 'file',
                                            'autocomplete' => 'off']); ?>
            <fieldset>
                <legend align="center"><?= __('Inscription') ?></legend>
                <?php
                    echo "<div class=\"identite\"><table id=\"tableau\"><tr><td>";
                    echo $this->Form->control('nom', ['pattern' => '[a-zA-Z\-]*',
                                                      'required title' => "Ce champ doit être rempli uniquement avec des lettres",
                                                      'autocomplete' => 'off',
                                                      'label' => 'Nom*']);
                    echo "</td><td>";
                    echo $this->Form->control('prenom', ['pattern' => '[a-zA-Z\-]*',
                                                         'required title' => "Ce champ doit être rempli uniquement avec des lettres",
                                                         'autocomplete' => 'off',
                                                         'label' => 'Prenom*']);
                    echo "</td></tr></div>";
                    echo "<tr><td>";
                    echo $this->Form->control('mail', [ 'autocomplete' => 'off',
                                                        'label' => 'Mail*',
                                                        'placeholder' => "exemple@xyz.com",
                                                        'pattern' => "^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$",
                                                        'required title' => "exemple@xyz.xyz"]);
                    echo "</td></tr>";
                    echo "<tr><td>";
                    echo "<div class=\"mdp\">";
                    echo $this->Form->control('motDePasse', ['type' => 'password',
                                                             'pattern' => '(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,30}',
                                                             'required title' => "au moins une majuscule, un chiffre et un caractère spécial",
                                                             'autocomplete' => 'off',
                                                             'label' => 'Mot de passe*',
                                                             'id' => 'mdp']);
                    echo $this->Html->image('eye_show.png', ['onClick' => 'Afficher()',
                                                    'fullBase' => false,
                                                    'id' => 'imageOeil']);
                    echo "</div></td><td>";
                    echo "<div class=\"cmdp\">";
                    echo $this->Form->control('confirmerMotDePasse', ['type' => 'password',
                                                                      'label' => 'Confirmer le mot de passe*',
                                                                      'id' => 'cmdp']);

                    echo $this->Html->image('eye_show.png', ['onClick' => 'conf_Afficher()',
                                                             'fullBase' => false,
                                                             'id' => 'cimg']);
                    echo "</div></td></tr>";
                    echo "<tr><td>";              
                    echo $this->Form->control('telephone', ['autocomplete' => 'off',
                                                            'pattern' => '(^06|07)[0-9]{8}',
                                                            'label' => 'Téléphone*',
                                                            'required title' => 'doit contenir 10 chiffres et commencer par 06 ou 07']);
                    echo "</td><td>";
                    echo $this->Form->control('naissance', ['type' => 'date',
                                                            'autocomplete' => 'off',
                                                            'label' => 'Date de naissance*',
                                                            'max' => '2003-04-11']);
                    echo "</td></tr>";
                    echo "<tr><td>";
                    echo "<label id='radio'>Genre :</label>";
                    echo $this->Form->radio('genre', 
                    [
                        [ 'value' => 'm', 'text' => 'Homme'],
                        [ 'value' =>'f', 'text' => 'Femme'],
                        [ 'value' =>'a', 'text' => 'Autre'],
                    ]);
                    echo "</td><td>";
                    echo "<label id='radio'>Possédez-vous une voiture ?</label>";
                    echo $this->Form->radio('estConducteur', 
                    [
                        [ 'value' => 'Oui', 'text' => 'Oui'],
                        [ 'value' => 'Non', 'text' => 'Non'],
                    ]);
                    echo "</td></tr>";
                    echo "<tr><td>";
                    echo $this->Form->control('pathPhoto_file', ['type' => 'file', 'label' => 'Photo de profil']);
                    echo "</td></tr></table>";
                ?>
            </fieldset>
            <?= $this->Form->button(__('S\'inscrire')) ?>
            <p>
            <?php echo "* champs obligatoires" ; ?></p>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

