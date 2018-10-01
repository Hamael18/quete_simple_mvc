<?php
// src/Controller/ItemController.php
namespace Controller;

use Model;

$itemManager = new \Model\ItemManager();

$items = $itemManager->selectAllItems();


require __DIR__ . '/../View/item.php';



    class ItemController
    {
        public function index() {

        }
    }



?>