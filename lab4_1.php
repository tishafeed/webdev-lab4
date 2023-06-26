<?php
    $tsp = "abs";
    $str = "tract";
    $w = 25;
    echo $tsp . "\n";
    echo $str . "\n";
    echo $tsp . $str . "\n";
    $abstract = 50;
    echo $w += ${$tsp . $str};
    echo "<br>";
    $poem = "Yo, ho, haul together, Hoist the colours high. Heave ho, Thieves and beggars, Never shall we die.";
    $array_poem = explode(" ", $poem);
    foreach ($array_poem as $item) {
        echo $item . "|";
    }
    unset($item);
    echo "<br>";
    $new_poem = implode("|", $array_poem);
    echo $new_poem;
    echo "<br>";
    if ($new_poem == $poem) {
        echo "ay it works!";
    }
    else {
        echo "err, what is that";
    }
    $weirdarray = array(
        25 => 78,
        30 => 77,
        78 => "err",
        12 => "ke",
        77 => 12
    );
    echo "<br><br>";
    echo $weirdarray[$weirdarray[$w-$abstract]] . $weirdarray[$weirdarray[$weirdarray[$w-$abstract] - 1]]; // errke???

    class Person{
        protected $name;
        function __construct($value) {
            $this->name = $value;
        }
        function set_name($value) {
            $this->name = $value;
        }
        function get_name() {
            return $this->name;
        }
    }
    class Businessman extends Person {
        protected $wealth;
        function __construct($name, $wealth) {
            parent::__construct($name);
            $this->wealth = $wealth;
        }
        function brag() {
            echo "My name is $this->name and I have $this->wealth dollars in my bank account!";
        }
    }
    $richard = new Businessman("Richard", "15000");
    echo "<br>";
    $richard->brag();

    class Singleton
    {
        private static $instances = [];
        public $element = 5;
        protected function __construct() { }
        protected function __clone() { }
        public function __wakeup()
        {
            throw new Exception("Cannot do that with a singleton.");
        }
        public static function getInstance()
        {
            $cls = static::class;
            if (!isset(self::$instances[$cls])) {
                self::$instances[$cls] = new static();
            }
            return self::$instances[$cls];
        }
    };
    Singleton::getInstance();
    echo "<br><br>" . Singleton::getInstance()->element;
?>





