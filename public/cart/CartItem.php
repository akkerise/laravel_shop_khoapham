<?php
/**
 *
 */

class CartItem {
	public static function setCartItem($id) {
		$_SESSION['cart_item'][$id];
	}
	public static function setAttr($id, $name, $alias, $qty, $price, $image) {
		$_SESSION['attr_id'][$id]       = $id;
		$_SESSION['attr_name'][$name]   = $name;
		$_SESSION['attr_alias'][$alias] = $alias;
		$_SESSION['attr_qty'][$qty]     = $qty;
		$_SESSION['attr_price'][$price] = $price;
		$_SESSION['attr_image'][$image] = $image;
	}
}
?>