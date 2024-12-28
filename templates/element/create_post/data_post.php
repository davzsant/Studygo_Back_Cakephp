<div class="create_post_data">
    <div class="post_title">
        <input required type="text" id="title" name="title">
        <label for="title">Titulo</label>
        <p class="message_error" id="title_error"></p>
    </div>
    <div class="post_resume">
        <textarea required id="resume" name="resume"></textarea>
        <label for="resume">Resumo</label>
        <p class="message_error" id="resume_error"></p>
    </div>
    <div class="post_body">
        <textarea required id="body" name="body"></textarea>
        <label for="body">Descrição</label>
        <p class="message_error" id="body_error"></p>
    </div>
</div>

<?= $this->Html->script(['post/validacao_campos']) ?>
