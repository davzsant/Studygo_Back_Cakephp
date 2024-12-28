
<?= $this->Form->create() ?>
    <div class="create_post">
            <?= $this->element('create_post/data_post') ?>
            <?= $this->Form->submit('Criar Post',['class' => "button_create_post"]) ?>
            <?= $this->Form->hidden('user_id',['value' => $userId]) ?>
    </div>
<?= $this->Form->end() ?>


<?= $this->Html->css('post/add/main.css') ?>
