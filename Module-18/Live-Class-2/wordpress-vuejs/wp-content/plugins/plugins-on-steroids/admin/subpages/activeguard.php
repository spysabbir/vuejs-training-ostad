<section class="text-gray-600 body-font" x-show="tab=='guard' && x439001('c7e42d43b0a326f8979eb4bbeb3655f7deb91f40')">
    <div class="container-full p-5 pt-10 mx-auto">
        <!-- <h2 class="text-xl"><?php _e("Active Guard", POS_TEXT_DOMAIN); ?></h2> -->
        <div class="mt-4" x-show="activeGuard.vulnerabilities.length==0">
            <div class="mb-4 flex rounded-lg bg-green-100 p-5 text-sm text-green-500" role="alert">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="mr-3 h-5 w-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                </svg>
                <div class="text-gray-700">
                    <?php _e("No vulnerabilities found for your active plugins, congratulations!", POS_TEXT_DOMAIN); ?>
                </div>
            </div>
        </div>
        <div class="mt-4" x-show="activeGuard.vulnerabilities.length>0">
            <div class="mb-4 flex rounded-lg bg-red-100 p-5 text-sm text-red-500" role="alert">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="mr-3 h-5 w-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                </svg>
                <div class="text-[#E8374D]">
                    <?php _e("Bad news! We have found vulnerabilities for the following active plugins", POS_TEXT_DOMAIN); ?>
                </div>
            </div>
            
        </div>
        <div class="mt-4" x-show="activeGuard.vulnerabilities.length>0">
            <template x-for="v in activeGuard.vulnerabilities">
                <div class="border border-[#E0E0E0] overflow-hidden pos-ag rounded-lg mb-5">
                    <div class="p-5">
                        <div class="text-lg pos-ag-name text-2xl mb-5 font-bold text-[#1D2327]">
                            <span class="" x-text="v.name"></span>
                        </div>
                        <div class="grid grid-cols-2 gap-5 text-sm">
                            <div>
                                <div class="pos-ag-version mb-4">
                                    <span class="w-36 inline-block">Version</span> :
                                    <span class="font-bold ml-5" x-text="v.version"></span>
                                </div>
                                <div class="pos-ag-severity mb-4">
                                    <span class="w-36 inline-block">Severity</span> :
                                    <span class="font-bold ml-5" :class="'pos-ag-'+v.severity" x-text="v.severity"></span>
                                </div>
                                <div class="pos-ag-vulnerability">
                                    <span class="w-36 inline-block">Vulnerability</span> :
                                    <span class="font-bold ml-5 pos-vul-txt-wrap" x-text="activeGuard.processMessage(v.vulnerability)"></span>
                                </div>
                            </div>
                            <div>
                                <div class="pos-ag-patched mb-4">
                                    <span class="w-36 inline-block">Patched</span> :
                                    <span class="patched font-bold ml-5" x-show='v.patched=="Yes"'>Yes</span>
                                    <span class="text-red-500 not-patched font-bold ml-5" x-show='v.patched=="No"'>No</span>
                                </div>
                                <div class="pos-ag-patched-version mb-4">
                                    <span class="w-36 inline-block">Patched Version</span> :
                                    <span class="font-bold ml-5" x-show='v.patched=="Yes"' x-text='v.patched_version'></span>
                                    <span class="text-red-500 font-bold ml-5" x-show='v.patched=="No"'>No Patch Available Yet</span>
                                </div>
                                <div class="pos-ag-patched-version">
                                    <span class="w-36 inline-block">Vulnerability Type</span> :
                                    <span class="font-bold ml-5 pos-v-type" x-text="v.v_type"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div :class="'pos-ag-msg-'+v.severity" class="pos-ag-suggestion flex justify-between items-center px-5 py-3 italic text-sm font-medium">
                        <span  class="" x-text="activeGuard.getSuggestion(v)"></span>
                        <div>
                        <a href='#' class="button" @click.prevent="activeGuard.updatePlugin(v.slug)">Update</a>
                        <a href='#' class="button" @click.prevent="activeGuard.deactivatePlugin(v.slug)">Deactivate</a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

</section>