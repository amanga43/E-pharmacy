function enableEdit() {
  // Enable all input fields
  document.getElementById('name').disabled = false;
  document.getElementById('age').disabled = false;
  document.getElementById('email').disabled = false;
  document.getElementById('contact').disabled = false;

  // Enable save button and disable edit button
  document.getElementById('save-btn').disabled = false;
  document.getElementById('edit-btn').disabled = true;
}

function confirmDelete() {
  return confirm('Are you sure you want to delete your account?');
}
