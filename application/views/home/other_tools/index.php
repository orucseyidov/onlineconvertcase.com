<?php 
$this->load->view("home/other_tools/otherToolbannerSection");
$this->load->view("home/textCase");
$this->load->view("home/compairButtons");
$this->load->view("home/other_tools/about-tool");
if (isset($other_tools) && is_array($other_tools) && count($other_tools)) {
  $this->load->view("home/otherTools");
}
$this->load->view("home/feedback");
?>