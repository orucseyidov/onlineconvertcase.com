<section id="feedback">
  <div class="container">
    <div class="row">
      <div class="col-12">
          <div class="feedback-title">
              <span><?=content('feedback_text')['title'] ?></span>
              <?=content('feedback_text')['desc'] ?>
          </div>
          <div class="feedback-area">
            <ul class="feedback">
              <li class="angry">
                  <div>
                      <svg class="eye left">
                          <use xlink:href="#eye">
                      </svg>
                      <svg class="eye right">
                          <use xlink:href="#eye">
                      </svg>
                      <svg class="mouth">
                          <use xlink:href="#mouth">
                      </svg>
                  </div>
              </li>
              <li class="sad">
                  <div>
                      <svg class="eye left">
                          <use xlink:href="#eye">
                      </svg>
                      <svg class="eye right">
                          <use xlink:href="#eye">
                      </svg>
                      <svg class="mouth">
                          <use xlink:href="#mouth">
                      </svg>
                  </div>
              </li>
              <li class="ok">
                  <div></div>
              </li>
              <li class="good active">
                  <div>
                      <svg class="eye left">
                          <use xlink:href="#eye">
                      </svg>
                      <svg class="eye right">
                          <use xlink:href="#eye">
                      </svg>
                      <svg class="mouth">
                          <use xlink:href="#mouth">
                      </svg>
                  </div>
              </li>
              <li class="happy">
                  <div>
                      <svg class="eye left">
                          <use xlink:href="#eye">
                      </svg>
                      <svg class="eye right">
                          <use xlink:href="#eye">
                      </svg>
                  </div>
              </li>
          </ul>
          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
              <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 4" id="eye">
                  <path d="M1,1 C1.83333333,2.16666667 2.66666667,2.75 3.5,2.75 C4.33333333,2.75 5.16666667,2.16666667 6,1"></path>
              </symbol>
              <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 7" id="mouth">
                  <path d="M1,5.5 C3.66666667,2.5 6.33333333,1 9,1 C11.6666667,1 14.3333333,2.5 17,5.5"></path>
              </symbol>
          </svg>
          </div>
          <div class="feedback-form-area">
            <div class="feedback-comment">
                <textarea></textarea>
            </div>
            <div class="feedback-btn">
                <button>
                    <?=lang("submit_btn") ?>
                </button>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>