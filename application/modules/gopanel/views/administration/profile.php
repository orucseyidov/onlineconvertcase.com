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
                            <a class="btn btn-outline-success waves-effect waves-light" href="/gopanel/">
                                <i class="fas fa-home"></i> Əsas Səhifə
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
                        <form action="<?=$class."/".$method ?>?id=<?=$id ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <label>Ad soyad</label>
                                    <input type="text" name="fullname" class="form-control" value="<?=$values['fullname'] ?>" required>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <label>İstifadəçi Adı</label>
                                    <input type="text" name="username" class="form-control" value="<?=$values['username'] ?>" required>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <label>İstifadəçi şifrəsi</label>
                                    <input type="text" name="password" class="form-control">
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Vəzifə</label>
                                    <select name="status" class="form-control" required >
                                        <option value="1" <?=s(1,$values['status']) ?> >Admin</option>
                                        <option value="0" <?=s(0,$values['status']) ?> >Moderator</option>
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label>Şəkil Seçin</label>
                                    <small class="pull-right imgnotfiy">Ölçü 100 x 50</small>
                                    <input type="file" name="image" class="filestyle" data-buttonname="btn-secondary" data-buttonText="Şəkil Seçin" data-classIcon="fas fa-file-import" data-buttonBefore="false">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <a target="_blank" href="<?=$values['image'] ?>">
                                        <img style="max-width: 250px;" src="<?=$values['image'] ?>">
                                    </a>
                                </div>
                                <div class="hidden-inputs">
                                    <input type="hidden" name="token" value="<?=$token ?>">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 ">
                                           <i class="fas fa-refresh"></i> Yadda saxla
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect ">
                                           <i class="fas fa-times" ></i> Təmizlə
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