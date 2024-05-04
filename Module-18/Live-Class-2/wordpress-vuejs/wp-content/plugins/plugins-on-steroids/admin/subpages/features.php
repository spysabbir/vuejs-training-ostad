<section class="text-gray-600 body-font" x-show="tab=='home'">
    <div class="container-full px-5 py-[56px] mx-auto">
        <!-- free features -->
        <div class="flex flex-col- w-full- mb-[48px] justify-between">
            <h2 class="font-medium text-2xl mt-2"><?php _e("Impressive Free Features", POS_TEXT_DOMAIN); ?></h2>
            <a x-show="user.slug=='free' || !isLoggedIn()" :href="checkoutUrl()" class="text-white bg-[#E8374D] cursor-pointer focus:ring-blue-300 font-medium rounded-md text-sm px-10 py-4 text-center hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0">Get Pro</a>
        </div>
        <div class="grid grid-cols-3">
            <div class="flex h-full border border-b-gray-300 p-8 flex-col hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center mb-5">
                    <div class="w-11 h-11">
                    <img src="<?php echo POS_URL; ?>assets/images/remote.svg" alt="">
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Remote Management", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base text-gray-500"><?php _e("Remotely manage all your plugins and WordPress settings from one centralized dashboard. Remote management makes managing multiple WordPress sites easy.", POS_TEXT_DOMAIN); ?></p>
                    <div class="flex align-center justify-between">
                        <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/J68A6lyRaC8')">
                            Watch Video
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                            </svg>
                        </span>
                        <a href="https://remote.eazyplugins.com/" target="_blank" class='cursor-pointer text-[#2873af] hover:text-gray-900 ml-4'>
                            Access Remote
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-l-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center mb-5">
                    <div class="w-11 h-11">
                        <img src="<?php echo POS_URL; ?>assets/images/bookmark.svg" alt="">
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Bookmark Plugins", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Bookmark your favorite plugins and use them anywhere, anytime. No more losing some interesting plugins that you found last night!", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/m0vQIiv6SFw')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-l-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-11 h-11">
                        <img src='<?php echo POS_URL; ?>assets/images/bookmark-cat.svg' />
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Bookmark Categories", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("In pro version, you can organize your bookmarks in categories, and perform bulk operations on them", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/KijFTmp-STk')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-t-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-11 h-11">
                        <img src='<?php echo POS_URL; ?>assets/images/tools.svg' />
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("One Click Bulk Install", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Pro version allows you to bulk install all plugins in a bookmarked category with just a single click", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/WPUolhjkZ58')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-t-[0px] border-l-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center mb-5">
                    <div class="w-11 h-11">
                        <img src="<?php echo POS_URL; ?>assets/images/plugin-img.svg" alt="">
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Plugin Thumbnail", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Now you can see the plugin Thumbnails in installed plugin section, for many of us that's a required feature missing in WordPress.", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/jn8EVJr7IZM')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-t-[0px] border-l-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center mb-5">
                    <div class="w-11 h-11">
                        <img src="<?php echo POS_URL; ?>assets/images/download.svg" alt="">
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Download Plugins", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Made some customizations? Tired of FTP? Download any plugin from your plugin admin area in just one click. ", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/a8j-tC6Up_Q')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-t-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center mb-5">
                    <div class="w-11 h-11">
                        <img src="<?php echo POS_URL; ?>assets/images/history.svg" alt="">
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Plugin History", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Everytime you install new plugins, activate or deactivate them or delete we will show you the full log. Super handy for debugging and trouble shooting.", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/pWqIG2fJRs0')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-t-[0px] border-l-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-10 h-10">
                        <img src='<?php echo POS_URL; ?>assets/images/version.svg' />
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"> <?php _e("Version Management", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Plugin Version Management helps you to manage plugin versions. Switch your plugin version anytime. No more issues about plugin updates breaking your website.", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/NrTIMegS2QM')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-t-[0px] border-l-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-11 h-11">
                        <img src='<?php echo POS_URL; ?>assets/images/note.svg' />
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Quick Notes", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Have something to note about a plugin? This feature allows you to add quick notes on each of your plugins, like never before.", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/_EJv2iZHIyo')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-t-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-11 h-11">
                        <img src='<?php echo POS_URL; ?>assets/images/lock.svg' />
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Plugins Lock", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Don’t want your plugins be deleted? Don’t want to update a plugin? Now you can prevent any kind of modification to your installed plugins.", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/-GAN6sxNmZg')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center mb-5">
                    <div class="w-11 h-11">
                        <img src="<?php echo POS_URL; ?>assets/images/search.svg" alt="">
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Super Fast Search", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base text-gray-500"><?php _e("Searching for installed plugins is super slow in WordPress, but not anymore! With Eazy Plugin Manager, it's faster than lightening", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/J68A6lyRaC8')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

        </div>

        <!-- pro features -->
        <div class="flex flex-col- w-full- my-[48px] justify-between">
            <h2 class="font-medium text-2xl mt-2"><?php _e("Amazing Pro Features", POS_TEXT_DOMAIN); ?></h2>
            <a x-show="user.slug=='free'" :href="checkoutUrl()" class="text-white bg-[#E8374D] cursor-pointer focus:ring-blue-300 font-medium rounded-md text-sm px-10 py-4 text-center hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0">Get Pro</a>

        </div>
        <div class="grid grid-cols-3">

            <div class="flex h-full border border-b-gray-300 p-8 flex-col hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center justify-between  mb-5">
                    <div class="w-11 h-11">
                        <img src='<?php echo POS_URL; ?>assets/images/token-login.svg' />
                    </div>
                    <span class="mb-3 bg-[#E8374D] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-2xl">PRO</span>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Token Login", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Generate login tokens and share them between other team members or clients to activate Eazy Plugin Manager without sharing your master credential.", POS_TEXT_DOMAIN); ?></p>
                    <a href="https://eazyplugins.com/docs/eazy-plugin-manager/pro-features/token-login/" target="_blank" class='cursor-pointer text-[#2873af] hover:text-gray-900'>
                        Learn More
                    </a>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-l-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-10 h-10">
                        <img src='<?php echo POS_URL; ?>assets/images/vault.svg' />
                    </div>
                    <!-- <span class="mb-3 bg-[#E79073] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-2xl">Upcoming</span> -->
                    <span class="mb-3 bg-[#E8374D] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-2xl">PRO</span>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"> <?php _e("Plugin Vault", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Modified a plugin? Have a third-party plugin? Have a pro download? Store in our plugin vault and use anytime anywhere", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/yuXf9sMvxek')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-l-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-11 h-11">
                        <img src='<?php echo POS_URL; ?>assets/images/guard.svg' />
                    </div>
                    <span class="mb-3 bg-[#E8374D] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-2xl">PRO</span>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Active Guard", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Pro version will always runs a security check of your installed plugins and warns about exposed vulnerabilities and security issues", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/jfJtwOJzYRE')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-t-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-11 h-11">
                        <img src='<?php echo POS_URL; ?>assets/images/block.svg' />
                    </div>
                    <span class="mb-3 bg-[#E8374D] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-2xl">PRO</span>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Block Plugins", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Tired of that one problematic plugin that your other admins install? With Plugin Block you can blacklist any plugin to prevent their installation.", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/WezJq3chGu4')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-t-[0px] border-l-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-11 h-11">
                        <img src='<?php echo POS_URL; ?>assets/images/opt.svg' />
                    </div>
                    <span class="mb-3 bg-[#E8374D] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-2xl">PRO</span>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("On Demand Plugin Asset Optimization", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("Selectively load asset on specific pages, posts or custom post types. This allows you to prune unneeded assets and makes your website blazing fast.", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/kbyOOXFC2cc')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="flex h-full border border-b-gray-300 p-8 flex-col border-t-[0px] border-l-[0px] hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-11 h-11">
                        <img src='<?php echo POS_URL; ?>assets/images/snow.svg' />
                    </div>
                    <span class="mb-3 bg-[#E8374D] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-2xl">PRO</span>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Freeze Plugins", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("​Freeze Plugins feature freezes the entire plugin page preventing any installation, update, deletion or modification. It prevents your site breaking due to plugin mismanagement.", POS_TEXT_DOMAIN); ?></p>
                    <span class='cursor-pointer text-[#2873af] hover:text-gray-900' @click="videoModal.show('https://www.youtube.com/embed/E2y-190R_Zw')">
                        Watch Video
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle inline-block ml-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- <div class="flex h-full border border-b-gray-300 p-8 flex-col border-t-[0px] border-l-[0px]- hover:shadow-2xl transition hover:ease-out">
                <div class="flex items-center justify-between mb-5">
                    <div class="w-12 h-12">
                        <img src='<?php echo POS_URL; ?>assets/images/support.svg' />
                    </div>
                    <span class="mb-3 bg-[#E8374D] text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-2xl">Pro</span>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-bold"><?php _e("Premium Support", POS_TEXT_DOMAIN); ?></h2>
                    <p class="leading-relaxed text-base"><?php _e("With Eazy Plugin Manager pro, you get guaranteed quick response. We strive to offer our users a smooth experience with our plugin and will do anything to help you get through your trouble.", POS_TEXT_DOMAIN); ?></p>
                </div>
            </div> -->


        </div>

        <div class="flex mt-10 justify-center">
            <a x-show="user.slug=='free' || !isLoggedIn()" :href="checkoutUrl()" class="text-white bg-[#E8374D] cursor-pointer focus:ring-blue-300 font-medium rounded-md text-sm px-10 py-4 text-center hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0">Get Pro</a>
        </div>
    </div>
</section>