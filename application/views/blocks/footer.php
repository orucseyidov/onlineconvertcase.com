            <footer>
              <div class="footer">
                  <div class="container-fluid">
                      <div class="row">
                        <div class="col-12 footer-bar">
                          <span>© 2023 Goweb Software Inc.</span>
                          <ul class="footer-menu">
                            <?php foreach ($menu as $key => $value): ?>
                              <li>
                                <a href="<?=base_url($locale."/".ltrim($value['slug'],"/")) ?>"><?=$value['name'] ?></a>
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
    

    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/app.js"></script>
  </body>
</html>