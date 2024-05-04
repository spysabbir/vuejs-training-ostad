<section class="text-gray-600 body-font" x-show="tab=='bookmarks'">
    <div class="container-full px-5 py-[56px] mx-auto">
        <div class="bookmarks-container flex">
            <div class="w-1/5 pr-5 mt-[0px] " x-show="!noCategories()">
                <h2 class="font-medium text-2xl mt-2"><?php _e("Bookmarks", POS_TEXT_DOMAIN); ?></h2>
                <ul class="pos-collection  mt-[48px]">
                    <li x-show="noCategories()"><a @click.prevent='' href="#"><?php _e('', POS_TEXT_DOMAIN); ?>No Category</a> </li>
                    <!-- <li><a :class="{active:active==1}" @click.prevent="fetchCBookmarks($data)" href="#" x-data='{key:"all",active:1}'>All</a></li> -->
                    <template x-for="(category, index) in categories">
                        <li x-show="category.n>0" class="bookmark-cat-list group flex justify-around items-center" :class="{active:category.active==1}">
                            <a x-show="(!category.edit) && category.title != 'All' && category.key != 'uncategorized'" @dblclick="category.edit = true" style="box-shadow: none;" :class="{active:category.active==1}" @click.prevent="fetchCBookmarks(category)" class="w-5/6 rounded-md block px-3 py-2" href="#" :data-id='category.id' :data-key='category.key'>
                                <span x-text='category.title'></span>
                                (<span x-text="category.n"></span>)
                            </a>
                            <input type="text" x-model="category.title" x-show="category.edit && category.title != 'All' && category.key != 'uncategorized'" @click.away="renameCategory(index)" @keydown.enter="renameCategory(index)" class="w-5/6 bg-white focus:outline-none focus:shadow-outline border-2 border-[#0D99FE] py-2 px-3 appearance-none leading-normal" />

                            <a x-show="category.title == 'All' || category.key == 'uncategorized'" style="box-shadow: none;" :class="{active:category.active==1}" @click.prevent="fetchCBookmarks(category)" class="w-5/6 rounded-md block px-3 py-2" href="#" :data-id='category.id' :data-key='category.key'>
                                <span x-text='category.title'></span>
                                (<span x-text="category.n"></span>)
                            </a>
                            <span x-show="category.title == 'All' || category.key == 'uncategorized'" class="w-1/6 invisible"></span>

                            <span x-show="category.title != 'All' && category.key != 'uncategorized'" @click.away="category.click = false" @click="category.click = !category.click" class="action w-1/6 flex justify-center invisible cursor-pointer group-hover:visible relative">
                                <span>
                                    <svg width="13" height="4" viewBox="0 0 13 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.3">
                                            <path d="M2.30683 3.13636C1.88637 3.13636 1.52558 2.98579 1.22444 2.68465C0.923304 2.38352 0.772736 2.02272 0.772736 1.60227C0.772736 1.18181 0.923304 0.821017 1.22444 0.51988C1.52558 0.218744 1.88637 0.0681763 2.30683 0.0681763C2.72728 0.0681763 3.08808 0.218744 3.38921 0.51988C3.69035 0.821017 3.84092 1.18181 3.84092 1.60227C3.84092 1.88068 3.76989 2.13636 3.62785 2.36931C3.49149 2.60227 3.30683 2.78977 3.07387 2.93181C2.8466 3.06818 2.59092 3.13636 2.30683 3.13636Z" fill="black" />
                                            <path d="M6.7562 3.13636C6.33575 3.13636 5.97495 2.98579 5.67382 2.68465C5.37268 2.38352 5.22211 2.02272 5.22211 1.60227C5.22211 1.18181 5.37268 0.821017 5.67382 0.51988C5.97495 0.218744 6.33575 0.0681763 6.7562 0.0681763C7.17666 0.0681763 7.53745 0.218744 7.83859 0.51988C8.13972 0.821017 8.29029 1.18181 8.29029 1.60227C8.29029 1.88068 8.21927 2.13636 8.07722 2.36931C7.94086 2.60227 7.7562 2.78977 7.52325 2.93181C7.29597 3.06818 7.04029 3.13636 6.7562 3.13636Z" fill="black" />
                                            <path d="M11.2056 3.13636C10.7851 3.13636 10.4243 2.98579 10.1232 2.68465C9.82205 2.38352 9.67149 2.02272 9.67149 1.60227C9.67149 1.18181 9.82205 0.821017 10.1232 0.51988C10.4243 0.218744 10.7851 0.0681763 11.2056 0.0681763C11.626 0.0681763 11.9868 0.218744 12.288 0.51988C12.5891 0.821017 12.7397 1.18181 12.7397 1.60227C12.7397 1.88068 12.6686 2.13636 12.5266 2.36931C12.3902 2.60227 12.2056 2.78977 11.9726 2.93181C11.7453 3.06818 11.4897 3.13636 11.2056 3.13636Z" fill="black" />
                                        </g>
                                    </svg>
                                </span>
                                <span x-show="category.click" class="absolute z-10 w-[99px] p-2 border border-[#E0E0E0] left-1/3 rounded-[4px] bg-white top-[10px] shadow-md">
                                    <span @click="category.edit = true" class="block mb-[10px] p-2 rounded-md hover:bg-[#F0F6FB]">
                                        <svg class="inline mr-[5px]" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.3875 2.4L10.2667 4.27917C10.3458 4.35833 10.3458 4.4875 10.2667 4.56667L5.71667 9.11667L3.78333 9.33125C3.525 9.36042 3.30625 9.14167 3.33542 8.88333L3.55 6.95L8.1 2.4C8.17917 2.32083 8.30833 2.32083 8.3875 2.4ZM11.7625 1.92292L10.7458 0.90625C10.4292 0.589583 9.91458 0.589583 9.59583 0.90625L8.85833 1.64375C8.77917 1.72292 8.77917 1.85208 8.85833 1.93125L10.7375 3.81042C10.8167 3.88958 10.9458 3.88958 11.025 3.81042L11.7625 3.07292C12.0792 2.75417 12.0792 2.23958 11.7625 1.92292ZM8 7.87917V10H1.33333V3.33333H6.12083C6.1875 3.33333 6.25 3.30625 6.29792 3.26042L7.13125 2.42708C7.28958 2.26875 7.17708 2 6.95417 2H1C0.447917 2 0 2.44792 0 3V10.3333C0 10.8854 0.447917 11.3333 1 11.3333H8.33333C8.88542 11.3333 9.33333 10.8854 9.33333 10.3333V7.04583C9.33333 6.82292 9.06458 6.7125 8.90625 6.86875L8.07292 7.70208C8.02708 7.75 8 7.8125 8 7.87917Z" fill="black" />
                                        </svg> Edit
                                    </span>
                                    <span @click="deleteCategory(index)" class="block p-2 rounded-md hover:bg-[#F0F6FB]">
                                        <svg class="inline mr-[5px]" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.875 0.750004H8.0625L7.84219 0.311723C7.79552 0.218023 7.72363 0.139205 7.63461 0.084135C7.54558 0.0290653 7.44296 -7.09679e-05 7.33828 4.10923e-06H4.65938C4.55493 -0.000397388 4.45249 0.0286302 4.36378 0.0837612C4.27508 0.138892 4.20369 0.217897 4.15781 0.311723L3.9375 0.750004H1.125C1.02554 0.750004 0.930161 0.789513 0.859835 0.859839C0.789509 0.930165 0.75 1.02555 0.75 1.125L0.75 1.875C0.75 1.97446 0.789509 2.06984 0.859835 2.14017C0.930161 2.2105 1.02554 2.25 1.125 2.25H10.875C10.9745 2.25 11.0698 2.2105 11.1402 2.14017C11.2105 2.06984 11.25 1.97446 11.25 1.875V1.125C11.25 1.02555 11.2105 0.930165 11.1402 0.859839C11.0698 0.789513 10.9745 0.750004 10.875 0.750004ZM1.99688 10.9453C2.01476 11.2309 2.14082 11.499 2.34939 11.6949C2.55796 11.8909 2.83336 12 3.11953 12H8.88047C9.16664 12 9.44204 11.8909 9.65061 11.6949C9.85918 11.499 9.98524 11.2309 10.0031 10.9453L10.5 3H1.5L1.99688 10.9453Z" fill="black" />
                                        </svg> Delete
                                    </span>
                                </span>
                            </span>
                        </li>
                    </template>
                </ul>

                <div @click="categoryManager.showManageModal()" class="text-sm underline mx-3 mt-12 text-[#E8374D] hover:text-[#E79073] cursor-pointer"><?php _e('Delete Empty Categories', POS_TEXT_DOMAIN); ?></div>

            </div>
            <div class="w-1/5 pr-5 mt-[0px] " x-show="noCategories()">
                <h2 class="font-medium text-2xl mt-2"><?php _e("Bookmarks", POS_TEXT_DOMAIN); ?></h2>
                <ul class="pos-collection  mt-[48px]"></ul>
            </div>
            <div class="flex-auto w-4/5">

                <div id="pos-notice"></div>
                <div class="search-bookmarks w-1/4 flex ml-auto" x-show="bookmarks.length>0">
                    <input x-model="bookmarkSearch" class="w-full text-md mb-2 focus:shadow-none focus:outline-none bms" type="text" placeholder="Search Bookmarks">
                </div>

                <div class="actions h-10">
                    <div class="flex justify-between" x-show="bulkSelectedPlugins.length>1">
                        <div class="alignleft actions bulkactions">
                            <select x-show="pos.frozen==2" name="action" x-model='action' id="bulk-action-selector-top">
                                <option value="-1">Bulk actions</option>
                                <option value="install">Install</option>
                                <option value="activate">Activate</option>
                                <option value="deactivate">Deactivate</option>
                            </select>
                            <input x-show="pos.frozen==2" type="button" class="button action" @click.prevent="processBulkAction()" value="Apply">
                        </div>
                        <div class="tablenav-pages one-page ml-auto my-auto" x-show="pos.frozen==2">
                            <span class="displaying-num "><span x-text="bulkSelectedPlugins.length"></span> items</span>
                        </div>

                        <!-- <span class='text-red-500' x-show="pos.frozen==1"><?php _e("You cannot install/activate/deactivate plugins from here because it's frozen by an admin", POS_TEXT_DOMAIN); ?></span> -->
                        <!-- <br class="clear"> -->
                    </div>
                </div>
                <div class="mb-4 flex rounded-lg bg-red-100 p-5 text-sm text-red-500" role="alert" x-show="pos.frozen==1">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="mr-3 h-5 w-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                    </svg>
                    <div class="text-[#E8374D]">
                        <?php _e("You cannot install/activate/deactivate plugins from here because it's frozen by an admin", POS_TEXT_DOMAIN); ?>
                    </div>
                </div>
                <div x-show="noCategories()" class="mt-[64px]"> </div>
                <div x-show="filterByCategory(activeCategory).length==0" class="mb-4 flex rounded-lg bg-blue-100 p-5 text-sm text-blue-500" role="alert">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" class="mr-3 h-5 w-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                    </svg>
                    <div class="text-gray-700"><?php _e("No bookmarks available", POS_TEXT_DOMAIN); ?></div>
                </div>
                <table class="wp-list-table widefat plugins pos-table" x-show="filterByCategory(activeCategory).length>0">
                    <thead>
                        <tr>
                            <td id="cb" style="width:3%" class="manage-column column-cb">
                                <label class="screen-reader-text" for="cb-select-all-1"><?php _e("Select All", POS_TEXT_DOMAIN); ?></label>
                                <input @change="selectPlugins()" x-model="selectAllPlugins" id="cb-select-all" type="checkbox">
                            </td>
                            <th scope="col" id="name" class="manage-column column-name column-primary" style="width: 25%;"><?php _e("Plugin", POS_TEXT_DOMAIN); ?></th>
                            <th scope="col" id="description" class="manage-column column-description"><?php _e("Description", POS_TEXT_DOMAIN); ?></th>
                            <th scope="col" id="auto-updates" class="manage-column column-auto-updates hidden"><?php _e("Automatic Updates", POS_TEXT_DOMAIN); ?></th>
                        </tr>
                    </thead>

                    <tbody id="the-list">
                        <template x-for="(bookmark,index) in filterByCategory(activeCategory)">
                            <tr :class='{active:bookmark.actionText=="Deactivate",deactive:bookmark.actionText=="Activate"}' :data-slug="bookmark.slug" x-show="bookmark.slug">
                                <th scope="row" class="" style="padding-top: 8px;">
                                    <input x-model="bulkSelectedPlugins" type="checkbox" name="checked[]" :value="bookmark.slug" :id="bookmark.slug">
                                </th>
                                <td class="plugin-title column-primary" width="40%">
                                    <img class="pos-plugin-image" style="width: 60px; height: 60px; padding-right: 0px; margin-right: 12px;" :src="bookmark.image">
                                    <strong x-text="titleCase(bookmark.slug)"></strong>
                                    <div class="">
                                        <span x-show="pos.frozen==2 && bookmark.slug!='plugins-on-steroids'"><a href="#" class="activate text-[#2873AF] hover:text-[#07416d]" @click.prevent="processPlugin(bookmark.slug)" x-text="bookmark.actionText"></a> | </span>
                                        <span class="manage"><a href="#" class="text-[#2873AF] hover:text-[#07416d]" @click.prevent="manageCategories(bookmark)">Categories</a> | </span>
                                        <span><a href="#bookmarks" class="text-[#2873AF] hover:text-[#07416d]" @click.prevent="Bookmarks.unBookmark(bookmark.plugin_id); removeBookmark(index)"><?php _e("Unbookmark", POS_TEXT_DOMAIN); ?></a> </span>
                                        <span x-show="bookmark.slug!='plugins-on-steroids'"> | <a href="#bookmarks" class="text-[#2873AF] hover:text-[#07416d]" @click.prevent="versionManager.displayModal(bookmark)"><?php _e("Versions", POS_TEXT_DOMAIN); ?></a> </span>
                                    </div>
                                    <button type="button" class="toggle-row"><span class="screen-reader-text"><?php _e("Show Details", POS_TEXT_DOMAIN); ?></span></button>
                                </td>
                                <td class="column-description desc">
                                    <div class="plugin-description">
                                        <p x-text="bookmark.description"></p>
                                    </div>
                                    <div class="inactive is-uninstallable second plugin-version-author-uri">
                                        <span x-text='getPluginVersion(bookmark.slug)'></span>
                                        <a class="text-[#2873AF] hover:text-[#07416d]" :href="bookmark.url" target="_blank"><?php _e("Details", POS_TEXT_DOMAIN); ?></a> |
                                        <span class="bm-dev-link" x-html="bookmark.developer"></span>
                                    </div>
                                </td>
                                <td class="column-auto-updates hidden">
                                    <div class="notice notice-error notice-alt hidden">
                                        <p></p>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td id="cb" style="width:3%" class="manage-column column-cb">
                                <input @change="selectPlugins()" x-model="selectAllPlugins" id="cb-select-all-2" type="checkbox">
                            </td>
                            <th scope="col" id="name" class="manage-column column-name column-primary" style="width: 25%;"><?php _e("Plugin", POS_TEXT_DOMAIN); ?></th>
                            <th scope="col" id="description" class="manage-column column-description"><?php _e("Description", POS_TEXT_DOMAIN); ?></th>
                            <th scope="col" id="auto-updates" class="manage-column column-auto-updates hidden"><?php _e("__", POS_TEXT_DOMAIN); ?></th>
                        </tr>
                    </tfoot>

                </table>
                <div class="actions h-10 mt-3">
                    <div class="flex justify-between" x-show="bulkSelectedPlugins.length>1">
                        <div class="alignleft actions bulkactions">
                            <select x-show="pos.frozen==2" name="action" id="bulk-action-selector-top">
                                <option value="-1">Bulk actions</option>
                                <option value="install">Install</option>
                                <option value="activate">Activate</option>
                                <option value="deactivate">Deactivate</option>
                            </select>
                            <input x-show="pos.frozen==2" type="submit" id="doaction" class="button action" @click.prevent="processBulkAction()" value="Apply">
                        </div>
                        <div x-show="pos.frozen==2" class="tablenav-pages one-page ml-auto my-auto">
                            <span class="displaying-num "><span x-text="bulkSelectedPlugins.length"></span> items</span>
                        </div>
                        <br class="clear">
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>