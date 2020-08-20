<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-type: application/json');

  // Global Variables
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "listen-bot";


  /****************************** Get Random Post ******************************/
  function get_random_post_text() {
    global $servername, $username, $password, $db_name;

    $conn = new mysqli($servername, $username, $password, $db_name);
    if ($conn->connect_error) exit("Connection failed: " . $conn->connect_error);

    $statement = $conn->prepare("SELECT post_text, post_date FROM posts ORDER BY RAND() LIMIT 1;");
    $statement->execute();

    $result = $statement->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode([htmlspecialchars($data[0]["post_text"]), htmlspecialchars($data[0]["post_date"])]);

    $conn->close();
  }

  get_random_post_text();