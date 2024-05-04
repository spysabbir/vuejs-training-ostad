<div x-show="tx=='t1'" class="pt-0" id="account" role="tabpanel" aria-labelledby="account-tab">
    <div class="container-full p-5 pt-[30px] mx-auto">
        <h2 class="text-2xl font-bold mb-6"><?php _e("My Account", POS_TEXT_DOMAIN); ?></h2>
        <!-- <span x-text="user.plan_name"></span> -->
        <strong class="text-base pr-3">Hello!</strong> <span class="text-base" x-text="user.email"></span>
    </div>

    <!-- <div class="container p-5 pt-24 mx-auto">
                    <h2 class="text-lg"><?php _e("Current Site Status", POS_TEXT_DOMAIN); ?><?php _e("", POS_TEXT_DOMAIN); ?></h2>
                    <span x-text="getCurrentSite()"></span>
                    <span x-text="isCurrentSiteActive()"></span>
                </div> -->

    <!-- <div class="container px-5 py-24 mx-auto">
                    <h1><?php _e("Current Site ", POS_TEXT_DOMAIN); ?></h1>
                    <span x-text="site.active"></span>
                </div> -->

    <!-- free plan -->
    <div class="container-full p-5 mx-auto" x-show="user.slug=='free'">
        <p class="text-base text-[#828282] mb-8 "><?php _e("You are currently using", POS_TEXT_DOMAIN); ?> <strong><?php _e("Free Plan", POS_TEXT_DOMAIN); ?></strong>. <?php _e("You can", POS_TEXT_DOMAIN); ?> <a href="https://eazyplugins.com/eazy-plugin-manager/" target="_blank" class="text-[#E8374D] hover:text-[#E79073] underline"><?php _e("Upgrade", POS_TEXT_DOMAIN); ?></a> <?php _e("it anytime without any hidden charge.", POS_TEXT_DOMAIN); ?></p>
        <div class="bg-[#feede6] rounded-lg p-10">
            <div class="flex flex-row">
                <div class="w-1/3 flex items-center">
                    <div class="flex content-center place-content-center">
                        <img src='<?php echo POS_URL; ?>assets/images/free-plan.svg' />
                    </div>
                    <div class="border-[#e5d5cf] border-r w-3/5 pl-6 py-10">
                        <p class="m-0 text[#828282] text-sm font-normal"><?php _e("Your current Plan", POS_TEXT_DOMAIN); ?></p>
                        <h2 class="text-[#E79073] text-3xl font-bold"><?php _e("FREE Plan", POS_TEXT_DOMAIN); ?></h2>
                        <p class="m-0 text-black text-base"><?php _e("Free Forever", POS_TEXT_DOMAIN); ?></p>
                    </div>
                </div>
                <div class="w-2/3 flex items-center pl-10">
                    <div class="w-4/5">
                        <h3 class="text-base font-bold text-gray-700 mb-3"><?php _e("You are missing", POS_TEXT_DOMAIN); ?></h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <ul class="list-disc list-inside">
                                    <li><?php _e("Multiple Site Access", POS_TEXT_DOMAIN); ?> </li>
                                    <li><?php _e("Active Guard", POS_TEXT_DOMAIN); ?></li>
                                    <li><?php _e("Freeze Plugins", POS_TEXT_DOMAIN); ?></li>
                                </ul>
                            </div>
                            <div>
                                <ul class="list-disc list-inside">
                                    <li><?php _e("Block Plugins", POS_TEXT_DOMAIN); ?></li>
                                    <li><?php _e("Plugin Vault", POS_TEXT_DOMAIN); ?></li>
                                    <li><?php _e("On Demand Assets Optimization", POS_TEXT_DOMAIN); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 flex justify-center">
                        <a href="https://eazyplugins.com/eazy-plugin-manager/" target="_blank" class="text-white bg-[#E8374D] cursor-pointer focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-3 text-center hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0"><?php _e("Upgrade Now", POS_TEXT_DOMAIN); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- free plan end-->

    <!-- Professional plan annual -->
    <div class="container-full p-5 mx-auto" x-show="user.slug=='gold-yearly'">
        <p class="text-base text-[#828282] mb-8 ">You are currently using <strong>Annual Professional Plan</strong>. You can <a href="https://eazyplugins.com/contact/" target="_blank" class="text-[#E8374D] hover:text-[#E79073] underline">Upgrade</a> it anytime without any hidden charge.</p>
        <div class="bg-[#fae9e3] rounded-lg p-10">
            <div class="flex flex-row">
                <div class="w-2/5 flex items-center">
                    <div class="flex content-center place-content-center">
                        <img src='<?php echo POS_URL; ?>assets/images/pro-badge.svg' />
                    </div>
                    <div class="border-[#e1d2cc] border-r w-3/5 pl-6 py-10">
                        <p class="m-0 text[#828282] text-sm font-normal">You're using</p>
                        <h2 class="text-[#e79073] text-3xl font-bold">Professional Plan</h2>
                        <p class="m-0 text-black text-base">Annual Subscription</p>
                    </div>
                </div>
                <div class="w-3/5 flex items-center pl-10">
                    <div>
                        <h3 class="text-base font-bold text-gray-700 mb-3">Congratulations!</h3>
                        <p>You are using the professional subscription and enjoying all the features.</p>
                    </div>
                    <!-- <div class="w-4/5">
                        <h3 class="text-base font-bold text-gray-700 mb-3">You are missing</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <ul class="list-disc list-inside">
                                    <li>Plugin Vault</li>
                                    <li>Active Guard</li>
                                </ul>
                            </div>
                            <div>
                                <ul class="list-disc list-inside">
                                    <li>Freeze Plugins</li>
                                    <li>On Demand Assets Optimization</li>
                                </ul>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="w-1/5 flex justify-center">
                        <a href="https://eazyplugins.com/contact/" target="_blank" class="text-white bg-[#E8374D] cursor-pointer focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-3 text-center hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0">Upgrade Now</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Professional plan end-->

    <!-- Professional plan lifetime-->
    <div class="container-full p-5 mx-auto" x-show="user.slug=='gold-lifetime'">
        <p class="text-base text-[#828282] mb-8 ">You are currently using <strong>Professional Lifetime Plan</strong>.
            <!-- You can <a href="https://eazyplugins.com/contact/" target="_blank" class="text-[#E8374D] hover:text-[#E79073] underline">Upgrade</a> it anytime without any hidden charge -->
        </p>
        <div class="bg-[#fae9e3] rounded-lg p-10">
            <div class="flex flex-row">
                <div class="w-2/5 flex items-center">
                    <div class="flex content-center place-content-center">
                        <img src='<?php echo POS_URL; ?>assets/images/pro-badge-ltd.svg' />
                    </div>
                    <div class="border-[#e1d2cc] border-r w-3/5 pl-6 py-10">
                        <p class="m-0 text[#828282] text-sm font-normal">Your current Plan</p>
                        <h2 class="text-[#e79073] text-3xl font-bold">Professional</h2>
                        <p class="m-0 text-black text-base">Lifetime</p>
                    </div>
                </div>
                <div class="w-3/5 flex items-center pl-10">
                    <div>
                        <h3 class="text-base font-bold text-gray-700 mb-3">Congratulations!</h3>
                        <p>You are using the professional lifetime and enjoying all the features.</p>
                    </div>
                </div>
                <!-- <div class="w-2/3 flex items-center pl-10">
                    <div class="w-4/5">
                        <h3 class="text-base font-bold text-gray-700 mb-3">You are missing</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <ul class="list-disc list-inside">
                                    <li>Plugin Vault</li>
                                    <li>Active Guard</li>
                                </ul>
                            </div>
                            <div>
                                <ul class="list-disc list-inside">
                                    <li>Freeze Plugins</li>
                                    <li>On Demand Assets Optimization</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 flex justify-center">
                        <a href="https://eazyplugins.com/contact/" target="_blank" class="text-white bg-[#E8374D] cursor-pointer focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-3 text-center hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0">Upgrade Now</a>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
    <!-- Professional plan lifetime end-->

    <!-- Agency plan annual -->
    <div class="container-full p-5 mx-auto" x-show="user.slug=='platinum-yearly'">
        <p class="text-base text-[#828282] mb-8 ">You are currently using <strong>Annual Agency Plan</strong>.
        <div class="bg-[#fdebed] rounded-lg p-10">
            <div class="flex flex-row">
                <div class="w-2/5 flex items-center">
                    <div class="flex content-center place-content-center">
                        <img src='<?php echo POS_URL; ?>assets/images/agency-badge.svg' />
                    </div>
                    <div class="border-[#e4d3d5] border-r w-3/5 pl-6 py-10">
                        <p class="m-0 text[#828282] text-sm font-normal">You're using</p>
                        <h2 class="text-[#e8374d] text-3xl font-bold">Agency Plan</h2>
                        <p class="m-0 text-black text-base">Annual Subscription</p>
                    </div>
                </div>
                <div class="w-3/5 flex items-center pl-10">
                    <div>
                        <h3 class="text-base font-bold text-gray-700 mb-3">Congratulations!</h3>
                        <p>You are using the agency subscription and enjoying all the features.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Agency plan end-->

    <!-- Agency plan lifetime-->
    <div class="container-full p-5 mx-auto" x-show="user.slug=='platinum-lifetime'">
        <p class="text-base text-[#828282] mb-8 ">You are currently using <strong>Agency Lifetime Plan</strong>.
        <div class="bg-[#fdebed] rounded-lg p-10">
            <div class="flex flex-row">
                <div class="w-2/5 flex items-center">
                    <div class="flex content-center place-content-center">
                        <img src='<?php echo POS_URL; ?>assets/images/agency-badge-ltd.svg' />
                    </div>
                    <div class="border-[#e4d3d5] border-r w-3/5 pl-6 py-10">
                        <p class="m-0 text[#828282] text-sm font-normal">Your current Plan</p>
                        <h2 class="text-[#e8374d] text-3xl font-bold">Agency</h2>
                        <p class="m-0 text-black text-base">Lifetime</p>
                    </div>
                </div>
                <div class="w-3/5 flex items-center pl-10">
                    <div>
                        <h3 class="text-base font-bold text-gray-700 mb-3">Congratulations!</h3>
                        <p>You are using the agency lifetime and enjoying all the features.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Agency plan lifetime end-->

    <div class="container-full px-5 py-10 mx-auto" x-show="x439001('2c1e2b1daf8e75bbba55ee03e9b6e28c23686988')">
        <!-- <h2 class="text-lg font-bold mb-4 flex justify-between">
            <span><?php _e("Your Sites", POS_TEXT_DOMAIN); ?></span>
            <p>
                <span x-text="sites.length"></span> of
                <span x-text="getSiteLimit()"></span>
            </p>
        </h2> -->

        <h2 class="text-lg font-bold mb-4 flex justify-between">
            <div>
                <div class="flex justify-between items-center">
                    <h2>
                        <?php _e("Your Sites", POS_TEXT_DOMAIN); ?>
                    </h2>

                    <span class="ml-3 cursor-pointer text-gray-400 hover:text-gray-900 relative flex flex-col items-center group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                        </svg>
                        <div class="absolute bottom-0 flex-col items-center hidden mb-6 group-hover:flex">
                            <span x-text='tokenManager.getTotal()' class="relative z-10 p-2 text-xs text-white bg-black whitespace-nowrap rounded-md"></span>
                            <div class="w-3 h-3 -mt-2 rotate-45 bg-black"></div>
                        </div>
                    </span>
                </div>
            </div>
            <p>
                <span x-text="tokenManager.total"></span> of
                <span x-text="tokenManager.cap"></span>
            </p>
        </h2>

        <table class="table-auto w-full plugins">
            <thead>
                <tr class="border-b-gray-300 border-b text-sm text-gray-700 text-left">
                    <!-- <td id="cb" style="width:3%" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1"><?php _e("Select All", POS_TEXT_DOMAIN); ?></label><input id="cb-select-all-1" type="checkbox"></td> -->
                    <th scope="col" id="name" class="px-4 py-3 text-gray-500 manage-column column-name column-primary" style="width: 25%;"><?php _e("Site", POS_TEXT_DOMAIN); ?></th>
                    <th scope="col" id="description" class="px-4 py-3 text-gray-500 manage-column column-description"><?php _e("Status", POS_TEXT_DOMAIN); ?></th>
                    <th scope="col" id="auto-updates" class="px-4 py-3 text-gray-500 manage-column column-auto-updates"><?php _e( 'Actions', POS_TEXT_DOMAIN ); ?></th>
                </tr>
            </thead>

            <tbody id="the-sites" class="text-sm font-normal text-gray-700">

                <template x-for="site in sites">
                    <tr class="border-b border-gray-200 py-10">
                        <!-- <th scope="row" class="check-column" style="padding-top: 6px;">
                            <input type="checkbox" name="checked[]" :value="site.id" :id="site.id">
                        </th> -->
                        <td class="px-4 py-3 plugin-title column-primary " width="50%">
                            <span class="text-gray-600" x-text="site.url"></span>
                        </td>
                        <td class="px-4 py-3 column-description desc" width="20%">
                            <div class="plugin-description text-gray-600">
                                <p x-text="getSiteStatus(site)"></p>
                            </div>
                        </td>
                        <td class="px-4 py-3 column-auto-updates" width="30%">
                            <div class="">
                                <button x-show="getSiteStatus(site)=='active'" @click="deactivateSite(site)" class="text-white bg-red-500 border-0  px-4 focus:outline-none hover:bg-red-700 rounded py-1"><?php _e("Deactivate Site", POS_TEXT_DOMAIN); ?></button>
                                <button x-show="getSiteStatus(site)!='active'" @click="activateSite(site)" class="text-white bg-green-500 border-0  px-4 focus:outline-none hover:bg-green-600 rounded py-1" style="margin-right:15px;"><?php _e("Activate Site", POS_TEXT_DOMAIN); ?></button>
                                <a @click.prevent="deleteUserSite(site)" href="#" class="text-gray-400 hover:text-[#D54752] relative inline-flex flex-col items-center group pr-2 ml-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill inline-block" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                    <div class="absolute bottom-0 flex-col items-center hidden mb-6 group-hover:flex">
                                        <span class="relative z-10 p-2 text-xs text-white bg-black whitespace-nowrap rounded-md"> Delete</span>
                                        <div class="w-3 h-3 -mt-2 rotate-45 bg-black"></div>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>
                </template>
            </tbody>

            <!-- <tfoot>
                            <tr class="border-b border-gray-200 py-10 text-left"> -->
            <!-- <td id="cb" style="width:3%" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1"><?php _e("Select All", POS_TEXT_DOMAIN); ?></label><input id="cb-select-all-1" type="checkbox"></td> -->
            <!-- <th scope="col" id="name" class="px-4 py-3 text-gray-500 manage-column column-name column-primary" style="width: 25%;"><?php _e("Site", POS_TEXT_DOMAIN); ?></th>
                                <th scope="col" id="description" class="px-4 py-3  text-gray-500 manage-column column-description"><?php _e("Status", POS_TEXT_DOMAIN); ?></th>
                                <th scope="col" id="auto-updates" class="px-4 py-3 text-gray-500 manage-column column-auto-updates"></th>
                            </tr>
                        </tfoot> -->

        </table>


    </div>

</div>