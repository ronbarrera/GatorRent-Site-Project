<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get search options
     */
    public function getSearchOptions()
    {
        $options = [
            "street_address" => "Street Address" ,
            "zipcode" => "Zip Code",
            "price" => "Max Price",
            "rooms" => "Rooms"
        ];

        return $options;
    }

    /**
     * Search apartments based on search criteria
     */
    public function search($searchOption, $searchQuery)
    {
        $sql = 'SELECT * FROM prototype';
        $parameters = array();
        $options = $this->getSearchOptions();

        if ($searchOption !== '' && $searchQuery !== '') {
            if ($this->_validateSearch($searchOption, $searchQuery)) {
                switch ($searchOption) {
                    case 'street_address':
                        $sql = $sql . ' WHERE ' . $searchOption . ' LIKE :query';
                        $parameters = array(':query' => '%' . $searchQuery . '%');
                        break;
                    case 'price':
                        $sql = $sql . ' WHERE ' . $searchOption . ' <= :query';
                        $parameters = array(':query' => $searchQuery);
                        break;
                    case 'zipcode':
                    case 'rooms':
                        $sql = $sql . ' WHERE ' . $searchOption . ' = :query';
                        $parameters = array(':query' => $searchQuery);
                        break;
                    default:
                        // do nothing
                }
            } else {
                throw new Exception('Invalid '. strtolower($options[$searchOption]) . '. Check your search for any errors and try again.');
            }
        }
        $query = $this->db->prepare($sql);

        // DEBUG:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        return $query->fetchAll();
    }

    /**
     * get the most recent posts as an array of 6.
     * no external parameters are necessary.
    */

    public function getMostRecentPosts()
    {
       $sql = 'SELECT picture_1 FROM Apartments ORDER BY modified_date DESC LIMIT 6;';
       $query = $this->db->prepare($sql);
       $query->execute();
       return $query->fetchAll();
    }

    /**
     * This function will get a specific picture at an index.
     * This will get a pictuer at a specific number, taking into
     * account that it starts at 0.
    */
    public function getRecentPicturePost($pictureNumber)
    {
      $results = getMostRecentPosts();
      return $results[$pictureNumber - 1];
    }


    /**
     * @return all apartment's column by giving apartment_id
     */
     public function getSingleApartmentInfo($apartment_id)
    {
        $sql = 'SELECT * FROM prototype WHERE apartment_id = '.$apartment_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Function for validating searches before querying database.
     * Street addresses should be strings; zip code, price, and rooms
     * should be positive integers. Zip codes should be exactly 5 numbers long.
     * @return boolean: true if valid; false if invalid
     */
     private function _validateSearch($searchOption, $searchQuery)
     {
         switch ($searchOption) {
             case 'street_address':
                 return preg_match('/[. A-Za-z0-9]/', $searchQuery);
                 break;
             case 'zipcode':
                 return strlen($searchQuery) === 5 && ctype_digit($searchQuery) && intval($searchQuery, 10) >= 0;
                 break;
             case 'price':
             case 'rooms':
                 return ctype_digit($searchQuery) && intval($searchQuery, 10) >= 0;
                 break;
             default:
                 // no matched search option - default to false
                 return false;
         }
     }

}
