<?php
namespace Controller;
use Doctrine\DBAL\Query\QueryBuilder;
class IndexController{
  public function indexAction(){
    include("search.php");
  }
  public function searchAction(){
    //se connecter à la bdd
    header('Content-Type: application/json');
    //moviesearch connexion getinstance
    $conn = \MovieSearch\Connexion::getInstance();
    $title = $_POST['title'];
    $duration = $_POST['duration'];
    $yearStart = $_POST['year_start'];
    $yearEnd = $_POST['year_end'];
    $gender = $_POST['gender'];
    $producer = $_POST['producer'];
    if (isset($title)) {
      $reqTitle = " SELECT * FROM film_director
                          INNER JOIN artist
                          ON artist_id = artist.id
                          INNER JOIN film
                          ON film_director.film_id = film.id
                          WHERE film.title
                          LIKE '$title%' ";
    }
    if (isset($duration)) {
      if ($duration == "All") {
        $reqTime = "";
      } else if ($duration == "1") {
        $reqTime = " AND duration < 3600 ";
      } else if ($duration == "2") {
        $reqTime = " AND duration BETWEEN 3600 AND 5400 ";
      } else if ($duration == "3") {
        $reqTime = " AND duration BETWEEN 5400 AND 9000 ";
      } else if ($duration == "4") {
        $reqTime = " AND duration > 9000 ";
      }
    }
    if (isset($yearStart)) {
      $reqYearStart = " AND year >= '$yearStart' ";
    }
    if (empty($yearStart)) {
      $reqYearStart = "";
    }
    if (isset($yearEnd)) {
      $reqYearEnd = " AND year <= '$yearEnd' ";
    }
    if (empty($yearEnd)) {
      $reqYearEnd = "";
    }

    if (isset($gender)) {
      if ($gender == "") {
        $reqGender = "";
      } else if ($gender == "M") {
        $reqGender = " AND ( gender = 'M') ";
      } else if ($gender == "F") {
        $reqGender = " AND ( gender = 'F') ";
      }
    }
    if (isset($producer)) {
      $reqProducer = " AND ( artist.first_name LIKE '%$producer%' OR artist.last_name LIKE '%$producer%')  ";
    }
    if (empty($producer)) {
      $reqProducer = "";
    }
    $stmt = $conn->prepare($reqTitle . $reqTime . $reqYearStart . $reqYearEnd.$reqGender.$reqProducer.'GROUP BY title');
    $stmt->execute();
    $films = $stmt->fetchAll();
    return json_encode(["films" => $films]);
  }
}
