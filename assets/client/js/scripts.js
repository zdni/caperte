"use strict";

const menu = document.querySelector(".menu-btn");
const closeNavbarBtn = document.querySelector(".close-navbar-btn");
const mobileNavbar = document.querySelector(".mobile-navbar");
const body = document.body;
const darkMode = document.querySelector(".darkMode");
const darkModes = document.querySelectorAll(".darkMode");
const lightMode = document.querySelector(".lightMode");
const lightModes = document.querySelectorAll(".lightMode");
const listingFilterBtn = document.querySelector(".listing-filter-btn");
const listingFilterSidebar = document.querySelector(".listing-sidebar");
const listingFilterSidebarOverlay = document.querySelector(
  ".listing-sidebar-overlay"
);
const dashboardHeaderBtn = document.querySelector(".dashboard-header-btn");
const dashboardSidebar = document.querySelector(".dashboard-sidebar");
const dashboardSidebarOverlay = document.querySelector(
  ".dashboard-sidebar-overlay"
);
const mapBtn = document.querySelector(".map-btn");
const mapcontent = document.querySelector(".map-content");
const closeLeftSidebar = document.querySelector(".close-left-sidebar");

// mapbtn functionality
if (mapBtn) {
  mapBtn.addEventListener("click", () => {
    mapcontent.classList.toggle("open");
  });
}

if (dashboardHeaderBtn) {
  dashboardHeaderBtn.addEventListener("click", () => {
    dashboardSidebar.classList.add("left-0");
    dashboardSidebar.classList.remove("-left-64");
    dashboardSidebarOverlay.classList.remove("hidden");
    dashboardSidebarOverlay.classList.add("block");
  });
  dashboardSidebarOverlay.addEventListener("click", () => {
    dashboardSidebar.classList.remove("left-0");
    dashboardSidebar.classList.add("-left-64");
    dashboardSidebarOverlay.classList.add("hidden");
    dashboardSidebarOverlay.classList.remove("block");
  });
}

// sticky-header
const stickyHeader = document.querySelector(".sticky-header");
if (stickyHeader) {
  window.addEventListener("scroll", function () {
    if (window.scrollY > 0) {
      body.classList.add("body-header");
      stickyHeader.classList.add(
        "bg-white",
        "fixed",
        "left-0",
        "dark:bg-background",
        "text-gray-800",
        "dark:text-gray-100",
        "z-50",
        "top-0"
      );
      stickyHeader.classList.remove("relative");
    } else {
      body.classList.remove("body-header");

      stickyHeader.classList.remove(
        "bg-white",
        "fixed",
        "-top-20",
        "z-50",
        "text-gray-800",
        "top-0"
      );
    }
  });
}

const url = document.querySelector('#url');

// hero-section-header
const heroStickyHeader = document.querySelector(".hero-sticky-header");
if (heroStickyHeader) {
  window.addEventListener("scroll", function () {
    if (window.scrollY > 100) {
      body.classList.add("body-header");
      heroStickyHeader.classList.add(
        "bg-white",
        "fixed",
        "-top-20",
        "left-0",
        "dark:bg-background",
        "text-gray-800",
        "dark:text-gray-100",
        "z-50",
        "slideDown"
      );
      heroStickyHeader.classList.remove("relative");
    } else {
      body.classList.remove("body-header");

      heroStickyHeader.classList.remove(
        "bg-white",
        "fixed",
        "-top-20",
        "z-50",
        "dark:bg-background",
        "text-gray-800",
        "slideDown"
      );
    }
  });
}

// listing sidebar toggle
if (listingFilterBtn) {
  listingFilterBtn.addEventListener("click", () => {
    listingFilterSidebar.classList.add("left-0");
    listingFilterSidebar.classList.remove("-left-full");
    // listingFilterSidebarOverlay.classList.add("block");
    // listingFilterSidebarOverlay.classList.remove("hidden");
  });
  listingFilterSidebarOverlay.addEventListener("click", () => {
    listingFilterSidebar.classList.remove("left-0");
    listingFilterSidebar.classList.add("-left-full");
    // listingFilterSidebarOverlay.classList.remove("block");
    // listingFilterSidebarOverlay.classList.add("hidden");
  });
}

if (closeLeftSidebar) {
  closeLeftSidebar.addEventListener("click", () => {
    listingFilterSidebar.classList.remove("left-0");
    listingFilterSidebar.classList.add("-left-full");
  });
}

