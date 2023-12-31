<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title"><?= $btitle ?></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url("gopanel") ?>">Əsas Panel</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url("gopanel/" . $class) ?>/manage"><?= $btitle ?></a></li>
                        <li class="breadcrumb-item active"><?= $bactive ?></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <a class="btn btn-outline-success waves-effect waves-light" href="/gopanel/<?= $class ?>/manage">
                                <i class="fas fa-list-ol mr-2"></i> Bütün Siyahı
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label>Dil seçin</label>
                                    <select class="form-control" name="page_id">
                                        <option value="">Səhifə seçin</option>
                                        <?php
                                        foreach ($other_groups as $key => $value) {
                                        ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label>Dil seçin</label>
                                    <select class="form-control" name="locale">
                                        <?php
                                        foreach ($languages as $key => $value) {
                                            $select = ($value['locale'] == $locale) ? "selected" : "";
                                        ?>
                                            <option value="<?= $value['locale']; ?>" <?= $select; ?>><?= $value['locale']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Sual</label>
                                    <input type="text" name="question" class="form-control" required>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Cavab</label>
                                    <textarea class="form-control ckeditor" rows="5" name="answer"></textarea>
                                </div>

                                <div class="hidden-inputs">
                                    <input type="hidden" name="token" value="<?= $token ?>">
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 ">
                                            <i class="fas fa-plus"></i> Əlavə et
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect ">
                                            <i class="fas fa-times"></i> Ləğv et
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->
<?php $this->load->view("blocks/icons"); ?>