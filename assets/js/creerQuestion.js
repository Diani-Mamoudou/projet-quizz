var question = document.getElementById("question");
var idSmall = document.getElementById("erreurCreation");
var libelle  = document.getElementById("libelleQuestion");
var textarea=document.getElementsByTagName("textarea");
var nbrPoint = document.getElementById("nbrPoint");
var typeReponse = document.getElementById("typeReponse");
var champReponse = document.getElementById("champReponse");
var ajoutReponse = document.getElementById("icAjoutReponse");

var id=0;

function creerReponse(id,type){
    champReponse.innerHTML +=`<label for="" class="col-sm-2 text-secondary font-weight-bold col-form-label" style="font-size:0.9em;"> Réponse${id} </label>
    <div class="col-sm-7">
        <input type="text" name="reponse${id}" id="reponse${id}" class="form-control rounded-0" style="box-shadow: 1px 1px #51bfd0; background-color:#f5f5f5;" placeholder="" aria-describedby="helpId">
        <?php
        if (isset($erreurs['reponse${id}'])) {
        ?>
            <small id="helpId" class="text-danger"><?= $erreurs['reponse${id}'] ?> </small>
        <?php
        }
        ?>
    </div>
    <div class="col-sm-1 m-auto ">
        <div class="radio mt-2" > 
            <label ><input type="${type}" id="optRadio${id}" style="width:20px; height:20px;" value="2" name="optRadio" ></label>
        </div>
    </div>
    <div class="col-sm-1 mt-1">
        <img src="<?=WEBROOT?>/assets/image/ic-supprimer.png">
</div>`;
}


function creerReponseText(){
    champReponse.innerHTML +=`<label for="" class="col-sm-2 text-secondary font-weight-bold col-form-label" style="font-size:0.9em;"> Réponse${id} </label>
    <div class="col-sm-7">
        <input type="text" name="reponse${id}" id="reponse${id}" class="form-control rounded-0" style="box-shadow: 1px 1px #51bfd0; background-color:#f5f5f5;" placeholder="" aria-describedby="helpId">
    </div>`;
}

function reset(){
    champReponse.innerHTML="";
    champReponse.innerText="";
    ajoutReponse.style.display="block";
    id=0;
}

function nbrChampReponse(){
    if (id>=4){
        ajoutReponse.style.display="none";
    }
}
function validate() {
    var saisie1 = document.getElementById(`reponse1`).value;
    document.getElementById(`reponseCheck1`).value = saisie1;

    var saisie2 = document.getElementById(`reponse2`).value;
    document.getElementById(`reponseCheck2`).value = saisie2;

    var saisie3 = document.getElementById(`reponse3`).value;
    document.getElementById(`reponseCheck3`).value = saisie3;

    var saisie4 = document.getElementById(`reponse3`).value;
    document.getElementById(`reponseCheck3`).value = saisie4;
    console.log("yess");
    // Error, Champs vides
    const inputs = document.getElementsByTagName("input");
    question.addEventListener("submit", function(event) {
        let valid = true;
        var typeValue = typeReponse.options[typeReponse.selectedIndex].value;

        console.log(inputs);

        if (inputs.length <= 0) {
            valid = false;
            idSmall.innerText = "Veuillez créer des champs !!!";
        } else {
            if (typeValue === "radio" || typeValue === "checkbox") {
                if (inputs.length <= 2) {
                    valid = false;
                    idSmall.innerText = "Veuillez créer 3 champs !!!";
                } else {
                    idSmall.innerText = "";
                }
            }
        }br

        if (!textarea[0].value.trim()) {
            valid = false;
            textarea[0].nextElementSibling.innerText = "Champ Obligatoire";
            textarea[0].style.boxShadow = "1px 1px red";
        }
        let count = 0;
        for (let input of inputs) {
            if (input.type === "radio" || input.type === "checkbox") {
                if (input.checked === false) {
                    count += 0;
                } else {
                    count += 1;
                }
            }
            if (!input.value.trim()) {
                valid = false;
                input.nextElementSibling.innerText = "Champ Obligatoire";
                input.style.boxShadow = "1px 1px red";
            }
            input.addEventListener("keydown", function() {
                input.nextElementSibling.innerText = "";
                input.style.boxShadow = "1px 1px #48d1cc";
            });
        }
        if (count <= 0) {
            valid = false;
            errorInputCreate.innerText = "Veuillez checker au moins une réponse";
        }
        if (valid == false) {
            event.preventDefault();
            return false;
        }
    });
    textarea[0].addEventListener("keydown", function() {
        textarea[0].nextElementSibling.innerText = "";
        textarea[0].style.boxShadow = "1px 1px #48d1cc";
    });
}




function increment(){
    id=id+1
}

function decrement(){
    id=id-1
}

function reponse(){
    ajoutReponse.addEventListener("click",function(evenement){
        increment();
        nbrChampReponse();
        var valeur=typeReponse.options[typeReponse.selectedIndex].value;
        switch(valeur){
            case "radio":
                creerReponse(id,"radio");
                break;
            case "checkbox":
                creerReponse(id,"checkbox");
                break;
            case "text":
                creerReponseText();
                ajoutReponse.style.display="none";
                break;
        }
    });
}

typeReponse.addEventListener("change", function(d) {
    reset();
});
ajoutReponse.addEventListener("click",reponse());
