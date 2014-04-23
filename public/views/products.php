<table id="products" data-role="table" class="display ui-responsive" cellspacing="0">
	<thead>
		<tr>
			<th width="70"></th>
			<th><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th width="60"><?php _e( 'Price', 'woocommerce' ); ?></th>
			<th width="60"></th>
		</tr>
	</thead>
	<tbody>
	<?php $found_products = self::get_all_products(); if($found_products) foreach ( $found_products as $id => $sales ) : $product = get_product( $id ); ?>
		<?php if(!$product->is_type('variable')) : ?>
		<tr>
			<td><?= $product->get_image(); ?></td>
			<td>
				<strong><?= $product->get_title(); ?>
				<?php
					if($product->is_type('variation')): 
						$attributes = array();
					foreach($product->get_variation_attributes() as $name => $attribute):
						$attributes[] = $attribute; // how do we turn this into proper title??
					endforeach;
						echo ' - '.implode(', ', $attributes);
					endif;
				?>
				</strong><br />
				<em><?= $product->get_stock_quantity(); ?> in stock</em>
			</td>
			<td><?= $product->get_price_html(); ?>
			<td class="add">
				<a class="add_to_cart_button ui-btn ui-btn-icon-left ui-icon-plus" href="<?php self::get_pos_add_to_cart_url($product); ?>" title="Add to Cart" data-product_id='<?= $product->id; ?>'>Add</a>
			</td>
		</tr>
		<?php endif; ?>
	<?php endforeach; ?>
	</tbody>
</table>