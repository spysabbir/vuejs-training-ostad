<div class="epm-modal" x-data="$store.versionManager" x-show='showModal' style="z-index: 9999">
    <div class="epm-modal-wrap" @click.outside='hideModal()'>
        <h3 class="epm-title" x-text="$store.settings.titleCase(title)"></h3>
        <!-- first step start -->
        <div class="epm-modal-body">
            <div class="bg-gray-100 p-6">
                <p x-show="!$store.versionManager.error" class="pos-v-l">
                    Select the version you want to install from this list
                </p>
                <p x-show="$store.versionManager.error" class="pos-v-l">
                    Sorry! Premium or third-party plugin versions can be managed using vault only!
                </p>
                <select x-show="!$store.versionManager.error" class="pos-v-s" x-model="version">
                    <template x-for="(v,index) in Object.keys(versions).reverse()">
                        <option :value='v' x-text='getVersionLabel(v, index)'></option>
                    </template>
                </select>
                <button x-show="!$store.versionManager.error" type="button" class="epm-btn epm-btn-yes" @click='install()'><?php _e('Install', POS_TEXT_DOMAIN); ?>&nbsp;<span x-text='"Version " + version'></button>
            </div>

            <div class="epm-action">
                <button type="button" class="epm-btn epm-btn-cancel" @click='hideModal()'>
                    <span x-show="!$store.versionManager.error">Cancel</span>
                    <span x-show="$store.versionManager.error">Close</span>
                </button>
            </div>
        </div>
        <!-- first step end -->

    </div>
</div>