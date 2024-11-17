document.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-toggle')) {
      var btn = event.target;
      var content = btn.parentElement.querySelector('.more-content');
      var dots = btn.parentElement.querySelector('.dots');

      if (content.style.display === "none" || content.style.display === "") {
        content.style.display = "inline";
        btn.textContent = "Read less"; 
        dots.style.display = "none";
      } else {
        content.style.display = "none";
        btn.textContent = "Read more"; 
        dots.style.display = "inline";
      }
    }
  });