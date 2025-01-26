<?php

namespace App\Controller\Api;
use App\Controller\AppController;
use Cake\I18n\FrozenTime;
use Exception;
use Firebase\JWT\JWT;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Event\EventInterface;
use Cake\Mailer\Mailer;

class UserController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login','sendTestEmail','verifyCode']);
    }
    public function login()
    {
        $data = $this->request->getData();

        if(empty($data))
        {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode([
                    'success' => false,
                    'message' => 'É necessario enviar Email/Username e Senha para fazer o Login'
                ]));
        }

        $user = $this->getTableLocator()->get('User')->find()
            ->where([
                'OR' => ['email' => $data['userData'], 'username' => $data['userData']]
            ])->first();

        //Verifica se o Usuario existe
        if(empty($user))
        {
            return $this->response
                ->withType('application/json')
                ->withStatus(404)
                ->withStringBody(json_encode([
                    'success' => false,
                    'message' => 'Usuario não encontrado'
                ]));
        }

        //Verifica se a senha esta de acordo com a informada
        $hash = new DefaultPasswordHasher();
        if(!$hash->check($data['password'],$user->password))
        {
            return $this->response
                ->withType('application/json')
                ->withStatus(401)
                ->withStringBody(json_encode([
                    'success' => false,
                    'message' => 'Senha Incorreta'
                ]));
        }

        $issuedAt = time();
        $expirationTime = $issuedAt + 7776000; //Expira em 90 dias
        $payload = [
            'iat' => $issuedAt,
            'exp' => $expirationTime,
            'sub' => $user->id,
            'username' => $user->username
        ];

        $jwt = JWT::encode($payload,Configure::read('Security.jwtKey'), 'HS256');

        if($user->two_steps === 1)
        {
            if(!$this->sendCode($user)){
                return $this->response
                ->withType('application/json')
                ->withStatus(400)
                ->withStringBody(json_encode([
                    'success' => false,
                    'message' => 'Problema no envio do Codigo',
                ]));
            }
            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode([
                    'success' => true,
                    'message' => 'Codigo enviado',
                    'nextStep' => true,
                    'userId' => $user->id
                ]));
        }

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode([
                'success' => true,
                'message' => 'Login Bem Sucedido',
                'user_id' => $user->id,
                'token' => $jwt
            ]));
    }

    private function sendCode($user)
    {
        $code_number = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $mailer = new Mailer();
        $mailer
            ->setTo($user->email)
            ->setSubject('Código de Verificação')
            ->setEmailFormat('html') // Pode ser 'text' ou 'html'
            ->setViewVars(['user' => $user,'code' => $code_number])
            ->viewBuilder()
                ->setTemplate('code')
                ->setLayout('default');

        $now = FrozenTime::now();
        $code_table = $this->getTableLocator()->get('code');
        $code = $code_table->newEmptyEntity();
        $code = $code_table->patchEntity($code,[
            'user_id' => $user->id,
            'code' => $code_number,
            'created' => $now,
            'expires'=> $now->addMinutes(10),
        ]);

        if(!$code_table->save($code))
        {
            debug($code);
            return false;
        }

        $mailer->deliver();
        return true;
    }

    public function verifyCode()
    {
        try{

            $data = (object)$this->request->getData();

            if(empty($data))
            {
                return $this->response
                ->withType('application/json')
                ->withStatus(400)
                ->withStringBody(json_encode([
                    'sucess' => false,
                    'message' => 'É Necessario enviar dados de autenticacao',
                ]));
            }
            $user = $this->getTableLocator()->get('user')->find()->where(['User.id' => $data->user_id])->first();
            $code_table = $this->getTableLocator()->get('code');
            $code = $code_table->find()
                ->where(['user_id' => $data->user_id,'expires >' => FrozenTime::now()])->orderByDesc('created')->first();

            if(empty($code))
            {
                return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode([
                    'sucess' => false,
                    'message' => 'Nenhum token valido informado',
                ]));
            }

            if($code->code !== $data->user_code)
            {
                return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode([
                    'sucess' => false,
                    'message' => 'Codigo Invalido',
                ]));
            }

            $issuedAt = time();
            $expirationTime = $issuedAt + 7776000; //Expira em 90 dias
            $payload = [
                'iat' => $issuedAt,
                'exp' => $expirationTime,
                'sub' => $user->id,
                'username' => $user->username
            ];

            $jwt = JWT::encode($payload,Configure::read('Security.jwtKey'), 'HS256');

            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode([
                    'success' => true,
                    'message' => 'Autenticado',
                    'token' => $jwt,
                    'user_id' => $user->id,
                ]));
        }catch(Exception $error)
        {
            return $this->response
            ->withType('application/json')
            ->withStatus(500)
            ->withStringBody(json_encode([
                'success' => false,
                'message' => "Houve um problema interno:".$error->getMessage(),
            ]));
        }
    }


    public function getUser($id)
    {
        $user = $this->getTableLocator()->get('User')->find()->where(['User.id' => $id])->first();

        if(empty($user))
        {
            return $this->response
            ->withType('application/json')
            ->withStatus(404)
            ->withStringBody(json_encode([
                'sucess' => true,
                'message' => 'Não foi possivel obter usuario',
                'data' => null
            ]));
        }
        return $this->response
            ->withType('application/json')
            ->withStatus(201)
            ->withStringBody(json_encode([
                'sucess' => true,
                'message' => 'Usuario Obtido',
                'data' => $user
            ]));
    }

}
