<div class="epm-modal" x-data="$store.vaultManager" x-show='showModal' style="z-index: 9999">
    <div class="epm-modal-wrap" @click.outside='cancelBackup()'>
        <h3 class="epm-title" x-text="$store.settings.titleCase(slug)"></h3>
        <!-- first step start -->
        <div class="epm-modal-body" x-show="step=='replace'">
            <p class="epm-info">You have already backed up this version of this plugin.
                Do you want to replace the backup?</p>
            <div class="epm-action">
                <button type="button" class="epm-btn epm-btn-cancel" @click='cancelBackup()'>Cancel</button>
                <button type="button" class="epm-btn epm-btn-yes" @click='replaceBackup()'>Yes</button>
            </div>
        </div>
        <!-- first step end -->

        <!-- first step start -->
        <div class="epm-modal-body" x-show="step=='wp'">
            <p class="epm-info">Have you modified any files in this plugin?</p>
            <div class="epm-action">
                <button type="button" @click='cancelBackup()' class="epm-btn epm-btn-cancel">Cancel</button>
                <button type="button" @click='uploadWP(false)' class="epm-btn epm-btn-cancel">No</button>
                <button type="button" @click='uploadWP(true)' class="epm-btn epm-btn-yes">Yes</button>
            </div>
        </div>
        <!-- first step end -->

        <div x-show="step=='waiting'">
            <div class="epm-modal-body">
                <img src='<?php echo POS_URL; ?>assets/images/epm-loader.gif' alt="">
                <p class="epm-waiting-info">Hold on few seconds! You are almost done.</p>
            </div>
        </div>

        <!-- loading state start -->
        <div x-show="step=='success'">
            <!-- Final state start -->
            <div class="epm-modal-body">
                <img src="<?php echo POS_URL; ?>assets/images/success-icon.svg" alt="">
                <p class="epm-success-info">Plugin Successfully Saved in the vault!</p>
                <div class="epm-action">
                    <button @click='cancelBackup()' type="button" class="epm-btn epm-btn-success">Ok</button>
                </div>
            </div>
        </div>

        <div x-show="step=='error'">
            <!-- Final state start -->
            <div class="epm-modal-body">
                <img src="<?php echo POS_URL; ?>assets/images/error-icon.svg" alt="">
                <p class="epm-success-info">Sorry, something went wrong!</p>
                <div class="epm-action">
                    <button @click='cancelBackup()' type="button" class="epm-btn epm-btn-success">Ok</button>
                </div>
            </div>
        </div>
        <!-- Final state end -->

    </div>
</div>