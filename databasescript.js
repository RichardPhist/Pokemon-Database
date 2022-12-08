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
}

var currInd = 0;
var httpRequest;
var httpRequest_individual;
var httpRequestSave;
var pokemans; //array of the pokemon stats

function show(pokemans){ //prints info from database
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
  show(pokemans[currInd]);
}

function putIntoPage() {
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

function sortAlpha() {
  httpRequest = new XMLHttpRequest(); // create the object
  if (!httpRequest) { // check if the object was properly created
	// issues with the browser, example: old browser
    alert('Cannot create an XMLHTTP instance');
    return false;
  }
  httpRequest.onreadystatechange = getFromDB; // we assign a function to the property onreadystatechange (callback function)
	httpRequest.open('GET','sortAlpha.php');
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
        //console.log(pokemans);
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

function getFromDB_individual() {
  try {
    if (httpRequest_individual.readyState === XMLHttpRequest.DONE) {
      if (httpRequest_individual.status === 200) {
        //console.log("server status: "+httpRequest.status);
        //console.log("server response: "+httpRequest.responseText);
            var single_boi = JSON.parse(httpRequest_individual.responseText);
            //var single_boi_num = single_boi.Number - 1;
            //currInd = single_boi_num;
            show(single_boi);
      } else {
        alert('There was a problem with the request.');
      }
    }
  }
  catch( e ) { // Always deal with what can happen badly, client-server applications --> there is always something that can go wrong on one end of the connection
    document.getElementById("GET_error").innerHTML = "Pokedex number not found.";
  }
}

function getSinglePokemon(){
  httpRequest_individual = new XMLHttpRequest(); // create the object
    if (!httpRequest_individual) { // check if the object was properly created
	  // issues with the browser, example: old browser
      alert('Cannot create an XMLHTTP instance');
      return false;
    }
  //finds value from html page
  var DexNum = parseInt(document.getElementById("DexNum").value);
  if(DexNum < 0){
    document.getElementById("GET_error").innerHTML = "Pokedex number too small.";
  }
  else if(DexNum == 0){
    document.getElementById("GET_error").innerHTML = "Pokedex number too small.";
    DexNum = 1;
  }
  else if(DexNum > pokemans[pokemans.length-1].Number){
    document.getElementById("GET_error").innerHTML = "Pokedex number too big";
  }
  else{
    //puts DexNum into form
    fd = new FormData();
    fd.append("findme", DexNum);

    httpRequest_individual.onreadystatechange = getFromDB_individual; // we assign a function to the property onreadystatechange (callback function)
	  httpRequest_individual.open('POST','pokeStatsDB.php');
	  httpRequest_individual.send(fd);
    document.getElementById("GET_error").innerHTML = "";
  }
}

function saveData(){
  httpRequestSave = new XMLHttpRequest();
  let obj = new PocketMonsters();

  //get information from text boxes
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
  obj.Legendary = parseInt(document.getElementById("Legendary").value);
  if(document.getElementById("PokePicture").src){
    obj.Image = document.getElementById("PokePicture").src;
  }

  //create a form
  fd = new FormData();
  fd.append("save_num", obj.Number);
  fd.append("save_name", obj.Name);
  fd.append("save_type1", obj.Type1);
  fd.append("save_type2", obj.Type2);
  fd.append("save_tot", obj.Total);
  fd.append("save_hp", obj.HP);
  fd.append("save_atk", obj.Attack);
  fd.append("save_def", obj.Defense);
  fd.append("save_spatk", obj.SpAtk);
  fd.append("save_spdef", obj.SpDef);
  fd.append("save_spd", obj.Speed);
  fd.append("save_gen", obj.Generation);
  fd.append("save_leg", obj.Legendary);
  fd.append("save_img", obj.Image);
  
  if(!httpRequestSave){
    alert('Cannot create an XMLHTTP instance');
    return false;
  }
  
  //send the form
  httpRequestSave.open('POST', 'saveData.php');
  httpRequestSave.send(fd);
}

function insertPokemon(){
  httpRequest = new XMLHttpRequest();
  let obj = new PocketMonsters();

  //get information from text boxes
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
  obj.Legendary = parseInt(document.getElementById("Legendary").value);
  if(document.getElementById("PokePicture").src){
    obj.Image = document.getElementById("PokePicture").src;
  }

  //create a form
  fd = new FormData();
  fd.append("num", obj.Number);
  fd.append("name", obj.Name);
  fd.append("type1", obj.Type1);
  fd.append("type2", obj.Type2);
  fd.append("tot", obj.Total);
  fd.append("hp", obj.HP);
  fd.append("atk", obj.Attack);
  fd.append("def", obj.Defense);
  fd.append("spatk", obj.SpAtk);
  fd.append("spdef", obj.SpDef);
  fd.append("spd", obj.Speed);
  fd.append("gen", obj.Generation);
  fd.append("leg", obj.Legendary);
  fd.append("img", obj.Image);
  
  if(!httpRequest){
    alert('Cannot create an XMLHTTP instance');
    return false;
  }
  
  //send the form
  httpRequest.open('POST', 'insertPokemon.php');
  httpRequest.send(fd);
}

function edit(){
  document.querySelectorAll("input.stat-input").forEach(input => input.disabled = !input.disabled);
}

function deletePokemon(){
  httpRequest = new XMLHttpRequest();
  let obj = new PocketMonsters();

  //get information from text boxes
  obj.Number = document.getElementById("number").value;;

  //create a form
  fd = new FormData();
  fd.append("num", obj.Number);
  
  if(!httpRequest){
    alert('Cannot create an XMLHTTP instance');
    return false;
  }
  
  //send the form
  httpRequest.open('POST', 'deletePokemon.php');
  httpRequest.send(fd);
}

putIntoPage();