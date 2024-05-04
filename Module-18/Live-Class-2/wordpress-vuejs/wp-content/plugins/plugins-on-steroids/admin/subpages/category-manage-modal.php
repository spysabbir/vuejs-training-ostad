<div class="relative" style="z-index:9999;" x-show='categoryManager.displayManageModal'>
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">

      <div @click.outside="categoryManager.hideManageModal()" class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
        <div class="bg-white p-5">
          <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title"><?php _e('Delete Empty Categories', POS_TEXT_DOMAIN); ?></h3>
        </div>
        <div class="bg-gray-100 px-4 py-5">
          <div class="mt-3 text-center sm:mt-0 sm:text-left">
            <div class="w-full">
              <p x-show="categories.filter(c=>c.n==undefined).length==0">No Empty Category</p>
              <ul>
                <template x-for="category,index in categories">
                  <li x-show="index>0 && category.n==undefined" class="inline-block m-2 pos-del-cat">
                    <input :id="'pos-del-'+category.id" x-model="categoryManager.selectedCategories" type="checkbox" :data-category_id='category.id' :value="category.key">
                    <label class="text-[12px]" :for="'pos-del-'+category.id" x-text='category.title'></label>
                  </li>
                </template>
              </ul>
              <div class="px-3 bg-gray-100 rounded-md flex flex-col w-full mt-5 pb-7">
              </div>
            </div>
          </div>
          <div class="px-3 sm:flex justify-end">
            <button x-show='categories.filter(c=>c.n==undefined).length>0' @click="confirmationManager.show('Once the categories are deleted, you cannot undo this',categoryManager.deleteCategories)" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border-none border-gray-300 shadow-sm px-5 py-2 bg-[#2873AF] hover:bg-[#1a5e94] text-base focus:outline-none font-medium text-white  sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><?php _e('Delete', POS_TEXT_DOMAIN); ?></button>
            <button @click="categoryManager.hideManageModal()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#828282] text-base font-medium text-white hover:bg-gray-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm"><?php _e('Cancel', POS_TEXT_DOMAIN); ?></button>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>