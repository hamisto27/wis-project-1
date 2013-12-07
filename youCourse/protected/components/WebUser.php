<?php
/**
 * Created by PhpStorm.
 * User: Pantoufle
 * Date: 7/12/13
 * Time: 21:54
 */

class WebUser extends CWebUser
{   public function isAdmin(){
            $_user = User::model()->find('LOWER(Name)=?',array(Yii::app()->user->name));

            $file = 'c:\Users\Pantoufle\Documents\mohamed.txt';
            file_put_contents($file, Yii::app()->user->name);
            return true;

    }
}