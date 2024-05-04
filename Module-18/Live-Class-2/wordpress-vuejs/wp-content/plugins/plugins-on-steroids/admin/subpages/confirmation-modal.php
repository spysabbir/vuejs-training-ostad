<div class="relative" style="z-index:9999;" x-show='$store.settings.confirmationManager.displayModal'>
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">

      <div @click.outside="$store.settings.confirmationManager.hide()" class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
        <div class="bg-white p-5">
          <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title"><?php _e('Manage Categories', POS_TEXT_DOMAIN); ?></h3>
        </div>
        <div class="bg-gray-100 px-4 py-5">
          <div class="mt-3 text-center sm:mt-0 sm:text-left">
            <div class="w-full">
              <p x-text="$store.settings.confirmationManager.message"></p>

              <div class="px-3 bg-gray-100 rounded-md flex flex-col w-full mt-5 pb-7">
              </div>
            </div>
          </div>
          <div class="px-3 sm:flex justify-end">
            <button @click="$store.settings.confirmationManager.success()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border-none border-gray-300 shadow-sm px-5 py-2 bg-[#2873AF] hover:bg-[#1a5e94] text-base focus:outline-none font-medium text-white  sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" x-text='$store.settings.confirmationManager.primaryText'></button>
            <button @click="$store.settings.confirmationManager.hide()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#828282] text-base font-medium text-white hover:bg-gray-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm" x-text='$store.settings.confirmationManager.secondaryText'></button>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>