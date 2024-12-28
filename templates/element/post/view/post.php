<div class="post">
    <div class="title_container">
        <?= $this->element('post/user_info') ?>
        <?php if($is_creator): ?>
            <div class="main_title creator_view">
                <button class="edit_btn show_edit_title">
                    <i class="bi bi-pen"></i>
                </button>
                <h1><?= $post->title ?></h1>
            </div>
            <div class="edit_title">
                <button class="confirm_btn new_title">
                    <i class="bi bi-check"></i>
                </button>
                <input type="hidden" id="old_title" value="<?= $post->title ?>">
                <input type="text" placeholder="title" value="<?= $post->title ?>">
            </div>
        <?php else: ?>
            <h1><?= $post->title ?></h1>
        <?php endif ?>
    </div>

    <div class="resume_container">
        <?php if($is_creator): ?>
            <div class="main_resume">
                <button class="edit_btn show_edit_resume">
                    <i class="bi bi-pen"></i>
                </button>
                <p><?= $post->resume ?? "Resumo de toda a obra veyr" ?></p>
            </div>
            <div class="edit_resume">
                <button class="confirm_btn new_resume">
                    <i class="bi bi-check"></i>
                </button>
                <input type="hidden" id="old_resume" value="<?= $post->resume ?>">
                <input type="text" placeholder="resume" value="<?= $post->resume ?? "Resumo de toda obra aqui manowwwwwwwwww" ?>">
            </div>
        <?php else: ?>
            <p><?= $post->resume ?? "Resumo de toda a obra veyr" ?></p>
        <?php endif ?>

    </div>

    <div class="body_container">
        <?php if($is_creator): ?>
            <div class="main_body">
                <p><?= $post->body ?></p>
                <button class="edit_btn show_edit_body">
                    Editar  <i class="bi bi-pen"></i>
                </button>
            </div>
            <div class="edit_body">
                <input type="hidden" id="old_body" value="<?= $post->body ?>">
                <textarea placeholder="texto"><?= $post->body ?></textarea>
                <button class="confirm_btn new_body">
                    Atualizar<i class="bi bi-check"></i>
                </button>
            </div>
        <?php else: ?>
            <p><?= $post->body ?></p>
        <?php endif ?>

    </div>
</div>
