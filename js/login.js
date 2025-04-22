window.addEventListener("load", function () {
    const loader = document.getElementById("loading-screen");
    if (loader) {
      loader.classList.add("hidden");
      // Step 2: Wait for transition to end, then hide
      setTimeout(() => {
        loader.style.display = "none";
      }, 500);
    }
  });

window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab');

    if (tab === 'signup') {
        const signupTab = new bootstrap.Tab(document.querySelector('#signup-tab'));
        signupTab.show();
    }
});

// Wait until the DOM is fully loaded
document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".filter-btn");
    const jobCards = document.querySelectorAll(".job-card-link");
  
    buttons.forEach(button => {
      button.addEventListener("click", () => {
        const filter = button.getAttribute("data-filter").toLowerCase();
  
        jobCards.forEach(card => {
          const type = card.querySelector("p:nth-of-type(3)").textContent.toLowerCase(); // Job Type
          const level = card.querySelector(".label").textContent.toLowerCase();          // Job Level
          const title = card.querySelector("h3").textContent.toLowerCase();              // Job Title
  
          let match = false;
          switch (filter) {
            case "remote jobs":
              match = type.includes("remote");
              break;
            case "hybrid":
              match = type.includes("hybrid");
              break;
            case "fresh grads":
              match = level.includes("entry");
              break;
            case "new jobs":
              match = title.includes("junior") || level.includes("entry");
              break;
            case "internships":
              match = title.includes("intern");
              break;
            case "all jobs":
              match = true;
              break;
            case "featured jobs":
              match = title.includes("featured");
              break;
            default:
              match = false;
          }
  
          card.style.display = match ? "flex" : "none";
        });
  
        // Optional: close sidebar and overlay after clicking a filter
        sidebar.style.left = "-250px";
        overlay.style.display = "none";
      });
    });
  });
  


// FilterSidebar    // NEW CODE
const filterSidebar = document.getElementById('filterSidebar');
filterSidebar.addEventListener('click', () => {
  const isVisible = filterSidebar.style.display === 'block';
  filterSidebar.style.display = isVisible ? 'none' : 'block';
});



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


// Toggle password visibility
function togglePasswordVisibility(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Switch between job seeker and employer
function switchUserType(type) {
    document.getElementById('userType').value = type;
    
    const options = document.querySelectorAll('.user-type-option');
    options.forEach(option => {
        if (option.dataset.type === type) {
            option.classList.add('active');
        } else {
            option.classList.remove('active');
        }
    });
    
    const employerFields = document.querySelectorAll('.employer-field');
    if (type === 'employer') {
        employerFields.forEach(field => field.style.display = 'block');
    } else {
        employerFields.forEach(field => field.style.display = 'none');
    }
}

// Password strength indicator
document.getElementById('signupPassword').addEventListener('input', function() {
    const password = this.value;
    const strengthElement = document.getElementById('passwordStrength');
    
    if (password.length === 0) {
        strengthElement.innerHTML = '';
        return;
    }
    
    let strength = 0;
    let feedback = '';
    
    // Length check
    if (password.length >= 8) {
        strength += 1;
    }
    
    // Uppercase check
    if (/[A-Z]/.test(password)) {
        strength += 1;
    }
    
    // Lowercase check
    if (/[a-z]/.test(password)) {
        strength += 1;
    }
    
    // Number check
    if (/[0-9]/.test(password)) {
        strength += 1;
    }
    
    // Special character check
    if (/[^A-Za-z0-9]/.test(password)) {
        strength += 1;
    }
    
    // Set feedback based on strength
    if (strength < 2) {
        feedback = '<span class="text-danger">Weak password</span>';
    } else if (strength < 4) {
        feedback = '<span class="text-warning">Moderate password</span>';
    } else {
        feedback = '<span class="text-success">Strong password</span>';
    }
    
    strengthElement.innerHTML = feedback;
});

// Form submission handlers
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('This is a demo. Login functionality is not implemented.');
});

document.getElementById('signupForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Password match validation
    const password = document.getElementById('signupPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        return;
    }
    
    const userType = document.getElementById('userType').value;
    alert(`This is a demo. Sign up functionality for ${userType} is not implemented.`);
});

(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'932445bbc1d1bc37',t:'MTc0NDk4MDQ2NC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();

// Toggle filter options (for dropdowns if you use them)
function toggleFilters() {
    const filters = document.getElementById("filter-options");
    if (filters) {
      filters.style.display = filters.style.display === "flex" ? "none" : "flex";
    }
  }

  
function switchToSignUpTab() {
    const tabTrigger = new bootstrap.Tab(document.querySelector('#signup-tab'));
    tabTrigger.show();
  } 
  
  