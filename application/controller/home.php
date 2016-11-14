<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $search_options = $this->model->getSearchOptions();

        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: search
     * This method handles getting listings from the database that match the search criteria
     */
    public function search()
    {
        $search_options = $this->model->getSearchOptions();

        if (isset($_POST['submit_search'])) {
            $results = $this->model->search($_POST['search_option'], $_POST['search_query']);
        } else {
            $results = $this->model->search();
        }

        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/home/results.php';
        require APP . 'view/_templates/footer.php';
    }
}
