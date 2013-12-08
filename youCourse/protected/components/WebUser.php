<?php
/**
 * Created by PhpStorm.
 * User: Pantoufle
 * Date: 7/12/13
 * Time: 21:54
 */

class WebUser extends CWebUser
{
    private $_userTable = array
    (
        0=>'Normal',
        1=>'Admin'
    );


    protected $_model;

    function isAdmin()
    {
        //Access this via Yii::app()->user->isAdmin()

        return (Yii::app()->user->isGuest) ? FALSE : $this->level == 1;
    }
    public function getUserLevelsList()
    {
        //Access this via Yii::app()->user->getUserLevelList()

        return $this->_userTable;
    }
}