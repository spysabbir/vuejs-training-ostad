<?php
$parent_user_id = get_option('pos-parent', 0);
$parent_user = get_user_by('id', $parent_user_id);
$parent_user_name = isset($parent_user->data->user_nicename)? $parent_user->data->user_nicename: '';
?>
<div class="wrap" x-data="$store.settings" x-init="$watch('tab',(n,o)=>{$store.settings.tabChanged(n,o)})">

    <div x-show='shoudDisplayTopBar()' id="activate-site" class="hidden container-full bg-white px-5 py-3 mt-10 border-l-4 border-[#0075B4] justify-between items-center">
        <div class="text-[14px] pr-5">Please <strong>activate</strong> your site to unlock Pro features. Thank you for choosing us! </div>
        <a @click='activateCurrentSite()' href="#account" class="px-3 py-2 font-bold rounded-md border border-[#1DB85E] text-[#1DB85E] hover:text-white hover:bg-[#1DB85E] focus:ring-0 focus:text-white focus:bg-[#1DB85E]">Activate Site</a>
    </div>

    <?php include_once('dashboard-loader.php'); ?>

    <div class="container-full bg-white p-5 mt-6" x-show="ready" style="display:none">

        <?php include_once('dashboard-menu.php'); ?>
        <?php include_once('subpages/features.php'); ?>
        <?php include_once('subpages/bookmarks.php'); ?>
        <?php include_once('subpages/history.php'); ?>
        <?php include_once('subpages/account.php'); ?>
        <?php include_once('subpages/pro.php'); ?>
        <?php include_once('subpages/login.php'); ?>
        <?php include_once('subpages/vault.php'); ?>
        <?php include_once('subpages/optimization.php'); ?>
        <?php include_once('subpages/activeguard.php'); ?>
        <?php include_once('subpages/support.php'); ?>
        <?php include_once('subpages/settings.php'); ?>
        <?php include_once('subpages/category-modal.php'); ?>
        <?php include_once('subpages/category-manage-modal.php'); ?>
        <?php include_once('subpages/confirmation-modal.php'); ?>
        <?php include_once('subpages/version-modal.php'); ?>
        <?php include_once('subpages/message-modal.php'); ?>
        <?php include_once('subpages/video-modal.php'); ?>
        <?php include_once('dashboard-footer.php'); ?>

    </div>

</div>

<script>
    jQuery("#pos-nav-links a").on('click', function() {
        jQuery(this).blur()
    })
</script>