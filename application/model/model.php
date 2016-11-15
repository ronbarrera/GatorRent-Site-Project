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
    public function search($search_option, $search_query)
    {
        $sql = 'SELECT * FROM prototype';
        $parameters = array();
        if ($search_option !== '' && $search_query !== '') {
            $sql = $sql . ' WHERE ' . $search_option . ' LIKE :query';
            $parameters = array(':query' => '%' . $search_query . '%');
        }
        $query = $this->db->prepare($sql);

        // DEBUG:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        return $query->fetchAll();
    }

    /**
     * 
     * @return all apartment's column by giving apartment_id
     */
     public function getSingleApartmentInfo($apartment_id)
    {        
        $sql = 'SELECT * FROM prototype WHERE apartment_id = '.$apartment_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    
}
