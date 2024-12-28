<?php


namespace App\Controller\Component;
use Cake\Controller\Component;

class CreatePostComponent extends Component
{
    private $data;
    private $table_post;
    private $post;
    public function create_post($data)
    {
        $this->data = $data;
        $this->validate_data();

    }

    public function validate_data()
    {
        if(empty($this->data))
        {
           debug("Necessario dados");
            return;
        }

        $this->create_post_entity();

    }

    public function create_post_entity()
    {
        $this->table_post = $this->getController()->getTableLocator()->get('Post');
        $this->post = $this->table_post->newEmptyEntity();
        $this->post = $this->table_post->patchEntity($this->post,[
            'title' => $this->data['title'],
            'body' => $this->data['body'],
            'resume' => $this->data['resume'],
            'user_id' => $this->data['user_id']
        ]);


        if(!$this->table_post->save($this->post))
        {
            debug('Não deu certo');
            debug($this->post->getErrors());
            return;
        }

        $this->getController()->redirect(['controller' => 'post','action' => 'index']);
    }
}
