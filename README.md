# StringManager
It makes easy to use string functions in php.<br>
Each function has been created with one parameter as an object. Inside funcitons are comments with keys of object that can be used for declaring input values.

<h2><b>How to use</b></h2>
Include file<br>
require_once('stringmanager.php');<br><br>
Create object<br>
$string_manager = new StringManager();<br><br>
Use<br>
$replaced_string = $string_manager->get_replaced_string((object)array('string_subject' => 'string to replace', 'string_to_search' => 'to replace', 'string_to_replace_searched' => 'has been replaced'));
