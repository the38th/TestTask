<?php
  function searchId($categories, $id) {
    if (array_key_exists("id", $categories) && ($categories["id"] == $id)) {
        return $categories["title"];
    }
    foreach ($categories as $key => $value) {
      if (is_array($value)) {
          return searchId($value, $id);
      }
    }
    return "";
  }
?>