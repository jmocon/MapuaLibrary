<?php

require_once("dataaccess/Database.php");
require_once("dataaccess/Book.php");
require_once("dataaccess/Inventory.php");

for ($i = 0; $i < 100; $i++) {

  // Add Book
  $mdlBook = new stdClass;
  $mdlBook->Code = "CODE" . $i . "-" . rand(1111, 9999);
  $mdlBook->Keyword = "Keyword " . $i;
  $mdlBook->Title = "Title " . $i;
  $mdlBook->Author = "Author " . $i;
  $mdlBook->Subject_Id = rand(1, 2);
  $mdlBook->Synopsis = "Synopsis " . $i;
  $mdlBook->DatePublished = date("Y-m-d", strtotime("+ 1 day"));
  $bookid = $clsBook->Add($mdlBook);

  // Add Inventory
  for ($j = 0; $j < rand(1, 10); $j++) {

    $mdlInventory = new stdClass;
    $mdlInventory->Branch_Id = rand(1, 2);
    $mdlInventory->Book_Id = $bookid;
    $mdlInventory->DateAcquired = date("Y-m-d", strtotime("+ " . rand(100, 200) . " day"));
    $clsInventory->Add($mdlInventory);
  }
}

echo "done";
