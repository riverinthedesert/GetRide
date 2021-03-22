
<!-- Création du formulaire d'inscription -->
<div class="row">
    <div class="column-responsive column-80">
        <div class="membre form content">
            <?= $this->Form->create($membre) ?>
            <fieldset>
                <legend align="center"><?= __('Inscription') ?></legend>
                <?php
                    echo $this->Form->control('nom');
                    echo $this->Form->control('prenom');
                    echo $this->Form->control('motDePasse', ['type' => 'password']);
                    echo $this->Form->control('mail', ['type' => 'mail']);
                    echo $this->Form->control('telephone');
                    echo $this->Form->control('naissance', ['type' => 'date']);
                    echo "<label>Genre :</label>";
                    echo $this->Form->radio('genre', 
                    [
                        [ 'value' => 'm', 'text' => 'Homme'],
                        [ 'value' =>'f', 'text' => 'Femme'],
                        [ 'value' =>'a', 'text' => 'Autre'],
                    ]);
                    echo $this->Form->control('pathPhoto', ['type' => 'file']);
                    echo "<label>Possédez-vous une voiture ?</label>";
                    echo $this->Form->radio('estConducteur', 
                    [
                        [ 'value' => 'Oui', 'text' => 'Oui'],
                        [ 'value' => 'Non', 'text' => 'Non'],
                    ]);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
