<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Connexion</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Connectez-vous') ?></legend>
        <?= $this->Form->control('mail', ['required' => true]) ?>
        <?= $this->Form->control('motDePasse', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Se connecter')); ?>
    <?= $this->Form->end() ?>
</div>