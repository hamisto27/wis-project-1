<?php
/* @var $this ChannelController */
/* @var $model Channel */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php
    /* $form=$this->beginWidget('CActiveForm', array(
	'id'=>'channel-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    )); */
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'channel-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'enableAjaxValidation'=>false,
    )); ?>
    <fieldset>
        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model,"Description"); ?>
            <?php // echo $form->textArea($model,'Description', array('rows'=>6, 'cols'=>52)); ?>
            <?php // echo $form->error($model,'Description'); ?>
        </div>
        <?php echo $form->textArea($model,"Description", array("span" => 5, "rows" => 5)); ?>

        <div class="row">
            <?php echo $form->labelEx($model,"Location"); ?>
            <?php //echo $form->textField($model,'latLocation', array('size'=>50,'maxlength'=>50)); ?>
            <?php //echo $form->error($model,'latLocation'); ?>
        </div>
        <?php echo $form->textField($model,"Location", array("size" => TbHtml::INPUT_SIZE_XLARGE)); ?>

        <!--<div class="row buttons">
            <?php //echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </div>-->
        <?php echo TbHtml::formActions(array(
            TbHtml::submitButton($model->isNewRecord ? "Create" : "Save"),
        )); ?>
    </fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->