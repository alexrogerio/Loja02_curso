<?php

class Products extends model {


	public function getList($offset = 0, $limit = 12){
	$array = array();

	$sql = "SELECT *,( select brands.name from brands where brands.id = products.id_brand ) as brand_name,
	( select categories.name from categories where categories.id = products.id_category ) as category_name 
	FROM products LIMIT $offset, $limit";
	$sql = $this->db->query($sql);

	if($sql->rowCount()){
		
		$array = $sql->fetchAll();


		foreach($array as $key => $item){
			
			$array[$key]['images'] = $this->getImagensById($item['id']);
		}

		}

		return $array;
	}

	public function getTotal(){
		$sql = "SELECT COUNT(*) as cont FROM products";
		$sql = $this->db->query($sql);
		$sql = $sql->fetch();

		return $sql['cont'];
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