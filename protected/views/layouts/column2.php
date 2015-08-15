<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class='row'>
    <div class="span8">
            <div id="content">
                    <?php echo $content; ?>
            </div><!-- content -->
    </div>

    <div class="span4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Operations</h3>
                </div>
                <div class="panel-body">
                    <?php
                        $this->widget('bootstrap.widgets.TbMenu', array(
                                'type'=>'list', // '', 'tabs', 'pills' (or 'list')
                                'stacked'=>false,
                                'items'=>$this->menu,
                        ));
                    ?>
                </div>
              </div>            
    </div>
</div>

<?php $this->endContent(); ?>