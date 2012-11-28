<?php
if (!isset($quick_link)) {
    $quick_link = null;
}
?>
<div id="sub_menu">
	<div class="settingslinks">
	    <h2>A<a href="<?php echo site_url('category_management'); ?>" class="settingslinks">Categories</a></h2>
        <h2>B<a href="<?php echo site_url("city_management"); ?>" class="settingslinks">Cities</a></h2>
	   <h2>C<a href="<?php echo site_url("business_management"); ?>" class="settingslinks">Businesses</a></h2>
	   <h2>D<a href="<?php echo site_url("user_management"); ?>" class="settingslinks">Users</a></h2>
	 </div>
</div>
<div id="main_content">
	<?php
    $this -> load -> view($settings_view);
	?>
</div>
