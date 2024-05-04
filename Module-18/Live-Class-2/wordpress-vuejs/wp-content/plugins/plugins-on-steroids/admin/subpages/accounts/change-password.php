<div x-show="tx=='t3'" class="pt-0" id="change-password" role="tabpanel" aria-labelledby="change-password-tab" x-data="settingsManager">
    <div class="lg:w-1/2 md:w-2/3 mx-auto pt-[30px]">
        <div class="flex flex-wrap -m-2">

            <div class="p-2 w-full">
                <h3 class="font-bold text-[16px] text-gray-900 mb-5">Change Password</h3>
                <span x-text='pwderror' class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-2"></span>
            </div>

            <div class="p-2 w-full">
                <div class="relative">
                    <label class="leading-7 text-sm text-gray-600"><?php _e("Old Password", POS_TEXT_DOMAIN); ?></label>
                    <input x-model="oldp" type="password" autocomplete="current-password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <span x-text='error' class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-2">
                    </span>
                </div>
            </div>

            <div class="p-2 w-full">
                <div class="relative">
                    <label class="leading-7 text-sm text-gray-600"><?php _e("New Password", POS_TEXT_DOMAIN); ?></label>
                    <input x-model="newp" type="password" autocomplete="new-password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>

            <div class="p-2 w-full">
                <div class="relative">
                    <label class="leading-7 text-sm text-gray-600"><?php _e("Confirm Password", POS_TEXT_DOMAIN); ?></label>
                    <input x-model="cp" type="password" autocomplete="confirm-password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>

            <div class="p-2 w-full">
                <button @click='changePassword()' class="text-white bg-[#2873AF] cursor-pointer focus:ring-blue-300 font-medium rounded-md text-md px-5 py-2.5 text-center mr-3 md:mr-0 hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0"><?php _e("Save", POS_TEXT_DOMAIN); ?></button>
            </div>
            <input type="hidden" id="user_ip">
        </div>
    </div>
</div>