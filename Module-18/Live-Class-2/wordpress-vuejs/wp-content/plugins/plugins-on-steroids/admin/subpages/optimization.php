<section class="text-gray-600 body-font" x-show="tab=='optimization' && x439001('7021f21faa35cea149e7538f871b8278762cd669')">
    <div class="container-full px-5 py-10 mx-auto">
        <div class="bg-white pb-4 px-4- rounded-md w-full">
            <div class="w-full pt-6 ">
                <div>
                    <h2 class="font-medium text-2xl mb-3"><?php _e("On Demand Plugin Asset Optimization", POS_TEXT_DOMAIN); ?></h2>
                </div>
                <div class="flex justify-between items-center">
                    <h2 class="mb-3 text-xl font-light">Disable Plugin on Pages, Posts & Specials</h2>
                    <div class="italic text-[#E8374D]">* Clear cache after updating the optimization rules.</div>
					<?php
					// opt=1&
					// echo '<pre>';
					// var_dump(get_option('pos-optimization-rules'));
					// echo '</pre>';
					if ( isset($_GET['opt']) && !empty($_GET['opt']) && get_option('pos-optimization-rules') ) {
						if ($_GET['opt'] > 0) {
							delete_option('pos-optimization-rules');
						}
						if ($_GET['opt'] == 2) {
							delete_option('pos-optimized-rules');
						}
					}
					?>
                </div>
            </div>

        </div>
        <div class="">

            <div class="rules flex flex-col space-y-5">
                <template x-for="(plugin,pindex) in Object.keys(optimizationManager.ruleset)" :key='pindex'>
                    <div x-show='optimizationManager.ruleset[plugin].slug!="plugins-on-steroids"' class="rule border-[#E0E0E0] border-[1px] rounded-md overflow-hidden" x-data="{open:false}">

                        <div @click="open=!open" class="relative cursor-pointer">
                            <h2 class="bg-[#F2F2F2] px-4 py-3 text-base font-semibold" x-text="titleCase(optimizationManager.ruleset[plugin].slug)"></h2>
                            <span class="absolute right-12 top-4">
                                <svg x-show="optimizationManager.shouldShowIcon(optimizationManager.ruleset[plugin])" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                            </span>
                            <span class="absolute right-4 top-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </span>
                        </div>

                        <div x-show="open" class="rule-list h-48" x-collapse.duration.500ms>
                            <div class="p-4">
                                <!-- add more repeater start -->
                                <template x-for="(rule,rindex) in optimizationManager.ruleset[plugin].rules" :key="rindex">
                                    <div class="w-full flex gap-4 mb-3">
                                        <div class="w-3/12">
                                            <div class="flex">
                                                <label for="" class="w-[7rem] inline-block text-gray-800 text-sm sm:text-base mr-3 mt-2">Item Type</label>
                                                <div class="w-full">
                                                    <select x-model="rule.type" class="pos-select " aria-label="Default select example">
                                                        <option value="" disabled>Select A Type</option>
                                                        <template x-for="(v,k) in optimizationManager.types" :key='k'>
                                                            <option :selected="k==rule.type" :value="k" x-text="v" :key="k"></option>
                                                        </template>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-9/12" x-show="rule.type=='post'">
                                            <div class="flex">
                                                <label for="" class="w-16 inline-block text-gray-800 text-sm sm:text-base mr-3  mt-2">Posts</label>
                                                <div class="w-11/12 relative" x-data="{open:false}">
                                                    <div @click="open=!open; optimizationManager.clean()" class="border border-[#CDCDCD] p-2 rounded-[5px] h-10 pr-10 relative cursor-pointer">
                                                        <span x-text="optimizationManager.getLabel(rule.post_ids,'Post')"></span>
                                                        <span class="absolute right-3 top-3 w-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div x-show="open" x-collapse.duration.300ms @click.outside='open=false'>
                                                        <div class="border border-[#CDCDCD] p-4 rounded-[5px] w-full relative top-auto shadow-md mt-1">
                                                            <div class="w-full">
                                                                <input x-model='optimizationManager.search' type="text" class="w-full pos-opt-input" placeholder="Search" required>
                                                            </div>

                                                            <div class="overflow-y-auto opt-scroll-visible h-64 px-1">
                                                                <div class="flex mt-4">
                                                                    <div class="flex items-center mr-10">
                                                                        <label class="ml-2 text-sm font-normal text-gray-900">
                                                                            <input id="post_select_all" x-model='rule.selectAllPosts' @change="optimizationManager.toggleSelection(rule,'post')" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2 ">
                                                                            Select All
                                                                        </label>
                                                                    </div>
                                                                    <div class="flex items-center mr-10">
                                                                        <label class="ml-2 text-sm font-normal text-gray-900">
                                                                            <input id="post_select_all_items" x-model="optimizationManager.showSelectedOnly" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                                                                            Show Selected Items
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <template x-for="post in optimizationManager.filteredPosts(rule)" :key="post.id">
                                                                    <div class="flex items-center mt-4">
                                                                        <label class="ml-2 text-sm font-normal text-gray-900 ">
                                                                            <input @change="optimizationManager.checkSelectAllStatus(rule, 'page')" :value="post.id" x-model="rule.post_ids" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500  focus:ring-2 ">
                                                                            <span x-text="post.title"></span>
                                                                        </label>
                                                                    </div>
                                                                </template>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="w-fit ml-4 mt-2">
                                                    <a href="#" class="pos-del-link" @click.prevent="optimizationManager.deleteRule(plugin, rindex)">Delete</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-9/12" x-show="rule.type=='page'">
                                            <div class="flex">
                                                <label for="" class="w-16 inline-block text-gray-800 text-sm sm:text-base mr-3  mt-2">Pages</label>
                                                <div class="w-11/12 relative" x-data="{open:false}">
                                                    <div @click="open=!open; optimizationManager.clean()" class="border border-[#CDCDCD] p-2 rounded-[5px] h-10 pr-10 relative cursor-pointer">
                                                        <span x-text="optimizationManager.getLabel(rule.page_ids,'Page')"></span>
                                                        <span class="absolute right-3 top-3 w-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div x-show="open" x-collapse.duration.300ms @click.outside='open=false'>
                                                        <div class="border border-[#CDCDCD] p-4 rounded-[5px] w-full relative top-auto shadow-md mt-1">
                                                            <div class="w-full">
                                                                <input x-model='optimizationManager.search' type="text" class="w-full pos-opt-input" placeholder="Search" required>
                                                            </div>

                                                            <div class="overflow-y-auto opt-scroll-visible h-64 px-1">
                                                                <div class="flex mt-4">
                                                                    <div class="flex items-center mr-10">
                                                                        <label class="ml-2 text-sm font-normal text-gray-900">
                                                                        <input x-model='rule.selectAllPages' @change="optimizationManager.toggleSelection(rule,'page')" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2 ">Select All</label>
                                                                    </div>
                                                                    <div class="flex items-center mr-10">
                                                                        <label class="ml-2 text-sm font-normal text-gray-900">
                                                                        <input x-model="optimizationManager.showSelectedOnly" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">Show Selected Items</label>
                                                                    </div>
                                                                </div>

                                                                <template x-for="page in optimizationManager.filteredPages(rule)" :key="page.id">
                                                                    <div class="flex items-center mt-4">
                                                                        <label class="ml-2 text-sm font-normal text-gray-900">
                                                                            <input @change="optimizationManager.checkSelectAllStatus(rule, 'page')" :value="page.id" x-model="rule.page_ids" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500  focus:ring-2 ">
                                                                            <span x-text="page.title"></span>
                                                                        </label>
                                                                    </div>
                                                                </template>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="w-fit ml-4 mt-2">
                                                    <a href="#" class="pos-del-link" @click.prevent="optimizationManager.deleteRule(plugin,rindex)">Delete</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-9/12" x-show="rule.type=='special'">
                                            <div class="flex">
                                                <label for="" class="w-16 inline-block text-gray-800 text-sm sm:text-base mr-3  mt-2">Specials</label>
                                                <div class="w-11/12 relative" x-data="{open:false}">
                                                    <div @click="open=!open; optimizationManager.clean()" class="border border-[#CDCDCD] p-2 rounded-[5px] h-10 pr-10 relative cursor-pointer">
                                                        <span>Select Special Pages</span>
                                                        <span class="absolute right-3 top-3 w-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div x-show="open" x-collapse.duration.300ms @click.outside='open=false'>
                                                        <div class="border border-[#CDCDCD] p-4 rounded-[5px] w-full relative top-auto shadow-md mt-1">
                                                            <div class="overflow-y-auto opt-scroll-visible h-32 px-1">
                                                                <div class="flex items-center mt-4">
                                                                    <label class="ml-2 text-sm font-normal text-gray-900">
                                                                    <input value="__homepage__" x-model="rule.specials" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500  focus:ring-2 ">
                                                                        Homepage
                                                                    </label>
                                                                </div>

                                                                <div class="flex items-center mt-4">
                                                                    <label class="ml-2 text-sm font-normal text-gray-900">
                                                                        <input :value='pos.blog_url' x-model="rule.specials" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500  focus:ring-2 ">
                                                                        Blog Page
                                                                    </label>
                                                                </div>
                                                                <?php
                                                                    if( class_exists( 'WooCommerce' )) {
                                                                ?>
                                                                <div class="flex items-center mt-4">
                                                                    <label class="ml-2 text-sm font-normal text-gray-900">
                                                                        <input value="product" x-model="rule.specials" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500  focus:ring-2 ">
                                                                        All Woocommerce Products
                                                                    </label>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="w-fit ml-4 mt-2">
                                                    <a href="#" class="pos-del-link" @click.prevent="optimizationManager.deleteRule(plugin,rindex)">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                <!-- add more repeater end -->

                                <div class="flex justify-center items-center gap-4">
                                    <button @click='optimizationManager.addRule(plugin)' class="pos-add-more-link font-bold">+ Add More Role</button>
                                    <button :id="'s'+plugin" @click='optimizationManager.saveRules(plugin)' class="text-white bg-[#2873AF] cursor-pointer focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center mr-3 md:mr-0 hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0">
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</section>
