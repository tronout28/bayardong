<!-- <strong><?php echo e($contact->name, false); ?></strong><br><br> -->
<h3 class="profile-username">
    <i class="fas fa-user-tie"></i>
    <?php echo e($contact->full_name_with_business, false); ?>

    <br>
	<small>
        <?php if($contact->type == 'both'): ?>
            <?php echo e(__('role.customer'), false); ?> & <?php echo e(__('role.supplier'), false); ?>

        <?php elseif(($contact->type != 'lead')): ?>
            <?php echo e(__('role.'.$contact->type), false); ?>

        <?php endif; ?>
    </small>
</h3><br>
<strong><i class="fa fa-map-marker margin-r-5"></i> <?php echo app('translator')->get('business.address'); ?></strong>
<p class="text-muted">
    <?php echo $contact->contact_address; ?>

</p>

<strong><i class="fa fa-mobile margin-r-5"></i> <?php echo app('translator')->get('contact.mobile'); ?></strong>
<p class="text-muted">
    <?php echo e($contact->mobile, false); ?>

</p>
<?php if($contact->alternate_number): ?>
    <strong><i class="fa fa-phone margin-r-5"></i> <?php echo app('translator')->get('contact.alternate_contact_number'); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->alternate_number, false); ?>

    </p>
<?php endif; ?>
<?php if($contact->landline): ?>
    <strong><i class="fa fa-phone margin-r-5"></i> <?php echo app('translator')->get('contact.landline'); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->landline, false); ?>

    </p>
<?php endif; ?>
<?php if($contact->email): ?>
    <strong><i class="fa fa-envelope margin-r-5"></i> <?php echo app('translator')->get('business.email'); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->email, false); ?>

    </p>
<?php endif; ?>
<?php if($contact->dob): ?>
    <strong><i class="fa fa-calendar margin-r-5"></i> <?php echo app('translator')->get('lang_v1.dob'); ?></strong>
    <p class="text-muted">
        <?php echo e(\Carbon::createFromTimestamp(strtotime($contact->dob))->format(session('business.date_format')), false); ?>

    </p>
<?php endif; ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/contact/contact_basic_info.blade.php ENDPATH**/ ?>