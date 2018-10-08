<?php
// src/Controller/ItemController.php
namespace Controller;
use Model;
use Twig_Loader_Filesystem;
use Twig_Environment;

    class ItemController
    {
        private $twig;

        public function __construct()
        {
            $loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
            $this->twig = new Twig_Environment($loader);
        }

        public function index() {
            $itemManager = new Model\ItemManager();
            $items = $itemManager->selectAllItems();
            return $this->twig->render('item.html.twig', ['items' => $items]);
        }
        public function show(int $id)
        {
            $itemManager = new Model\ItemManager();
            $item = $itemManager->selectOneItem($id);

            return $this->twig->render('showItem.html.twig', ['item' => $item]);
        }
    }
