
<?php $__env->startSection('title', 'Contact us'); ?>
<?php
    $navbar_btn['text'] = 'Try For Free';
    $navbar_btn['link'] = route('business.getRegister');
    if(isset($__site_details['btns']) && isset($__site_details['btns']['navbar']) && !empty($__site_details['btns']['navbar']['text'])) {
        $navbar_btn['text'] = $__site_details['btns']['navbar']['text'] ?? 'Try For Free';
    }
    if(isset($__site_details['btns']) && isset($__site_details['btns']['navbar']) && !empty($__site_details['btns']['navbar']['link'])) {
        $navbar_btn['link'] = $__site_details['btns']['navbar']['link'] ?? route('business.getRegister');
    }
?>
<?php if ($__env->exists('cms::frontend.layouts.header')) echo $__env->make('cms::frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e($page->meta_description, false); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
    .error{
        color: #e55151 !important;
        margin-bottom: 0.5rem;
    }
    .non-bullet-list{
        list-style: none;
        margin-left: 0px;
        padding-left: 0px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!------------------------------>
<!--Section Name---------------->
<!------------------------------>
<div class="block-27 space-between-blocks">
    <?php
        $bg_img_url = asset('modules/cms/img/contact.jpg');
        if(!empty($page->feature_image_url)) {
            $bg_img_url = $page->feature_image_url;
        }
    ?>
    <div class="block-27__row d-block d-lg-flex row">
        <div class="block-27__image-column container col-lg-6 col-md-9 col-sm-9"
            style="background-image: url(<?php echo e($bg_img_url, false); ?>);">        
        </div>
    </div>
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-6 px-4 px-xl-5 py-3 text-center">
                <form class="contact-form text-center" id="contact_form">
                    <div class="contact-form__header mb-5">
                        <h6 class="contact-form__title mb-3">
                            <?php echo e($page->title ?? 'Contact Us', false); ?>

                        </h6>
                        <p class="contact-form__paragraph mb-0 mx-auto">
                            <?php echo $page->content ?? "We're happy to receive your message. Ask us anything, we'll respond as soon as possible."; ?>

                        </p>
                    </div>
                    <div class="alert mt-4 alert-primary enquire_response_alert" role="alert" style="display:none;">
                        <span class="enquire_response"></span>
                    </div>
                    <input type="text" name="name" class="contact-form__input" placeholder="Full Name" required>
                    <input type="number" name="mobile" class="contact-form__input" placeholder="Mobile" required>
                    <input type="email" name="email" class="contact-form__input" placeholder="Email" required>
                    <textarea class="contact-form__input" name="message" placeholder="Message" required></textarea>
                    <button id="submit-btn" class="btn btn-primary w-100">
                        SEND MESSAGE
                    </button>
                </form>
            </div>
        </div>
        <?php
            $mail_us = (isset($__site_details['mail_us']) && !empty($__site_details['mail_us'])) ? $__site_details['mail_us'] : [];
            $mail_us_collection = collect($mail_us);
            $filtered_mail_us = $mail_us_collection->filter(function ($value, $key) {
                return !empty($value['label']) && !empty($value['email']);
            });

            $contact_us = (isset($__site_details['contact_us']) && !empty($__site_details['contact_us'])) ? $__site_details['contact_us'] : [];
            $contact_us_collection = collect($contact_us);
            $filtered_contact_us = $contact_us_collection->filter(function ($value, $key) {
                return !empty($value['label']) && !empty($value['num']);
            });
        ?>
        <?php if(!empty($filtered_contact_us) || !empty($filtered_mail_us)): ?>
            <div class="row flex-row-reverse">
                <div class="col-lg-6 px-4 px-xl-5 py-3">
                    <?php if(!empty($filtered_contact_us)): ?>
                        <h4 class="pt-3">
                            Call <strong>Us</strong>
                        </h4>
                        <ul class="non-bullet-list mt-2">
                            <?php $__currentLoopData = $filtered_contact_us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filtered_contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <i class="fas fa-phone"></i> &nbsp;
                                    <strong class="text-dark">
                                        <?php echo e($filtered_contact['label'], false); ?>:
                                    </strong> &nbsp;
                                    <a href="tel:<?php echo e($filtered_contact['num'], false); ?>" class="text-dark text-decoration-none" target="_blank">
                                        <?php echo e($filtered_contact['num'], false); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                    <?php if(!empty($filtered_mail_us)): ?>
                        <h4 class="pt-3">
                            Mail <strong>Us</strong>
                        </h4>
                        <ul class="non-bullet-list mt-2">
                            <?php $__currentLoopData = $filtered_mail_us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filtered_mail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <i class="fas fa-envelope"></i> &nbsp;
                                    <strong class="text-dark">
                                        <?php echo e($filtered_mail['label'], false); ?>:
                                    </strong> &nbsp;
                                    <a href="mailto:<?php echo e($filtered_mail['email'], false); ?>" target="_blank" class="text-dark text-decoration-none">
                                        <?php echo e($filtered_mail['email'], false); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    new Sticky("[sticky]");
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#contact_form").validate({
            submitHandler: function(form, e) {
                if ($('#contact_form').valid()) {
                    let data = $('form#contact_form').serialize();
                    $("#submit-btn").attr('disabled', true);
                    $.ajax({
                        method: 'POST',
                        dataType: "json",
                        url: "<?php echo e(route('cms.submit.contact.form'), false); ?>",
                        data:data,
                        success: function(result){
                            $("#submit-btn").attr('disabled', false);
                            if (result.success) {
                                $('form#contact_form').trigger("reset");
                                $('form#enquire_now_form').trigger("reset");
                                $(".enquire_response_alert").css({ 'display' : '' });
                                $(".enquire_response").text(result.msg);
                            } else {
                                $(".enquire_response_alert").css({ 'display' : '' });
                                $(".enquire_response").text(result.msg);
                            }
                        }
                    });
                }
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms::frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/frontend/pages/contact_us.blade.php ENDPATH**/ ?>