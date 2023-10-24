<?php $this->load->view("blocks/breadcrumb") ?>
<section id="search-page">
  <div class="container">
      <div class="row">
        <div class="col-12 search-input-div">
            <form method="GET" action="<?=base_url("search")?>">
              <input type="text" class="form-control search-input xdsoft_input" name="q" data-autocomplete="true" autocorrect="off" autocapitalize="off" autocomplete="off" spellcheck="false" value="<?=$query_string ?>" data-search-input="true" style="font-size: 16px;">
            </form>
        </div>
        <?php if (count($tools) || count($pages)): ?>
        <div class="col-md-8">
            <div class="web-results">
                <?php foreach ($tools as $key => $value): ?>
                <div class="web-result" id="web-result-1">
                  <a class="web-result-title" href="<?=base_url($value['slug']) ?>" target="_blank">
                    <h3 class="web-result-title-heading">
                      <b><?=$value['meta_title'] ?></b>
                    </h3>
                  </a>
                  <div class="web-result-domain">
                    <img src="/assets/favicon/apple-icon-76x76.png" class="web-result-favicon"><?=base_url($value['slug']) ?>
                  </div>
                  <div class="web-result-desc">
                    <p><?=$value['meta_description'] ?></p>
                  </div>
                  <?php if (!empty($value['keywords'])): ?>
                    <div class="web-result-keywords">
                      <?=search_keywrods($value['keywords'],4) ?>
                    </div>
                  <?php endif ?>
                </div>
                <?php endforeach; ?>
                <?php foreach ($pages as $key => $value): ?>
                <div class="web-result" id="web-result-1">
                  <a class="web-result-title" href="<?=base_url($value['slug']) ?>" target="_blank">
                    <h3 class="web-result-title-heading">
                      <b><?=$value['meta_title'] ?></b>
                    </h3>
                  </a>
                  <div class="web-result-domain">
                    <img src="/assets/favicon/apple-icon-76x76.png" class="web-result-favicon"><?=base_url($value['slug']) ?>
                  </div>
                  <div class="web-result-desc">
                    <p><?=$value['meta_description'] ?></p>
                  </div>
                  <?php if (!empty($value['keywords'])): ?>
                    <div class="web-result-keywords">
                      <?=search_keywrods($value['keywords'],4); ?>
                    </div>
                  <?php endif ?>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-md-4">
            The tool Capital Letter Convert is helpful for converting text. It enables you to convert any letter to uppercase, altering the letter's appearance. This application is ideal if you need to convert letters from uppercase to lowercase or vice versa. Your content is made easily readable by its fast and effective handling of the conversion from Lower Case to Uppercase. <br>

            The ability to convert between Upper and Lower Case is crucial when you need to standardize the content. You may convert text from Upper Case to Lower Case and vice versa with the Upper Case & Lower Case converter. Text conversion to Uppercase Lower Case is made easier with our Uppercase Converter. <br>

            To sum up, the Capital Letter Convert tool offers a smooth method of editing your text to improve its legibility. This tool guarantees that your text is in the required Upper Case & Lower Case format, providing you the freedom to convert text to your individual demands, whether you want to modify a letter to be capitalized or do a total transformation of letters in uppercase. <br>
        </div>
        <?php else: ?>
          <div class="col-12">
            <div class="no-results">
              <p>No results found for: <strong><?=$query_string ?></strong>
              </p>
              <p>Suggestions</p>
              <ul class="px-3">
                <li>Make sure that all words are spelled correctly.</li>
                <li>Try different keywords.</li>
                <li>Try more general keywords.</li>
                <li>Try fewer keywords.</li>
              </ul>
            </div>
          </div>
          <?php endif; ?>
      </div>
  </div>
</section>
<?php
if (isset($other_tools) && is_array($other_tools) && count($other_tools)) {
  $this->load->view("home/otherTools");
}
?>