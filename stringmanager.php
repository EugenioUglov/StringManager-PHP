<?php
class StringManager {
    function get_last_number_from_string($input_object) {
        // Required keys for $input_object are string_subject.

        if (isset($input_object->string_subject) == false) {
            throw new Exception('Error! In function get_last_number_from_string($input_object), required keys for $input_object are string_subject');
        }

        if (preg_match_all('/\d+/', $input_object->string_subject, $numbers))
            $last_number = end($numbers[0]);

        return $last_number;
    }

    function get_replaced_string($input_object) {
        // Required keys for $input_object are string_subject, string_to_search, string_to_replace_searched.

        if (isset($input_object->string_subject) == false ||
            isset($input_object->string_to_search) == false ||
            isset($input_object->string_to_replace_searched) == false) {
                throw new Exception('Error! In function get_replaced_string($input_object), required keys for $input_object are string_subject, string_to_search, string_to_replace_searched');

        }

        $replaced_string = str_replace($input_object->string_to_search, $input_object->string_to_replace_searched, $input_object->string_subject);
        
        return $replaced_string;
    }

    function get_substring($input_object) {
        // Required keys for $input_object are string_subject, index_from, index_to.

        if (isset($input_object->string_subject) == false ||
            isset($input_object->index_from) == false ||
            isset($input_object->index_to) == false) {
                throw new Exception('Error! In function get_substring($input_object), required keys for $input_object are string_subject, index_from, index_to');
        }

        return substr($input_object->string_subject, $input_object->index_from, $input_object->index_to);
    }
	
    function get_index_substring($input_object) {
        // Required keys for $input_object are string_subject, string_to_search.

        if (isset($input_object->string_subject) == false ||
            isset($input_object->string_to_search) == false) {
                throw new Exception('Error! In function get_index_substring($input_object), required keys for $input_object are string_subject, string_to_search');
        }

        return strpos($input_object->string_subject, $input_object->string_to_search);
    }

    function get_without_spaces($input_object) {
        // Required keys for $input_object are string_subject.

        if (isset($input_object->string_subject) == false) {
            throw new Exception('Error! In function get_without_spaces($input_object), required keys for $input_object are string_subject');
        }

		$string_without_spaces = $this->get_replaced_string((object)array('string_subject' => $input_object->string_subject, 'string_to_search' => ' ', 'string_to_replace_searched' => ''));

        return $string_without_spaces;
    }

    function get_length($input_object) {
        // Required keys for $input_object are string_subject.

        if (isset($input_object->string_subject) == false) {
            throw new Exception('Error! In function get_length($input_object), required keys for $input_object are string_subject');
        }

        return strlen($input_object->string_subject);
    }
	
    function get_count_of_words($input_object) {
        // Required keys for $input_object are string_subject.

        if (isset($input_object->string_subject) == false) {
            throw new Exception('Error! In function get_count_of_words($input_object), required keys for $input_object are string_subject');
        }

        return str_word_count($input_object->string_subject);
    }
	
    function get_reversed_string($input_object) {
        // Required keys for $input_object are string_subject.

        if (isset($input_object->string_subject) == false) {
            throw new Exception('Error! In function get_reversed_string($input_object), required keys for $input_object are string_subject');
        }

        return strrev($input_object->string_subject);
    }

    function is_equal_strings($input_object) {
        // Required keys for $input_object are first_string, second_string, is_case_sensitive.

        if (isset($input_object->first_string) == false ||
            isset($input_object->second_string) == false ||
            isset($input_object->is_case_sensitive) == false) {
                throw new Exception('Error! In function is_equal_strings($input_object), required keys for $input_object are first_string, second_string, is_case_sensitive');
        }

        if ($input_object->is_case_sensitive) {
            return $input_object->first_string == $input_object->second_string;
        }
        else {
            return strtoupper($input_object->first_string) == strtoupper($input_object->second_string);
        }
    }
	
    function is_exists($input_object) {
        // Required keys for $input_object are string_subject, string_to_search.

        if (isset($input_object->string_subject) == false || 
            isset($input_object->string_to_search) == false) {
            	throw new Exception('Error! In function is_exists($input_object), required keys for $input_object are string_subject, string_to_search');
        }

     	$pattern = get_regular_expression_string($input_object);

        return preg_match($pattern, $input_object->string_subject); 
    }
	
     function get_count_matches($input_object) {
        // Required keys for $input_object are string_subject, string_to_search.

        if (isset($input_object->string_subject) == false || 
            isset($input_object->string_to_search) == false) {
            	throw new Exception('Error! In function get_count_matches($input_object), required keys for $input_object are string_subject, string_to_search');
        }

     	$pattern = get_regular_expression_string($input_object);

	return preg_match_all($pattern, $input_object->string_subject);
    }

    function get_replaced_string_advanced($input_object) {
	// Required keys for $input_object are string_subject, string_to_search, string_to_replace_searched.
        

        if (isset($input_object->string_subject) == false || 
            isset($input_object->string_to_search) == false ||
	    isset($input_object->string_to_replace_searched) == false) {
            	throw new Exception('Error! In function get_replaced_string_advanced($input_object), required keys for $input_object are string_subject, string_to_search, string_to_replace_searched');
        }

     	$pattern = get_regular_expression_string($input_object);

    	return preg_replace($pattern, $input_object->string_to_replace_searched, $input_object->string_subject);
    }

    function get_regular_expression_string($input_object) {
	// Required keys for $input_object are string_to_search.
        // Other keys for $input_object are is_case_sensative.
	    
	if (isset($input_object->string_to_search) == false) {
            throw new Exception('Error! In function get_regular_expression_string($input_object), required keys for $input_object are string_to_search');
        }

        $modifiers = '';
        $delimeter = '/';
	    
        if (isset($input_object->is_case_sensative)) {
            if ($input_object->is_case_sensative == false) {
            	$modifiers .= 'i';
            }
        }

        $pattern = $delimeter.$input_object->string_to_search.$delimeter.$modifiers;
	    
	return $pattern;
    }
	
    function get_regular_expression_search_pattern_repeating_string($input_object) {
         // Required keys for $input_object are string_must_be_repeated, count_repeats or min_count_repeats.
	 // Other keys max_count_repeats
	    
	 if (isset($input_object->string_must_be_repeated) == false) {
            	throw new Exception('Error! In function get_regular_expression_search_pattern_repeating_string($input_object), required keys for $input_object are string_must_be_repeated, count_repeats or min_count_repeats');
         }
	 else if (isset($input_object->count_repeats) == false || isset($input_object->min_count_repeats) == false) {
		throw new Exception('Error! In function get_regular_expression_search_pattern_repeating_string($input_object), required keys for $input_object are string_must_be_repeated, count_repeats or min_count_repeats');
	 }
	    
	 if (isset($input_object->count_repeats)) {
	 	return '('.$input_object->string_must_be_repeated.'){'.$input_object->count_repeats.'}';
	 }
	 else if (isset($input_object->min_count_repeats) && isset($input_object->max_count_repeats)) {
		 if (isset($input_object->max_count_repeats) == false) { 
		 	return '('.$input_object->string_must_be_repeated.'){'.$input_object->min_count_repeats.','.'}';
		 }
		 else {
			return '('.$input_object->string_must_be_repeated.'){'.$input_object->min_count_repeats.','.$input_object->max_count_repeats.'}';
		 }
	 }
	 else {
		throw new Exception('Error! In function get_regular_expression_search_pattern_repeating_string($input_object), required keys for $input_object are string_must_be_repeated, count_repeats or min_count_repeats and max_count_repeats');
	 }
    }
}
