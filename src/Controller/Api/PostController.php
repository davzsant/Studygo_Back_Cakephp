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
        $this->Authentication->addUnauthenticatedActions(['index', 'view']);
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
}
