            <?php if (isset($seo_keywords) && is_array($seo_keywords)): ?>
              
            <?php endif ?>
            <div id="mostSearchedWords">
              <div class="container">
                <div class="row">
                  <div class="col-12 section-title">
                    <span>Most searched words</span>
                  </div>
                  <div class="col-12" id="mostSearchedWordsList">
                    <?php foreach ($seo_keywords as $key => $value): ?>
                      <a class="most-word" href="<?=base_url("search/?q={$value['keyword']}") ?>"><?=$value['keyword'] ?></a>
                    <?php endforeach ?>
                  </div>
                </div>
              </div>
            </div>


            <footer>
              <div class="footer">
                  <div class="container-fluid">
                      <div class="row">
                        <div class="col-12 footer-bar">
                          <span>© 2023 Goweb Software Inc.</span>
                          <ul class="footer-menu">
                            <?php foreach ($menu as $key => $value): ?>
                              <li>
                                <a href="<?=base_url(ltrim($value['slug'],"/")) ?>"><?=$value['name'] ?></a>
                              </li>
                            <?php endforeach ?>
                          </ul>
                        </div>
                      </div>
                  </div>
              </div>
            </footer>
        </div>
    </main>

    <?php $this->load->view("blocks/recommendModal") ?>
    
    <script src="//code.jquery.com/jquery-3.6.0.js"></script>
    <!-- <script src="//code.jquery.com/jquery-3.3.1.slim.min.js" async></script>
    <script src="//cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" async></script> -->
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" async></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" async></script>
    <script src="/assets/js/toastr.min.js?v=1.1" async></script>
    <?php if ($scriptsLoad['swiper']): ?>
      <script src="//cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <?php endif ?>
    <script src="/assets/js/app.js?v=1.8" async></script>
    <?=$footerdata; ?>
  </body>
</html>