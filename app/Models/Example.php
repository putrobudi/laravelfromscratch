<?php 

namespace App\Models;

/* From Service Provider Fundamentals */
// class Example {
//   public function go() {
//     dump('it works');
//   }
// }

/* From Automatically Resolve Dependencies */
/* Version 1 */
// class Example {
//   protected $foo;

//   public function __construct($foo) {
//     $this->foo = $foo;
//   }
// }

/* Version 2 */
class Example {
  // Before this was empty.
  //protected $collaborator;

  /* Version 1 */
  // public function __construct(Collaborator $collaborator) {
  //   $this->collaborator = $collaborator;
  // }

  /* Version 2 */
  // protected $foo;
  // public function __construct(Collaborator $collaborator, $foo) { // You need to tell Laravel what $foo is.
  //   $this->collaborator = $collaborator;
  //   $this->foo = $foo;
  // }

  /* Different topic -> create your own Facade */
  
  // If you do have a constructor and you pass in an api key for example. You can't expect Laravel to 
  // know what that api key is if you haven't bound it. So Laravel can't automatically resolve the dependency for you. 
  
  protected $apiKey;
  public function __construct($apiKey) { // can I build $apiKey in the fly for you? If not then you'd have to bind explicitly in the Service Container like AppServiceProvider.
    $this->apiKey = $apiKey;
  }


  public function handle() {
    die('it works');
  }
}