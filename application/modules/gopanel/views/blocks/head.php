<!DOCTYPE html>
<html lang="en">
<head>
    <base href="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>
        <?php 
            if (!empty($btitle)) {
                echo $title." | ".$btitle;
            }
            else{
                echo $title;
            }
        ?>
    </title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!--STandart CSS -->
    <link href="/assets/gopanel/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/gopanel/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <!-- Notfication toastr -->
    <link href="/assets/gopanel/css/toastr.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Toggle button -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="/assets/gopanel/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <!-- Style Template -->
    <link href="/assets/gopanel/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/gopanel/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/gopanel/css/loading.css" rel="stylesheet" type="text/css">
     <!--Chartist Chart CSS -->
    <link rel="stylesheet" href="/assets/gopanel/plugins/chartist/css/chartist.min.css">
    <?php 
        if ($this->uri->segment(2) != 'statics') {
            if (in_array($this->uri->segment(3), $front)) {
                $style = $this->uri->segment(3) != false ? $this->uri->segment(3) : 'manage';
                $this->load->view($app."/blocks/style/".$style);
            }
            else{
                $this->load->view($app."/blocks/style/manage");
            }
        }
        else{
            $this->load->view($app."/blocks/style/statics");
        }
    ?>
    <link href="/assets/gopanel/main/custom.css?v=<?=uniqid() ?>" rel="stylesheet" type="text/css">
</head>