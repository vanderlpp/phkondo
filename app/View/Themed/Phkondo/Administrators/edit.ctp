
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3 hidden-print collapse navbar-collapse phkondo-navbar">

        <div class="actions">

            <ul class="nav nav-pills nav-stacked">
                <li ><?php echo $this->Html->link(__('View %s', __('Administrator')), array('action' => 'view', $this->Form->value('Administrator.id')), array('class' => 'btn ')); ?> </li>
                <li ><?php echo $this->Form->postLink(__('Delete Administrator'), array('action' => 'delete', $this->Form->value('Administrator.id')), array('class' => 'btn', 'confirm' => __('Are you sure you want to remove # %s?', $this->Form->value('Entity.name')))); ?></li>
                <li ><?php echo $this->Html->link(__('List Administrators'), array('action' => 'index'), array('class' => 'btn')); ?></li>

            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="administrators form">

            <?php
            echo $this->Form->create('Administrator', array(
                'class' => 'form-horizontal',
                'role' => 'form',
                'inputDefaults' => array(
                    'class' => 'form-control',
                    'label' => array('class' => 'col-sm-2 control-label'),
                    'between' => '<div class="col-sm-6">',
                    'after' => '</div>')
                    )
            );
            ?>
            <fieldset>
                <h2><?php echo __('Edit Administrator'); ?></h2>
                    <?php echo $this->Form->input('id'); ?>
                <div class="form-group">
<?php echo $this->Form->input('condo_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('entity_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('fiscal_year_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('functions', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

            </fieldset>
            <div class="form-group">                 <div class="col-sm-offset-2 col-sm-6">                     <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary pull-right')); ?>                 </div>             </div>
<?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->