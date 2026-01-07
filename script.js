function validateForm() {
  let nom = document.getElementById("nom").value.trim();
  let tel = document.getElementById("telephone").value.trim();
  let date = document.querySelector('input[name="date"]').value;
  let heure = document.querySelector('input[name="heure"]').value;
 
  if (nom === "" || tel === "" || date === "" || heure === "") {
    showErrorAlert("Veuillez remplir tous les champs obligatoires.");
    return false;
  }

  if (isNaN(tel)) {
  showErrorAlert("Le numéro de téléphone doit contenir uniquement des chiffres.");
  return false;
}

  
  return true;
}


window.onload = function() {
  const params = new URLSearchParams(window.location.search);
  if (params.get("success") === "1") {
    showSuccessAlert();
  }
}

function showSuccessAlert() {
  const confirmationDiv = document.getElementById('confirmation');
  if (confirmationDiv) {
    confirmationDiv.innerHTML = `
      Réservation envoyée avec succès ! Nous vous contacterons par téléphone pour confirmer. Merci!
      <span id="close-alert" style="float: right; cursor: pointer; font-weight: bold;"> &times;</span>
    `;
    confirmationDiv.style.display = 'block';

    document.getElementById('close-alert').addEventListener('click', function() {
      confirmationDiv.style.display = 'none';
    });

    setTimeout(() => {
      confirmationDiv.style.display = 'none';
    }, 5000);

    history.replaceState(null, null, window.location.pathname);
  }
}

function showErrorAlert(message) {
  const confirmationDiv = document.getElementById('confirmation');
  if (confirmationDiv) {
    confirmationDiv.innerHTML = `
      Erreur : ${message}
      <span id="close-error-alert" style="float: right; cursor: pointer; font-weight: bold;"> &times;</span>
    `;
    confirmationDiv.style.display = 'block';
    confirmationDiv.classList.add('error');  

    document.getElementById('close-error-alert').addEventListener('click', function() {
      confirmationDiv.style.display = 'none';
      confirmationDiv.classList.remove('error');
    });

    setTimeout(() => {
      confirmationDiv.style.display = 'none';
      confirmationDiv.classList.remove('error');
    }, 5000);
  }
}


      