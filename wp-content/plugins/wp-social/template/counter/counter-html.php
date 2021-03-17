<?php

defined( 'ABSPATH') || exit;

$enabled_providers = \WP_Social\App\Settings::get_enabled_provider_conf_counter();

if(is_array($provider) && !empty($provider)) : ?>

    <div class="xs_social_counter_widget <?php echo esc_attr($className); ?>">
        <ul class="xs_counter_url <?php echo esc_attr($widget_style);?>">

			<?php

			foreach($provider as $key) {

				if(!empty($enabled_providers[$key]['enable'])) {

					$label  = isset($counter_provider[$key]['label']) ? $counter_provider[$key]['label'] : '';
					$def    = isset($counter_provider[$key]['data']['value']) ? $counter_provider[$key]['data']['value'] : 0;
					$text   = isset($counter_provider[$key]['data']['text']) ? $counter_provider[$key]['data']['text'] : '';

					/**
					 * We will give prority to the actual number, if actual number is zero then we will show the default value.
					 */
					$counter = !empty($counter_data[$key]) ? $counter_data[$key] : $def;
					#$counter = ($def) > 0 ? $def : $counter;

					$id     = isset($counter_provider[$key]['id']) ? $counter_provider[$key]['id'] : '';
					$type   = isset($counter_provider[$key]['type']) ? $counter_provider[$key]['type'] : '';
					$getUrl = isset($core_provider[$key]['data']['url']) ? $core_provider[$key]['data']['url'] : '#';

					if($key == 'youtube') {
						$url = sprintf($getUrl, strtolower($type), $id);

					} elseif($key == 'linkedin') {

						if($type == 'Profile') {
							$url = sprintf($getUrl, 'in', $id);

						} else {
							$url = sprintf($getUrl, 'company', $id);
						}
					} elseif($key == 'dribbble') {

						$url = get_option('home_url_dribbble_count', 'https://dribbble.com/');

					} else {
						$url = sprintf($getUrl, $id);
					}

					?>
                    <li class="xs-counter-li <?php echo  esc_attr($key); ?>" data-key="<?php echo $key; ?>">
                        <a href="<?php echo esc_url($url); ?>" target="_blank">
                            <div class="xs-social-icon">
                                <span class="met-social met-social-<?php echo $key; ?>"></span>
                            </div>

							<?php

							if(!empty($styleArr[$cntStyleKey]['content'])) {

								if(!empty($styleArr[$cntStyleKey]['content']['number'])) {

									?>
                                    <div class="xs-social-follower">
										<?php echo xs_format_num($counter); ?>
                                    </div>

									<?php
								}

								if(!empty($styleArr[$cntStyleKey]['content']['label'])) {

									?>
                                    <div class="xs-social-follower-text">
										<?php echo $text; ?>
                                    </div>
									<?php
								}

							} else {

								?>
                                <div class="xs-social-follower">
									<?php echo xs_format_num($counter); ?>
                                </div>

                                <div class="xs-social-follower-text">
									<?php echo $text; ?>
                                </div>

								<?php
							}
							?>

                            <div class="wslu-hover-content">
                                <div class="xs-social-followers">
									<?php echo xs_format_num($counter); ?>
                                </div>
                                <div class="xs-social-follower-text">
									<?php echo $text; ?>
                                </div>
                            </div>

                        </a>
                    </li>
					<?php
				}
			}

			?>

        </ul>
    </div>

	<?php

endif;
