<li title="See all posts of others peoples">
    <?php if(!empty($userId)): ?>
        <?= $this->Html->link('<i class="bi bi-person"></i><p>Profile</p>',['controller' => 'user','action' => 'profile',$userId],['escape' => false]) ?>

    <?php else: ?>
        <?= $this->Html->link('<i class="bi bi-person"></i><p>Login</p>',['controller' => 'user','action' => 'login'],['escape' => false]) ?>
    <?php endif; ?>
</li>

<li title="Logout" >
    <?= $this->Html->link('<i class="bi bi-box-arrow-in-right"></i><p>LogOut</p>',['controller' => 'user','action' => 'logout',$userId],['escape' => false]) ?>
</li>



