<?

class Foo {
  private function instanceDo() { return 'Foo::instanceDo'; }

  function getClosure() {
    return function () {
      var_dump($this->instanceDo());
    };
  }
}

class Bar {
  private function instanceDo() { return 'Bar::instanceDo'; }
}


<<__EntryPoint>>
function main_bind_private() {
$foo = new Foo;
$bar = new Bar;

$Cl = $foo->getClosure();
$s2 = $Cl->bindTo($bar, 'Foo');
$s2();
}
