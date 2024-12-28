<?php

namespace App\Model\Validation;

class DadosValidator{
    public function customRule($value,$context){
        echo "VAlidacao karaio";
        return true;
    }
}


?>
