const form = document.getElementById('form');
form.addEventListener('submit', event => {
  // Prevent the form from submitting
  event.preventDefault();

  // Get all the checkboxes
  const checkboxes = document.querySelectorAll('input[name="article"]');

  // Loop through the checkboxes and show or hide the corresponding table rows
  checkboxes.forEach(checkbox => {
    const row = checkbox.parentElement.parentElement;
    if (checkbox.checked) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
});