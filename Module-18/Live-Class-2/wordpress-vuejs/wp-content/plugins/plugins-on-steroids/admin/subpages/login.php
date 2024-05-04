<section class="text-gray-600 body-font" x-show="tab=='login'">

    <div x-show="isLoggedIn()">
        <div class="grid grid-cols-2 gap-6 px-5 py-10 mx-auto items-center mb-5">
            <div class="">
                <h2 class="text-[48px] font-bold"><?php _e("Welcome", POS_TEXT_DOMAIN); ?></h2>
                <h4 class="text-[28px] font-light text-[#E8374D]"><?php _e("To Eazy Plugin Manager", POS_TEXT_DOMAIN); ?></h4>
                <p class="text-[16px]"><?php _e("Looking to manage your WordPress plugins like a pro? Eazy Plugin Manager is the perfect plugin for you! With its easy to use interface and powerful features, you'll be able to do a lot of things with ease.", POS_TEXT_DOMAIN); ?></p>
            </div>
            <div class="content-center flex place-content-center">
                <img class="w-[300px] rotate-[20deg]" src="https://res.cloudinary.com/dedntrsbl/image/upload/v1656845335/rocket_hjrja5.jpg" alt="">
            </div>
        </div>
        <div class="grid grid-cols-4 gap-6 px-5">
            <div class="bg-[#f4ecfb]  px-8 py-4 pb-8 round rounded-md items-center">
                <h3 class="text-[#914ed6]  text-[48px] font-extrabold" x-text="all_plugins.length"></h3>
                <p class="text-[#914ed6] m-0 text-[24px] font-light"><?php _e("Plugins Installed", POS_TEXT_DOMAIN); ?></p>
            </div>
            <div class="bg-[#fef8eb] px-8 py-4 pb-8 round rounded-md items-center">
                <h3 class="text-[#F7B735] text-[48px] font-extrabold" x-text="active_plugins.length"></h3>
                <p class="m-0 text-[#D79D29] text-[24px] font-light"><?php _e("Active Plugins", POS_TEXT_DOMAIN); ?></p>
            </div>
            <div class="bg-[#e5eff5] px-8 py-4 pb-8 round rounded-md items-center">
                <h3 class="text-[#1a6aa3] text-[48px] font-extrabold" x-text='all_plugins.length-active_plugins.length'></h3>
                <p class="m-0 text-[#1a6aa3] text-[24px] font-light"><?php _e("Inactive Plugins", POS_TEXT_DOMAIN); ?></p>
            </div>
            <div :class="{'pos-guard-success':activeGuard.vulnerabilities.length==0,'pos-guard-error':activeGuard.vulnerabilities.length>0}" class="px-8 py-4 pb-8 round rounded-md items-center">
                <h3 class="text-[48px] font-extrabold" x-text="activeGuard.vulnerabilities.length"></h3>
                <p class="m-0  text-[24px] font-light"><?php _e("Vulnerabilities", POS_TEXT_DOMAIN); ?></p>
            </div>
        </div>
    </div>


    <div x-show="!isLoggedIn()" class="container px-5 py-24 mx-auto flex flex-wrap items-center-">
        <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0 mt-32">
            <h1 x-show="!isLoggedIn()" class="title-font font-bold text-3xl text-gray-900"><?php _e("Login / Register", POS_TEXT_DOMAIN); ?></h1>
            <!-- <h1 x-show="isLoggedIn()" class="title-font font-medium text-3xl text-gray-900"><?php _e("Welcome!", POS_TEXT_DOMAIN); ?></h1> -->
            <p x-show="!isLoggedIn()" class="leading-relaxed mt-4 text-base"><?php _e("You need a free account to enjoy all the features, including the global bookmarking service from Eazy Plugin Manager, available in your WordPress installations.", POS_TEXT_DOMAIN); ?></p>
            <p x-show="!isLoggedIn()" class="leading-relaxed mt-4 text-base"><?php _e("If you don't have any account, please create one, or sign in.", POS_TEXT_DOMAIN); ?></p>
            <!-- <p x-show="isLoggedIn()" class="leading-relaxed mt-4"><?php _e("Welcome back! Now you can use all the free features of Eazy Plugin Manager. Please go to the plugins section for lightening fast navigation and to bookmark all your favorite plugins.", POS_TEXT_DOMAIN); ?></p> -->
        </div>


        <form @submit="event.preventDefault();" x-show="token" class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
            <div x-show="!otp">
                <h2 class="text-gray-900 text-lg font-medium title-font mb-5"><?php _e("Registration / Login", POS_TEXT_DOMAIN); ?></h2>
                <div class="relative mb-4">
                    <label class="leading-7 text-sm text-gray-600"><?php _e("Email", POS_TEXT_DOMAIN); ?></label>
                    <input @keypress="forgot_password_error=''" type="email" x-model="email" autocomplete="current-email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <span class="text-red-500" x-text="forgot_password_error"></span>
                </div>
                <div class="relative mb-4" x-show="!forgot_password">
                    <label class="leading-7 text-sm text-gray-600"><?php _e("Password", POS_TEXT_DOMAIN); ?></label>
                    <input x-show="!forgot_password" @keyup.enter="login" type="password" autocomplete="current-password" x-model="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <p class="mt-2 cursor-pointer" @click="forgot_password=true">Forgot Password?</p>
                </div>
                <div x-show="login_error" class="my-2 ">
                    <span class="text-red-500" x-text="login_error"></span>
                    <span><a href='#' @click="resetPassword()">Reset Password</a></span>
                </div>
                <div class="flex flex-col">
                    <button x-show="!forgot_password" @click="login" class="text-white bg-red-500 cursor-pointer font-lg rounded-md text-lg px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-500 dark:hover:bg-red-700 hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0"><?php _e("Sign In / Sign Up", POS_TEXT_DOMAIN); ?></button>
                    <button x-show="forgot_password" @click="resetPassword()" class="text-white bg-red-500 cursor-pointer font-lg rounded-md text-lg px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-500 dark:hover:bg-red-700 hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0"><?php _e("Reset Password", POS_TEXT_DOMAIN); ?></button>
                </div>
                <p class="text-xs text-gray-500 mt-4 mb-2"><?php _e("If you don't have any account, type your email and password and we will create your account instantly", POS_TEXT_DOMAIN); ?></p>
            </div>
            <div x-show="otp">
                <div class="relative mb-4">
                    <label class="leading-7 text-sm text-gray-600"><?php _e("OTP", POS_TEXT_DOMAIN); ?></label>
                    <input type="text" x-model="otp_check" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div x-show="otp_error" class="my-2 text-red-500" x-text="otp_error_message"></div>
                <button @click="validateOTP()" class="text-white bg-red-500 hover:bg-red-700 cursor-pointer focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-lg px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-500 dark:hover:bg-red-700 hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0"><?php _e("Verify OTP", POS_TEXT_DOMAIN); ?></button>
                <p class="my-2 text-sm">*Please check your email for OTP</p>
            </div>
        </form>


        <!-- remove this markup -->
        <div x-show='false' class="my-5 block w-full"> </div>
        <!-- remove this markup -->

        <!-- new login markup -->

        <form @submit="event.preventDefault();" x-show="!token" class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">

            <div class="container-full">
                <div class="border-b border-[#D2DBE3] mb-4">
                    <ul class="flex flex-wrap -mb-[6px]" id="loginTab" data-tabs-toggle="#loginTabContent" role="tablist">
                        <li class="mr-3" role="presentation">
                            <button @click="showLoginTab()" :class="{active:tx=='t1'}" class="inline-block text-[#b4b4b5] hover:text-[#121827] hover:border-[#121827] rounded-t-lg pb-4 px-3 text-lg font-bold text-center border-transparent border-b-2" id="login-tab" data-tabs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="false">Login</button>
                        </li>
                        <li class="" role="presentation">
                            <button @click="showRegistrationTab()" :class="{active:tx=='t2'}" class="inline-block text-[#b4b4b5] hover:text-[#121827] hover:border-[#121827] rounded-t-lg pb-4 px-3 text-lg font-bold text-center border-transparent border-b-2 " id="register-tab" data-tabs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="true">Register</button>
                        </li>

                    </ul>
                </div>
                <div id="loginTabContent">
                    <!-- login start -->
                    <div class="pt-4" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <div x-show="!otp">
                            <div class="relative mb-4">
                                <label class="leading-7 text-sm text-gray-600"><?php _e("Email", POS_TEXT_DOMAIN); ?></label>
                                <input @keypress="cleanErrors();authtoken=''" type="email" x-model="email" autocomplete="current-email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <span class="text-red-500" x-text="forgot_password_error"></span>
                            </div>
                            <div class="relative mb-4" x-show="!forgot_password">
                                <label class="leading-7 text-sm text-gray-600"><?php _e("Password", POS_TEXT_DOMAIN); ?></label>
                                <input @keydown="cleanErrors();authtoken=''" x-show="!forgot_password" @keyup.enter="login" x-model="password" type="password" type="password" autocomplete="current-password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <p @click="forgot_password=true" x-show="tx=='t1'" class="mt-2 mb-0 cursor-pointer text-[#2873AF]">Forgot Password?</p>
                            </div>

                            <div class="relative mb-4" x-show="tx=='t2'">
                                <label class="leading-7 text-sm text-gray-600"><?php _e("Confirm Password", POS_TEXT_DOMAIN); ?></label>
                                <input type="password" x-model="confirmpassword" autocomplete="confirm-password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <span class="text-red-500" x-text="confirm_password_error"></span>
                            </div>

                            <div x-show="login_error && !forgot_password" class="my-2">
                                <span class="text-red-500" x-text="login_error"></span>
                                <span><a href='#' @click="resetPassword()">Reset Password</a></span>
                            </div>

                            <div x-show="forgot_password" class="my-2">
                                <span><a href='#' @click.prevent="forgot_password=false; login_error=false">Cancel</a></span>
                            </div>



                            <div x-show="!forgot_password && tx=='t1'">
                                <div class="relative my-5 text-center">
                                    <span class="border-b border-[#D2DBE3] w-full block relative top-3 "></span>
                                    <span class="bg-gray-100 px-2 py-1 z-10 relative font-bold">Or Login with Token</span>
                                </div>

                                <div class="relative mb-4">
                                    <input @keydown="cleanErrors(); password='';email='';token_login_error='';" type="text" x-model='authtoken' autocomplete="token" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <span class="text-red-500" x-text="token_login_error"></span>
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <button x-show="!forgot_password" @click="login" class="text-white bg-red-500 cursor-pointer font-lg rounded-md text-lg px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-500 dark:hover:bg-red-700 hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0">
                                    <span x-show="tx=='t1'"><?php _e("Sign In", POS_TEXT_DOMAIN); ?></span>
                                    <span x-show="tx=='t2'"><?php _e("Sign Up", POS_TEXT_DOMAIN); ?></span>
                                </button>
                                <button x-show="forgot_password" @click="resetPassword()" class="text-white bg-red-500 cursor-pointer font-lg rounded-md text-lg px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-500 dark:hover:bg-red-700 hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0"><?php _e("Reset Password", POS_TEXT_DOMAIN); ?></button>
                            </div>

                        </div>
                        <div x-show="otp">
                            <div class="relative mb-4">
                                <label class="leading-7 text-sm text-gray-600"><?php _e("OTP", POS_TEXT_DOMAIN); ?></label>
                                <input type="text" x-model="otp_check" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div x-show="otp_error" class="my-2 text-red-500" x-text="otp_error_message"></div>
                            <button @click="validateOTP()" class="text-white bg-red-500 hover:bg-red-700 cursor-pointer focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-lg px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-500 dark:hover:bg-red-700 hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0"><?php _e("Verify OTP", POS_TEXT_DOMAIN); ?></button>
                            <p class="my-2 text-sm">*Please check your email for OTP</p>
                        </div>
                        <!-- <p class="mt-5 mb-0 cursor-pointer">Forgot Password?</p> -->
                    </div>
                    <!-- login end -->
                </div>
            </div>

        </form>
        <!-- new login markup end -->

    </div>


</section>