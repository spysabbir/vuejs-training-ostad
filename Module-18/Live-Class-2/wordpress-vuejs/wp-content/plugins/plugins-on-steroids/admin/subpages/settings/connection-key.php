<div class="flex flex-col">
    <p class="p-4 text-lg">These values are used to connect with our <a class="text-[#2873AF] font-bold underline" href="https://remote.eazyplugins.com/" target="_blank">Remote Management</a> service.</p>
    <table class="table-auto w-full plugins">
        <thead>
            <tr class="border-b-gray-300 border-b text-sm text-gray-700 text-left">
                <th x-show="!tokenManager.connectedInfo" scope="col" id="auto-updates" class="w-[420px] px-4 py-3 text-gray-500 manage-column column-auto-updates-"><?php _e("Home Page URL", POS_TEXT_DOMAIN); ?></th>
                <th x-show="!tokenManager.connectedInfo" scope="col" id="description" class="px-4 py-3 text-gray-500 manage-column column-description"><?php _e("Connection Key", POS_TEXT_DOMAIN); ?></th>
                <th scope="col" id="description" class="px-4 py-3 text-gray-500 manage-column column-description"><?php _e("Status", POS_TEXT_DOMAIN); ?></th>
                <th scope="col" id="description" class="px-4 py-3 text-gray-500 manage-column column-description"><?php _e("Action", POS_TEXT_DOMAIN); ?></th>
            </tr>
        </thead>

        <tbody id="the-connection-key" class="text-sm font-normal text-gray-700">

            <tr x-show="Object.keys(tokenManager.connectedInfo).length <= 0" class="border-b border-gray-200 py-10 ">

                <td class="px-4 py-5 column-description desc w-[420px] align-middle">
                    <div class="plugin-description text-gray-600 flex justify-start items-center py-3">
                        <span x-text="tokenManager.connectionKeyData.site_url"></span>

                        <a @click.prevent="tokenManager.copySiteUrl(tokenManager.connectionKeyData.site_url)" href="#" class="ml-4 text-gray-400 relative- flex items-center group- focus:ring-0">
                            <div class="relative flex flex-col items-center group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-subtract" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z" />
                                </svg>
                                <div class="absolute bottom-0 flex-col items-center hidden mb-6 group-hover:flex">
                                    <span class="relative z-10 p-2 text-xs text-white bg-black whitespace-nowrap rounded-md" x-text="tokenManager.copiedSiteUrlText ? tokenManager.copiedSiteUrlText : 'Copy' "></span>
                                    <div class="w-3 h-3 -mt-2 rotate-45 bg-black"></div>
                                </div>
                            </div>

                        </a>

                    </div>

                </td>

                <td class="px-4 py-5 column-description desc align-middle">
                    <div class="plugin-description text-gray-600 flex justify-start items-center py-3">
                        <span x-text="tokenManager.connectionKeyData.connection_key"></span>

                        <a @click.prevent="tokenManager.copyConnectionKey(tokenManager.connectionKeyData.connection_key)" href="#" class="ml-4 text-gray-400 relative- flex items-center group- focus:ring-0">
                            <div class="relative flex flex-col items-center group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-subtract" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z" />
                                </svg>
                                <div class="absolute bottom-0 flex-col items-center hidden mb-6 group-hover:flex">
                                    <span class="relative z-10 p-2 text-xs text-white bg-black whitespace-nowrap rounded-md" x-text="tokenManager.copiedText ? tokenManager.copiedText : 'Copy'"></span>
                                    <div class="w-3 h-3 -mt-2 rotate-45 bg-black"></div>
                                </div>
                            </div>
                        </a>

                    </div>

                </td>

                <td class="px-4 py-5 column-description align-middle">
                    Disconnected
                </td>
                <td class="px-4 py-2 column-description align-middle">
                    <button @click.prevent="tokenManager.generateEpmNewKey()" class="text-white bg-[#2873AF] cursor-pointer focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center mr-3 md:mr-0 hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0 btn-generate-ck">Generate New Key</button>
                </td>

            </tr>

            <tr x-show="Object.keys(tokenManager.connectedInfo).length > 0" class="border-b border-gray-200 py-10">
                <td class="px-4 py-5 column-description align-middle ">
                    <div class="inline-flex items-center text-[#1E1E3C] bg-[#e9f4ee] px-5 py-3 rounded-md">
                        <div class="text-[#7BB72E] pr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill w-6 h-6" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                            </svg>
                        </div>
                        <span class="font-bold">Connected to Remote Management</span>
                    </div>
                    <!-- <span class="font-bold py-3 px-5 rounded-md text-[#1E1E3C] bg-[#e9f4ee]">Connected to Remote Management</span> -->
                </td>

                <td class="px-4 py-5 column-description align-middle">
                    <div class="plugin-description text-gray-600 flex justify-start items-center">
                        <button @click.prevent="tokenManager.disconectSiteFromEazyWp()" class="text-white bg-red-500 border-0 focus:outline-none hover:bg-red-700 rounded py-3 px-5">Disconnect</button>
                    </div>
                </td>

            </tr>

        </tbody>

    </table>

</div>