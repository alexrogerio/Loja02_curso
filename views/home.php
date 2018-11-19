<div class="row">
	<?php
		$cont = 0;
		foreach($list as $product_item): 
	 ?>
	<div class="col-sm-4">
		
		<?php $this->loadView('product_item', $product_item) ?>

	</div>
	<?php if($cont >= 2){
		echo "</div>";
		echo 'div class="row">';
	} else {
		$cont ++;
	}
	?>
		
	<?php endforeach; ?>
</div>