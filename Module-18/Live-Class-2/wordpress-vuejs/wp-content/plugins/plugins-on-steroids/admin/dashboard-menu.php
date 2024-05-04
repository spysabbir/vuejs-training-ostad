<section class="heading">
    <nav class="bg-white border-gray-200 px-5 py-2.5 rounded">
        <div class="container-full flex flex-wrap justify-between items-center mx-auto">
            <a @click="tab='login'" href="#" class="flex items-center focus:shadow-none">
                <img class="w-48 mb-2.5 mr-2 shadow-light-200" src="<?php echo plugin_dir_url(__FILE__); ?>../assets/images/epm-logo.svg" alt="">
                <!-- <img class="w-12 h-12 mr-2 shadow-light-200" src="<?php echo plugin_dir_url(__FILE__); ?>../assets/images/pos.png" alt="">
                <span class="self-center text-[#1e1e3d] text-lg font-semibold whitespace-nowrap"><?php _e("Eazy Plugin Manager", POS_TEXT_DOMAIN); ?></span> -->

            </a>
            <div class="flex md:order-2 justify-center items-center">
                <!-- <a @click="Bookmarks.getBookmarks()" type="button" class="text-white bg-red-500 hover:bg-red-700 cursor-pointer focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 ">Test Button</a> -->
                <span x-show="isLoggedIn() && user.tx==0" class="text-gray-400 mr-3 user-word-counter" x-text="user.email"></span>

                <!-- logged in user logout button -->
                <a x-show="didILogin()" @click="logout()" class="text-white bg-[#2873AF] cursor-pointer focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center mr-3 md:mr-0 hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0">Logout</a>

                <!-- other user info for log out button -->
                <div x-show="!shoudDisplayTopBar() && isLoggedIn() && !didILogin()" class="relative flex items-center group cursor-pointer">
                    <div class="absolute right-0 flex items-center hidden mr-6 group-hover:flex">
                        <span class="relative w-36 z-10 p-2 text-xs rounded leading-normal text-white whitespace-no-wrap bg-black shadow-lg">Logged in by <?php echo $parent_user_name; ?>. Switch to <?php echo $parent_user_name; ?> to log out of EPM.</span>
                        <div class="w-3 h-3 -ml-2 rotate-45 bg-black"></div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                    </svg>
                </div>

                <a x-show="!token && tab!='login'" href='#login' @click="tab='login'" class="text-white bg-[#2873AF]  cursor-pointer focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center mr-3 md:mr-0 hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0">Sign In/Up</a>
            </div>
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-4">
                <ul id="pos-nav-links" class="pt-2.5- flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <!-- <li class="mb-0">
                        <a @click="tab='home'" href="#home" :class="tab=='home'?'md:text-[#E8374D] font-bold':''" class="block py-2 pr-4 pl-3 text-gray-700 rounded md:bg-transparent md:hover:text-[#E8374D] md:p-0 focus:shadow-none" aria-current="page"><?php _e("Features", POS_TEXT_DOMAIN); ?></a>
                    </li> -->
                    <li class="mb-0" x-show="isLoggedIn()">
                        <a @click="tab='bookmarks'" href="#bookmarks" :class="tab=='bookmarks'?'md:text-[#E8374D] font-bold':''" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-[#E8374D] md:p-0 focus:shadow-none"><?php _e("Bookmarks", POS_TEXT_DOMAIN); ?></a>
                    </li>
                    <li class="mb-0" x-show="isLoggedIn()">
                        <a @click="tab='history'" href="#history" :class="tab=='history'?'md:text-[#E8374D] font-bold':''" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-[#E8374D] md:p-0 focus:shadow-none"><?php _e("History", POS_TEXT_DOMAIN); ?></a>
                    </li>
                    <li class="mb-0" x-show="isLoggedIn() && x439001('c7e42d43b0a326f8979eb4bbeb3655f7deb91f40')">
                        <a @click="tab='guard'" href="#guard" :class="tab=='guard'?'md:text-[#E8374D] font-bold':''" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-[#E8374D] md:p-0 focus:shadow-none"><?php _e("Guard", POS_TEXT_DOMAIN); ?></a>
                    </li>
                    <li class="mb-0" x-show="isLoggedIn() && x439001('a64c89f2592b4dcccad86640cb7e063cc91e171e')">
                        <a @click="tab='vault'" href="#vault" :class="tab=='vault'?'md:text-[#E8374D] font-bold':''" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-[#E8374D] md:p-0 focus:shadow-none"><?php _e("Vault", POS_TEXT_DOMAIN); ?></a>
                    </li>
                    <li class="mb-0" x-show="isLoggedIn() && x439001('7021f21faa35cea149e7538f871b8278762cd669')">
                        <a @click="tab='optimization'" href="#optimization" :class="tab=='optimization'?'md:text-[#E8374D] font-bold':''" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-[#E8374D] md:p-0 focus:shadow-none"><?php _e("Optimization", POS_TEXT_DOMAIN); ?></a>
                    </li>
                    <!-- <li class="mb-0" x-show="isLoggedIn()">
                        <a @click="tab='support'" href="#support" :class="tab=='support'?'md:text-[#E8374D] font-bold':''" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-[#E8374D] md:p-0  focus:shadow-none"><?php _e("Support", POS_TEXT_DOMAIN); ?></a>
                    </li> -->
                    <li class="mb-0" x-show="false">
                        <a @click="tab='pro'" href="#pro" :class="tab=='pro'?'md:text-[#E8374D] font-bold':''" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-[#E8374D] md:p-0 focus:shadow-none"><?php _e("Pro", POS_TEXT_DOMAIN); ?></a>
                    </li>
                    <li class="mb-0" x-show="isLoggedIn() && user.tx==0">
                        <a @click="tab='account'" href="#account" :class="tab=='account'?'md:text-[#E8374D] font-bold':''" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-[#E8374D] md:p-0 focus:shadow-none"><?php _e("Account", POS_TEXT_DOMAIN); ?></a>
                    </li>
                    <li class="mb-0" x-show="isLoggedIn()">
                        <a @click="tab='settings'" href="#settings" :class="tab=='settings'?'md:text-[#E8374D] font-bold':''" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-[#E8374D] md:p-0 focus:shadow-none"><?php _e("Settings", POS_TEXT_DOMAIN); ?></a>
                    </li>
                    <li class="mb-0" x-show="isLoggedIn()">
                        <a href="https://remote.eazyplugins.com/" target="_blank" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-[#E8374D] md:p-0 focus:shadow-none"><?php _e("Remote", POS_TEXT_DOMAIN); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>