<?php
    $all_notifications = auth()->user()->notifications;
    $unread_notifications = $all_notifications->where('read_at', null);
    $total_unread = count($unread_notifications);
?>
<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu tw-list-none">
    <a type="button" title="<?php echo app('translator')->get('lang_v1.notifications'); ?>"
        class="dropdown-toggle load_notifications tw-inline-flex tw-items-center tw-ring-1 tw-ring-white/10 tw-justify-center tw-text-sm tw-font-medium tw-text-white hover:tw-text-white tw-transition-all tw-duration-200 tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800 hover:tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-700 tw-p-1.5 tw-rounded-lg"
        data-toggle="dropdown" id="show_unread_notifications" data-loaded="false">
        <svg aria-hidden="true" class="tw-size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
            <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
        </svg>
        <span class="label label-warning notifications_count"><?php if(!empty($total_unread)): ?><?php echo e($total_unread, false); ?><?php endif; ?></span>
    </a>
    <ul class="dropdown-menu !tw-p-2 !tw-w-80 tw-absolute !tw-right-0 !tw-z-10 !tw-mt-2 !tw-origin-top-right !tw-bg-white !tw-rounded-lg !tw-shadow-lg !tw-ring-1 !tw-ring-gray-200 !focus:tw-outline-none" style="left: auto !important ; height:40vh; overflow-y: scroll;">
        <!-- <li class="header">You have 10 unread notifications</li> -->
        <li>
            <!-- inner menu: contains the actual data -->

            <ul class="menu" id="notifications_list">
            </ul>
        </li>

        <?php if(count($all_notifications) > 10): ?>
            <li class="footer load_more_li">
                <a href="#" class="load_more_notifications"><?php echo app('translator')->get('lang_v1.load_more'); ?></a>
            </li>
        <?php endif; ?>
    </ul>
</li>

<input type="hidden" id="notification_page" value="1">
<?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/layouts/partials/header-notifications.blade.php ENDPATH**/ ?>