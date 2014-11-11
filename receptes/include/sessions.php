<?php

session_start();

function message() {
if (isset($_SESSION["message"])) {
        $output = "<div class=\"message\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div>";
        
        // clear message after user_error
        $_SESSION["message"] = null;
        
        return $output;
}
}

?>