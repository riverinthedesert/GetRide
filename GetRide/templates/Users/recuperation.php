<div>
    <?= $this->Flash->render() ?>
    <h3>Récupération du mot de passe</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Nous vous renverrons votre mot de passe à l\'adresse ci-dessous') ?></legend>
        <?= $this->Form->control('mail', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Envoyer le mot de passe')); ?>
    <?= $this->Form->end() ?>
</div>