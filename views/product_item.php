<div class="product_item">
	<a href="">
		<div class="product_tags">
			<?php if($new_product == '1'): ?>
				<div class="product_tag product_tag_blue"><?php $this->lang->getDictionary('NEW'); ?></div>
			<?php endif; ?>
			<?php if($sale == '1'): ?>
				<div class="product_tag product_tag_red"><?php $this->lang->getDictionary('SALE'); ?></div>
			<?php endif; ?>
			<?php if($bestseller == '1'): ?>
				<div class="product_tag product_tag_green"><?php $this->lang->getDictionary('BESTSELLER'); ?></div>
			<?php endif; ?>
		</div>
		<div class="product_image">
			<img src="<?php echo BASE_URL; ?>/media/products/<?php echo $images[0]['url'] ?>" width="100%">
		</div>
		<div class="product_name"><?php echo utf8_encode($name); ?></div>
		<div class="product_brand"><?php echo utf8_encode($brand_name); ?></div>
		<div class="product_price_from" >
				<?php 
					if($price_from != '0'){
						echo "R$ ".number_format($price_from, 2,',','.');
					}
				?>
		</div>
		<div class="product_price">R$ <?php echo number_format($price, 2,',','.'); ?></div>
		<div style="clear: both;"></div>
	</a>
</div>