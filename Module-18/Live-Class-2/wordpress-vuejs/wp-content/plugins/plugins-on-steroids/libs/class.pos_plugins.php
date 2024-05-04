<?php
include_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' ); 
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
class POS_Plugins{
    private $installer;
    public function __construct(){
        $this->installer = new Plugin_Upgrader();
    }

    public function installFromSlug($slug, $version="latest"){
        $context=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        ); 


        if( !$slug){
            echo json_encode(get_option( 'active_plugins' ));
            return;
        }

        //$plugin_info_json = file_get_contents("https://api.wordpress.org/plugins/info/1.2/?action=plugin_information&request[slug]={$slug}&request[fields][short_description]=1&request[fields][sections]=0",false,stream_context_create($context));
        $plugin_info_json = wp_remote_get("https://api.wordpress.org/plugins/info/1.2/?action=plugin_information&request[slug]={$slug}&request[fields][short_description]=1&request[fields][sections]=0",false,stream_context_create($context));
        $plugin_info_body = $plugin_info_json['body'];
        $plugin_info = json_decode($plugin_info_body,true);

        if("latest"==$version){
            $download_link = $plugin_info['download_link'];
        }else{
            $download_link =$plugin_info['versions'][$version];
        }
        if($download_link!=''){
            ob_start();
            $this->installFromUrl($download_link);
            ob_end_clean();
        }

    }

    public function installFromUrl($url){
        return $this->installer->install( $url,[
            'clear_update_cache'=>true,
            'overwrite_package'=>true
        ]);
    }

    public function activatePlugin($slug){
        $plugins = get_plugins();
        foreach($plugins as $key=>$value){
            $path = explode("/",$key);
            if($path[0]==$slug){
                return activate_plugin($key);
            }
        }
        return false; 
    }

    public function deactivatePlugin($slug){
        $plugins = get_plugins();
        foreach($plugins as $key=>$value){
            $path = explode("/",$key);
            if($path[0]==$slug){
                return deactivate_plugins($key);
            }
        }
        return false; 
    }

    public function getAllVersionFromOrg($slug){
        $url = "https://api.wordpress.org/plugins/info/1.2/?action=plugin_information&request[fields][sections]=0&request[fields][contributors]=0&request[fields][short_description]=0&request[fields][icons]=0&request[fields][banners]=0&request[fields][donate_link]=0&request[fields][screenshots]=0&request[fields][tags]=0&request[fields][ratings]=0&request[slug]={$slug}";
        
        $response = wp_remote_get($url);

        $body = isset($response['body']) ? json_decode($response['body'], true) : [];

        return isset($body['versions']) ? $body['versions'] : [];
    }

    public function getPluginVersionOptions($slug){
        $html = "<select id='pos_rollback_options'>";
        $versions = $this->getAllVersionFromOrg($slug);

        if(!empty($versions)) {
            foreach(array_reverse($versions, true) as $key => $download_link){
                $html .= "<option value='$download_link'>$key</option>";
            }
        }
        $html .= "</select>";

        return $html;
    }
}
