<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title"><?=$btitle ?></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url("gopanel") ?>">Əsas Panel</a></li>
                        <li class="breadcrumb-item active"><?=$bactive ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                       <div class="row align-items-center">
                          <div class="col-lg-4 offset-lg-1">
                             <div class="ex-page-content">
                                <h1 class="text-dark">404</h1>
                                <h4 class="mb-4">Səhifə tapılmadı</h4>
                                <p class="mb-5">Daxil olmaq istədiyiniz səhifə tapılmadı zəhmət olmasa yenidən cəhd edin və ya sistem adminstartoruna məlumat verin.</p>
                                <a class="btn btn-primary mb-5 waves-effect waves-light" href="<?=base_url("gopanel") ?>"><i class="mdi mdi-home"></i> Əsas Səhifəyə qayıd</a>
                             </div>
                          </div>
                          <div class="col-lg-5 offset-lg-1"><img src="/assets/gopanel/images/error.png" alt="" class="img-fluid mx-auto d-block"></div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->