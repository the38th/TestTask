<?php

  function searchCategory($categories, $id) {
    if (array_key_exists("id", $categories) && ($categories["id"] == $id)) {
        return $categories["title"];
    }
    foreach ($categories as $category) {
      if (is_array($category)) {
          $temp = searchCategory($category, $id);
          if ($temp != "") {
            return $temp;
          }
      }
    }
    return "";
  }
  
?>