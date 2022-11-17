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
        
        $this->Number = "";
        $this->Name = "";
        $this->Type1 = "";
        $this->Type2 = "";
        $this->Total = 0;
        $this->HP = 0;
        $this->Attack = 0;
        $this->Defense = 0;
        $this->SpAtk = 0;
        $this->SpDef = 0;
        $this->Speed = 0;
        $this->Generation = 0;
        $this->Legendary = false;
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
        $this->SpAtk=$json['SpAtk'];
        $this->SpDef=$json['SpDef'];
        $this->Speed=$json['Speed'];
        $this->Generation=$json['Generation'];
        $this->Lgendary=$json['Legendary'];
	}

    public function Display() {
		$v=json_encode($this);
		echo $v;
	}
	
	public function GetString() {
		return json_encode($this);
	}
}
?>