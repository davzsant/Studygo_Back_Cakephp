<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Orm\Table;

class PostController extends AppController
{
    public function initialize(): void
    {
        $this->loadComponent('CreatePost');
        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->allowUnauthenticated(['index']);
    }
    public function index()
    {
        $all_posts = $this->getTableLocator()->get('Post')
            ->find('all')->contain(['User' => ['Follower','Followed']])
            ->orderByDesc('Post.created')
            ->limit(10)->toArray();
        $this->set('posts',$all_posts);
    }

    public function add()
    {

        if($this->request->is(['post']))
        {
            $post_data = $this->request->getData();
            $this->CreatePost->create_post($post_data);

        }
        $userId = $this->request->getSession()->read('Auth.User.id');
        $this->set('userId', $userId);

    }

    public function view($id)
    {
        $post = $this->getTableLocator()->get('Post')
            ->find()->contain(['User'])->where(['Post.id' => $id])->first();
        $this->set('post',$post);

        //Verifica se o Usuario é dono do POST
        $userId = $this->request->getSession()->read('Auth.User.id');
        $this->set('is_creator',$post->user->id ===  $userId);
    }


    public function update()
    {

        $dados = $this->request->getData();
        $table_posts = $this->getTableLocator()->get('Post');
        $post = $table_posts->find()
            ->where(['id' => $dados['post_id']])->firstOrFail();

        $post = $table_posts->patchEntity($post,[$dados['field'] => $dados['content']]);
        if(!$table_posts->save($post))
        {
            return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'success' => 0,
                'message' => 'Não foi possivel salvar'
            ]));
        }
        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'success' => 1,
                'message' => $dados['field']." foi salvo com sucesso"
            ]));
    }
}
