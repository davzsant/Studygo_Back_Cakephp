<?= $this->Form->create() ?>

<div class="fields">
    <div>
        <input type="text" name="name" required>
        <label for="name">Nome</label>
        <p class="error_message" id="name_error"></p>
    </div>
    <div>
        <input type="text" name="email" required>
        <label for="email">Email</label>
        <p class="error_message" id="email_error"></p>
    </div>
    <div>
        <input type="text" name="password" required>
        <label for="password">Senha</label>
        <p class="error_message" id="password_error"></p>
    </div>

    <?= $this->Form->button('Register') ?>
</div>

<?= $this->Form->end() ?>

<?= $this->Html->css('user/register/main') ?>
