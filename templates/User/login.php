<?= $this->Form->create() ?>

<div class="fields">
    <div class="email_data">
        <input type="text" name="email" required>
        <label for="email">Email</label>
        <p class="message_error" id="email_error"></p>
    </div>

    <div class="password_data">
        <input type="text" name="password" required>
        <label for="password">Password</label>
        <p class="message_error" id="password_error"></p>
    </div>

    <?= $this->Form->button('Login')  ?>

    <div class="redirects">
        <?= $this->Html->link('Esqueci a Senha',['action' => 'forget']) ?>
        <?= $this->Html->link('Criar Conta',['action' => 'register']) ?>
    </div>
</div>

<?= $this->Form->end() ?>

<?= $this->Html->css(['user/login/main']) ?>
