<style>
.anc-6310-counter-06-row {
  overflow: hidden;
  font-size: 0;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding-top: 30px;
}
.anc-6310-counter-06 {
  position: relative;
  text-align: <?php echo $cssData['icon_text_align'] ?>;
  padding: <?php echo $cssData['box_padding'] ?>px;
  background-color: <?php echo $cssData['box_background_color'] ?>;
  -webkit-border-radius: <?php echo $cssData['box_radius'] ?>px;
  -o-border-radius: <?php echo $cssData['box_radius'] ?>px;
  -moz-border-radius: <?php echo $cssData['box_radius'] ?>px;
  -ms-border-radius: <?php echo $cssData['box_radius'] ?>px;
  border-radius: <?php echo $cssData['box_radius'] ?>px;
  border-style: solid;
  border-width: <?php echo $cssData['box_border_width'] ?>px;
  border-color: <?php echo $cssData['box_border_color'] ?>;
  box-shadow: 0 0 <?php echo ($cssData['box_shadow_blur'] * 2) ?>px <?php echo $cssData['box_shadow_width'] ?>px <?php echo $cssData['box_shadow_color'] ?>;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -ms-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
  height: calc(100% - <?php echo 2 * $cssData['box_padding'] ?>px - 2 * <?php echo $cssData['box_border_width'] ?>px);
}
.anc-6310-counter-06:hover {
  background-color: <?php echo $cssData['box_background_hover_color'] ?>;
  border-color: <?php echo $cssData['box_border_hover_color'] ?>;
  box-shadow: 0 0 <?php echo ($cssData['box_shadow_blur'] * 2) ?>px <?php echo $cssData['box_shadow_width_hover'] ?>px <?php echo $cssData['box_shadow_hover_color'] ?>;
}
.anc-6310-counter-06:after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  margin: 0 auto;
  width: 0;
  height: 3px;
  background-color: <?php echo $cssData['bottom_line_hover_color'] ?>;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -ms-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}
