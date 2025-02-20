<?php $__env->startSection('title', 'Installation/Update'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <br/><br/>

            <div class="box box-primary active">
                <!-- /.box-header -->
                <div class="box-body">

              <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <?php echo session('error'); ?>

                </div>
              <?php endif; ?>

              <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                  <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error, false); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              <?php endif; ?>

              <form class="form" id="details_form" method="post" 
                      action="<?php echo e($action_url, false); ?>">
                    <?php echo e(csrf_field(), false); ?>


                    <h2> License Details - <code><?php echo e($module_display_name, false); ?> Module</code><br/><small class="text-danger"> Make sure to provide correct licensing information</small></h2>
                    <hr/>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="license_code">License Code:*</label>
                            <input type="text" name="license_code" required class="form-control" id="license_code">

                            <?php if($intruction_type == 'uf'): ?>
                                <p class="help-block"><a href="https://ultimatefosters.com/docs/ultimate-fosters-shop/license-key/#Getting-License-Details-for-products-purchased-from-ultimatefosterscom" target="_blank">Where is my License Key?</a></p>
                            <?php endif; ?>

                            <?php if($intruction_type == 'cc'): ?>
                                <p class="help-block"><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-#:~:text=Hover%20the%20mouse%20over%20your,as%20PDF%20or%20text%20file)." target="_blank">Where is my License Key?</a></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="login_username">Login Username:*</label>
                            <input type="text" name="login_username" required class="form-control" id="login_username">

                            <?php if($intruction_type == 'uf'): ?>
                                <p class="help-block"><a href="https://ultimatefosters.com/docs/ultimate-fosters-shop/user-name/#Steps-to-get-your-username-for-all-products-purchased-from-UltimateFosters" target="_blank" class="text-success">Where is my Username?</a></p>
                            <?php endif; ?>

                            <?php if($intruction_type == 'cc'): ?>
                                <p class="help-block">Enter the username that you use for codecanyon or envato login</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="envato_email">Your Email:</label>
                          <input type="email" name="ENVATO_EMAIL" class="form-control" id="envato_email" placeholder="optional">
                          <p class="help-block">For Newsletter & support</p>
                        </div>
                    </div>

                    <?php if($intruction_type == 'cc'): ?>
                        <?php echo $__env->make('install.partials.e_license', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    <div class="col-md-12">
                        <button type="submit" id="install_button" class="btn btn-primary pull-right">I Agree, SUBMIT</button>
                    </div>
              </form>
            </div>
          <!-- /.box-body -->
          </div>

            
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('form#details_form').submit(function(){
        $('button#install_button').attr('disabled', true).text('Installing...');
        $('div.install_msg').removeClass('hide');
        $('.back_button').hide();
      });
    })
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.install', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/install/install-module.blade.php ENDPATH**/ ?>