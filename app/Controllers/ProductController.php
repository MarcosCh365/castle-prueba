<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Product;

class ProductController extends BaseController
{

    function __construct() {
        $this->productModel = new Product();
    }

    public function index()
    {
        //
    }

    public function getProducts() {

        $products = $this->productModel->findAll();

        return $products;

    }

    public function getProductsTable() {
        $draw = $this->request->getPost("draw");
        $start = $this->request->getPost("start");
        $lenght = $this->request->getPost("length");
        $columnOrder = $this->request->getPost("order")["0"]["column"];
        $columnOrder = ($columnOrder == 0 ? "" : $columnOrder);
        $dirOrder = $this->request->getPost("order")["0"]["dir"];
        $searchValue = $this->request->getPost("search")["value"];

        $totalRecords = $this->productModel->select('id')->countAllResults();
        
        $products = $this->productModel->where('bolActivo', 1);

        if(!empty($searchValue)) {
            $products = $products->like('id', $searchValue)->orLike('strNombre', $searchValue);
        }
        
        $products = $products->orderBy($columnOrder, $dirOrder)->findAll($start, $lenght); 

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => count($products),
            "data" => $products
        );

        echo json_encode($response);
    }

    public function store() {
        $success = 1;
        $msg = "";
        
        $productName = $this->request->getPost('productName');

        $data = array(
            'strNombre' => $productName
        );
        
        try {
            $this->productModel->save($data);
        } catch(\Exception $e) {
            $succes = 0;
            $msg = $e->getMessage();
        }

        echo json_encode(['success' => $success, 'msg' => $msg]);
        exit();
    }

    public function update($productId) {
        $success = 1;
        $msg = "";
        
        $productName = $this->request->getPost('productName');

        $data = array(
            'strNombre' => $productName
        );
        
        try {
            $this->productModel->update($productId,$data);
        } catch(\Exception $e) {
            $succes = 0;
            $msg = $e->getMessage();
        }

        echo json_encode(['success' => $success, 'msg' => $msg]);
        exit();
    }

    public function delete($productId) {
        $success = 1;
        $msg = "";
        
        $productName = $this->request->getPost('productName');

        $data = array(
            'bolActivo' => 0
        );
        
        try {
            $this->productModel->update($productId,$data);
        } catch(\Exception $e) {
            $succes = 0;
            $msg = $e->getMessage();
        }

        echo json_encode(['success' => $success, 'msg' => $msg]);
        exit();
    }

}
