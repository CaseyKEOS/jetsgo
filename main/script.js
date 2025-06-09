// Function to load the modal content
function loadModalContent() {
    // Fetch the modal content from another file
    fetch('test2.html')
      .then(response => response.text())
      .then(data => {
        // Inject the modal content into the modal container
        document.getElementById('modalContainer').innerHTML = data;
      })
      .catch(error => console.log('Error:', error));
  }
  
  // Load the modal content when the page is loaded
  window.addEventListener('DOMContentLoaded', loadModalContent);
  