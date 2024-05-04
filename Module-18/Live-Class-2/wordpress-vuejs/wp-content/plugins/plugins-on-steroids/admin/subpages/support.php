<section class="text-gray-600 body-font relative" x-show="tab=='support'">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"><?php _e("Contact Us", POS_TEXT_DOMAIN); ?></h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base"><?php _e("Have a suggestion or feature request? Found a bug? Please drop us a line.", POS_TEXT_DOMAIN); ?></p>
        </div>
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap -m-2">
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600"><?php _e("Name", POS_TEXT_DOMAIN); ?></label>
                        <input required x-model="supportManager.name" type="text" id="name" name="name" :value="name" class="pos-form-field w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="email" class="leading-7 text-sm text-gray-600"><?php _e("Email", POS_TEXT_DOMAIN); ?></label>
                        <input required  x-model="supportManager.email" type="email" id="email" name="email" class="pos-form-field w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="subject" class="leading-7 text-sm text-gray-600"><?php _e("Subject", POS_TEXT_DOMAIN); ?></label>
                        <input required x-model="supportManager.subject" type="text" id="subject" name="subject" class="pos-form-field w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="message" class="leading-7 text-sm text-gray-600"><?php _e("Message", POS_TEXT_DOMAIN); ?></label>
                        <textarea required x-model="supportManager.message" id="message" name="message" class="pos-form-field w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button @click="supportManager.sendSupportRequest()" class="text-white bg-[#E8374D] cursor-pointer focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-md px-5 py-2.5 text-center mr-3 md:mr-0 hover:text-white hover:bg-gray-600 focus:text-white focus:ring-0"><?php _e("Submit Support Request", POS_TEXT_DOMAIN); ?></button>
                </div>
                <input :data-call="supportManager.getClientIPAddress()" type="hidden" id="user_ip" :value="supportManager.ip">
            </div>
        </div>
    </div>
</section>