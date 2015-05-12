<?php
$errors = array();

function  has_presence($value) {
    return isset($value) && $value !=="";
}

function validate_presences($required_fields) {
    global $errors;
    foreach($required_fields as $field) {
        $value = trim($_POST[$field]);
        if (!has_presence($value)) {
            $errors[$field] = ucfirst($field) . " can't be blank";
        }
    }
}

function has_inclusion_in($value, $set) {
    return in_array($value, $set);
}

?>