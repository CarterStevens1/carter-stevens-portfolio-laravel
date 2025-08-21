import './bootstrap';

const spotlightContainer = document.getElementById('spotlight-container');

function updateCursorPositionv2(e) {
  spotlightContainer.style.setProperty('--mouse-x', e.x + 'px');
  spotlightContainer.style.setProperty('--mouse-y', e.y + 'px');
}

// Add event listeners
document.addEventListener('mousemove', updateCursorPositionv2);


// Initialize position
spotlightContainer.style.setProperty('--mouse-x', '10%');
spotlightContainer.style.setProperty('--mouse-y', '10%');