.anc-6310-counter-06:hover:after {
  width: 100%;
}
.anc-6310-counter-06-icon {
  display: inline-block;
}
.anc-6310-counter-06-icon i {
  float: left;
  color: <?php echo $cssData['icon_color'] ?>;
  font-size: <?php echo $cssData['icon_size'] ?>px;
  margin-left: <?php echo $cssData['icon_margin_left'] ?>px;
  margin-right: <?php echo $cssData['icon_margin_right'] ?>px;
  margin-top: <?php echo $cssData['icon_margin_top'] ?>px;
  margin-bottom: <?php echo $cssData['icon_margin_bottom'] ?>px;
}
.anc-6310-counter-06:hover .anc-6310-counter-06-icon i{
  color: <?php echo $cssData['icon_hover_color'] ?>;
}
.anc-6310-counter-06-number-content {
  float: left;
}
.anc-6310-counter-06-count-number {
  display: inline-block;
  font-size: <?php echo $cssData['number_font_size'] ?>px;
  color: <?php echo $cssData['number_font_color'] ?>;
  font-family: <?php echo str_replace("+", " ", $cssData['number_font_family']); ?>;
  font-weight: <?php echo $cssData['number_font_weight'] ?>;
  line-height: <?php echo $cssData['number_line_height'] ?>px;
  margin-left: <?php echo $cssData['number_margin_left'] ?>px;
  margin-right: <?php echo $cssData['number_margin_right'] ?>px;
  margin-top: <?php echo $cssData['number_margin_top'] ?>px;
  margin-bottom: <?php echo $cssData['number_margin_bottom'] ?>px;
}
.anc-6310-counter-06:hover .anc-6310-counter-06-count-number{
  color: <?php echo $cssData['number_font_hover_color'] ?>;
}
.anc-6310-counter-06-count-prefix {
  display: <?php echo (isset($cssData['prefix_icon_show_hide']) && $cssData['prefix_icon_show_hide']) ? 'inline-block': 'none' ?>;
  font-size: <?php echo isset($cssData['number_prefix_font_size']) && $cssData['number_prefix_font_size'] !== '' ? $cssData['number_prefix_font_size'] : 20; ?>px;
  color: <?php echo isset($cssData['number_prefix_font_color']) && $cssData['number_prefix_font_color'] !== '' ? $cssData['number_prefix_font_color'] : 'rgb(255, 255, 255)'; ?>;
  font-weight: <?php echo isset($cssData['number_prefix_font_weight']) && $cssData['number_prefix_font_weight'] !== '' ? $cssData['number_prefix_font_weight'] : '100'; ?>;
  font-family: <?php echo isset($cssData['number_prefix_font_family']) && $cssData['number_prefix_font_family'] !== '' ? str_replace("+", " ", $cssData['number_prefix_font_family']) : 'Amaranth'; ?>;
  vertical-align: <?php echo isset($cssData['number_prefix_position']) && $cssData['number_prefix_position'] !== '' ? $cssData['number_prefix_position'] : 2; ?>px;
  margin-left: <?php echo isset($cssData['number_prefix_margin_left']) && $cssData['number_prefix_margin_left'] !== '' ? $cssData['number_prefix_margin_left'] : 0; ?>px;
  margin-right: <?php echo isset($cssData['number_prefix_margin_right']) && $cssData['number_prefix_margin_right'] !== '' ? $cssData['number_prefix_margin_right'] : 0; ?>px;
}
.anc-6310-counter-06:hover .anc-6310-counter-06-count-prefix {
  color: <?php echo isset($cssData['number_prefix_font_hover_color']) && $cssData['number_prefix_font_hover_color'] !== '' ? $cssData['number_prefix_font_hover_color'] : 'rgb(255, 255, 255)'; ?>;
}
.anc-6310-counter-06-count-suffix {
  display: <?php echo (isset($cssData['suffix_icon_show_hide']) && $cssData['suffix_icon_show_hide']) ? 'inline-block': 'none' ?>;
  font-size: <?php echo isset($cssData['number_suffix_font_size']) && $cssData['number_suffix_font_size'] !== '' ? $cssData['number_suffix_font_size'] : 20; ?>px;
  color: <?php echo isset($cssData['number_suffix_font_color']) && $cssData['number_suffix_font_color'] !== '' ? $cssData['number_suffix_font_color'] : 'rgb(255, 255, 255)'; ?>;
  font-weight: <?php echo isset($cssData['number_suffix_font_weight']) && $cssData['number_suffix_font_weight'] !== '' ? $cssData['number_suffix_font_weight'] : '100'; ?>;
  font-family: <?php echo isset($cssData['number_suffix_font_family']) && $cssData['number_suffix_font_family'] !== '' ? str_replace("+", " ", $cssData['number_suffix_font_family']) : 'Amaranth'; ?>;
  vertical-align: <?php echo isset($cssData['number_suffix_position']) && $cssData['number_suffix_position'] !== '' ? $cssData['number_suffix_position'] : 2; ?>px;
  margin-left: <?php echo isset($cssData['number_suffix_margin_left']) && $cssData['number_suffix_margin_left'] !== '' ? $cssData['number_suffix_margin_left'] : 0; ?>px;
  margin-right: <?php echo isset($cssData['number_suffix_margin_right']) && $cssData['number_suffix_margin_right'] !== '' ? $cssData['number_suffix_margin_right'] : 0; ?>px;
}
.anc-6310-counter-06:hover .anc-6310-counter-06-count-suffix {
  color: <?php echo isset($cssData['number_suffix_font_hover_color']) && $cssData['number_suffix_font_hover_color'] !== '' ? $cssData['number_suffix_font_hover_color'] : 'rgb(255, 255, 255)'; ?>;
}
.anc-6310-counter-06-count-title {
  font-size: <?php echo $cssData['title_font_size'] ?>px;
  line-height: <?php echo $cssData['title_line_height'] ?>px;
  color: <?php echo $cssData['title_font_color'] ?>;
  font-weight: <?php echo $cssData['title_font_weight'] ?>;
  text-transform: <?php echo $cssData['title_text_transform']; ?>;
  font-family: <?php echo str_replace("+", " ", $cssData['title_font_family']); ?>;
  margin-top: <?php echo $cssData['title_margin_top'] ?>px;
  margin-bottom: <?php echo $cssData['title_margin_bottom'] ?>px;
  text-align: <?php echo $cssData['title_text_align'] ?>;
  word-break: break-word;
}
.anc-6310-counter-06:hover .anc-6310-counter-06-count-title {
  color: <?php echo $cssData['title_font_hover_color'] ?>;
}
.anc-6310-counter-06-count-description {
  font-size: <?php echo $cssData['description_font_size'] ?>px;
  line-height: <?php echo $cssData['description_line_height'] ?>px;
  color: <?php echo $cssData['description_font_color'] ?>;
  font-weight: <?php echo $cssData['description_font_weight'] ?>;
  text-transform: <?php echo $cssData['description_text_transform']; ?>;
  text-align: <?php echo $cssData['description_text_align'] ?>;
  font-family: <?php echo str_replace("+", " ", $cssData['description_font_family']); ?>;
  margin-top: <?php echo $cssData['description_margin_top'] ?>px;
  margin-bottom: <?php echo $cssData['description_margin_bottom'] ?>px;
  display: <?php echo isset($cssData['counter_description']) ? 'block' : 'none'; ?>;
  word-break: break-word;
}
.anc-6310-counter-06:hover .anc-6310-counter-06-count-description {
  color: <?php echo $cssData['description_font_hover_color'] ?>;
}
.anc-6310-counter-06-button{
  outline: none;
  padding: 5px;
  display: <?php echo isset($cssData['counter_button']) && $cssData['counter_button'] !== '' ? (($cssData['counter_button']) ? 'block' : 'none') : 'none' ; ?>;
  width: <?php echo isset($cssData['button_width']) && $cssData['button_width'] !== '' ? $cssData['button_width'] : 110; ?>px;
  background-color: <?php echo isset($cssData['button_background_color']) && $cssData['button_background_color'] !== '' ? $cssData['button_background_color'] : 'rgba(0, 158, 226, 1)'; ?>;
  text-align: <?php echo isset($cssData['button_text_align']) && $cssData['button_text_align'] !== '' ? $cssData['button_text_align'] : 'center'; ?>;
  border-width: <?php echo isset($cssData['button_border_width']) && $cssData['button_border_width'] !== '' ? $cssData['button_border_width'] : "0px"; ?>;
  border-style: solid;
  border-color: <?php echo isset($cssData['button_border_color']) && $cssData['button_border_color'] !== '' ? $cssData['button_border_color'] : 'rgb(255, 255, 255)'; ?>;
  border-radius: <?php echo isset($cssData['button_border_radius']) && $cssData['button_border_radius'] !== '' ? $cssData['button_border_radius'] : 0; ?>px;
  margin-top: <?php echo isset($cssData['button_margin_top']) && $cssData['button_margin_top'] !== '' ? $cssData['button_margin_top'] : 20; ?>px;
  margin-bottom: <?php echo isset($cssData['button_margin_bottom']) && $cssData['button_margin_bottom'] !== '' ? $cssData['button_margin_bottom'] : 10; ?>px;
  <?php 
  if(isset($cssData['button_align']) && $cssData['button_align'] !== ''){
    if ($cssData['button_align'] == 'center') {
               echo "margin-left: auto; margin-right: auto;";
            } elseif ($cssData['button_align'] == 'right') {
               echo "margin-left: auto;";
            } elseif ($cssData['button_align'] == 'left') {
               echo "margin-right: auto;";
            }
  } else {
    echo "margin-left: auto; margin-right: auto;";
  }
  ?>
}
.anc-6310-counter-06-button:hover {
  background-color: <?php echo isset($cssData['button_background_hover_color']) && $cssData['button_background_hover_color'] !== '' ? $cssData['button_background_hover_color'] : 'rgba(7, 144, 204, 0.8)'; ?>;
  border-color: <?php echo isset($cssData['button_border_hover_color']) && $cssData['button_border_hover_color'] !== '' ? $cssData['button_border_hover_color'] : 'rgb(255, 255, 255)'; ?>;
}
.anc-6310-counter-06-button a{
  color: <?php echo isset($cssData['button_font_color']) && $cssData['button_font_color'] !== '' ? $cssData['button_font_color'] : 'rgb(255, 255, 255)'; ?>;
  font-size: <?php echo isset($cssData['button_font_size']) && $cssData['button_font_size'] !== '' ? $cssData['button_font_size'] : 13; ?>px !important;
  line-height: <?php echo isset($cssData['button_line_height']) && $cssData['button_line_height'] !== '' ? $cssData['button_line_height'] : 25; ?>px;
  font-family: <?php echo isset($cssData['button_font_family']) && $cssData['button_font_family'] !== '' ? str_replace("+", " ", $cssData['button_font_family']) : 'arimo'; ?>;
  font-weight: <?php echo isset($cssData['button_font_weight']) && $cssData['button_font_weight'] !== '' ? $cssData['button_font_weight'] : 400; ?>;
  text-transform: <?php echo isset($cssData['button_text_transform']) && $cssData['button_text_transform'] !== '' ? $cssData['button_text_transform'] : 'uppercase'; ?>;
  text-decoration: none;
  word-break: break-word;
}
.anc-6310-counter-06-button:hover a {
  color: <?php echo isset($cssData['button_font_hover_color']) && $cssData['button_font_hover_color'] !== '' ? $cssData['button_font_hover_color'] : 'rgb(255, 255, 255)'; ?>;
}
</style>