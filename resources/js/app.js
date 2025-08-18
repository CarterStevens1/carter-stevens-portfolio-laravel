import './bootstrap';

const spotlightContainer = document.getElementById('spotlight-container');
let isMouseMoving = false;
let timeoutId;

function updateCursorPosition(e) {
  // Use viewport coordinates as percentages for better positioning
  const mouseX = (e.clientX / window.innerWidth) * 100;
  const mouseY = (e.clientY / window.innerHeight) * 100;

  spotlightContainer.style.setProperty('--mouse-x', mouseX + '%');
  spotlightContainer.style.setProperty('--mouse-y', mouseY + '%');

  if (!isMouseMoving) {
    isMouseMoving = true;
  }

  // Clear existing timeout
  clearTimeout(timeoutId);

  // Set timeout to hide effect when mouse stops moving
  timeoutId = setTimeout(() => {
    isMouseMoving = false;
  }, 100);
}

// Add event listeners
document.addEventListener('mousemove', updateCursorPosition);

// Handle mouse leave
document.addEventListener('mouseleave', () => {
  isMouseMoving = false;
});

// Initialize position
spotlightContainer.style.setProperty('--mouse-x', '10%');
spotlightContainer.style.setProperty('--mouse-y', '10%');

