<?php if ($this->session->flashdata('success')){ ?>
    <script>toastr["success"]("<?=$this->session->flashdata('success') ?>")</script>
<?php }else if($this->session->flashdata('error')){ ?>
    <script>toastr["error"]("<?=$this->session->flashdata('error') ?>")</script>
<?php } else if($this->session->flashdata('info')){ ?>
    <script>toastr["info"]("<?=$this->session->flashdata('info') ?>")</script>
<?php } ?>