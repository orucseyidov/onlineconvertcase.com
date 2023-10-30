<?php if (isset($seo_keywords) && is_array($seo_keywords)): ?>
  <div id="mostSearchedWords">
    <div class="container">
      <div class="row">
        <div class="col-12 section-title">
          <span>Most searched words</span>
        </div>
        <div class="col-12" id="mostSearchedWordsList">
          <?php 
          $keys = '';
            foreach ($seo_keywords as $key => $value){
              $keys .= '<a class="most-word" href="'.base_url("search/?q={$value['keyword']}").'">'.$value['keyword'].'</a> · ';
            }
            echo rtrim($keys,' · ');
          ?>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>