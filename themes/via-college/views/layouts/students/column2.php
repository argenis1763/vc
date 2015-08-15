<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span3 last">
              <div class="panel panel-default">
                <div class="panel-heading">
                    <legend>Operaciones</legend>
                </div>
                <div class="panel-body">
                    <?php
                        $this->widget('bootstrap.widgets.TbMenu', array(
                                'type'=>'list', // '', 'tabs', 'pills' (or 'list')
                                'stacked'=>false,
                                'items'=>$this->menu,
                                'htmlOptions'=>array('class'=>'well'),
                        ));
                    ?>
                </div>
              </div>            
    </div>
</div>
<?php $this->endContent(); ?>