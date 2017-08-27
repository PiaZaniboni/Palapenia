
<?php

if(isset($_SESSION["logged_user"])){
	if($_SESSION["logged_user"] === true){
		if(isset($_GET["c"])){
?>
			<?php
			if(isset($_GET["a"])){
				if($_GET["a"] !== "add" &&
					$_GET["a"] !== "edit" &&
					$_GET["a"] !== "edit_image" &&
					$_GET["a"] !== "edit_gallery" &&
					$_GET["a"] !== "edit_file"
				){
			?>

<a href="<?php echo generateURL($_GET["c"], 'add')?>" class="pull-right">
    <span class="glyphicon glyphicon-plus"></span>
</a>

				<?php } else { ?>

<a href="<?php echo generateURL($_GET["c"], 'list')?>" class="pull-right">
    <span class="glyphicon glyphicon-chevron-left"></span>
</a>

			<?php
				}
			} else {
			?>

<a href="<?php echo generateURL($_GET["c"], 'add')?>" class="pull-right">
    <span class="glyphicon glyphicon-plus"></span>
</a>

        <?php
			}
		} else {
		?>

<a href="<?php echo generateURL(DEFAULT_CONTROLLER, 'add')?>" class="pull-right">
    <span class="glyphicon glyphicon-plus"></span>
</a>

<?php
		}
	}
}

?>
