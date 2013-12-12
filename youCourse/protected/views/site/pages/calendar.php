<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name. ' - Calendar';
?>

<!DOCTYPE html>
<html>
<head>

    <title>Calendar</title>



    <script>$(document).ready(function() {

// page is now ready, initialize the calendar...

            $('#calendar').fullCalendar({
// put your options and callbacks here
            })

        });</script>
</head>

<div id='calendar'></div>

