function select_gender(){

    var gender_male = document.getElementById("gender_male");
    var gender_female = document.getElementById("gender_female");

    if(gender_male.checked){
        gender_female.disabled = 'true'
    }

    if(gender_female.checked){
        gender_male.disabled = 'true'
    }


}

// var field_of_interest_select = document.getElementsByClassName("field_of_interest_select");
// console.log(field_of_interest_select.length);

function select_interest() {
    var interest_none = document.getElementById("interest_none");
    var field_of_interest_select = document.getElementsByClassName("field_of_interest_select");
    var interest_count = field_of_interest_select.length;

    console.log("the interest select runs");

    for (let i = 0; i <= interest_count; i++) {
        field_of_interest_select[i].disabled = 'true';
        
    }

}

function select_weapons() {
    var weapons_none = document.getElementById("weapons_none");
    var weapons_select = document.getElementsByClassName("weapons_select");
    var weapons_count = weapons_select.length;

    console.log("the weapons select runs");

    for (let i = 0; i <= weapons_count; i++) {
        weapons_select[i].disabled = 'true';
        
    }

}