<?php

namespace App\Presenters;

use Nette,
    App\Model,
    Nette\Application\UI\Form;

class StaffPresenter extends BasePresenter {

    public function actionDefault(){
        $this->template->staff = $this->context->staff->selectStaff(array('id'=>1));
    }

    public function renderDefault(){
        
    }

}
