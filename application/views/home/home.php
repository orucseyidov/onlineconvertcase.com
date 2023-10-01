<?php 
$this->load->view("home/bannerSection");
$this->load->view("home/textCase");
$this->load->view("home/compairButtons");
// $this->load->view("home/otherToolsBanners");
if (isset($other_tools) && is_array($other_tools) && count($other_tools)) {
  $this->load->view("home/otherTools");
}
$this->load->view("home/feedback");
?>