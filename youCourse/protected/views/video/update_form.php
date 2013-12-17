<?php
/**
 * Created by PhpStorm.
 * User: mohamed chajii
 * Date: 17/12/13
 * Time: 04:38
 /
 *
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget("bootstrap.widgets.TbActiveForm", array(
        "id"=>"video-form",
        "layout" => TbHtml::FORM_LAYOUT_HORIZONTAL,
        "enableAjaxValidation"=>true,
    )); ?>
    <fieldset>
        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model,"Content"); ?>
        </div>
        <?php echo $form->textField($model,"Content", array("size" => TbHtml::INPUT_SIZE_XLARGE)); ?>
        <span id="help-content" class="help-inline" style="color:#b94a48; display:none;">Invalid youtube or vimeo URL!</span>

        <div class="row">
            <?php echo $form->labelEx($model,"Name"); ?>
        </div>
        <?php echo $form->textField($model,"Name", array("size" => TbHtml::INPUT_SIZE_XLARGE)); ?>

        <div class="row">
            <?php echo $form->labelEx($model,"slideshare"); ?>
        </div>
        <?php echo $form->textField($model,"slideshare", array("size" => TbHtml::INPUT_SIZE_XLARGE)); ?>
        <span id="help-slideshare" class="help-inline" style="color:#b94a48; display:none;">Invalid slideshare URL format!</span>

        <div class="row">
            <?php echo $form->labelEx($model,"Description"); ?>
        </div>
        <?php echo $form->textArea($model,"Description", array("span" => 5, "rows" => 5)); ?>

        <?php echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? "Create" : "Save"),
        ));  ?>
        <?php //echo TbHtml::Button('Submit',array('onclick'=>'send();')); ?>
    </fieldset>

    <?php $this->endWidget(); ?>

</div><!-- form -->