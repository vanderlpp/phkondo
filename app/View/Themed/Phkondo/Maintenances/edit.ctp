
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3 hidden-print collapse navbar-collapse phkondo-navbar">

        <div class="actions">

            <ul class="nav nav-pills nav-stacked">
                <li ><?php echo $this->Form->postLink(__('Delete Maintenance'), array('action' => 'delete', $this->Form->value('Maintenance.id')),array('class'=>'btn', 'confirm'=>__('Are you sure you want to delete # %s?', $this->Form->value('Maintenance.title')))); ?></li>
                <li ><?php echo $this->Html->link(__('List Maintenances'), array('action' => 'index'),array('class'=>'btn')); ?></li>
                <li ><?php echo $this->Html->link(__('New Maintenance'), array('action' => 'add'),array('class'=>'btn')); ?> </li>
                <li ><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'entities', 'action' => 'addFromMaintenance', $this->Form->value('Maintenance.id')),array('class'=>'btn')); ?> </li>
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="maintenances form">

            <?php echo $this->Form->create('Maintenance', array(
                'class' => 'form-horizontal', 
                'role' => 'form', 
                'inputDefaults' => array(
                    'class' => 'form-control', 
                    'label' => array(
                        'class' => 'col-sm-2 control-label'), 
                        'between' => '<div class="col-sm-6">', 'after' => '</div>')
                )); ?>
            <fieldset>
                <h2><?php echo __('Edit Maintenance'); ?></h2>
                <?php echo $this->Form->input('id'); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('condo_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('supplier_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
                    <?php echo $this->Form->input('client_number', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
                    <?php echo $this->Form->input('contract_number', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
                    <?php
                    echo $this->Form->input('start_date', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 10,
                        'maxYear' => date('Y') + 50, 'class' => 'form-control'));
                    ?>
                </div><!-- .form-group -->

                <div class="form-group">
                    <?php
                    echo $this->Form->input('renewal_date', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1,
                        'maxYear' => date('Y') + 500, 'class' => 'form-control'));
                    ?>
                </div><!-- .form-group -->

                <div class="form-group">
                    <?php
                    echo $this->Form->input('last_inspection', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 10,
                        'maxYear' => date('Y'), 'class' => 'form-control'));
                    ?>
                </div><!-- .form-group -->

                <div class="form-group">
                    <?php
                    echo $this->Form->input('next_inspection', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1,
                        'maxYear' => date('Y') + 500, 'class' => 'form-control'));
                    ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('comments', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?php echo $this->Form->input('active', array('class' => '', 'label' => __('Active'), 'div' => array('class' => 'checkbox'), 'between' => '', 'after' => '')); ?>
                    </div>
                </div><!-- .form-group -->

            </fieldset>
            <div class="form-group">                 <div class="col-sm-offset-2 col-sm-6">                     <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary pull-right')); ?>                 </div>             </div>
            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->