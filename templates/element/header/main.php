<header>
    <h1>Developer Planner</h1>

    <nav>
        <ul>
            <li title="Home Page">
                <?= $this->Html->link('<i class="bi bi-house"></i><p>Home</p>',['controller' => 'home','action' => 'index'],['escape' => false]) ?>
            </li>
            <li title="Create Posts">
                <?= $this->Html->link('<i class="bi bi-patch-plus"></i><p>Create!</p>',['controller' => 'post','action' => 'add'],['escape' => false]) ?>
            </li>
            <li title="See all posts of others peoples">
                <?= $this->Html->link('<i class="bi bi-compass"></i><p>Explore</p>',['controller' => 'post','action' => 'index'],['escape' => false]) ?>
            </li>
            <?= $this->cell('UserStats') ?>

        </ul>
    </nav>
</header>
