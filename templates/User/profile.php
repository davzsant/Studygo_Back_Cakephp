<div class="main_profile">
    <div class="user_profile">
        <?= $this->element('user/profile/user_data') ?>
        <?= $this->element('user/profile/post_wall') ?>
    </div>
    <div class="user_posts">
        <?= $this->element('user/profile/user_text_posts') ?>
    </div>
</div>

<?= $this->Html->css('user/profile/main') ?>
<?= $this->Html->script('user/profile/edit_userdata') ?>
