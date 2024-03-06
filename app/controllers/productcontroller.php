<?php

namespace Controllers;

use Exception;
use Services\ProductService;

class ProductController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new ProductService();
    }

    public function getAll()
    {
        $this->respond($this->service->getAll());
    }

    public function getOne($id)
    {
       
     
        $product = $this->service->getOne($id);

        $product == null ?  $this->respond($product) :       
        $this->respondWithError(404, "Product Not Found");
       

    

    }

    public function create()
    {
        try {
            $product = $this->createObjectFromPostedJson("Models\Product");
            // something is missing. Shouldn't we update the product in the DB?

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($product);
    }

    public function update($id)
    {
        // There is no code here
    } 
}
