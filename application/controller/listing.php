<?php

	class Listing extends Controller
    {
        /*
         * Action: create
         * Handles creating a listing
         */
        public function create($lessorId)
        {
            $info = array(
                'lessor_id' => $lessorId,
                'title' => $_POST['title'],
                'address' => $_POST['address'],
                'zipCode' => $_POST['zipCode'],
                'price' => $_POST['price'],
                'rooms' => $_POST['rooms'],
                'baths' => $_POST['baths'],
                'description' => $_POST['description'],
                'picture_1' => "link"
            );

            $this->listModel->create($info, function () {
                // Called after listing is saved to database
                header('location: ' . URL . 'user/createlisting');
            });
        }

        /*
         * Action: update
         * Handles updating a listing
         */
        public function update($apartmentId)
        {
            $info = array(
                'title' => $_POST['title'],
                'address' => $_POST['address'],
                'zipCode' => $_POST['zipCode'],
                'price' => $_POST['price'],
                'rooms' => $_POST['rooms'],
                'baths' => $_POST['baths'],
                'description' => $_POST['description'],
                'apartment_id' => $apartmentId
            );

            $this->listModel->update($info);

            header('location: ' . URL . 'user/createlisting');
        }

        /*
         * Action: delete
         * Handles deleting a listing
         */
        public function delete($apartmentId)
        {
            $this->listModel->delete($apartmentId);

            header('location: ' . URL . 'user/createlisting');
        }
    }
