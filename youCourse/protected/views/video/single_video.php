<?php
/**
 * Created by PhpStorm.
 * User: mohamed chajii
 * Date: 14/12/13
 * Time: 20:30
 */

/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="view">
    <?php
        $this->widget('ext.Yiippod.Yiippod', array(
            'video'=> $model->content,
            'id' => 'yiippodplayer',
            'width'=>580,
            'height'=>430,
            'bgcolor'=>'#000'
        ));
    ?>
</div>