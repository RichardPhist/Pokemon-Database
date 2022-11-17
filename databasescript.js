class PocketMonsters{
    constructor(Number, Name, Type1, Type2, Total, HP, Attack, Defense, SpAtk, SpDef, Spped, Generation, Legendary){
        this.Number = number;
        this.Name = pokeName;
        this.Type1 = type1;
        this.Typ2 = type2;
        this.Total = total;
        this.HP;
        this.Attack;
        this.Defense;
        this.SpAtk;
        this.SpDef;
        this.Speed;
        this.Generation;
        this.Legendary;    
    }

    findType(inp1, inp2){
        let typeList = new Array();

        for(let mon of this.smolData){
            if((mon.Type1 == inp1) && (mon.Type2 == inp2)){
                console.log(mon);
                typeList.push(mon);
            }
        }
        return new PocketMonsters(typeList);
    }

    getLegendary(input){
        let legendList = new Array();

        for(let mon of this.smolData){
            if(mon.Legendary == input){
                console.log(mon);
                legendList.push(mon);
            }
        }
        return new PocketMonsters(legendList);
    }
}

var currInd = 0;
var httpRequest;
var pokemans; //array of the pokemon stats

function show(arr){ //function to print the array in the text boxes
      console.log("Showing: "+currInd);
      document.getElementById("number").value = arr[currInd].Number;
      document.getElementById("pokeName").value = arr[currInd].Name;
      document.getElementById("type1").value = arr[currInd].Type1;
      document.getElementById("type2").value = arr[currInd].Type2;
      document.getElementById("total").value = arr[currInd].Total;
      document.getElementById("HP").value = arr[currInd].HP;
      document.getElementById("ATK").value = arr[currInd].Attack;
      document.getElementById("DEF").value = arr[currInd].Defense;
      document.getElementById("SPATK").value = arr[currInd].SpAtk;
      document.getElementById("SPDEF").value = arr[currInd].SpDef;
      document.getElementById("SPD").value = arr[currInd].Speed;
      document.getElementById("GEN").value = arr[currInd].Generation;
      document.getElementById("Legendary").value = arr[currInd].Legendary;
}

function toBeg(){
  currInd = 0;
  loadData(pokemans[currInd]);
}

function toEnd(){
  currInd = pokemans.length-1;
  loadData(pokemans[currInd]);
}

function prev(){
  if(currInd <= 0){
    currInd = pokemans.length-1;
  }else{
    currInd -= 1;
  }
  loadData(pokemans[currInd]);
}

function next(){
  if(currInd >= pokemans.length-1){
    currInd = 0;
  }else{
    currInd += 1;
  }
  console.log(currInd);
  loadData(pokemans[currInd]);
}

function loadData() {
    httpRequest = new XMLHttpRequest(); // create the object
    if (!httpRequest) { // check if the object was properly created
	  // issues with the browser, example: old browser
      alert('Cannot create an XMLHTTP instance');
      return false;
    }
    httpRequest.onreadystatechange = getJSON; // we assign a function to the property onreadystatechange (callback function)
	httpRequest.open('GET','pokeStats.php');
	httpRequest.send(); // GET = send with no parameter !
}

 function getJSON() {
   try {
     if (httpRequest.readyState === XMLHttpRequest.DONE) {
       if (httpRequest.status === 200) {      
             let str = httpRequest.responseText;
             pokemans = JSON.parse(str);
             show(pokemans);
       } else {
         alert('There was a problem with the request.');
       }
     }
   }
   catch( e ) { // Always deal with what can happen badly, client-server applications --> there is always something that can go wrong on one end of the connection
     alert('Caught Exception: ' + e.description);
   }
}