<!-- Modal -->
    <div class="modal fade" id="recomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?=lang('modal_title_recommend') ?></h5>
            <button type="button" class="close" id="recomModalclose" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="recommendForm">
              <div class="form-group">
                <label for="formName"><?=lang('modal_name') ?></label>
                <input type="text" class="form-control" id="formName" name="fullname" placeholder="<?=lang('modal_name') ?>" required>
              </div>
              <div class="form-group">
                <label for="emailForm"><?=lang('modal_email') ?></label>
                <input type="email" class="form-control" id="emailForm" name="email" placeholder="<?=lang('modal_email') ?>">
              </div>
              <div class="form-group">
                <label for="formFeedback"><?=lang('modal_feedback') ?></label>
                <textarea class="form-control" name="comment" id="formFeedback" required></textarea>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="checkForm" id="checkForm">
                <label class="form-check-label" for="checkForm"><?=lang("modal_check") ?></label>
              </div>
              <div>
                <button type="submit" class="btn btn-primary btn-block">
                  <?=lang("modal_submit") ?>
                </button>
              </div>
            </form>
          </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
        </div>
      </div>
    </div>