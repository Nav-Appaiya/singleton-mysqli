SingletonMysqli wrapper
===
Singleton:
- Ensure a class has only one instance, and provide a global point of access to it.
- Encapsulated "just-in-time initialization" or "initialization on first use".

How to use this:

`DB::setup($user, $pass, $db); //pass a 4th arg if your not connecting to localhost`

`$leerlingen = DB::getInstance()->query('SELECT * FROM leerlingen');`

Now you can do stuff like:

`$leerlingen->count()    // count the results`
`$leerlingen->results()  // Returns results as object`
`$leerlingen[1]->name    // columns are used as key for your object to access values.`


Included a sql script with testdata to import. 

PHP Resources on Singleton Pattern:
- http://en.wikipedia.org/wiki/Singleton_pattern
- http://sourcemaking.com/design_patterns/singleton
- http://3ft9.com/snippet-singletons-with-php/
