<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
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
    <?php // Include the client scripts
        $baseUrl = Yii::app()->baseUrl;

        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($baseUrl.'/js/ajaxScript.js');
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

    <!--<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div>--><!-- header -->

    <div id="mainmenu">
        <?php /*$this->widget('zii.widgets.CMenu',array(
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest)
            )
        ));*/ ?>
        <?php $this->widget('bootstrap.widgets.TbNavBar', array(
                'brandLabel'=> CHtml::image("images/logo_mohamed.png", "YouCourse"),
                'display'=>null,
                'items'=>array(
                array(
                    'class'=>'bootstrap.widgets.TbNav',
                    'items'=>array(
                        array('label'=>'Home', 'icon'=>TbHtml::ICON_HOME, 'url'=>array('/site/index')),
                        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                        array('label'=>'Contact', 'url'=>array('/site/contact')),
                        TbHtml::navbarSearchForm(Yii::app()->createUrl('/video/SearchBar'),
                            'post', array('inputOptions' => array('name' => 'Video[Name]',
                            'class' => 'search-query span2',  'placeholder' =>Yii::t('app','Search')))),
                        TbHtml::button('Search', array(
                                'icon'=>TbHtml::ICON_SEARCH))
                    ),
                ),
                array(
                    'class'=>'bootstrap.widgets.TbNav',
                    'htmlOptions'=>array('class'=>'pull-right'),
                    'items'=>array(
                        array('label' => 'Actions','icon'=>TbHtml::ICON_LIST,'visible'=> !Yii::app()->user->isGuest, 'items' => array(
                            array('label'=>Yii::app()->getModule('user')->t("Profile"), 'url'=>Yii::app()->getModule('user')->profileUrl, 'visible'=>!Yii::app()->user->isGuest),
                            TbHtml::menuDivider(),
                            array('label' => 'Channel', 'url' => Yii::app()->baseUrl.'/index.php?r=channel/myChannel&id='.Yii::app()->user->id,'visible'=>!Yii::app()->user->isGuest),
                            array('label' => 'Upload Video', 'url' => '#', 'visible'=>!Yii::app()->user->isGuest),
                            TbHtml::menuDivider(),
                            array('label' => 'My Subscriptions', 'url' => '#','visible'=>!Yii::app()->user->isGuest),
                            array('label' => 'History', 'url' => '#', 'visible'=>!Yii::app()->user->isGuest)),
                            

                        ),
                        array('label'=>'Logout ('.Yii::app()->user->name.')','icon'=>TbHtml::ICON_USER, 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>Yii::app()->getModule('user')->t("Login"), 'icon'=>TbHtml::ICON_USER, 'url'=>Yii::app()->getModule('user')->loginUrl, 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>Yii::app()->getModule('user')->t("Register"), 'url'=>Yii::app()->getModule('user')->registrationUrl, 'visible'=>Yii::app()->user->isGuest),
                    ),
                ),
            ),
        )); ?>
        <!--<a class="brand" href=<?php //echo Yii::app()->baseUrl;?>><?php //echo CHtml::image("images/logo.jpg","You Course"); ?></a>-->
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