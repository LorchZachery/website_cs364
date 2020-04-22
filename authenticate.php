<?php
session_start(); // start (or resume) session

if (! isset($_SESSION["username"])) {
  header("Location: sign_in.php?redirect=".$_SERVER["PHP_SELF"]);
}
?>
