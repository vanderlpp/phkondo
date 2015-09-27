<div class="login-box">
            <div class="login-logo">
                <a href="/"><b><?php echo Configure::read('Theme.owner_name'); ?>&nbsp;</b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <?php echo $this->Flash->render(); ?>
                <p class="login-box-msg">Sign in to start your session</p>
                <?php echo $this->Form->create('User', array(
                'url'=>array('controller'=>'users','action' => 'login'),
                'role' => 'form',
                )); ?>
                    <div class="form-group has-feedback">
                        <?php echo $this->Form->input('username', array('div'=>null, 'class' => 'form-control','placeholder'=>'username','type'=>'username')); ?>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <?php echo $this->Form->input('password', array('div'=>null,'class' => 'form-control','placeholder'=>'password','type'=>'password')); ?>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                             <?php echo $this->Form->button(__('Sign In'), array('type'=>'submit','class' => 'btn btn-primary btn-block btn-flat')); ?>
                            
                        </div><!-- /.col -->
                    </div>
                <?php echo $this->Form->end(); ?>

                <!--div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
                </div--><!-- /.social-auth-links -->

                <!--a href="#">I forgot my password</a><br>
                <a href="register.html" class="text-center">Register a new membership</a-->

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->