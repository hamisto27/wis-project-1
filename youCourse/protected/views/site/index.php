<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
    <?php /*$this->widget('bootstrap.widgets.TbNav', array(
        'type' => TbHtml::NAV_TYPE_LIST,
        'items' => array(
            array('label' => 'List header'),
            array('label' => 'Home', 'url' => '#', 'active' => true),
            array('label' => 'Library', 'url' => '#'),
            array('label' => 'Applications', 'url' => '#'),
            array('label' => 'Another list header'),
            array('label' => 'Profile', 'url' => '#'),
            array('label' => 'Settings', 'url' => '#'),
            TbHtml::menuDivider(),
            array('label' => 'Help', 'url' => '#'),
        )
    ));*/
    ?>

    <?php
    $this->widget('application.extensions.gmap.GMap', array(
        'id' => 'gmap',//id of the <div> container created
        'key' => 'AIzaSyDQZz8Dkue5YeD8CTt5V63_gGevsduHJ2E', //goole API key, should be obtained for each site,it's free
        'label' => 'place', //text written in the text bubble
        'address' => array(
            'address' => '1600 Amphitheatre Pky',//address of the place
            'city' => 'Mountain View', //city
            //'state' => 'CA',//state
            //'country' => 'USA'  - country
            //'zip' => 'XXXXX' - zip or postal code
        )
    ));


    $this->widget('ext.Yiippod.Yiippod', array(
        'video'=>"http://www.youtube.com/watch?v=qD2olIdUGd8",
        'id' => 'yiippodplayer',
        'width'=>640,
        'height'=>480,
        'bgcolor'=>'#000'
    ));

     $videourl = 'http://fr.slideshare.net/signer/html5-and-the-open-web-platform';

    $json = @file_get_contents('http://www.slideshare.net/api/oembed/2?url='.urlencode($videourl).'&format=json');
    $decode = json_decode($json, true);
    //http://www.slideshare.net/api/oembed/2?url=http://www.slideshare.net/haraldf/business-quotes-for-2011&format=json
    if ($decode == null || !$decode) {
        $error = true;
        //error control here
    } else {
        $thumb = $decode['thumbnail'];
        $html = $decode['html'];
        echo $html;
    }

    ?>
    <h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

    <p>Congratulations! You have successfully created your Yii application.</p>

    <p>You may change the content of this page by modifying the following two files:</p>
    <ul>
        <li>View file: <code><?php echo __FILE__; ?></code></li>
        <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
    </ul>

    <p>For more details on how to further develop this application, please read
    the <a href="http://www.yiiframework.com/doc/">documentation</a>.
    Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
    should you have any questions.</p>

