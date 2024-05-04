<div class="relative" style="z-index:9999;" x-show='versionManager.shouldDisplayModal'>
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">

      <div @click.outside="versionManager.hideModal()" class="max-w-md relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-md sm:w-full">

        <div class="bg-white p-5">
          <h3 class="text-lg leading-6 font-medium text-gray-900" x-text="titleCase(versionManager.title)"></h3>
        </div>

        <div class="bg-gray-100 p-6">
          <p class="text-base mt-0">
            Select the version you want to install from this list
          </p>
          <select class="w-full text-base pos-form-field pos-full pos-vm-h" x-model="versionManager.version">
            <template x-for="(v,index) in Object.keys(versionManager.versions).reverse()">
              <option :value='v' x-text='versionManager.getVersionLabel(v, index)'></option>
            </template>
          </select>

          <div class="mt-7 sm:flex justify-end">
            <button @click="versionManager.install()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border-none border-gray-300 shadow-sm px-5 py-2 bg-[#2873AF] hover:bg-[#1a5e94] text-base focus:outline-none font-medium text-white  sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><?php _e('Install', POS_TEXT_DOMAIN); ?>&nbsp;<span x-text='"Version " + versionManager.version'></span></button>
            <button @click="versionManager.hideModal()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#828282] text-base font-medium text-white hover:bg-gray-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm"><?php _e('Cancel', POS_TEXT_DOMAIN); ?></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>