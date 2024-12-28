<div class="user_posts">
    <ul class="user_texts_posts">
        <h1>Obras Escritas</h1>
        <?php if(!empty($user->post)): ?>
            <?php foreach($user->post as $user_post): ?>
                <?php if(true): ?>
                    <li class="user_text">
                        <div class="post_title">
                            <button>></button>
                            <?= $this->Html->link(
                                $user_post->title,
                                ['controller' => 'post','action' => 'view',$user_post->id]
                            ) ?>
                        </div>
                        <div class="resume">
                            <?= $user_post->resume ?? "Resumo ou topico principal" ?>
                        </div>
                    </li>
                <?php endif ?>
            <?php endforeach ?>

        <?php else: ?>
                <p>Este usuario nao possui postagens</p>
        <?php endif ?>

    </ul>
</div>

<?= $this->Html->script(['user/profile/show_resumes']) ?>
