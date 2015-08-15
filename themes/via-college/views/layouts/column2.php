<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container page">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span9">
                    <?php echo $content; ?>
                </div>
                <div class="span3 last">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <legend>Operaciones</legend>
                        </div>
                        <div class="panel-body">                 
                            <?php
                            $this->widget('bootstrap.widgets.TbNav', array(
                                'type' => TbHtml::NAV_TYPE_LIST, // '', 'tabs', 'pills' (or 'list')
                                'stacked' => false,
                                'items' => $this->menu,
                                'htmlOptions' => array('class' => 'well'),
                                'encodeLabel' => false,

                            ));
                            ?>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </div>
</div>
    <?php $this->endContent(); ?>