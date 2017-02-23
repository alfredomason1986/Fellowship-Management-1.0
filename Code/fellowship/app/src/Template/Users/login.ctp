<!-- File: src/Template/Users/login.ctp -->

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <?= $this->Flash->render('auth') ?>
                    <?= $this->Form->create('form', array('role' => 'form'))?>
                        <fieldset>
                            <div class="form-group">
                                <?= $this->Form->input('username', array('label' => false, 'placeholder'=>'Username', 'class'=>'form-control', 'autofocus')); ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('password', array('label' => false, 'placeholder'=>'Password', 'class'=>'form-control')) ?>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <?= $this->Form->button(__('Login'), array('class'=>'btn btn-lg btn-success btn-block')); ?>
                        </fieldset>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>