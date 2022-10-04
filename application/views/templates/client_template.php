<?php defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('templates/client/head');
$this->load->view('templates/client/header');
$this->load->view('templates/client/sidebar');
?>
<?php echo $view_content; ?>
<?php $this->load->view('templates/client/footer'); ?>
