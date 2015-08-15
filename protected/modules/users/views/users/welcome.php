<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<?php if(Yii::app()->user->hasFlash('profile-flash')){ ?>
    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('profile-flash')); ?>
<?php } ?>