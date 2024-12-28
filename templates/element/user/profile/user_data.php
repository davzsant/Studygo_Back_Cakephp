<div class="user_data">
    <div class="user_main_data">
        <?= $this->Html->image($user->imagePath ?? 'empty_user.jpg',['class' => 'user_image']) ?>
        <div class="user_info">
            <?php if($user->id === $userId): ?>
                <div class="user_name">
                    <button class="change_name_btn bi bi-pencil"></button>
                    <h1><?= $user->name ?></h1>
                </div>
                <div class="edit_user_name" style="display: none">
                    <button class="bi bi-check confirm_name_btn"></button>
                    <input type="text" id="name_input" value="<?= $user->name ?>">
                </div>
            <?php else: ?>
                    <h1><?= $user->name ?></h1>
            <?php endif ?>

            <?php if($user->id === $userId): ?>
                <div class="user_username">
                    <button class="change_username_btn bi bi-pencil"></button>
                    <h3><?= $user->username ?></h3>
                </div>
                <div class="edit_user_username" style="display: none">
                    <button class="confirm_username_btn bi bi-check" ></button>
                    <input type="text" id="input_username" value="<?= $user->username ?>">
                </div>
            <?php else: ?>
                    <h3><?= $user->username ?></h3>
            <?php endif ?>
            <div class="user_numbers">
                <p>Followers: <?= count($user->follower) ?></p>
                <p>Followed: <?= count($user->followed) ?></p>
                <p>Posts: <?= count($user->post) ?></p>
            </div>
            <?php if($user->id === $userId): ?>
                <div>
                    <p>Seu perfil!</p>
                </div>
            <?php else: ?>
                <div>
                    <button><i class="bi bi-feather"></i>Acompanhar</button>
                    <button><i class="bi bi-share"></i>Compartilhar</button>
                </div>
            <?php endif ?>

        </div>
    </div>

    <div class="user_description">
        <p>
            <?= $user->description  ?? "Descrição do perfil de usuario" ?>
        </p>
    </div>
</div>

