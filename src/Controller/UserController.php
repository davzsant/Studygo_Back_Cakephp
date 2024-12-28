<?php
declare(strict_types=1);

namespace App\Controller;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Orm\Table;
use Exception;

class UserController extends AppController
{
    public function initialize(): void
    {
        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->allowUnauthenticated(['login','register','forget']);
    }
    public function index()
    {

    }

    public function profile($id)
    {
        try{
            $user = $this->getTableLocator()->get('User')
                ->find()->contain(['Post','Follower','Followed'])->where(['User.id' => $id])->firstOrFail();

            $this->set('user',$user);

            $userId = $this->request->getSession()->read('Auth.User.id');
            $this->set('userId', $userId);
        }
        catch(Exception $error)
        {
            debug("Erro ao buscar usuario, este é inexistente");
        }
    }

    public function login()
    {

        $result = $this->Authentication->getResult();
        if($result->isValid())
        {
            $user = $this->Authentication->getIdentity();
            $target = $this->Authentication->getLoginRedirect() ?? '/home';
            $this->getRequest()->getSession()->write('Auth.User', $user);
            return $this->redirect($target);
        }
        if($this->request->is('post'))
        {
            debug($result);
            debug("Erro");
        }
        $this->viewBuilder()->setLayout('blank');
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'User','action' => 'login']);
    }

    public function register()
    {
        if($this->request->is('post'))
        {
            $data = $this->request->getData();
            $userTable = $this->getTableLocator()->get('User');
            $new_user = $userTable->newEmptyEntity();
            $data['username'] = $data['name'];

            $hasher = new DefaultPasswordHasher();
            $data['password'] = $hasher->hash($data['password']);

            $new_user = $userTable->patchEntity($new_user,$data);
            if ($userTable->save($new_user)) {
                return $this->redirect(['controller'=> 'User','action' => 'login']);
            } else {
                debug($new_user->getErrors());
                debug("Erro no casdastro");
            }
        }
    }

    public function forget()
    {
        die();
    }
}
