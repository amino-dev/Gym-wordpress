<?php

namespace WP_Social\Helper;

defined('ABSPATH') || exit;

class View_Helper {

    public static function get_enable_switch($identifier, $checked = false, $onchange_dom_handler = '', $extra_class = '') {

        $id = $identifier.'_enable'; 
        $nm = 'xs_social['. $identifier .'][enable]'; ?>
        
        <input 
            class="social_switch_button social_switch_button <?php echo $extra_class ?>" 
            type="checkbox"
            value="1" 
            id="<?php echo $id ?>"           
            name="<?php echo $nm; ?>"  
            data-key="<?php echo $identifier; ?>" 
            <?php echo empty($onchange_dom_handler) ? '' : 'onchange="'.$onchange_dom_handler.'(this)"' ?>                                     
            <?php echo $checked ? '' : 'checked' ?>  />             

            <label for="<?php echo $id; ?>" class="social_switch_button_label"></label>
                
        <?php
    }

}
