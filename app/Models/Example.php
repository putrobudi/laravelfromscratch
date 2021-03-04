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
  protected $collaborator;

  // public function __construct(Collaborator $collaborator) {
  //   $this->collaborator = $collaborator;
  // }

  protected $foo;
  public function __construct(Collaborator $collaborator, $foo) { // You need to tell Laravel what $foo is.
    $this->collaborator = $collaborator;
    $this->foo = $foo;
  }
}