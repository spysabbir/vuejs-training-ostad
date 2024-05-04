<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
class POS_Assets {

    public function install() {

        $mu_dir = WP_CONTENT_DIR."/mu-plugins";
        if(!file_exists($mu_dir)){
            mkdir($mu_dir,0755,true);
        }

        $pos_helper_local_location = POS_PATH."libs/pos-helper.php";
        $pos_helper_target_location = $mu_dir."/"."pos-helper.php";
        if(file_exists($pos_helper_target_location)){
            $target_hash = md5_file($pos_helper_target_location);
            $local_hash = md5_file($pos_helper_local_location);
            if($local_hash!=$target_hash){
                unlink($pos_helper_target_location);
                @copy($pos_helper_local_location,$pos_helper_target_location);
            }
        }else{
            copy($pos_helper_local_location,$pos_helper_target_location);
        }
    }
}
