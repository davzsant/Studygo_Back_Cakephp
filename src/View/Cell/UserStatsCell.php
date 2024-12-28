<?php
namespace App\View\Cell;

use Cake\View\Cell;

class UserStatsCell extends Cell
{
    public function display()
    {
        // Obtenha o usuário autenticado através do Authentication Component
        $userId = $this->request->getSession()->read('Auth.User.id');
        $this->set('userId', $userId);
    }
}
