<!------------------------------>
<!--Footer---------------->
<!------------------------------>
<div class="block-44">
    <hr class="block-44__divider">
    <div class="container">
        <div class="row flex-column flex-md-row px-2 justify-content-center">
            <?php if(isset($__site_details['follow_us']) && !empty($__site_details['follow_us'])): ?>
                <div class="flex-grow-1 col">
                    <ul class="block-44__extra-links d-flex list-unstyled p-0">
                        <?php $__currentLoopData = $__site_details['follow_us']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $follow_us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key == 'facebook' && !empty($follow_us)): ?>
                                <li class="mx-2">
                                    <a href="<?php echo e($follow_us??'#', false); ?>" target="_blank" title="Facebook" class="block-44__link m-0">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($key == 'instagram' && !empty($follow_us)): ?>
                                <li class="mx-2">
                                    <a href="<?php echo e($follow_us??'#', false); ?>" target="_blank" title="Instagram" class="block-44__link m-0">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($key == 'twitter' && !empty($follow_us)): ?>
                                <li class="mx-2">
                                    <a href="<?php echo e($follow_us??'#', false); ?>" target="_blank" title="Twitter" class="block-44__link m-0">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($key == 'linkedin' && !empty($follow_us)): ?>
                                <li class="mx-2">
                                    <a href="<?php echo e($follow_us??'#', false); ?>" target="_blank" title="Linkedin" class="block-44__link m-0">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($key == 'youtube' && !empty($follow_us)): ?>
                                <li class="mx-2">
                                    <a href="<?php echo e($follow_us??'#', false); ?>" target="_blank" title="YouTube" class="block-44__link m-0">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <p class="block-41__copyrights col col-md-8 text-xxl-end text-xl-end text-lg-end text-md-end text-sm-center">
                &copy; &nbsp;<?php echo e(date('Y'), false); ?> &nbsp;<?php echo e(config('app.name', 'ultimatePOS'), false); ?>. &nbsp;All Rights Reserved.
            </p>
        </div>
    </div>
  </div>
<?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/frontend/layouts/footer.blade.php ENDPATH**/ ?>