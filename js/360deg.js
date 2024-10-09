document.addEventListener('DOMContentLoaded', function() {
  const rotationContainer = document.querySelector('.rotation');
  const images = rotationContainer.querySelectorAll('img');
  let currentImageIndex = 0;
  let isScrolling = false; // Flag to indicate scrolling

  // Initialize: hide all images except the first one
  function initialize() {
      images.forEach((img, index) => {
          img.style.display = index === 0 ? 'block' : 'none';
      });
  }

  // Function to update the displayed image based on scroll position
  function updateImageOnScroll() {
      if (isScrolling) return; // If already scrolling, exit

      isScrolling = true; // Set the scrolling flag
      window.requestAnimationFrame(() => {
          const scrollPercentage = window.scrollY / (document.documentElement.scrollHeight - window.innerHeight);
          const totalImages = images.length;
          const imageIndex = Math.min(Math.floor(scrollPercentage * totalImages), totalImages - 1);

          if (imageIndex !== currentImageIndex) {
              images[currentImageIndex].style.display = 'none'; // Hide the previous image
              images[imageIndex].style.display = 'block'; // Show the new image
              currentImageIndex = imageIndex; // Update the current index
          }

          isScrolling = false; // Reset the scrolling flag
      });
  }

  // Attach the scroll event listener
  window.addEventListener('scroll', updateImageOnScroll);
  initialize(); // Call initialize on page load
});
