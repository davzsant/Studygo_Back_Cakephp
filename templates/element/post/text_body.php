<div class="text_body">
    <?= $this->Html->link("<h2>$post->title</h2>",[
            'controller' => 'post','action' => 'view',$post->id
    ],['escape' => false]) ?>
    <p><?=
        $post->body ?? 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. At expedita soluta mollitia quae suscipit quis rerum voluptatum corporis debitis fugiat! Amet nostrum accusantium cupiditate tempora totam quidem ea possimus officia.'
    ?></p>
</div>
