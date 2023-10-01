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
                            <a class="btn btn-outline-success waves-effect waves-light" href="/gopanel/<?=$class ?>/manage">
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
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h5>İstifadəçinin Adı</h5>
                                <p><?=$message['fullname']; ?></p>
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h5>Email:</h5>
                                <p><?=$message['email']; ?></p>
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h5>Mövzu:</h5>
                                <p><?=$message['subject']; ?></p>
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h5>Tarix:</h5>
                                <?php $date = strtotime($message['date']);
                                $month = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'İyun', 'İyul', 'Avqust', 'Sentyabr', 'Oktyabr', 'Noyabr', 'Dekabr']; ?>
                                <p><?= empty($message['date']) ? "-" : date("d F Y", $date); ?></p>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5>Mesaj</h5>
                                <p><?= $message['message']; ?></p>
                            </div>

                            <div class="hidden-inputs">
                                <input type="hidden" name="token" value="<?=$token ?>">
                            </div>
                            
                            <div class="col-md-12"><hr></div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0">
                                <div class="pull-right">
                                    <!-- <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 ">
                                        <i class="fas fa-save"></i> Cavabla
                                    </button> -->
                                    <?php $details_link = base_url("gopanel/").$class."/details/".$message['id']; ?>
                                    <a class="btn btn-danger delete" href="" unit_id="<?=$message['id']?>" table_name="<?=$table ?>" data-toggle="tooltip" data-placement="top" title="Məlumatı Sil" ><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->