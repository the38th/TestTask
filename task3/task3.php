<?php
    function TagsCheck($tags) {
        
        $openTags = [];
        foreach ($tags as $tag) {
            if (strpos($tag, "/") != false) {
                if (count($openTags) == 0) {
                    return false;
                }
                $lastOpenTag = array_pop($openTags);
                if (substr($lastOpenTag, 1) != substr($tag, 2)) {
                    return false;
                }
            } else {
                $openTags[] = $tag;
            }
        }
        return (count($openTags) == 0);
    }
?>