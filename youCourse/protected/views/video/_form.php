<?php
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

        <div class="row">
            <?php echo $form->labelEx($model,"Name"); ?>
        </div>
        <?php echo $form->textField($model,"Name", array("size" => TbHtml::INPUT_SIZE_XLARGE)); ?>

        <div class="row">
            <?php echo $form->labelEx($model,"Description"); ?>
        </div>
        <?php echo $form->textArea($model,"Description", array("span" => 5, "rows" => 5)); ?>

        <?php  echo TbHtml::formActions(array(
            TbHtml::submitButton($model->isNewRecord ? "Create" : "Save"),
        ));  ?>
    </fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->