 Singleton Mysqli wrapper
 ===
 Singleton:
 - Ensure a class has only one instance, and provide a global point of access to it.
 - Encapsulated "just-in-time initialization" or "initialization on first use".

 How to use this:
 DB::setup($user, $pass, $db); -- pass a 4th arg if your not connecting to localhost
 $products = DB::getInstance()->query('SELECT * FROM products');

 Now you can do stuff like:
 Count results for you:   $products->count()    // count the results
 Get Results:             $products->results()  // Returns results as object
 Get one result:          $products[1]->name    // columns are used as key for your object to access values.


 Included sql script with testdata to import.

 Resources:
 http://en.wikipedia.org/wiki/Singleton_pattern
 http://sourcemaking.com/design_patterns/singleton
 http://3ft9.com/snippet-singletons-with-php/