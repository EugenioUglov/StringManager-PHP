<?php
class StringManager {
    function get_last_number_from_string($input_object) {
        // Parameters are string_to_take_number.

        if (isset($input_object->string_to_take_number) == false) {
            throw new Exception('Error! In function get_last_number_from_string($input_object), $input_object contains the following keys string_to_take_number');
        }

        if (preg_match_all('/\d+/', $input_string, $numbers))
            $last_number = end($numbers[0]);

        return $last_number;
    }

    function get_replaced_string($input_object) {
        // Parameters are string_subject, string_to_search, string_to_replace_searched.

        if (isset($input_object->string_subject) == false ||
            isset($input_object->string_to_search) == false ||
            isset($input_object->string_to_replace_searched) == false) {
                throw new Exception('Error! In function get_replaced_string($input_object), $input_object contains the following keys string_subject, string_to_search, string_to_replace_searched');

        }

        $replaced_string = str_replace($input_object->string_to_search, $input_object->string_to_replace_searched, $input_object->string_subject);
        
        return $replaced_string;
    }

    function get_substring($input_object) {
        // Keys for $input_object are string_subject, index_from, index_to.

        if (isset($input_object->string_subject) == false ||
            isset($input_object->index_from) == false ||
            isset($input_object->index_to) == false) {
                throw new Exception('Error! In function get_substring($input_object), $input_object contains the following keys string_subject, index_from, index_to');
        }

        return substr($input_object->string_subject, $input_object->index_from, $input_object->index_to);
    }

    function get_without_spaces($input_object) {
        // Keys for $input_object are string_subject.

        if (isset($input_object->string_subject) == false) {
            throw new Exception('Error! In function get_without_spaces($input_object), $input_object contains the following keys string_subject');
        }

		$string_without_spaces = $this->get_replaced_string((object)array('string_subject' => $input_object->string_subject, 'string_to_search' => ' ', 'string_to_replace_searched' => ''));

        return $string_without_spaces;
    }

    function get_length($input_object) {
        // Keys for $input_object are string_subject.

        if (isset($input_object->string_subject) == false) {
            throw new Exception('Error! In function get_without_spaces($input_object), $input_object contains the following keys string_subject');
        }

        return strlen($input_object->string_subject);
    }
}
