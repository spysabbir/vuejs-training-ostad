<section class="text-gray-600 body-font" x-show="tab=='history'">
    <div class="container-full px-5 py-10 mx-auto">
        <div class="bg-white pb-4 px-4- rounded-md w-full" x-show="hasHistories()">
            <div class="flex justify-between w-full pt-6 ">
                <h2 class="font-medium text-2xl"><?php _e("Plugin History", POS_TEXT_DOMAIN); ?></h2>
                <div class="w-full sm:w-64 inline-block relative ">
                    <input type="text" x-model='psearch' class="pos-form-field leading-snug border border-gray-300 block w-full appearance-none bg-gray-100 text-sm text-gray-600 py-3 px-4 pl-8 rounded-lg" placeholder="Search" />
                </div>
            </div>

            <div class="overflow-x-auto mt-6">

                <table class="table-auto w-full">
                    <thead>
                        <tr class="border-b-gray-300 border-b text-sm text-gray-700 text-left">
                            <th class="px-4 py-3 "><?php _e("Plugin Slug", POS_TEXT_DOMAIN); ?></th>
                            <th class="px-4 py-3 "><?php _e("Action", POS_TEXT_DOMAIN); ?></th>
                            <th x-show="x439001('bbc6766df9b3c7e52b636c99efef89b969b35730')" class="px-4 py-3 "><?php _e("User", POS_TEXT_DOMAIN); ?></th>
                            <th class="px-4 py-3 "><?php _e("Date", POS_TEXT_DOMAIN); ?></th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-normal text-gray-700">
                        <template x-for="(history, index) in filter(histories)">
                            <tr class="border-b border-gray-200 py-10">
                                <td class="px-4 py-4" x-text="history.slug"></td>
                                <td class="px-4 py-4" x-text="history.action_type"></td>
                                <td x-show="x439001('bbc6766df9b3c7e52b636c99efef89b969b35730')" class="px-4 py-4" x-text="history.actor_name || pos.user_name"></td>
                                <td class="px-4 py-4" x-data="{date: new Date(history.date*1000)}" x-text="date.toLocaleDateString('en-US', {month:'short', day:'2-digit',year:'numeric', hour: '2-digit', minute:'2-digit'})"></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>


        <div x-show="!hasHistories()" class="mb-4 flex rounded-lg bg-blue-100 p-5 text-sm text-blue-500" role="alert">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" class="mr-3 h-5 w-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
            </svg>
            <div class="text-gray-700">
                <?php _e("You don't have any History yet", POS_TEXT_DOMAIN); ?>
            </div>
        </div>
        <!-- ====== Table Section End -->

    </div>
</section>