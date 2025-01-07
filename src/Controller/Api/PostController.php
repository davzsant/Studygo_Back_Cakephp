<?php

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Http\Response;
use Cake\View\JsonView;

class PostController extends AppController

{

    public function viewClasses(): array
    {
        return [JsonView::class];

    }
    public function initialize(): void
    {
        parent::initialize();
        $this->response = $this->response->withType('json');
    }
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['index']);
    }
    /**
     * Retorna Posts para o usuario visualizar
     * @return void
     */
    public function index(): Response
    {
        $all_posts = $this->getTableLocator()->get('Post')
        ->find('all')->contain(['User' => ['Follower','Followed']])
        ->orderByDesc('Post.created')
        ->limit(10)->toArray();

        return $this->response
        ->withType('application/json')
        ->withStringBody(json_encode([
            'success' => 1,
            'data' => $all_posts
        ]));

    }

    public function view($id)
    {
        $post = $this->getTableLocator()->get('Post')
            ->find('all')->where(['Post.id' => $id])
            ->contain(['User' => ['Follower','Followed']])->first();

            return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'success' => true,
                'data' => $post
            ]));
    }

    public function add()
    {
        $this->request->allowMethod(['POST','OPTIONS']);

        $data = $this->request->getData();
        $post_table = $this->getTableLocator()->get('post');
        $post = $post_table->newEmptyEntity();
        $post = $post_table->patchEntity($post,$data);
        if(!$post_table->save($post))
        {
            $errors = $post->getErrors();

            // Transformar os erros em uma única string
            $errorMessages = [];
            foreach ($errors as $field => $fieldErrors) {
                foreach ($fieldErrors as $error) {
                    $errorMessages[] = ucfirst($field) . ': ' . $error;
                }
            }

            // Juntar os erros em uma única string
            $allErrors = implode('; ', $errorMessages);
            return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'success' => false,
                'message' => $allErrors
            ]));
        }

        return $this->response
            ->withType('application/json')
            ->withStatus(201)
            ->withStringBody(json_encode([
                'success' => true,
                'message' => "Post criado com sucesso"
            ]));
    }
}
