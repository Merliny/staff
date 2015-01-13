<?php

namespace App;

use Nette;

class StaffRepository extends Repository
{

    public function selectStaff($where){
        return $this->getTable()->where($where);
    }

    public function insertStaff($insert){
        return $this->getTable()->insert($insert);
    }

    public function updateStaff($update,$id){
        return $this->getTable()->where(array('id'=>$id))->update($update);
    }

    public function deleteStaff($where){
        return $this->getTable()->where($where)->delete();
    }

}