<div x-show="tx=='t2'" class="pt-0" id="token" role="tabpanel" aria-labelledby="token-tab">
    <div action="" method="post" class="pt-[30px]" id="token-form" name="token-form">
        <div class="flex mb-3 w-8/12 mx-auto">
            <div class="relative w-full mr-3 token-form-group">
                <input @keydown.enter='tokenManager.createToken()' x-model='tokenManager.url' type="text" class="form-control block w-full text-[18px] font-[400] text-gray-700 bg-white border border-solid border-[#E0E0E0] rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-gray-700 focus:outline-none " placeholder="Enter site url" />
            </div>
            <div class="token-form-actions">
                <input @click='tokenManager.createToken()' type="button" value="Generate Token" class="cursor-pointer text-white bg-[#D54752] hover:bg-[#4c5564] focus:ring-4 focus:ring-[#4c5564] font-bold rounded px-8 py-4 text-[16px]  text-center focus:outline-none focus:ring-0">
            </div>
        </div>
    </div>
    <div class="container-full py-10 mx-auto" x-show="x439001('2c1e2b1daf8e75bbba55ee03e9b6e28c23686988')">
        <h2 class="text-lg font-bold mb-4 flex justify-between">
            <div>
                <div class="flex justify-between items-center">
                    <h2>
                        <?php _e("Your Tokens", POS_TEXT_DOMAIN); ?>
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
                    <th scope="col" id="name" class="px-4 py-3 text-gray-500 manage-column column-name column-primary" style="width: 40%;"><?php _e("Site URL", POS_TEXT_DOMAIN); ?></th>
                    <th scope="col" id="description" class="px-4 py-3 text-gray-500 manage-column column-description"><?php _e("Token", POS_TEXT_DOMAIN); ?></th>
                    <th scope="col" id="description" class="px-4 py-3 text-gray-500 manage-column column-description"><?php _e("Status", POS_TEXT_DOMAIN); ?></th>
                    <th scope="col" id="auto-updates" class="px-4 py-3 text-gray-500 manage-column column-auto-updates"><?php _e("Action", POS_TEXT_DOMAIN); ?></th>
                </tr>
            </thead>

            <tbody id="the-tokens" class="text-sm font-normal text-gray-700">

                <template x-for="(token, tindex) in tokenManager.tokens">
                    <tr class="border-b border-gray-200 py-10">
                        <td class="px-4 py-3 plugin-title column-primary " width="40%">
                            <span class="text-gray-600" x-text="token.url"></span>
                        </td>
                        <td class="px-4 py-3 column-description desc">
                            <div class="plugin-description text-gray-600 flex justify-start items-center">
                                <span x-text="token.token"></span>
                                <a @click.prevent="tokenManager.copyToken(token.token)" href="#" class="ml-4 text-gray-400 relative flex flex-col items-center group focus:ring-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-subtract" viewBox="0 0 16 16">
                                        <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z" />
                                    </svg>
                                    <div class="absolute bottom-0 flex-col items-center hidden mb-6 group-hover:flex">
                                        <span class="relative z-10 p-2 text-xs text-white bg-black whitespace-nowrap rounded-md"> Copy</span>
                                        <div class="w-3 h-3 -mt-2 rotate-45 bg-black"></div>
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td class="px-4 py-3 column-description desc">
                            <div class="plugin-description text-gray-600">
                                <p x-text="tokenManager.getSiteStatus(token)"></p>
                            </div>
                        </td>
                        <td class="px-4 py-3 column-auto-updates flex justify-start items-center">
                            <span class="">
                                <button x-show="tokenManager.getSiteStatus(token)=='active'" @click="tokenManager.deactivateSite(token, tindex)" class="text-white bg-red-500 border-0  px-4 focus:outline-none hover:bg-red-700 rounded py-1"><?php _e("Deactivate", POS_TEXT_DOMAIN); ?></button>
                                <button x-show="tokenManager.getSiteStatus(token)!='active'" @click="tokenManager.activateSite(token, tindex)" class="text-white bg-green-500 border-0 mr-4 px-4 focus:outline-none hover:bg-green-600 rounded py-1"><?php _e("Activate", POS_TEXT_DOMAIN); ?></button>
                            </span>
                            <a @click.prevent='tokenManager.deleteToken(token, tindex)' href="#" class="ml-4 text-gray-400 hover:text-[#D54752] relative flex flex-col items-center group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
                                <div class="absolute bottom-0 flex-col items-center hidden mb-6 group-hover:flex">
                                    <span class="relative z-10 p-2 text-xs text-white bg-black whitespace-nowrap rounded-md"> Delete</span>
                                    <div class="w-3 h-3 -mt-2 rotate-45 bg-black"></div>
                                </div>
                            </a>
                        </td>
                    </tr>
                </template>
            </tbody>

        </table>

    </div>
</div>