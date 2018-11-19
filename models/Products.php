<?php

class Products extends model {


	public function getList(){
	$array = array();

	$sql = "SELECT *,( select brands.name from brands where brands.id = products.id_brand ) as brand_name,
	( select categories.name from categories where categories.id = products.id_category ) as category_name 
	FROM products";
	$sql = $this->db->query($sql);

	if($sql->rowCount()){
		
		$array = $sql->fetchAll();


		foreach($array as $key => $item){
			
			$array[$key]['images'] = $this->getImagensById($item['id']);
		}

		}

		return $array;
	}

	public function getImagensById($id){
		$array = array();

		$sql = "SELECT url FROM products_images where id_product = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id" , $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}
}