<?php

namespace APP\Controller;

require_once __DIR__ . "/../../vendor/autoload.php";
use APP\Model\WikieSearch;
use PDO;
class WikieSearchcontroller{
public function searchForWikieByTitle($search){
        $Wikies=new WikieSearch;
        $result=$Wikies->searchForWikieByTitle($search);
        return $result;
}

public function searchForWikieByCategory($search){
    $Wikies=new WikieSearch;
    $result=$Wikies->searchForWikieByCategory($search);
    return $result;
}

public function searchForWikieByTag($search){
    $Wikies=new WikieSearch;
    $result=$Wikies->searchForWikieByTag($search);
    return $result;
}
}

$wikies=new WikieSearchcontroller;

if(isset($_GET['searchTitle'])) {
    $search = $_GET['searchTitle'];
    $searchTerm = filter_var($search, FILTER_SANITIZE_STRING);
    $wikies_result=$wikies->searchForWikieByTitle($searchTerm);


    echo json_encode($wikies_result);

}

if(isset($_GET['searchTag'])) {
    $search = $_GET['searchTag'];
    $searchTerm = filter_var($search, FILTER_SANITIZE_NUMBER_INT);
    $wikies_result=$wikies->searchForWikieByTag($searchTerm);


    echo json_encode($wikies_result);

}

if(isset($_GET['searchCategory'])) {
    $search = $_GET['searchCategory'];
    $searchTerm = filter_var($search, FILTER_SANITIZE_STRING);
    $wikies_result=$wikies->searchForWikieByCategory($searchTerm);


    echo json_encode($wikies_result);

}