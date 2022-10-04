<?php
class StringManager {
    function get_last_number_from_string($input_object) {
        // Parameters are string_to_take_number.

        if ( ! $input_object->string_to_take_number) {
            throw new Exception('Error! $input_object->string_to_take_number in function get_last_number_from_string');
        }

        if (preg_match_all('/\d+/', $input_string, $numbers))
            $last_number = end($numbers[0]);

        return $last_number;
    }

    function get_replaced_string($input_object) {
        // Parameters are string_subject, string_to_search, string_to_replace_searched.

        if ($input_object->string_subject == 'undefined' ||
            $input_object->string_to_search == 'undefined' ||
            $input_object->string_to_replace_searched == 'undefined') {
                throw new Exception("Error! Syntax must be get_replaced_string($input_object->$input_object->string_subject, $input_object->string_to_search, $input_object->string_to_replace");
        }

        $replaced_string = str_replace($input_object->string_to_search, $input_object->string_to_replace_searched, $input_object->string_subject);
        
        return $replaced_string;
    }

    function get_substring($input_object) {
        // Parameters are string_subject, index_from, index_to.

        if ($input_object->string_subject == 'undefined' ||
            $input_object->index_from == 'undefined' ||
            $input_object->index_to == 'undefined') {
                return substr($input_object->string_subject, $input_object->index_from, $input_object->index_to);
        }
    }
}
