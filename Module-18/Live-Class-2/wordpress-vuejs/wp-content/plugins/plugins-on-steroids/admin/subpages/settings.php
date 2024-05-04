<section class="text-gray-600 body-font" x-show="tab=='settings'" id="generalSettings" role="tabpanel" aria-labelledby="general-settings-tab">
    
    
        <div class="flex p-5 pt-[56px] mx-auto">
            <?php 
                //$user = get_option('pos-sign', true);
            ?>
            <!-- <div class="flex w-60 border-r-2 pt-[15px] pb-[15px] mr-4">
                <ul class="flex flex-col md:flex-col" id="generalSettingTab">
                    <li class="py-3 mb-0 mt-0 border-b border-slate-200">
                        <button @click="generalSettingsTab = 'connection-key'" :class="{'active':generalSettingsTab == 'connection-key'}" class="block py-2 text-gray-500 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-[#2873AF] md:p-0 focus:shadow-none" type="button" role="tab" aria-selected="false">
                            <?php _e("Connection Info", POS_TEXT_DOMAIN); ?>
                        </button>
                    </li>
                    <li class="py-3 mb-0 border-b border-slate-200">
                        <button  @click="generalSettingsTab = 'others'" :class="{'active':generalSettingsTab == 'others'}" class="block py-2 text-gray-500 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-[#2873AF] md:p-0 focus:shadow-none" type="button" role="tab" aria-selected="false">
                            <?php _e("Others", POS_TEXT_DOMAIN); ?>
                        </button>
                    </li> 
                </ul>
            </div> -->

            <div class="flex w-screen pt-[15px] pb-[15px] ml-4" >
                <div class="w-full" x-show="generalSettingsTab == 'connection-key'"><?php include_once('settings/connection-key.php'); ?></div>
                <!-- <div class="w-full" x-show="generalSettingsTab == 'others'"><?php include_once('settings/others.php'); ?></div> -->
            </div> 

        </div>

</section>