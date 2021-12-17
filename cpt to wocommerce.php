<?php
add_filter('woocommerce_get_price','reigel_woocommerce_get_price',20,2);
function reigel_woocommerce_get_price($price,$post){
	if ($post->post->post_type === 'post')
		$price = get_post_meta($post->id, "price", true);
	return $price;
}

<?php
add_filter('the_content','rei_add_to_cart_button', 20,1);
function rei_add_to_cart_button($content){
	global $post;
	if ($post->post_type !== 'post') {return $content; }
	
	ob_start();
	?>
	<form action="" method="post">
		<input name="add-to-cart" type="hidden" value="<?php echo $post->ID ?>" />
		<input name="quantity" type="number" value="1" min="1"  />
		<input name="submit" type="submit" value="Add to cart" />
	</form>
	<?php
	
	return $content . ob_get_clean();
}
