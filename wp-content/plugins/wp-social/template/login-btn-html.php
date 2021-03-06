<?php

defined('ABSPATH') || exit;

$buttonStyle = empty($force_style) ? (isset($style_data['login_button_style']) ? $style_data['login_button_style'] : 'style1') : $force_style;

$className = 'xs-login-global xs-login-' . $buttonStyle . '';
?>
<div id="<?php echo esc_attr('XS_social_login_div'); ?>" class="<?php echo esc_attr($className); ?> ">
    <ul class="<?php echo esc_attr('_login_button_style__ul'); ?>">
		<?php
		if(!is_user_logged_in()) {

			$url_params = '';

			if(empty($_GET['redirect_to'])) {

				$custom_url = xs_current_url_custom();

				if(strlen($custom_url) > 2) {
					if($typeCurrent == 'show') {
						$url_params = '?XScurrentPage=' . $custom_url;
					}
				}

			} else {

				$url_params = '?redirect_to=' . urlencode(urldecode($_GET['redirect_to']));
			}

			$core_provider = \WP_Social\App\Providers::get_core_providers_login();
			$enabled_providers = \WP_Social\App\Settings::get_enabled_provider_conf_login();

			/**
			 * todo - below there are some bujruki code need to change it, style icon set info also should come from array
			 *
			 */
			foreach($core_provider AS $keyType => $valueType):
				if(!empty($enabled_providers[$keyType]['enable'])):

					if(in_array('all', $attr_provider) || in_array($keyType, $attr_provider)) {

						$btn_text = isset($provider_data[$keyType]['login_label']) ? $provider_data[$keyType]['login_label'] : 'Login with <b>' . $valueType . '</b>'; ?>

                        <li class="<?php echo esc_attr('xs-li-' . $buttonStyle . ' ' . $keyType); ?>">
                            <a href="<?php echo esc_url(get_site_url() . '/wp-json/wslu-social-login/type/' . $keyType . '' . $url_params); ?>">
                                <div class="xs-social-icon"> <?php

									if(in_array($buttonStyle, array('style1', 'style2', 'style4', 'style5'))) {
										$lineIconSet = '';
										if(in_array($buttonStyle, array('style4', 'style5', 'style6'))) {
											$lineIconSet = '-line';
										}
										?>
                                        <div class="social-icon">
                                            <span class="met-social met-social-<?php echo $keyType; ?>"></span>
                                        </div>
										<?php
									}

									if(in_array($buttonStyle, array('style1', 'style3', 'style4', 'style6'))) { ?>
                                        <span class="login-button-text"> <?php echo wp_kses($btn_text, ['b' => array(), 'strong' => array(),]); ?> </span> <?php
									} ?>

                                </div>
                            </a>
                        </li>

						<?php
					}
				endif;
			endforeach;
		} else {
			$correntUrlLogout = esc_url(xs_current_url_custom());
			?>
            <li><a href="<?php echo wp_logout_url($correntUrlLogout); ?>"><?php echo __('Logout'); ?></a></li> <?php
		} ?>
    </ul>
</div>