if (menu) {
  menu.addEventListener("click", () => {
    mobileNavbar.classList.remove("-left-full");
    mobileNavbar.classList.add("left-0");
  });
  closeNavbarBtn.addEventListener("click", () => {
    mobileNavbar.classList.add("-left-full");
    mobileNavbar.classList.remove("left-0");
  });
}

if (darkMode) {
  darkMode.addEventListener("click", () => {
    body.classList.add("dark");
    darkMode.classList.add("hidden");
    lightMode.classList.remove("hidden");
  });
  lightMode.addEventListener("click", () => {
    body.classList.remove("dark");
    darkMode.classList.remove("hidden");
    lightMode.classList.add("hidden");
  });
}

// dropdown started
document.addEventListener("click", (e) => {
  const isDropdownButton = e.target.matches("[data-dropdown-button]");

  if (!isDropdownButton && e.target.closest("[data-dropdown]") != null) return;

  let currentDropdown;
  if (isDropdownButton) {
    currentDropdown = e.target.closest("[data-dropdown]");
    currentDropdown.classList.toggle("active");
  }

  document.querySelectorAll("[data-dropdown].active").forEach((dropdown) => {
    if (dropdown === currentDropdown) return;
    dropdown.classList.remove("active");
  });
});

// end dropdown

const scrollTopBtn = document.querySelector(".scroll-top-btn");

if (scrollTopBtn) {
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (
      document.body.scrollTop > 500 ||
      document.documentElement.scrollTop > 500
    ) {
      scrollTopBtn.classList.add("opacity-1");
      scrollTopBtn.classList.remove("opacity-0");
    } else {
      scrollTopBtn.classList.remove("opacity-1");
      scrollTopBtn.classList.add("opacity-0");
    }
  }
  // When the user clicks on the button, scroll to the top of the document

  scrollTopBtn.addEventListener("click", () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  });
}

// preloader js
const loader = document.querySelector(".loader");
if (loader) {
  window.addEventListener("load", () => {
    setTimeout(() => {
      loader.classList.add("preload-disappear");
    }, 300);
  });
}

// google map
// map started
let map;

async function initMap() {
  let markStations = [];

  const stations = await ( await fetch( url.value + 'dashboard/ambil_spbu_json' ) ).json();
  stations.forEach(station => {
    markStations.push({
      coords: {lat: parseFloat(station.lat), lng: parseFloat(station.longi)},
      iconImage: url.value + 'assets/img/icon.png',
      content: '<img class="w-44 mb-4 h-auto" style="width: 100px;" src="'+url.value+'uploads/station/'+station.image+'"> <a href="'+url.value+'dashboard/spbu/'+station.id+'" class="text-base mb-3 focus:outline-none font-semibold hover:text-blue-500">Lihat</a> <p class="text-gray-500"> '+ station.nama +'</p>',
    })
  });


  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }
  function showPosition(position) {
    let lat = position.coords.latitude;
    let lng = position.coords.longitude;
    
    // map.setCenter(new google.maps.LatLng(lat, lng));
    var options = {        
      center: { lat, lng },
      zoom: 13,
    };
  
    var map = new google.maps.Map(document.getElementById("map"), options);
  
    // add marker functions
    const infoWindows = [];
    function addMarker({ coords, iconImage, content }, markerId) {
      const marker = new google.maps.Marker({
        position: coords,
        map,
        // icon: props.iconImage,
      });
  
      // check for custom icons
      if (iconImage) {
        // set icon image
        marker.setIcon(iconImage);
      }
      // check content
      if (content) {
        const infoWindow = new google.maps.InfoWindow({
          content,
        });
        infoWindows.push(infoWindow);
        marker.addListener("click", () => {
          infoWindows.forEach((infoWindow) => {
            infoWindow.close();
          });
          infoWindow.open(map, marker);
        });
        const card = document.getElementById(`${markerId}`);
        card?.addEventListener("mouseover", () => {
          infoWindows.forEach((infoWindow) => {
            infoWindow.close();
          });
          infoWindow.open(map, marker);
        });
      }
    }
    
    for (var i = 0; i < markStations.length; i++) {
      addMarker(markStations[i], `map-${i + 1}`);
    }
    addMarker({
      coords: { lat, lng },
      iconImage: url.value + 'assets/img/people.png',
      content: '<img class="w-44 mb-4 h-auto" style="width: 10px;" src="'+url.value + 'assets/img/people.png"> <p class="text-gray-500"></p>',
    })
  }
  getLocation();
}

window.initMap = initMap;