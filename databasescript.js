class PocketMonsters{
    constructor(Number, Name, Type1, Type2, Total, HP, Attack, Defense, SpAtk, SpDef, Speed, Generation, Legendary, Image){
        this.Number = Number;
        this.Name = Name;
        this.Type1 = Type1;
        this.Type2 = Type2;
        this.Total = Total;
        this.HP = HP;
        this.Attack = Attack;
        this.Defense = Defense;
        this.SpAtk = SpAtk;
        this.SpDef = SpDef;
        this.Speed = Speed;
        this.Generation = Generation;
        this.Legendary = Legendary;    
        this.Image = Image;
    }

    findType(inp1, inp2){
        let typeList = new pokemansay();

        for(let mon of this.smolData){
            if((mon.Type1 == inp1) && (mon.Type2 == inp2)){
                console.log(mon);
                typeList.push(mon);
            }
        }
        return new PocketMonsters(typeList);
    }

    getLegendary(input){
        let legendList = new pokemansay();

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
var httpRequestSave;
var pokemans; //array of the pokemon stats

function show(pokemans){ //prints info from database BROKE
      console.log("Showing: " + currInd);
      document.getElementById("number").value = pokemans.Number;
      document.getElementById("pokeName").value = pokemans.Name;
      document.getElementById("type1").value = pokemans.Type1;
      document.getElementById("type2").value = pokemans.Type2;
      document.getElementById("total").value = pokemans.Total;
      document.getElementById("HP").value = pokemans.HP;
      document.getElementById("ATK").value = pokemans.Attack;
      document.getElementById("DEF").value = pokemans.Defense;
      document.getElementById("SPATK").value = pokemans.SpAtk;
      document.getElementById("SPDEF").value = pokemans.SpDef;
      document.getElementById("SPD").value = pokemans.Speed;
      document.getElementById("GEN").value = pokemans.Generation;
      document.getElementById("Legendary").value = pokemans.Legendary;
      document.getElementById("PokePicture").src = pokemans.Image;
}

function toBeg(){
  currInd = 0;
  show(pokemans[currInd]);
}

function toEnd(){
  currInd = pokemans.length-1;
  show(pokemans[currInd]);
}

function prev(){
  if(currInd <= 0){
    currInd = pokemans.length-1;
  }else{
    currInd -= 1;
  }
  show(pokemans[currInd]);
}

function next(){
  if(currInd >= pokemans.length-1){
    currInd = 0;
  }else{
    currInd += 1;
  }
  console.log(currInd);
  show(pokemans[currInd]);
}


function putIntoPage() {
  console.log("in putIntoPage");
  httpRequest = new XMLHttpRequest(); // create the object
  if (!httpRequest) { // check if the object was properly created
	// issues with the browser, example: old browser
    alert('Cannot create an XMLHTTP instance');
    return false;
  }
  httpRequest.onreadystatechange = getFromDB; // we assign a function to the property onreadystatechange (callback function)
	httpRequest.open('GET','getDataMySql.php');
  httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	httpRequest.send(); // GET = send with no parameter !
}

function getFromDB() {
  try {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        //console.log("server status: "+httpRequest.status);
        //console.log("server response: "+httpRequest.responseText);
            pokemans = JSON.parse(httpRequest.responseText);
            console.log(pokemans);
            show(pokemans[currInd]);
      } else {
        alert('There was a problem with the request.');
      }
    }
  }
  catch( e ) { // Always deal with what can happen badly, client-server applications --> there is always something that can go wrong on one end of the connection
    alert('Caught Exception: ' + e.description);
  }
}

function getSinglePokemon(){
  httpRequest = new XMLHttpRequest(); // create the object
    if (!httpRequest) { // check if the object was properly created
	  // issues with the browser, example: old browser
      alert('Cannot create an XMLHTTP instance');
      return false;
    }
  var DexNum = document.getElementById()
  httpRequest.onreadystatechange = getJSON; // we assign a function to the property onreadystatechange (callback function)
	httpRequest.open('POST','pokeStatsDB.php');
	httpRequest.send('index'); // GET = send with no parameter !
}

function saveData(){
  console.log("Trying to save data");
  httpRequestSave = new XMLHttpRequest();
  let obj = new PocketMonsters();

  obj.Number = document.getElementById("number").value;
  obj.Name = document.getElementById("pokeName").value;
  obj.Type1 = document.getElementById("type1").value;
  obj.Type2 = document.getElementById("type2").value;
  obj.Total = document.getElementById("total").value;
  obj.HP = document.getElementById("HP").value;
  obj.Attack = document.getElementById("ATK").value;
  obj.Defense = document.getElementById("DEF").value;
  obj.SpAtk = document.getElementById("SPATK").value;
  obj.SpDef = document.getElementById("SPDEF").value;
  obj.Speed = document.getElementById("SPD").value;
  obj.Generation = document.getElementById("GEN").value;
  obj.Legendary = document.getElementById("Legendary").value;
  obj.Image = document.getElementById("PokePicture").src;

  fd = new FormData();
  fd.append('Number', obj.Number);
  fd.append('Name', obj.Name);
  fd.append('Type1', obj.Type1);
  fd.append('Type2', obj.Type2);
  fd.append('Total', obj.Total);
  fd.append('HP', obj.HP);
  fd.append('Attack', obj.Attack);
  fd.append('Defense', obj.Defense);
  fd.append('SpAtk', obj.SpAtk);
  fd.append('SpDef', obj.SpDef);
  fd.append('Speed', obj.Speed);
  fd.append('Generation', obj.Generation);
  fd.append('Legendary', obj.Legendary);
  fd.append('Image', obj.Image);
  
  if(!httpRequestSave){
    alert('Cannot create an XMLHTTP instance');
    return false;
  }
  
  httpRequestSave.open('POST', 'saveData.php');
  httpRequestSave.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  httpRequestSave.send(fd);
}

console.log("IS THIS WORKING????");
putIntoPage();