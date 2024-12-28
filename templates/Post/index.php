<div class="timeline">
    <?php foreach($posts as $post): ?>
        <?= $this->element('post/index',['post' => $post]) ?>
    <?php endforeach ?>
</div>
<?= $this->Html->css('post/index/main.css') ?>
