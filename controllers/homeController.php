<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        $products = new Products();
        $currentPage = 1;
        $offset = 0;
        $limit = 12;

        if(!empty($_GET['p'])){
            $currentPage = $_GET['p'];
        }
        $offset = ($currentPage * $limit) - $limit;

        $dados['list'] = $products->getList($offset, $limit);
        $dados['totalItens'] = $products->getTotal();
        $dados['numberOfPages'] = ceil($dados['totalItens']/$limit);
        $dados['currentPage'] = $currentPage;

        $this->loadTemplate('home', $dados);
    }

}