<?php

namespace App\Presenters;

use Nette,
	App\Model,
        Nette\Application\UI\Form;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	public function renderDefault(){
		$this->template->anyVariable = 'any value';
	}

        protected function createComponentStaffGrid(){
            return new StaffGrid($this->context->staff->selectStaff(array()),$this->context);
        }

        public function actionDelete($id){
            //$this->setView('default');
            $this->context->staff->deleteStaff(array('id'=>$id));
            $this->redirect('default');
        }

        public function createComponentCreateStaff(){
            $form = new Form;
            $form->addText('name','Jméno')->addRule(FORM::FILLED,'Vyplňte prosím jméno.');
            $form->addText('surname','Příjmení')->addRule(FORM::FILLED,'Vyplňte prosím příjmení.');
            $form->addText('position','Pozice')->addRule(FORM::FILLED,'Vyplňte prosím pozici.');
            $form->addText('salary','Plat')->addRule(FORM::FILLED,'Vyplňte prosím plat.')->addRule(FORM::INTEGER,'Plat můsí být celé číslo.');
            $form->addText('start_date','Datum nástupu')->addRule(FORM::FILLED,'Vyplňte prosím datum nástupu.');
            $form->addSubmit('send','Vložit');
            $form->onSuccess[] = callback($this,'submittedCreateStaff');
            return $form;
        }

        public function submittedCreateStaff(Form $form){
            $values = $form->getValues();
            $this->context->staff->insertStaff($values);
            $this->flashMessage('Zaměstnanec by úspěšně vložen','success');
            $this->redirect('default');
        }
}
