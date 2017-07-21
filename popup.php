<?php

/*
Plugin Name: DynamicWP Pop-Up Menu
Plugin URI: http://www.dynamicwp.net/plugins/dynamicwp-popup-menu/
Description: This Plugin will put your menu icons in a stack, placed in the bottom right corner of your page. if The stack clicked, a pop up menu will appear with smooth effect
Author: Reza Erauansyah
Version: 1.0
Author URI: http://www.dynamicwp.net
*/

if (!class_exists("DynamicwpPopup")) {
	class DynamicwpPopup {
		var $adminOptionsName = "DynamicwpPopupAdminOptions";
		function DynamicwpPopup() { //constructor
			
		}
		function init() {
			$this->getAdminOptions();
		}
		//Returns an array of admin options
		function getAdminOptions() {
			$popupAdminOptions = array(
				'popup1' => '',
				'popup1link' => '',
				'popup2' => '',
				'popup2link' => '',
				'popup3' => '',
				'popup3link' => '',
				'popup4' => '',
				'popup4link' => '',
				'popup5' => '',
				'popup5link' => '',
				'popup6' => '',
				'popup6link' => ''
				);
			$popupOptions = get_option($this->adminOptionsName);
			if (!empty($popupOptions)) {
				foreach ($popupOptions as $key => $option)
					$popupAdminOptions[$key] = $option;
			}				
			update_option($this->adminOptionsName, $popupAdminOptions);
			return $popupAdminOptions;
		}
		
		//Add jquery
		function mypopuppunct(){
			wp_enqueue_script('jquery');
			}
			
		function mypopupstyle(){?>
			<style type="text/css">
				/* ================ DWPstack #1 ================ */
				.DWPstack {margin: 0; padding: 0; position: fixed; bottom: 28px; right: 40px; font: 13px "Trebuchet MS", Verdana, Helvetica, sans-serif;}
				.DWPstack > img { position: relative; cursor: pointer; padding-top: 35px; z-index: 2; }
				.DWPstack ul {margin: 0; padding: 0; list-style: none; position: absolute; top: 5px; cursor: pointer; z-index: 1; }
				.DWPstack ul li {margin: 0; padding: 0; position: absolute; }
				.DWPstack ul li img {margin: 0; padding: 0; border: 0; }
				.DWPstack ul li span { margin: 0; padding: 0;display: none; }
				.DWPstack .openStack li span {margin: 0; padding: 0;  font-family: "Lucida Grande", Lucida, Verdana, sans-serif; display:block; 	height: 14px; position:absolute; top: 17px;	right:60px;	line-height: 14px; border: 0; background-color:#000; padding: 3px 10px; border-radius: 5px; -webkit-border-radius: 5px; -moz-border-radius: 5px; color: #fcfcfc; text-align: center; text-shadow: #000 1px 1px 1px; 	opacity: .85; 	filter: alpha(opacity = 85);}

				/* IE Fixes */
				.DWPstack { margin: 0; padding: 0;_position: absolute; }
				.DWPstack ul {margin: 0; padding: 0; _z-index:-1; _top:-15px; }
				.DWPstack ul li {margin: 0; padding: 0; *right:5px; }
			</style>
			
		<?php	}

		//Add popup script
		function mypopupscript(){
			$popupOptions = $this->getAdminOptions();

			$popup1 = $popupOptions['popup1'];
			$popup1link = $popupOptions['popup1link'];
			$popup2 = $popupOptions['popup2'];
			$popup2link = $popupOptions['popup2link'];
			$popup3 = $popupOptions['popup3'];
			$popup3link= $popupOptions['popup3link'];
			$popup4 = $popupOptions['popup4'];
			$popup4link = $popupOptions['popup4link'];
			$popup5 = $popupOptions['popup5'];
			$popup5link = $popupOptions['popup5link'];
			$popup6 = $popupOptions['popup6'];
			$popup6link = $popupOptions['popup6link'];
 
			$linkss = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
			echo "<script type=\"text/javascript\" charset=\"utf-8\" src=\"".$linkss."stack.js\"></script>";
		?>
		
			<div class="DWPstack">
				<img style="padding-top: 35px;" src="<?php echo $linkss.'images/stack.png';?>" alt="stack" />
				<ul class="" style="top: -50px; left: 10px;" id="DWPstack">
				
					<li style="top: 55px; left: -10px;"><a href="<?php echo $popup1link; ?>"><span><?php echo $popup1; ?></span><img style="width: 79px; display: inline; margin-left: 0px;" src="<?php echo $linkss.'images/1.png';?>" alt="Aperature"></a></li>
					
					<li style="top: 55px; left: -10px;"><a href="<?php echo $popup2link; ?>"><span><?php echo $popup2; ?></span><img style="width: 79px; display: inline; margin-left: 0px;" src="<?php echo $linkss.'images/2.png';?>" alt="Photoshop"></a></li>
					
					<li style="top: 55px; left: -10px;"><a href="<?php echo $popup3link; ?>"><span><?php echo $popup3; ?></span><img style="width: 79px; display: inline; margin-left: 0px;" src="<?php echo $linkss.'images/3.png';?>" alt="Safari"></a></li>
					
					<li style="top: 55px; left: -10px;"><a href="<?php echo $popup4link; ?>"><span><?php echo $popup4; ?></span><img style="width: 79px; display: inline; margin-left: 0px;" src="<?php echo $linkss.'images/4.png';?>" alt="Coda"></a></li>
					
					<?php if ($popup5) { ?>
					<li style="top: 55px; left: -10px;"><a href="<?php echo $popup5link; ?>"><span><?php echo $popup5; ?></span><img style="width: 79px; display: inline; margin-left: 0px;" src="<?php echo $linkss.'images/5.png';?>" alt="Finder"></a></li>	
					<?php } ?>
					
					<?php if ($popup6) { ?>
					<li style="top: 55px; left: -10px;"><a href="<?php echo $popup6link; ?>"><span><?php echo $popup6; ?></span><img style="width: 79px; display: inline; margin-left: 0px;" src="<?php echo $linkss.'images/6.png';?>" alt="history"></a></li>						
					<?php } ?>
					
				</ul>
				<a href="http://www.dynamicwp.net" style="font-size: 9px; position: fixed; bottom: 9px; right: 39px;">by DynamicWp.net</a>
		</div><!-- end div .stack -->
		<?php
		}	

		//Prints out the admin page
		function printAdminPage() {
					$popupOptions = $this->getAdminOptions();
										
					if (isset($_POST['update_DynamicwpPopupSettings'])) { 
						if (isset($_POST['popup1'])) {
							$popupOptions['popup1'] = $_POST['popup1'];
						}
						if (isset($_POST['popup1link'])) {
							$popupOptions['popup1link'] = $_POST['popup1link'];
						}
						if (isset($_POST['popup2'])) {
							$popupOptions['popup2'] = $_POST['popup2'];
						}
						if (isset($_POST['popup2link'])) {
							$popupOptions['popup2link'] = $_POST['popup2link'];
						}
						if (isset($_POST['popup3'])) {
							$popupOptions['popup3'] = $_POST['popup3'];
						}
						if (isset($_POST['popup3link'])) {
							$popupOptions['popup3link'] = $_POST['popup3link'];
						}
						if (isset($_POST['popup4'])) {
							$popupOptions['popup4'] = $_POST['popup4'];
						}
						if (isset($_POST['popup4link'])) {
							$popupOptions['popup4link'] = $_POST['popup4link'];
						}
						if (isset($_POST['popup5'])) {
							$popupOptions['popup5'] = $_POST['popup5'];
						}
						if (isset($_POST['popup5link'])) {
							$popupOptions['popup5link'] = $_POST['popup5link'];
						}
						if (isset($_POST['popup6'])) {
							$popupOptions['popup6'] = $_POST['popup6'];
						}
						if (isset($_POST['popup6link'])) {
							$popupOptions['popup6link'] = $_POST['popup6link'];
						}						
						
						update_option($this->adminOptionsName, $popupOptions);
						
						?>
						
						<div class="updated"><p><strong><?php _e("Settings Updated.", "DynamicwpPopup");?></strong></p></div>
						
						<?php } ?>
						<div class="wrap">
							<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
							<h2><a href="http://www.dynamicwp.net">DynamicWP</a>Pop Up menu</h2>
							
							<div style="width: 50%; float: left;">
								<b>First PopUp Menu text : </b><br />
								<input type="text" name="popup1" value="<?php echo $popupOptions['popup1'];?>" style="width: 25%;" /><br />
								<small>Enter link for first menu</small>					

								<br />
								<b>First PopUp Menu link(use full link, with http://) : </b><br />
								<input type="text" name="popup1link" value="<?php echo $popupOptions['popup1link'];?>" style="width: 70%;" /><br />
								<small>Enter link for first menu</small>					
				
								<br />
								<br />
								<hr />
							</div>
							
							<div style="width: 50%; float: left;">
								<b>Second PopUp Menu text: </b><br />
								<input type="text" name="popup2" value="<?php echo $popupOptions['popup2'];?>" style="width: 25%;" /><br />
								<small>Enter text for second menu</small>					
				
								<br />
								<b>Second PopUp Menu link(use full link, with http://) : </b><br />
								<input type="text" name="popup2link" value="<?php echo $popupOptions['popup2link'];?>" style="width: 70%;" /><br />
								<small>Enter link for Second menu</small>					
				
								<br />
								<br />
								<hr />
							</div>
							<div style="clear: both;"></div>
							<div style="width: 50%; float: left;">
									<b>Third PopUp Menu text: </b><br />
									<input type="text" name="popup3" value="<?php echo $popupOptions['popup3'];?>" style="width: 25%;" /><br />
									<small>Enter text for third menu</small>					
					
									<br />
									<b>Third PopUp Menu link(use full link, with http://) : </b><br />
									<input type="text" name="popup3link" value="<?php echo $popupOptions['popup3link'];?>" style="width: 70%;" /><br />
									<small>Enter link for Third menu</small>					
					
									<br />
									<br />
									<hr />
							</div>
							<div style="width: 50%; float: left;">
								<b>Fourth PopUp Menu Text: </b><br />
								<input type="text" name="popup4" value="<?php echo $popupOptions['popup4'];?>" style="width: 25%;" /><br />
								<small>Enter text for fourth menu</small>					
				
								<br />
								<b>Fourth PopUp Menu link(use full link, with http://) : </b><br />
								<input type="text" name="popup4link" value="<?php echo $popupOptions['popup4link'];?>" style="width: 70%;" /><br />
								<small>Enter link for fourth menu</small>					
				
								<br />
								<br />
								<hr />
							</div>
							<div style="clear:both;"></div>
							<div style="width: 50%; float: left;">
								<b>Fifth PopUp Menu text: </b><br />
								<input type="text" name="popup5" value="<?php echo $popupOptions['popup5'];?>" style="width: 25%;" /><br />
								<small>Enter text for first menu</small>					
				
								<br />
								<b>Fifth PopUp Menu link(use full link, with http://) : </b><br />
								<input type="text" name="popup5link" value="<?php echo $popupOptions['popup5link'];?>" style="width: 70%;" /><br />
								<small>Enter link for fifth menu</small>					
				
								<br />
								<br />
								<hr />
							</div>
							<div style="width: 50%; float: left;">
								<b>Sixt PopUp Menu text: </b><br />
								<input type="text" name="popup6" value="<?php echo $popupOptions['popup6'];?>" style="width: 25%;" /><br />
								<small>Enter text for first menu</small>					
				
								<br />
								<b>Sixth PopUp Menu link(use full link, with http://) : </b><br />
								<input type="text" name="popup6link" value="<?php echo $popupOptions['popup6link'];?>" style="width: 70%;" /><br />
								<small>Enter link for sixth menu</small>					
				
								<br />
								<br />
								<hr />
							</div>
							<div style="clear:both;"></div>
							
							<div class="submit">
								<input type="submit" name="update_DynamicwpPopupSettings" value="<?php _e('Update Settings', 'DynamicwpPopup') ?>" />	
							</div>
							</form>
						</div>
					<?php
				}//End function printAdminPage()
	
	}

} //End Class DynamicwpPopup

if (class_exists("DynamicwpPopup")) {
	$popup_plugin = new DynamicwpPopup();
}

//Initialize the admin panel
if (!function_exists("DynamicwpPopup_ap")) {
	function DynamicwpPopup_ap() {
		global $popup_plugin;
		if (!isset($popup_plugin)) {
			return;
		}
		if (function_exists('add_options_page')) {
	add_options_page('<b style="color: #C50606;">PopUp Menu</b>', '<b style="color: #C50606;">PopUp menu</b>', 9, basename(__FILE__), array(&$popup_plugin, 'printAdminPage'));
		}
	}	
}

//Actions and Filters	
if (isset($popup_plugin)) {
	//Actions
	add_action('admin_menu', 'DynamicwpPopup_ap');
	add_action('activate_popup/popup.php',  array(&$popup_plugin, 'init'));
	
	if(!is_admin()){
	add_action('init', array(&$popup_plugin, 'mypopuppunct')); 
	add_action('wp_footer', array(&$popup_plugin, 'mypopupscript'));
	add_action('wp_head', array(&$popup_plugin, 'mypopupstyle'));
	}
}


?>
