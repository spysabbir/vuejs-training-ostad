<div class="epm-modal" x-data="vaultManager" x-show='vaultShareModal' style="z-index: 9999">
    <div class="epm-modal-wrap" @click.outside='vaultShareModal = !vaultShareModal'>
        <h3 class="epm-title"><?php _e('Share Vault Item', POS_TEXT_DOMAIN); ?></h3>
        <!-- first step start -->
        <div x-show="vaultShareStep=='init'" class="epm-modal-body">
            <div class="w-full relative">
                <div @click="vaultShareAccordion=!vaultShareAccordion; tokenClean()" class="border border-[#CDCDCD] p-2 rounded-[5px] h-10 pr-10 relative cursor-pointer">
                    <span x-text = "getShareSelectedLabel"></span>
                    <span class="absolute right-3 top-3 w-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                    </span>
                </div>
                <div x-show="vaultShareAccordion" x-collapse.duration.300ms="" style="height: auto;">
                    <div class="border border-[#CDCDCD] p-4 rounded-[5px] w-full relative top-auto shadow-md mt-1">
                        <div class="w-full">
                            <input x-model='tokenSearch' type="text" class="w-full pos-opt-input" placeholder="Search" required>
                        </div>
                        <div class="overflow-y-auto opt-scroll-visible h-64 px-1">
                            <div class="flex mt-4">
                                <div class="flex items-center mr-10">
                                    <label class="ml-2 text-sm font-normal text-gray-900">
                                        <input x-model="tokenSelectAll" @change="toggleSelectAll()" type="checkbox" value="true" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2 ">Select All</label>
                                </div>
                            </div>

                            <template x-for="token in filteredTokenSites" :key="token.id">
                                <div x-show="token.active" class="flex items-center mt-4">
                                    <label class="ml-2 text-sm font-normal text-gray-900 ">
                                        <input :value="token.id" x-model="tokenSelected" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500  focus:ring-2 ">
                                        <span x-text="token.url"></span>
                                    </label>
                                </div>
                            </template>

                        </div>
                    </div>
                </div>
            </div>
            <div class="epm-action">
                <button type="button" class="epm-btn epm-btn-cancel" @click='vaultShareModal = !vaultShareModal'><?php _e('Cancel', POS_TEXT_DOMAIN); ?></button>
                <button type="button" class="epm-btn epm-btn-yes" @click='shareVault()'><?php _e('Confirm', POS_TEXT_DOMAIN); ?></button>
            </div>
        </div>
        <!-- first step end -->

        <!-- second step start -->
        <div x-show="vaultShareStep=='waiting'">
            <div class="epm-modal-body">
                <img class="inline-block" src='<?php echo POS_URL; ?>assets/images/epm-loader.gif' alt="">
                <p class="epm-waiting-info"><?php _e('Hold on few seconds! You are almost done.', POS_TEXT_DOMAIN); ?></p>
            </div>
        </div>
        <!-- second step end -->

        <!-- final step start -->
        <!-- Success -->
        <div x-show="vaultShareStep=='success'">
            <div class="epm-modal-body">
                <img class="inline-block" src="<?php echo POS_URL; ?>assets/images/success-icon.svg" alt="">
                <p class="epm-success-info"><?php _e('Vault successfully shared with sites!', POS_TEXT_DOMAIN); ?></p>
                <div class="epm-action">
                    <button @click='vaultShareModal = !vaultShareModal' type="button" class="epm-btn epm-btn-success"><?php _e('Ok', POS_TEXT_DOMAIN); ?></button>
                </div>
            </div>
        </div>
        <!-- Error -->
        <div x-show="vaultShareStep=='error'">
            <div class="epm-modal-body">
                <img class="inline-block" src="<?php echo POS_URL; ?>assets/images/error-icon.svg" alt="">
                <p class="epm-success-info"><?php _e('Sorry, something went wrong!', POS_TEXT_DOMAIN); ?></p>
                <div class="epm-action">
                    <button @click='vaultShareModal = !vaultShareModal' type="button" class="epm-btn epm-btn-success"><?php _e('Ok', POS_TEXT_DOMAIN); ?></button>
                </div>
            </div>
        </div>
        <!-- final step end -->
    </div>
</div>