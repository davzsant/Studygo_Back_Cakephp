<div class="questions">
    <h3>Do Questions to Pratic!!</h3>
    <p class="question_level">Easy</p>
    <p >Questions:<?= /*count($post->question->questions)*/ 3 ?></p></p>
    <?= $this->Html->link('Make Question!',['controller' => 'question','action' => 'view',$post->question->id ?? 3]) ?>
</div>
