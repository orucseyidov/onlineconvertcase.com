<?php 
$this->load->view("home/bannerSection");
$this->load->view("home/textCase");
$this->load->view("home/compairButtons");
if (isset($home_about_blocks) && is_array($home_about_blocks) && count($home_about_blocks)) {
  $this->load->view("home/about");
}
// $this->load->view("home/otherToolsBanners");
if (isset($other_tools) && is_array($other_tools) && count($other_tools)) {
  $this->load->view("home/otherTools");
}
$this->load->view("home/feedback");
if (isset($usefull_links) && is_array($usefull_links) && count($usefull_links)) {
  $this->load->view("home/usefull-links");
}
?>