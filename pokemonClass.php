<?php

class Pokemon implements JsonSerializable {
	public $Number;
	public $Name;
    public $Type1;
    public $Type2;
    public $Total;
    public $HP;
    public $Attack;
    public $Defense;
    public $SpAtk;
    public $SpDef;
    public $Speed;
    public $Generation;
    public $Legendary;

    public function __construct() { // the constructor has an input
        
        $this->Number = (rand(1,5000));
        $this->Name = (generateRandomString());
        $this->Type1 = (generateRandomString());
        $this->Type2 = (generateRandomString());
        $this->Total = (rand(200,1000));
        $this->HP = (rand(1,225));
        $this->Attack = (rand(1,225));
        $this->Defense = (rand(1,225));
        $this->SpAtk = (rand(1,225));
        $this->SpDef = (rand(1,225));
        $this->Speed = (rand(1,225));
        $this->Generation = (rand(1,50));
        $this->Legendary = (generateRandomString());
       }

       public function jsonSerialize() {
        return [
            'Number' => $this->Number,
            'Name' => $this->Name,
            'Type1' => $this->Type1,
            'Type2' => $this->Type2,
            'Total' => $this->Total,
            'HP' => $this->HP,
            'Attack' => $this->Attack,
            'Defense' => $this->Defense,
            'SpAtk' => $this->SpAtk,
            'SpDef' => $this->SpDef,
            'Speed' => $this->Speed,
            'Generation' => $this->Generation,
            'Legendary' => $this->Legendary,
            ];
    }

    public function Set($json)
	{
		$this->Number=$json['Number'];
		$this->Name=$json['Name'];
		$this->Type1=$json['Type1'];
		$this->Type2=$json['Type2'];
		$this->Total=$json['Total'];
		$this->HP=$json['HP'];
		$this->Attack=$json['Attack'];
        $this->Defense=$json['Defense'];
        $this->SpAtk=$json['last_name'];
        $this->SpDef=$json['last_name'];
        $this->Speed=$json['last_name'];
        $this->Generation=$json['last_name'];
        $this->Lgendary=$json['last_name'];
	}

    public function Display() {
		$v=json_encode($this);
		echo $v;
	}
	
	public function GetString() {
		return json_encode($this);
	}
}

function generateRandomString($length = 10) {
	// list of characters that can be present in the string
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>