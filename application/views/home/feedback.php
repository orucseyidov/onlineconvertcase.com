<div id="feedback" class="feedback-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
          <div class="feedback-title">
              <span><?=content('feedback_text')['title'] ?></span>
              <?=content('feedback_text')['desc'] ?>
          </div>
          <div class="feedback-area feedback-d-none">
            <ul class="feedback">
              <li class="angry">
                  <input class="feedback-input" type="checkbox" name="rate" value="1">
                  <div>
                      <svg class="eye left">
                          <use xlink:href="#eye"></use>
                      </svg>
                      <svg class="eye right">
                          <use xlink:href="#eye"></use>
                      </svg>
                      <svg class="mouth">
                          <use xlink:href="#mouth"></use>
                      </svg>
                  </div>
              </li>
              <li class="sad">
                <input class="feedback-input" type="checkbox" name="rate" value="2">
                  <div>
                      <svg class="eye left">
                          <use xlink:href="#eye"></use>
                      </svg>
                      <svg class="eye right">
                          <use xlink:href="#eye"></use>
                      </svg>
                      <svg class="mouth">
                          <use xlink:href="#mouth"></use>
                      </svg>
                  </div>
              </li>
              <li class="ok">
                  <input class="feedback-input" type="checkbox" name="rate" value="3">
                  <div></div>
              </li>
              <li class="good active">
                <input class="feedback-input" type="checkbox" name="rate" value="4" checked>
                  <div>
                      <svg class="eye left">
                          <use xlink:href="#eye"></use>
                      </svg>
                      <svg class="eye right">
                          <use xlink:href="#eye"></use>
                      </svg>
                      <svg class="mouth">
                          <use xlink:href="#mouth"></use>
                      </svg>
                  </div>
              </li>
              <li class="happy">
                <input class="feedback-input" type="checkbox" name="rate" value="5">
                  <div>
                      <svg class="eye left">
                          <use xlink:href="#eye"></use>
                      </svg>
                      <svg class="eye right">
                          <use xlink:href="#eye"></use>
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
          <div class="feedback-form-area feedback-d-none">
            <div class="feedback-comment">
                <textarea id="commentFeedback"></textarea>
            </div>
            <div class="feedback-btn">
                <button id="feedbackBtn">
                    <?=lang("submit_btn") ?>
                </button>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>