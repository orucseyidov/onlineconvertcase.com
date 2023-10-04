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
                            <a class="btn btn-outline-success waves-effect waves-light" href="/gopanel/<?=$class ?>/add">
                                <i class="fas fa-plus mr-2"></i> Əlavə et
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <input id="datatableOptions" type="hidden" exportColunm = "1,2,3" value="" />

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="datatable" class="table table-bordered table-striped dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Başlıq</th>
                                    <th>Tools</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($manage as $key => $value): 
                                        $editlink       = base_url("gopanel/").$class."/edit/?id=".$value['id'];
                                        $other_tools    = base_url("gopanel/other_tools/manage/?group={$value['id']}");
                                        $contents       = base_url("gopanel/common_contents/manage/?page_id={$value['id']}&table_name={$class}");
                                ?>
                                    <tr>
                                        <td><?=$counter++ ?></td>
                                        <td><?=$value['name']; ?></td>
                                        <td>
                                            <a href="<?=$other_tools ?>">
                                                <?=$value['count_tools']; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <input
                                            class         ="status"
                                            type          ="checkbox"
                                            data-size     ="small"
                                            data-toggle   ="toggle"
                                            data-on       ="Aktiv"
                                            data-off      ="Deaktiv"
                                            data-onstyle  ="success"
                                            data-offstyle ="danger"
                                            dataROW       ="status"
                                            dataID        ="<?=$value['id']; ?>"
                                            dataTable     ="<?=$table; ?>"
                                            <?php echo ($value['status'] == 1) ? "checked" : " " ; ?>
                                            >
                                        </td>
                                        <td>
                                            <div class="manage">
                                                <a class="btn btn-warning" href="<?=$other_tools?>" data-toggle="tooltip" data-placement="top" title="Alət artırın" >
                                                    <i class="fas fa-list"></i>
                                                </a>
                                                <a class="btn btn-success" href="<?=$editlink?>" data-toggle="tooltip" data-placement="top" title="Məlumatı Yenilə" >
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-info" href="<?=$contents?>" data-toggle="tooltip" data-placement="top" title="Content" >
                                                    <i class="fas fa-list-ol"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->