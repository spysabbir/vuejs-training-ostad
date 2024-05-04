<div class="relative" style="z-index:9999;" x-show='$store.settings.messageModal.shouldDisplayModal'>
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
      <div @click.outside="$store.settings.messageModal.hideModal()" class="max-w-md relative bg-white rounded-lg text-center overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-md sm:w-full">
        <!-- <div class="bg-white p-5">
            <h3 class="text-lg leading-6 font-medium text-gray-900"><?php _e('Eazy Plugin Manager', POS_TEXT_DOMAIN); ?></h3>
          </div>    -->
        <!-- error alert -->
        <template x-if='$store.settings.messageModal.error'>
          <div class="p-10">
            <div class="w-[64] h-[64] flex justify-center mb-8">
              <img src='<?php echo POS_URL; ?>assets/images/error-icon.svg' />
            </div>
            <h3 class="text-[32px] font-light">Sorry!</h3>
            <p class="text-base" x-text="$store.settings.messageModal.message"></p>
            <div class="sm:flex justify-center mt-10">
              <button @click="$store.settings.messageModal.hideModal()" type="button" class=" mt-3 w-full inline-flex justify-center rounded-md border-none border-gray-300 shadow-sm px-10 py-3 bg-[#E8374D] hover:bg-gray-600 text-base focus:outline-none font-medium text-white  sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><?php _e('Ok', POS_TEXT_DOMAIN); ?></button>
              <!-- <button @click="$store.settings.messageModal.hideModal()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm"><?php _e('Ok', POS_TEXT_DOMAIN); ?></button> -->
            </div>
          </div>
        </template>
        <!-- success alert -->
        <template x-if='!$store.settings.messageModal.error'>
          <div class="p-10">
            <div class="w-[64] h-[64] flex justify-center mb-8">
              <img src='<?php echo POS_URL; ?>assets/images/success-icon.svg' />
            </div>
            <h3 class="text-[32px] font-light">Success!</h3>
            <p class="text-base" x-text="$store.settings.messageModal.message"></p>
            <div class="sm:flex justify-center mt-10">
              <button @click="$store.settings.messageModal.hideModal()" type="button" class=" mt-3 w-full inline-flex justify-center rounded-md border-none border-gray-300 shadow-sm px-10 py-3 bg-[#27AE60] hover:bg-gray-600 text-base focus:outline-none font-medium text-white  sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><?php _e('Ok', POS_TEXT_DOMAIN); ?></button>
              <!-- <button @click="$store.settings.messageModal.hideModal()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm"><?php _e('Ok', POS_TEXT_DOMAIN); ?></button> -->
            </div>
          </div>
        </template>
      </div>
    </div>
  </div>
</div>