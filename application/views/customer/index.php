<?php
/**
* index.php controller for a generic Customer controller
*
* Used to show how to do CRUD in CodeIgnitor
*
* views/customer/index.php
*
* @package ITC 260 CodeIgnitor
* @subpackage Customer
* @author Patricia Barker <pbarke01@seattlecentral.edu>
* @version 1.0 2015/05/19
* @link http://www.tcbcommercialproperties.com/sandbox/ ??
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see contollers/Customer.php
* @see models/Customer_model.php
* @see customer.php ??
* @todo line 13 and 17
*/

	$this->load->view($this->config->item('theme').'header');
?>

<h2><?= $title; ?></h2>

<?php 	foreach($query->result() as $customer): ?>

<?php 	echo $customer->FirstName . "<br/>"; ?>

<?php 	endforeach ?>

<?php
	$this->load->view($this->config->item('theme').'footer');
?>




