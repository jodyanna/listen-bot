<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-type: application/json');

  // Global Variables
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "listen-bot";


  function main() {
    if (!isset($_POST["user-post"])) return;

    try {
      if (is_post_text_valid($_POST["user-post"])) insert_post_text($_POST["user-post"]);
      header("Location: http://localhost/listen-bot/success.html");
      exit;
    }
    catch (Exception $err) {
      error_log($err, 3, "error_log.txt");
      header("Location: http://localhost/listen-bot/error.html");
      exit;
    }
  }


  /****************************** Insert Post *****************************
   * @param $post_text string
   */
  function insert_post_text($post_text) {
    global $servername, $username, $password, $db_name;

    $conn = new mysqli($servername, $username, $password, $db_name);
    if ($conn->connect_error) exit("Connection failed: " . $conn->connect_error);

    $statement = $conn->prepare("INSERT INTO posts (post_text) VALUES (?);");
    $statement->bind_param("s", $post_text);
    $statement->execute();

    $conn->close();
  }


  /****************************** Validate Post *****************************
   * @param $post_text string
   * @return boolean
   * @throws Exception
   */
  function is_post_text_valid($post_text) {
    if ($post_text == null) throw new Exception("Post text is null.");

    $post_length = strlen($post_text);

    if ($post_length == 0 || $post_length > 255 || $post_length < 0) return false;
    else return true;
  }


  main();


