<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title"><?=$btitle ?></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url("gopanel") ?>">Əsas Panel</a></li>
                        <li class="breadcrumb-item"><a href="<?=base_url("gopanel/".$class) ?>/manage"><?=$btitle ?></a></li>
                        <li class="breadcrumb-item active"><?=$bactive ?></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <a class="btn btn-outline-success waves-effect waves-light" href="/gopanel/<?=$table ?>/manage">
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
                                    <label>Başlıq</label>
                                    <input type="text" name="title" class="form-control" >
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label>Reklamın yeri</label>
                                    <select id="position" class="form-control" name="position">
                                        <?php foreach($positions as $p){ ?>
                                            <option value="<?= $p['slug']; ?>" data-id="Ölçü: <?= $p['image_size']; ?>"><?= $p['title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Link <small>Linkyoxdursa boş saxlaya bilərsiz</small></label>
                                    <input type="text" name="slug" class="form-control" placeholder="Nümunə : <?=base_url() ?>">
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Aktiv</option>
                                        <option value="0">Deaktiv</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label>Şəkil Seçin</label>
                                    <small class="pull-right imgnotfiy size_for_position">Ölçü 370 × 243</small>
                                    <input type="file" name="image" class="filestyle" data-buttonname="btn-secondary" data-buttonText="Şəkil Seçin" data-classIcon="fas fa-file-import" data-buttonBefore="false">
                                </div>
                                
                                <div class="hidden-inputs">
                                    <input type="hidden" name="token" value="<?=$token ?>">
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 ">
                                           <i class="fas fa-save"></i> Əlavə et
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect ">
                                           <i class="fas fa-times" ></i> Ləğv et
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