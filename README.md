# StringManager
It makes easy to use string functions in PHP.<br>
Each function has been created with one parameter as an object. Inside funcitons are comments with keys of object that can be used for declaring input values.

<h2><b>How to use</b></h2>

Include file:

```
require_once('stringmanager.php');
```

Create object:
```
$string_manager = new StringManager();
```

Use:
```
$replaced_string = $string_manager->get_replaced_string((object)array(
  'string_subject' => 'string to replace', 
  'string_to_search' => 'to replace', 
  'string_to_replace_searched' => 'has been replaced'));
```
