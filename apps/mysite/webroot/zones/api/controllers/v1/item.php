<?php
    use aqua\Controller;
	
    class item extends Controller{
    	public function get_item( $itemData ){
    		echo "v1 get_item";
    	}
    	public function get_item_all( $itemData ){
    		echo "v1 get_item_all";
    	}
		public function get_item_history( $itemData, $historyData ){
			echo "v1 get_item_history";
		}
    }
?>