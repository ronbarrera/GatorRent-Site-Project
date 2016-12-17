
<?php
    
	class Listing extends Controller
    {    
        /*
         * Page: Listing
         * Handles creating a listing
         */

        public function create(){
            
            $info = array(
                'title' => $_POST['title'],
                'address' => $_POST['address'],
                'zipCode' => $_POST['zipCode'],
                'price' => $_POST['price'],
                'rooms' => $_POST['rooms'],
                'description' => $_POST['description'],
                'picture_1' => "link"
            );
            
            $this->listModel->create($info);        

        }      

}
    
