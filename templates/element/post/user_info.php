
<div class="user_info">
    <?= $this->Html->image(
        $post->user->imagePath ?? 'empty_user.jpg',
        ['class'=> 'user_post_image']
    ) ?>
    <div class="post_details">
        <a href="/user/profile/<?= $post->user->id ?>">
            <div class="user_name"><?= $post->user->username ?? 'John Doe' ?></div>
        </a>
        <div class="post_time"><?= $post->created ?
            $this->Utils->transform_post_date($post->created) : ''?>
        </div>
    </div>

    <div class="follower_actions">
        <button class="more_actions" value="<?=  $post->user->id  ?>"><i class="bi bi-three-dots-vertical"></i></button>
        <?php if(true): ?>
            <button class="btn_follow" value="<?= $post->user->id ?>"><i class="bi bi-person-add"></i></button>
        <?php elseif($post->follower->relation === 2 ?? false): ?>
            <button class="btn_unfollow" value="<?= $post->user->id ?>"><i class="bi bi-person-fill-check"></i></button>
        <?php elseif($post->relation->relation === 3 ?? false): ?>
            <button class="btn_my_post"><i class="bi bi-person-workspace"></i></button>
        <?php endif ?>
    </div>
</div>
