<section class="text-gray-600 body-font" x-show="tab=='account' && user.tx==0">

    <!-- account tab start -->
    <div class="container-full p-5 pt-[56px] mx-auto" x-data="{'tx':'t1'}">
        <div class="border-b border-[#D2DBE3] mb-4">
            <ul class="flex flex-wrap -mb-[6px] justify-center items-center" id="myAccountTab" data-tabs-toggle="#myAccountTabContent" role="tablist">
                <li class="mx-5" role="presentation">
                    <button :class="{'active':tx=='t1'}" @click="tx='t1'" class="inline-block text-[#828282] hover:text-[#2873AF] hover:border-[#2873AF] rounded-t-lg py-4 text-lg font-bold text-center border-transparent border-b-2" id="account-tab" data-tabs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="false">My Account</button>
                </li>
                <li x-show="axc35()" class="mx-5" role="presentation">
                    <button :class="{'active':tx=='t2'}" @click="tx='t2'" class="inline-block text-[#828282] hover:text-[#2873AF] hover:border-[#2873AF] rounded-t-lg py-4 text-lg font-bold text-center border-transparent border-b-2 " id="token-tab" data-tabs-target="#token" type="button" role="tab" aria-controls="token" aria-selected="true">Token</button>
                </li>
                <li class="mx-5" role="presentation">
                    <button :class="{'active':tx=='t3'}" @click="tx='t3'" class="inline-block text-[#828282] hover:text-[#2873AF] hover:border-[#2873AF] rounded-t-lg py-4 text-lg font-bold text-center border-transparent border-b-2" id="change-password-tab" data-tabs-target="#change-password" type="button" role="tab" aria-controls="change-password" aria-selected="false">Change Password</button>
                </li>
            </ul>
        </div>
        <div id="myAccountTabContent">
            
            <?php 
                include_once('accounts/account.php');
                include_once('accounts/tokens.php');
                include_once('accounts/change-password.php');
            ?>
            
        </div>
    </div>

    <!-- account tab end -->



</section>