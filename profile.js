document.addEventListener('DOMContentLoaded', function() {
  const updateBtn = document.getElementById('updateBtn');
  const saveBtn = document.getElementById('saveBtn');
  const deleteBtn = document.getElementById('deleteBtn');

  const inputs = document.querySelectorAll('input, textarea');

  // Enable editing when clicking 'Update Account'
  updateBtn.addEventListener('click', function() {
      inputs.forEach(input => {
          input.disabled = false;  // Enable all form fields for editing
      });
      saveBtn.disabled = false;  // Enable the Save button
      updateBtn.disabled = true; // Disable Update button while editing
  });

  // Save changes
  saveBtn.addEventListener('click', function() {
      inputs.forEach(input => {
          input.disabled = true;  // Disable fields after saving
      });
      saveBtn.disabled = true;  // Disable the Save button after saving
      updateBtn.disabled = false; // Enable Update button again
      alert('Profile updated successfully!');
  });

  // Delete account with confirmation
  deleteBtn.addEventListener('click', function() {
      const confirmation = confirm("Are you sure you want to delete your account?");
      if (confirmation) {
          alert('Account is deleted.');
          window.location.href = 'sign-up.html';  // Redirect to sign-up page
      }
  });
});
