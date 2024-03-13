<?php
// In this branch I wanted to write everything down of what I learned and heard for the school project. 

// les met Marcel Berkien 13/03/2024

class Trein{ 
    private $aantalWagons = 5; 
    private $soortTrein = "normaal";
    private $eersteKlasse = true; 
    private $aantalStoelen = 400; 
    private $ritPrijs = 10.0;

    public function __construct($soortTrein){
        $this->setSoort($soortTrein);
        // $this->aantalStoelen = $as;
    }

    public function getSoort(){ 
        return $this->soortTrein;
    }
    public function setSoort($soortTrein){ 
        $geldig = [ 
         "intercity",
         "sprinter"
        ];

        if(in_array($soortTrein, $geldig)) {
            $this->soortTrein = $soortTrein;
        } else { 
            echo "<h1> nope </h1>";
        }
    }
}

$nieuweTrein = new Trein("sprinter");
$nieuweTrein->setSoort("sprinter");

echo $nieuweTrein->getSoort();  





/////////////////////////////////////////////////////////////////
// class Persoon{ 
//     protected $name;
//     protected $age; 
// }

// class Docent extends Persoon{ 

// }
/////////////////////////////////////////////////////////////////
?>