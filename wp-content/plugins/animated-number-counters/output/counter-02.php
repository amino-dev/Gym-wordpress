<div class="anc-6310-row">
  <div class="anc-6310-counter-<?php echo $ids ?>-paralax">
    <div class="anc-6310-counter-<?php echo $ids ?>-common-overlay">
      <div class="anc-6310-counter-<?php echo $ids ?>-row">
        <?php
        foreach ($allCounters as $allCounter) {
          $numbersPosition = ['', ''];
          if ($allCounter['commons'] != '') {
            $numbersPosition = explode('###|||###', $allCounter['commons']);
          }
        ?>
          <div class="anc-6310-col-<?php echo $cssData['item_per_row'] ?>">
            <div class="anc-6310-counter-<?php echo $ids ?>">
              <div class="anc-6310-counter-<?php echo $ids ?>-icon">
                <i class="<?php echo $allCounter['icons'] ?>"></i>
              </div>
              <div class="anc-6310-counter-<?php echo $ids ?>-count-content">
                <div class="anc-6310-counter-<?php echo $ids ?>-count-content-inner">
                  <div data-anc-6310-start="0" data-anc-6310-end="<?php echo anc_6310_number_format($allCounter['numbers'])[0] ?>" data-anc-6310-decimals="<?php echo anc_6310_number_format($allCounter['numbers'])[1] ?>" data-anc-6310-once="true" data-anc-6310-duration="0.5" class="anc-6310-counter anc-6310-counter-<?php echo $ids ?>-count-number" data-anc-6310-legacy="false">0</div>
                </div>
              </div>
              <div class="anc-6310-counter-<?php echo $ids ?>-count-title"><?php echo $allCounter['title'] ?></div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>

<?php
include anc_6310_plugin_url . "output/css/_css-02.php";
include anc_6310_plugin_url . "output/common-output-css.php";
?>