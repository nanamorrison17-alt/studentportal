function addNewStudentAjax(){

    let formData = new FormData();

    formData.append("firstname", document.getElementById("firstname").value);
    formData.append("middlename", document.getElementById("middlename").value);
    formData.append("lastname", document.getElementById("lastname").value);
    formData.append("email", document.getElementById("email").value);
    formData.append("date_of_birth", document.getElementById("date_of_birth").value);
    formData.append("phone", document.getElementById("phone").value);
    formData.append("address", document.getElementById("address").value);
    formData.append("state_of_origin", document.getElementById("state_of_origin").value);
    formData.append("local_govt", document.getElementById("local_govt").value);
    formData.append("next_of_kin", document.getElementById("next_of_kin").value);
    formData.append("jamb_score", document.getElementById("jamb_score").value);

    let image = document.getElementById("image");

        if(image.files.length > 0){
            formData.append("image", image.files[0]);
        }

    let gender = document.querySelector('input[name="gender"]:checked');

        if(gender){
            formData.append("gender", gender.value);
        }

    // Clear old errors
    document.getElementById("firstname_error").innerHTML = "";
    document.getElementById("lastname_error").innerHTML = "";
    document.getElementById("email_error").innerHTML = "";
    document.getElementById("date_of_birth_error").innerHTML = "";
    document.getElementById("gender_error").innerHTML = "";
    document.getElementById("phone_error").innerHTML = "";
    document.getElementById("state_of_origin_error").innerHTML = "";
    document.getElementById("local_govt_error").innerHTML = "";
    document.getElementById("next_of_kin_error").innerHTML = "";
    document.getElementById("jamb_score_error").innerHTML = "";

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            
            let result = JSON.parse(this.responseText);
            if(result.success === true){

                document.getElementById("studentForm").reset();

                let resultBox = document.getElementById("resultMessage");
                resultBox.style.display = "block";
                resultBox.innerHTML = '<strong>Success!</strong> ' + result.insert;
                setTimeout(function(){
                    window.location.href = "form.php";
                },5000);
                

            }else if(result.errors){

                document.getElementById("firstname_error").innerHTML = result.errors.firstname || "";
                document.getElementById("lastname_error").innerHTML = result.errors.lastname || "";
                document.getElementById("email_error").innerHTML = result.errors.email || "";
                document.getElementById("date_of_birth_error").innerHTML = result.errors.date_of_birth || "";
                document.getElementById("gender_error").innerHTML = result.errors.gender || "";
                document.getElementById("phone_error").innerHTML = result.errors.phone || "";
                document.getElementById("state_of_origin_error").innerHTML = result.errors.state_of_origin || "";
                document.getElementById("local_govt_error").innerHTML = result.errors.local_govt || "";
                document.getElementById("next_of_kin_error").innerHTML = result.errors.next_of_kin || "";
                document.getElementById("jamb_score_error").innerHTML = result.errors.jamb_score || "";
            }
       }
    }

    xmlhttp.open("POST","config/addStudent.php",true);
    xmlhttp.send(formData);

}

function searchStudent(){

    var search = document.getElementById("searchInput").value;
    var admission_status = document.getElementById("admission_status").value;
    var gender = document.getElementById("gender").value;
    var jamb_score = document.getElementById("jamb_score").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("studentTableBody").innerHTML = this.responseText;
        }
    };
 
    xmlhttp.open("POST","config/searchStudent.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("search=" + search + 
                "&admission_status=" + admission_status + 
                "&gender=" + gender +
                "&jamb_score=" + jamb_score);
}

function resetFilters(){

    document.getElementById("searchInput").value = "";
    document.getElementById("admission_status").value = "";
    document.getElementById("gender").value = "";
    document.getElementById("jamb_score").value = "";

    searchStudent();
}

let statesData = [];
window.addEventListener("DOMContentLoaded", function(){
    const stateSelect = document.getElementById("state_of_origin");
    const localSelect = document.getElementById("local_govt");

    if(!stateSelect || !localSelect){
        return;
    }

    fetch("data/states-localgovts.json")
    .then(response => response.json())
    .then(data => {

        statesData = data.states;

        statesData.forEach(function(item){

            let option = document.createElement("option");
            option.value = item.state;
            option.textContent = item.state;
            stateSelect.appendChild(option);

        });

        stateSelect.addEventListener("change", function(){

            localSelect.innerHTML = '<option value="">Select Local Government</option>';

            let stateRecord = statesData.find(
                state => state.state === this.value
            );

            if(stateRecord){
                stateRecord.local.forEach(function(local){
                    let option = document.createElement("option");
                    option.value = local;
                    option.textContent = local;
                    localSelect.appendChild(option);

                });

            }

        });

    });

});