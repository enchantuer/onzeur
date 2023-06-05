document.addEventListener('DOMContentLoaded', function() {
  const emailInput = document.getElementById('email');
  const firstNameInput = document.getElementById('first-name');
  const lastNameInput = document.getElementById('last-name');
  const dateOfBirthInput = document.getElementById('birthdate');
  const passwordInput = document.getElementById('password');
  const editBtn = document.getElementById('edit');
  const saveBtn = document.getElementById('save');

  // Activer la modification des champs lors du clic sur le bouton "Edit"
  editBtn.addEventListener('click', function() {
    emailInput.removeAttribute('readonly');
    firstNameInput.removeAttribute('readonly');
    lastNameInput.removeAttribute('readonly');
    dateOfBirthInput.removeAttribute('readonly');
    passwordInput.removeAttribute('readonly');
  });

  // Sauvegarder les modifications lors du clic sur le bouton "Save"
  saveBtn.addEventListener('click', function() {
    emailInput.setAttribute('readonly', true);
    firstNameInput.setAttribute('readonly', true);
    lastNameInput.setAttribute('readonly', true);
    dateOfBirthInput.setAttribute('readonly', true);
    passwordInput.setAttribute('readonly', true);
  });
});
