<section class="text-gray-600 body-font" x-show="tab=='vault' && x439001('a64c89f2592b4dcccad86640cb7e063cc91e171e')">
    <div class="container-full px-5 py-10 mx-auto">
        <div class="bg-white pb-4 px-4- rounded-md w-full">
            <div class="flex justify-between w-full pt-6 ">
                <div>
                    <h2 class="font-medium text-2xl mb-3"><?php _e("Vault", POS_TEXT_DOMAIN); ?></h2>
                    Total Space Taken: <span class="font-bold" x-text="vaultManager.totalSpace()"></span>
                </div>
                <div class="w-full sm:w-64 inline-block relative ">
                    <input type="text" x-model='vaultManager.search' class="pos-form-field leading-snug border border-gray-300 block w-full appearance-none bg-gray-100 text-sm text-gray-600 py-3 px-4 pl-8 rounded-lg" placeholder="Search" />
                </div>
            </div>
        </div>
        <div class="vault">
            <table class="table-auto w-full" x-show="vaultManager.backups.length>0">
                <thead>
                    <tr class="border-b-gray-300 border-b text-sm text-gray-700 text-left">
                        <th scope="col" id="name" class="px-4 py-3"><?php _e("Plugin", POS_TEXT_DOMAIN); ?></th>
                        <th scope="col" id="version" class="px-4 py-3"><?php _e("Date Added", POS_TEXT_DOMAIN); ?></th>
                        <th scope="col" id="version" class="px-4 py-3"><?php _e("Version", POS_TEXT_DOMAIN); ?></th>
                        <th scope="col" id="version" class="px-4 py-3"><?php _e("Size", POS_TEXT_DOMAIN); ?></th>
                        <th scope="col" id="vault-actions" class="px-4 py-3" width="20%"><?php _e("Action", POS_TEXT_DOMAIN); ?></th>
                    </tr>
                </thead>


                <tbody id="the-list-" class="text-sm font-normal text-gray-700">
                    <template x-for="(plugin,index) in vaultManager.filter(vaultManager.backups)">
                        <tr class="border-b border-gray-200 py-5-">
                            <td class="px-4 py-4">
                                <span x-text="titleCase(plugin.plugin_slug)"></span>
                                <span class="inline-block ml-2 -mb-[2px]" x-show="plugin.shared" title="Shared">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 33 29" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.359985 14.0501L12.2902 25.9701C13.0699 26.7501 14.4103 26.2 14.4103 25.0902V19.5203C15.0343 19.441 15.67 19.4 16.3102 19.4C22.11 19.4 27.15 22.65 29.7003 27.44C30.2701 28.5101 31.8502 28.2201 32.0099 27.0101C32.3102 24.7201 32.17 22.3001 31.5201 19.8302C30.09 14.45 26.0602 10.0601 20.84 8.1202H20.8302C18.6339 7.30379 16.4777 6.94051 14.4103 6.93807V1.25008C14.4103 0.139975 13.0699 -0.40983 12.2902 0.370199L0.359985 12.3001C-0.119995 12.7801 -0.119995 13.5702 0.359985 14.0501Z" fill="#d2d2d2" />
                                    </svg>
                                </span>
                            </td>
                            <td class="px-4 py-4">
                                <span x-data="{date: new Date(plugin.created_at)}" x-text="date.toLocaleDateString('en-US', {month:'short', day:'2-digit',year:'numeric', hour: '2-digit', minute:'2-digit'})"></span>
                            </td>
                            <td class="px-4 py-4">
                                <p class="m-0" x-text="plugin.plugin_version"></p>
                            </td>
                            <td class="px-4 py-4">
                                <p class="m-0" x-text="vaultManager.getSize(plugin.size)"></p>
                            </td>
                            <td class="px-4 py-4">
                                <a href="#" class="pos-restore-link" :id=`x-restore-${plugin.id}` @click.prevent="vaultManager.restore(plugin.id, plugin.plugin_slug, plugin.plugin_version)">Install</a>
                                <span class="px-2 text-gray-300">|</span>
                                <a x-show="user.x16 == '869c92e51342d9db052edc565b9fbf19b93539f8' || user.x16 == 'c1dc4511eb56aea509571e2d9132a8c3d3999a25'" href="#" class="pos-share-link" :id=`x-share-${plugin.id}` @click.prevent="vaultManager.showVaultShareModal(plugin.id, plugin.plugin_slug, plugin.plugin_version)"><?php _e('Share', POS_TEXT_DOMAIN); ?></a>
                                <span x-show="user.x16 == '869c92e51342d9db052edc565b9fbf19b93539f8' || user.x16 == 'c1dc4511eb56aea509571e2d9132a8c3d3999a25'" class="px-2 text-gray-300">|</span>
                                <a href="#" class="pos-del-link" @click.prevent="vaultManager.delete(plugin.id, index)">Delete</a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include_once('vault-share-modal.php'); ?>