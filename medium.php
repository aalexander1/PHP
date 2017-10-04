<?php

// php namespacing
// lookup correct syntax for variable names, function names
class Card {
    private $_suit;
	private $_face;
	private $_value;
    public function __construct($suit, $face, $value){
        $this->_suit = $suit;
        $this->_face = $face;
        $this->_value = $value;
    }

    public function GetCardName(){
        return $this->_face . ' of ' . $this->_suit ;
    }

    public function GetCardValue(){
        return $this->_value;
    }
}

class Deck {
    private $_Deck;
    public function __constructor(){
        $_Deck = [];
    }
    public function AddCard($Card){
        $this->_Deck[] = $Card;
    }

    public function RenderHtml(){
        echo "<ul>";
        foreach($this->_Deck as $Card){
            echo "<li>{$Card->GetCardName()}</li>";
        }
        echo "</ul>";
    }
}

// Builder Pattern
class DeckBuilder {
    private static $_suits = [
        "clubs",
        "diamonds",
        "hearts",
        "spades"
    ];

    private static $_faces = [
	    "Ace" => 1,
        "2" => 2,
        "3" => 3,
        "4" => 4,
        "5" => 5,
        "6" => 6,
        "7" => 7,
	    "8" => 8,
        "9" => 9,
        "10" => 10,
        "Jack" => 11,
        "Queen" => 12,
        "King" => 13
    ];

    public static function buildDeck(){
        $Deck = new Deck();
        foreach (static::$_faces as $face => $value) {
            foreach (static::$_suits as $suit) {
                
                $Card = new Card($suit, $face, $value);
                $Deck->AddCard($Card);
            }    
        }
        return $Deck;
    }
}
	

$Deck = DeckBuilder::buildDeck();



$Deck->RenderHtml();
shuffle($Deck);

  
?>