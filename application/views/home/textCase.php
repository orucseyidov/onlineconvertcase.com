<section id="textCase">
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
          <div class="text-area">
            <textarea id="textCaseInput" class="textarea" placeholder="<?=lang('textare_placeholder') ?>"></textarea>
          </div>
          <div class="counters">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text_counters">
                  <span> <?=lang("character_count") ?> <span class="counter-numbers" id="characterCount">0</span> </span>
                  <span> <?=lang("word_count") ?> <span class="counter-numbers" id="wordCount">0</span></span>
                  <span> <?=lang("line_count") ?> <span class="counter-numbers" id="lineCount">0</span></span>  
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 bymecofee">
                  <a href="https://ko-fi.com/goweb" class="btn-kofi" target="_blank">
                    <img src="/assets/img/icons/kofi.png" alt="Buy me a Coffee" height="14" width="21"> 
                    <?=lang("buy_me_a_coffee") ?>
                  </a>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</section>