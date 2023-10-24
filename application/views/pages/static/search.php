<?php $this->load->view("blocks/breadcrumb") ?>
<section id="search-page">
  <div class="container">
      <div class="row">
        <div class="col-12 search-input-div">
            <input type="text" class="form-control search-input xdsoft_input" name="q" data-autocomplete="true" autocorrect="off" autocapitalize="off" autocomplete="off" spellcheck="false" value="convertcase" data-search-input="true" style="font-size: 16px;">
        </div>
        <div class="col-md-8">
            <div class="web-results">
                <div class="web-result" id="web-result-1">
                  <a class="web-result-title" href="https://www.onlineconvertcase.com/" target="_blank">
                    <h3 class="web-result-title-heading">
                      <b>Convert Case</b>
                    </h3>
                  </a>
                  <div class="web-result-domain">
                    <img src="/assets/favicon/apple-icon-76x76.png" class="web-result-favicon">onlineconvertcase.com
                  </div>
                  <p class="web-result-desc">Easily convert text between different letter cases: lower case, UPPER CASE, Sentence case, Capitalized Case, aLtErNaTiNg cAsE and more online.</p>
                </div>
            </div>
            <div class="">
              <div class="no-results" style="display:none;">
                <p>No results found for: <strong>sdfashgasidhasjkashdbasndnuibadnjmasdbjnkmasbh</strong>
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