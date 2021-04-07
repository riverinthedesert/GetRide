<div>
    <?= $this->Flash->render() ?>
    <h3>Récupération du mot de passe</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Veuillez indiquer votre adresse e-mail afin de recevoir votre nouveau mot de passe') ?></legend>
        <?= $this->Form->control('mail', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Envoyer le mot de passe')); ?>
    <?= $this->Form->end() ?>
</div>