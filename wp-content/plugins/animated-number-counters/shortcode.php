<?php
anc_6310_version_status();
global $wpdb;
$style_table = $wpdb->prefix . 'anc_6310_style';
$icon_table = $wpdb->prefix . 'anc_6310_icons';
$counter_table = $wpdb->prefix . 'anc_6310_counter';

$styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $ids), ARRAY_A);
$css = explode("!!##!!", $styledata['css']);
$key = explode(",", $css[0]);
$value = explode("||##||", $css[1]);

$cssData = array_combine($key, $value);
$allCounters = [];
if($styledata['counterids']){
   $idExist = explode(',', $styledata['counterids']);
   if($idExist){
      $tempId = '';
      foreach ($idExist as $ie) {
         if (trim($ie) != '') {
            if ($tempId != '') {
               $tempId .= ',';
            }
            $tempId .= $ie;
         }
      }
      if ($tempId == '') {
         return;
      }
      $allCounters = $wpdb->get_results("SELECT * FROM $counter_table WHERE id in ({$tempId}) ORDER BY title asc", ARRAY_A);
   }
}


$loading = plugin_dir_url(dirname(__FILE__)) . plugin_basename(dirname(__FILE__)) . '/assets/image/loading.gif';

if (file_exists(anc_6310_plugin_url . "output/{$styledata['style_name']}.php")) {
   $fonts = "";
   if(isset($cssData['title_font_family']) && $cssData['title_font_family']){
      $fonts = $cssData['title_font_family'];
   }
   if(isset($cssData['description_font_family']) && $cssData['description_font_family']){
      $fonts .= "|" . $cssData['description_font_family'];
   }
   if(isset($cssData['number_font_family']) && $cssData['number_font_family']){
      $fonts .= "|" . $cssData['number_font_family'];
   }
   if(isset($cssData['button_font_family']) && $cssData['button_font_family']){
      $fonts .= "|" . $cssData['button_font_family'];
   }

   wp_enqueue_style('anc-6310-font-awesome-5-0-13', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css');
   wp_enqueue_style('anc-6310-font-awesome-4-07', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
   wp_enqueue_style("anc-6310-googlesss-font-{$ids}", "https://fonts.googleapis.com/css?family={$fonts}");
   echo "<div class='anc_6310_main_counter'>";
   include anc_6310_plugin_url . "output/{$styledata['style_name']}.php";
   echo "</div>";
   wp_enqueue_script('anc-6310-counterup', plugins_url('assets/js/jquery.counterup.js', __FILE__), array('jquery'), '1.1.0', true);  
   if ($cssData['custom_css']) {
      echo "<style type='text/css'>" . anc_6310_split_code($ids, $cssData['custom_css']) . "</style>";
   }
}
