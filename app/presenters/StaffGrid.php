<?php

namespace App\Presenters;

use \NiftyGrid\Grid,\App\Model;

class StaffGrid extends Grid{

    protected $articles;
    protected $context;

    public function __construct($articles,$context)
    {
        parent::__construct();
        $this->articles = $articles;
        $this->context = $context;
    }

    protected function configure($presenter)
    {
        //Vytvoříme si zdroj dat pro Grid
        //Při výběru dat vždy vybereme id
        $source = new \NiftyGrid\DataSource\NDataSource($this->articles->select('id,name,surname,position,salary,start_date'));
        //Předáme zdroj
        $this->setDataSource($source);
        $this->addColumn('name', 'Jméno')->setTextEditable()->setTextFilter()->setAutocomplete(10);
        $this->addColumn('surname', 'Příjmení')->setTextEditable()->setTextFilter()->setAutocomplete(10);
        $this->addColumn('position', 'Pozice')->setTextEditable();
        $this->addColumn('salary', 'Plat')->setTextEditable();
        $this->addColumn('start_date', 'Datum nástupu')->setDateEditable()->setRenderer(function($row){return date('j. n. Y', strtotime($row['start_date']));});
        $this->addButton(Grid::ROW_FORM, "Editovat")->setClass("btn btn-small btn-success")->setText('<i class="glyphicon glyphicon-edit"></i>');
        $this->addButton("delete", "Smazat")->setClass("btn btn-small btn-danger")->setLink(function($row) use ($presenter){return $presenter->link("homepage:delete", $row['id']);})->setText('<i class="glyphicon glyphicon-trash"></i>')->setConfirmationDialog(function($row){return "Určitě chcete odstranit zaměstanance $row[name] $row[surname]?";})->setAjax(FALSE);
        $this->setRowFormCallback(function($values){
            $this->context->staff->updateStaff($values,$values['id']);
        });
    }

    public function actionDelete($id){
        $this->context->staff->deleteStaff($id);
        $this->context->setRender('default');
    }

}