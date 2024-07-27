document.getElementById('myForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent form submission

    const formData = new FormData(this);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'registion.php', true);

    xhr.onload = function () {
      if (xhr.status === 200) {
        alert('Form submitted successfully!');
      } else {
        alert('An error occurred while submitting the form.');
      }
    };

    xhr.send(formData);
  });