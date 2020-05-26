
function Initialize(){
  var submitButton = document.getElementById('submit');
  submitButton.addEventListener("click", CheckForNull);


}

function ClearFields(){
  var inputFields = document.getElementsByClassName('form-control');

  for(var i = 0; i < inputFields.length; i++){
    inputFields[i].value = "";
  }

}

function CheckForNull(){
  var inputFields = document.getElementsByClassName('form-control');
  for(var i = 1; i < inputFields.length; i++){
    if(inputFields[i].value == ""){
      alert("Please input required fields (*).");
      break;
    }
  }

  //VAR I STARTS AT INDEX 1 BECAUSE DATE IS NOT YET CHECKED.

}
