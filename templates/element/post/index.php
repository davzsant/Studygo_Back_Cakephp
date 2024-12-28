
<div class="post">
    <?= $this->element('post/user_info',['post' => $post]) ?>
    <?= $this->element('post/text_body',['post' => $post]) ?>

    <?php if(!empty($post->question)): ?>
        <?= $this->element('post/questions') ?>
    <?php endif ?>

    <?= $this->element('post/actions') ?>
</div>
