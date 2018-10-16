<?php
// src/Controller/CategoryController.php
namespace Controller;
use Model;
use Twig_Loader_Filesystem;
use Twig_Environment;


class CategoryController extends AbstractController
{
    public function index()
    {
        $categoryManager = new Model\CategoryManager($this->pdo);
        $categories = $categoryManager->selectAll();
        return $this->twig->render('category.html.twig', ['categories' => $categories]);
    }

    public function show($id)
    {
        $categoryManager = new Model\CategoryManager($this->pdo);
        $category = $categoryManager->selectOneById($id);
        return $this->twig->render('showCategory.html.twig', ['category' => $category]);
    }
    public function add()
    {
        if (!empty($_POST)) {
            // TODO : validations des valeurs saisies dans le form
            // création d'un nouvel objet Category et hydratation avec les données du formulaire
            $category = new Model\Category();
            $category->setName($_POST['name']);

            $CategoryManager = new Model\CategoryManager($this->pdo);
            // l'objet $item hydraté est simplement envoyé en paramètre de insert()
            $CategoryManager->insert($category);
            // si tout se passe bien, redirection
            header('Location: /');
            exit();
        }
        // le formulaire HTML est affiché (vue à créer)
        return $this->twig->render('addCategory.html.twig');
    }
    public function edit(int $id)
    {
        $categoryManager = new Model\CategoryManager($this->pdo);
        $category = $categoryManager->selectOneById($id);
        if (@$_POST['modifier'] == "edit") {
            $category->setName($_POST['name']);
            $categoryManager->update($category);

        }
        return $this->twig->render('editCategory.html.twig', ['category' => $category]);

    }

    public function delete(int $id)
    {
        $categoryManager = new Model\CategoryManager($this->pdo);
        $category = $categoryManager->selectOneById($id);
        if (@$_POST['supprimer'] == "suppr") {
            $categoryManager->delete($category);
        }
        return $this->twig->render('deleteCategory.html.twig', ['category' => $category]);
    }

}