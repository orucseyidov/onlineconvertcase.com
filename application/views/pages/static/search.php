<?php $this->load->view("blocks/breadcrumb") ?>
<section id="search-page">
  <div class="container">
      <div class="row">
        <div class="col-12 search-input-div">
            <form method="GET" action="<?=base_url("search")?>">
              <input type="text" class="form-control search-input xdsoft_input" name="q" data-autocomplete="true" autocorrect="off" autocapitalize="off" autocomplete="off" spellcheck="false" value="<?=$query_string ?>" data-search-input="true" style="font-size: 16px;">
            </form>
        </div>
        <div class="col-md-8">
            <?php if (count($tools) || count($pages)): ?>
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
                </div>
                <?php endforeach ?>
            </div>
            <?php else: ?>
            <div class="">
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
        <div class="col-md-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
  </div>
</section>
<?php
if (isset($other_tools) && is_array($other_tools) && count($other_tools)) {
  $this->load->view("home/otherTools");
}
?>