<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<script>
    $(document).ready(function() {

        // page is now ready, initialize the calendar...

        $('#calendar').fullCalendar({
            // put your options and callbacks here
        })

    });
</script>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->
    <?php Yii::app()->bootstrap->register(); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <!-- calendar -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fullcalendar.css"/>
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/fullcalendar.js'></script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id='calendar'></div>

<div class="container" id="page">

    <!--<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div>--><!-- header -->


    <div id="mainmenu">
        <?php $this->widget('zii.widgets.CMenu',array(
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'Calendar', 'url'=>array('/site/page', 'view'=>'calendar')),
                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest)
            )
        )); ?>
        <a class="brand" href=<?php echo Yii::app()->baseUrl;?>><?php echo CHtml::image("images/logo.jpg","You Course"); ?></a>
    </div><!-- mainmenu -->
    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
    <?php endif?>

    <?php echo $content; ?>

    <div class="clear"></div>
    <div id="footer">
        Copyright &copy; <?php echo date('Y'); ?> by Mohamed Chajii, Aurelien Plisnier, Jorge Garcia Ximenez.<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
    </div><!-- footer -->

</div><!-- page -->

</body>
</html>