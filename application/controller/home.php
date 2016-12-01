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

    /**
     *
     * $location helps to active the current location in the navbar.
     */
    private $location = "";


    public function getCurrentLocation(){
        return $this->location;
    }

    public function index()
    {
        $search_options = $this->model->getSearchOptions();
        $location = "home";
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function aboutus()
    {
        $search_options = $this->model->getSearchOptions();
        $location = "aboutus";
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/aboutus.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function signup()
    {
        $search_options = $this->model->getSearchOptions();
        $location = "signup";
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/signup.php';
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
        require APP . 'view/home/results.php';
        require APP . 'view/_templates/footer.php';
    }

    public function viewlisting()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/view_listing.php';
        require APP . 'view/_templates/footer.php';
    }

    public function singleview()
    {
        $search_options = $this->model->getSearchOptions();
        $apartment = $this->model->getSingleApartmentInfo($_POST['singleapartmentid']);
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/singleview.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function conditionOfUse()
    {
        $search_options = $this->model->getSearchOptions();
        $location = "aboutus";
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/condition_of_use.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function privacyNotice()
    {
        $search_options = $this->model->getSearchOptions();
        $location = "aboutus";
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/privacy_notice.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function contactUs()
    {
        $search_options = $this->model->getSearchOptions();
        $location = "aboutus";
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/contact_us.php';
        require APP . 'view/_templates/footer.php';
    }
}
