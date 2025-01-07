<?php

namespace App\Controller\Api;
use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\View\JsonView;

class RequestController extends AppController
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
        $this->Authentication->addUnauthenticatedActions(['getCsrfToken']);
    }
    public function getCsrfToken()
    {
        $csrfToken = $this->request->getAttribute('csrfToken');
        return $this->response->withType('application/json')
            ->withStringBody(json_encode(['csrfToken' => $csrfToken]));
    }
}
