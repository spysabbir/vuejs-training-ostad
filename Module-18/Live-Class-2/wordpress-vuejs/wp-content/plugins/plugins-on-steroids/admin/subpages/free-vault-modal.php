<div class="epm-modal" x-data="$store.vaultManager" x-show='showModal' style="z-index: 9999">
    <div class="epm-modal-wrap" @click.outside='cancelBackup()'>
        <div class="epm-icon-size">
            <img src='<?php echo POS_URL; ?>assets/images/vault-b.svg' />
        </div>
        <h3 class="epm-title">Send To Vault <span class="epm-pro">Pro</span></h3>
        <!-- first step start -->
        <div class="epm-modal-body">
            <p class="epm-info epm-font16">By using this feature you can store your third-party PRO Plugin
                or any modified plugin in our vault to use it anytime anywhere.</p>
            <a href="https://www.youtube.com/watch?v=yuXf9sMvxek" target="_blank">Learn More</a>
            <div class="epm-action">
                <a :href="$store.settings.checkoutUrl()"  target="_blank" class="epm-btn epm-btn-yes epm-pro-btn-block">Get A Pro Plan to Unlock</a>
            </div>
        </div>
        <!-- first step end -->

    </div>
</div>