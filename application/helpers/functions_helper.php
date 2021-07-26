<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
    // -----------------------------------------------------------------------------
    // encrypt
    if (!function_exists('encrypt')) {
        function encrypt($key) {
            $sSalt = '20adeb83e85f03cfc84d0fb7e5f4d290';
            $sSalt = substr(hash('sha256', $sSalt, true), 0, 32);
            $method = 'aes-256-cbc';

            $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

            $encrypted = base64_encode(openssl_encrypt($key, $method, $sSalt, OPENSSL_RAW_DATA, $iv));
            return $encrypted;
        }
    }

    // -----------------------------------------------------------------------------
    //decrypt 
    if (!function_exists('decrypt')) {
        function decrypt($key) {
            $sSalt = '20adeb83e85f03cfc84d0fb7e5f4d290';
            $sSalt = substr(hash('sha256', $sSalt, true), 0, 32);
            $method = 'aes-256-cbc';

            $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

            $decrypted = openssl_decrypt(base64_decode($key), $method, $sSalt, OPENSSL_RAW_DATA, $iv);
            return $decrypted;
        }
    }

    // -----------------------------------------------------------------------------
    //check auth
    if (!function_exists('auth_check')) {
        function auth_check()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            if(!$ci->session->has_userdata('is_admin_login'))
            {
                redirect('admin/auth/login', 'refresh');
            }
        }
    }


    // -----------------------------------------------------------------------------
    // Get General Setting
    if (!function_exists('get_general_settings')) {
        function get_general_settings()
        {
            $ci =& get_instance();
            $ci->load->model('admin/setting_model');
            return $ci->setting_model->get_general_settings();
        }
    }

     // -----------------------------------------------------------------------------
    // Generate Admin Sidebar Sub Menu
    if (!function_exists('get_sidebar_sub_menu')) {
        function get_sidebar_sub_menu($module_id)
        {
            $ci =& get_instance();
            $ci->db->select('*');
            $ci->db->where('module_id',$module_id);
            $ci->db->order_by('sort_order','asc');
            return $ci->db->get('hk_sub_module')->result_array();
        }
    }


    // -----------------------------------------------------------------------------
    // Generate Admin Sidebar Menu
    if (!function_exists('get_sidebar_menu')) {
        function get_sidebar_menu()
        {
            $ci =& get_instance();
            $ci->db->select('*');
            $ci->db->order_by('sort_order','asc');
            return $ci->db->get('hk_module')->result_array();
        }
    }

     // -----------------------------------------------------------------------------
    // Make Slug Function    
    if (!function_exists('make_slug'))
    {
        function make_slug($string)
        {
            $lower_case_string = strtolower($string);
            $string1 = preg_replace('/[^a-zA-Z0-9 ]/s', '', $lower_case_string);
            return strtolower(preg_replace('/\s+/', '-', $string1));        
        }
    }

    // -----------------------------------------------------------------------------
    //get recaptcha
    if (!function_exists('generate_recaptcha')) {
        function generate_recaptcha()
        {
            $ci =& get_instance();
            if ($ci->recaptcha_status) {
                $ci->load->library('recaptcha');
                echo '<div class="form-group mt-2">';
                echo $ci->recaptcha->getWidget();
                echo $ci->recaptcha->getScriptTag();
                echo ' </div>';
            }
        }
    }

    // ----------------------------------------------------------------------------
    //print old form data
    if (!function_exists('old')) {
        function old($field)
        {
            $ci =& get_instance();
            return html_escape($ci->session->flashdata('form_data')[$field]);
        }
    }

    // --------------------------------------------------------------------------------
    if (!function_exists('date_time')) {
        function date_time($datetime) 
        {
           return date('F j, Y',strtotime($datetime));
        }
    }

    // --------------------------------------------------------------------------------
    // limit the no of characters
    if (!function_exists('text_limit')) {
        function text_limit($x, $length)
        {
          if(strlen($x)<=$length)
          {
            echo $x;
          }
          else
          {
            $y=substr($x,0,$length) . '...';
            echo $y;
          }
        }
    }

?>