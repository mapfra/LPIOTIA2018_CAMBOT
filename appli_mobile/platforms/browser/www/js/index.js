/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
var app = {
    // Application Constructor
    initialize: function() {
        document.addEventListener('deviceready', this.onDeviceReady.bind(this), false);
    },

    // deviceready Event Handler
    //
    // Bind any cordova events here. Common events are:
    // 'pause', 'resume', etc.
    onDeviceReady: function() {
        this.receivedEvent('deviceready');
    },

    // Update DOM on a Received Event
    receivedEvent: function(id) {
        var parentElement = document.getElementById(id);
        var listeningElement = parentElement.querySelector('.listening');
        var receivedElement = parentElement.querySelector('.received');

        listeningElement.setAttribute('style', 'display:none;');
        receivedElement.setAttribute('style', 'display:block;');

        console.log('Received Event: ' + id);
    }
};

app.initialize();



/***********************MODIFICATION******************************/


/*******************************FORMULAIRE*********************************/


function validateForm(e){ 

        var id = "cambot";
        var pass ="raspberry";
        var pseudo =  document.getElementById('pseudo').value;
        var mdp = document.getElementById('mdp').value;
        var reponse = document.getElementById('status');
       
        if(pseudo === id && mdp === pass){
            
        window.location.href ="../interface.html";
        
        }else if (pseudo != id && mdp != pass){
             reponse.innerHTML ="Id ou Mot de pass incoret"; 
             window.location.href ="#";   
        return false;}

        else if (pseudo == ""){
             window.location.href ="#";
             reponse.innerHTML ="pseudo vide";    
        return false;
        }
        else if (mdp == ""){
             window.location.href ="";
             reponse.innerHTML ="Mot de pass vide";    
        return false;
        }
        
        else{
            reponse.innerHTML="verifier les vos information";
        return false;
        }
        e.preventDefault();
}



function deconnexion(e) {
    location("../index.html"); 
  e.preventDefault();
  return false;
}

var time=1000000000000;
var tm=setInterval(function(){
    document.getElementById("img_cam1").src="http://10.0.4.124/html/cam_pic.php?time="+time+"&pDelay=40000";
    time+=100;
},100);



  document.getElementById("avancer").onclick = function(){

    $.post("http://api.cambot.ml/api/index.php",{cmd:"forward"},function(data){
        alert(data);
    });
}; 


  document.getElementById("gauche").onclick = function(){

    $.post("http://api.cambot.ml/api/index.php",{cmd:"left"},function(data){
        alert(data);
    });
}; 



  document.getElementById("droite").onclick = function(){

    $.post("http://api.cambot.ml/api/index.php",{cmd:"right"},function(data){
        alert(data);
    });
}; 

  document.getElementById("reculer").onclick = function(){

    $.post("http://api.cambot.ml/api/index.php",{cmd:"reculer"},function(data){
        alert(data);
    });
}; 

 