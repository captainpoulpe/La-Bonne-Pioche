
document.querySelector("#imgPlus").onclick=ajoutImage;

var $inputImage;
var inputImage;
var imageUpload;
var btnSupprimer;
var imgPreview;
var enterTarget = null;

window.onload = function()
{
  imagePreview = document.getElementById('imgPreview');
  imagePreview.style.visibility ='hidden';
  $inputImage = $('#inputImage');
  inputImage = document.getElementById('inputImage');
  imageUpload = document.getElementById('imageUpload');
  btnSupprimer = document.getElementById("btnSupprimer");
  btnSupprimer.onclick = supprimerImage;
  btnSupprimer.style.visibility = 'hidden';
}

function ajoutImage()
{
  $inputImage.trigger('click');
}

document.getElementById('imageUpload').addEventListener('dragenter', function(event) {
  enterTarget = event.target;
  event.stopPropagation();
  event.preventDefault();

  imageUpload.style.borderStyle = 'dashed';
});

document.getElementById('imageUpload').addEventListener('dragleave', function(event) {
  if (enterTarget == event.target){
      event.stopPropagation();
      event.preventDefault();
      imageUpload.style.borderStyle = 'solid';
  }
});


document.getElementById('imageUpload').addEventListener('dragover', function(e) {
    e.preventDefault(); // Annule l'interdiction de drop
});

document.addEventListener('dragend', function() {
    //console.log("Un Drag & Drop vient de se terminer mais l'événement dragend ne sait pas si c'est un succès ou non.");
});


document.getElementById("imageUpload").addEventListener('drop', function(e) {
    e.preventDefault(); // Cette méthode est toujours nécessaire pour éviter une éventuelle redirection inattendue

    inputImage.files = e.dataTransfer.files;

    readURL(inputImage);
    // Il est nécessaire d'ajouter cela car sinon le style appliqué par l'événement « dragenter » restera en place même après un drop :
    imageUpload.style.borderStyle = 'solid';
});



function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      imagePreview.src =e.target.result;
      imagePreview.style.visibility ='visible';
      //imageUpload.style.backgroundImage = "url('"+e.target.result+"')";
      $('#imgPlus').fadeOut();
      document.getElementById("imageUpload").addEventListener('mouseout',onMouseOut,true);
      document.getElementById("imageUpload").addEventListener('mouseover',onMouseOver,true);
      btnSupprimer.style.visibility = "visible";
    }

    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

function supprimerImage()
{
  console.log("test");
  inputImage.value = '';
  imagePreview.style.visibility ='hidden';
  imagePreview.removeAttribute('src');
  imageUpload.removeEventListener('mouseout',onMouseOut,true);
  imageUpload.removeEventListener('mouseover',onMouseOver,true);
  $('#imgPlus').fadeIn(100);
  btnSupprimer.style.visibility = "hidden";
}

function onMouseOut(event)
{

  var e = event.toElement || event.relatedTarget;
    if (e.parentNode == this || e == this) {
        return;
    }
    // handle mouse event here!
  imagePreview.style.filter = "none";
  $('#imgPlus').fadeOut(100);

}

function onMouseOver(event)
{

  imagePreview.style.filter = "grayscale(80%)";
  $('#imgPlus').fadeIn(100);

}

$("#inputImage").change(function() {
  readURL(this);
});
