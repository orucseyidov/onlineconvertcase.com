<?php $this->load->view("other_tools/inc/otherToolbannerSection"); ?>
<div id="textCase">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="text-area">
            <textarea id="textCaseInput" placeholder="Type or paste your content here" class="textarea"></textarea>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="output" id="output">
              \u0054\u0079\u0070\u0065\u0020\u006f\u0072\u0020\u0070\u0061\u0073\u0074\u0065\u0020\u0079\u006f\u0075\u0072\u0020\u0063\u006f\u006e\u0074\u0065\u006e\u0074\u0020\u0068\u0065\u0072\u0065
          </div>
        </div>
        <div class="col-12">
          <div class="counters">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text_counters">
                  <span>Character Count: <span class="counter-numbers" id="characterCount">0</span> </span>
                  <span>Word Count: <span class="counter-numbers" id="wordCount">0</span></span>
                  <span>Line Count: <span class="counter-numbers" id="lineCount">0</span></span>  
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 other-tool-btn-block">
                  <select class="modifier-select trim-whitespace" id="typeStyle">
                    <option value="1">Utf 8 Encoder</option>
                    <option value="2">Utf 8 Decoder</option>
                  </select>
                  <button id="download" class="modifier-button trim-whitespace" onclick="downloadTextAsFileOther(); return false;">
                    <img alt="Download text" class="icon" src="/assets/img/icons/file.png">
                    <span>Download text</span>
                  </button>
                  <button id="copy" class="modifier-button trim-whitespace" onclick="copyTextToClipboardOther(); return false;">
                    <img alt="Copy to Clipboard" class="icon" src="/assets/img/icons/copy.png">
                    <span>Copy to Clipboard</span>
                  </button>
                  <a href="https://ko-fi.com/goweb" class="btn-kofi" target="_blank"  rel="noopener noreferrer">
                    <img src="/assets/img/icons/kofi.png" alt="Buy me a Coffee" height="14" width="21"> 
                    Buy me a Coffee
                  </a>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>
<?php 
$this->load->view("other_tools/inc/about-tool");
if (isset($other_tools) && is_array($other_tools) && count($other_tools)) {
  $this->load->view("home/otherTools");
}
?>
