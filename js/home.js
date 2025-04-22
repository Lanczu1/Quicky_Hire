window.addEventListener("load", function() {
  const loader = document.getElementById("loading-screen");
  loader.classList.add("hidden");
  setTimeout(() => loader.style.display = "none", 500);
});

// FilterSidebar    // NEW CODE
const filterSidebar = document.getElementById('filterSidebar');
  filterSidebar.addEventListener('click', () => {
    const isVisible = filterSidebar.style.display === 'block';
    filterSidebar.style.display = isVisible ? 'none' : 'block';
});



// SHOW A CARD
document.addEventListener('DOMContentLoaded', function () {
  const cards = document.querySelectorAll('.job-card-wrapper');
  const loadMoreBtn = document.getElementById('load-more-btn');
  const cardsPerLoad = 3;
  let currentVisible = 0;

  function showCards() {
    for (let i = currentVisible; i < currentVisible + cardsPerLoad && i < cards.length; i++) {
      cards[i].style.display = 'block';
    }
    currentVisible += cardsPerLoad;

    if (currentVisible >= cards.length) {
      loadMoreBtn.style.display = 'none';
    }
  }

  // Hide all cards initially
  cards.forEach(card => card.style.display = 'none');

  // Show first batch
  showCards();

  
});


// Toggle filter options (for dropdowns if you use them)
function toggleFilters() {
    const filters = document.getElementById("filter-options");
    if (filters) {
      filters.style.display = filters.style.display === "flex" ? "none" : "flex";
    }
  }
  
  

//CLICKING FUNCTION OF AN BURGER MENU ANIMATION
  const burgerBtn = document.getElementById("burgerBtn");
  const sidebar = document.getElementById("filterSidebar");
  const overlay = document.createElement("div");

  overlay.classList.add("overlay");
  document.body.appendChild(overlay);

  document.addEventListener("click", function (event) {
    const isClickInsideSidebar = sidebar.contains(event.target);
    const isClickOnBurger = burgerBtn.contains(event.target);
  
    if (!isClickInsideSidebar && !isClickOnBurger && sidebar.style.left === "0px") {
      sidebar.style.left = "-250px";
      overlay.style.display = "none";
    }
  });
  burgerBtn.addEventListener("click", function() {
    sidebar.style.left = "0";
    overlay.style.display = "block";
  });
  
  overlay.addEventListener("click", function() {
    sidebar.style.left = "-250px";
    overlay.style.display = "none";
  });

  (function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9312bfc1d528b9f0',t:'MTc0NDc5NjcxOC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();



// for profile showing view profile text down
document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl)
    })
});