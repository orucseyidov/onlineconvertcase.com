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
              01010100 01111001 01110000 01100101 00100000 01101111 01110010 00100000 01110000 01100001 01110011 01110100 01100101 00100000 01111001 01101111 01110101 01110010 00100000 01100011 01101111 01101110 01110100 01100101 01101110 01110100 00100000 01101000 01100101 01110010 01100101 
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
                    <option value="1">Text to binary code</option>
                    <option value="2">Binary code to text</option>
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
if (isset($other_tools_by_group) && is_array($other_tools_by_group) && count($other_tools_by_group)) {
  $this->load->view("other_tools/inc/groupByOtherTools");
}
?>
