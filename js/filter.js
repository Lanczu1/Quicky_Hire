window.addEventListener("load", function() {
  const loader = document.getElementById("loading-screen");
  loader.classList.add("hidden");
  setTimeout(() => loader.style.display = "none", 500);
});


document.addEventListener('DOMContentLoaded', () => {
  const jobCards = document.querySelectorAll('.job-card-wrapper');
  const jobSearchInput = document.getElementById('jobSearchInput');
  const categoryFilter = document.getElementById('categoryFilter');
  const locationFilter = document.getElementById('locationFilter');
  const loadMoreBtn = document.getElementById('loadMoreContainer');

  function filterJobs() {
    const searchQuery = jobSearchInput.value.toLowerCase();
    const selectedCategory = categoryFilter.value.toLowerCase();
    const selectedLocation = locationFilter.value.toLowerCase();

    let matchFound = false;

    jobCards.forEach(card => {
      const title = card.querySelector('.card-title').textContent.toLowerCase();
      const type = card.querySelector('.card-text:nth-of-type(3)').textContent.toLowerCase(); // Job type
      const location = card.querySelector('.card-text:nth-of-type(2)').textContent.toLowerCase(); // Location

      const matchesSearch = title.includes(searchQuery);
      const matchesCategory = !selectedCategory || type.includes(selectedCategory);
      const matchesLocation = !selectedLocation || location.includes(selectedLocation);

      if (matchesSearch && matchesCategory && matchesLocation) {
        card.style.display = 'block';
        matchFound = true;
      } else {
        card.style.display = 'none';
      }
    });

    // If any filter is active, hide Load More button
    if (searchQuery || selectedCategory || selectedLocation) {
      loadMoreBtn.style.display = 'none';
    } else {
      loadMoreBtn.style.display = 'block';
    }
  }

  // Attach events
  jobSearchInput.addEventListener('input', filterJobs);
  categoryFilter.addEventListener('change', filterJobs);
  locationFilter.addEventListener('change', filterJobs);
});

// for profile showing view profile text down
document.addEventListener('DOMContentLoaded', function () {
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
      new bootstrap.Tooltip(tooltipTriggerEl)
  })
});

// Filter Sidebar       // NEW CODE
const filterSidebar = document.getElementById('filterSidebar');
  const categoriesList = document.getElementById('categoriesList');

  filterSidebar.addEventListener('click', () => {
    const isVisible = categoriesList.style.display === 'block';
    categoriesList.style.display = isVisible ? 'none' : 'block';
  });


// SHOW A CARD
document.addEventListener('DOMContentLoaded', function () {
  const cards = document.querySelectorAll('.job-card-wrapper');
  const loadMoreBtn = document.getElementById('load-more-btn');
  const cardsPerLoad = 6;
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

  // Load more on click
  loadMoreBtn.addEventListener('click', showCards);
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


