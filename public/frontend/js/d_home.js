
// filter dropdown

$(document).ready(function () {
    // Prevent the dropdown menu from closing when clicking inside it
    $('.dropdown-menu.d_drop1').on('click', function (e) {
        e.stopPropagation();
    });

    // Toggle the Filter dropdown when the Filter button is clicked
    $('a.dropdown-toggle:contains("Filter")').on('click', function (e) {
        e.preventDefault();
        var dropdownMenu = $(this).next('.dropdown-menu.d_drop1');
        $(this).parent().toggleClass('show');
        dropdownMenu.toggleClass('show');
    });

    // Close the Filter dropdown when clicking outside of it
    $(document).on('click', function (e) {
        if (!$(e.target).closest('.dropdown:has(a:contains("Filter"))').length) {
            $('.dropdown-menu.d_drop1').removeClass('show');
            $('.dropdown').removeClass('show');
        }
    });

    // Handle tab switching
    $('#v-pills-tab .nav-link').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        // Remove active class from all tabs
        $('#v-pills-tab .nav-link').removeClass('active');

        // Hide all tab content
        $('#v-pills-tabContent .tab-pane').removeClass('show active');

        // Add active class to clicked tab
        $(this).addClass('active');

        // Show corresponding content only if it's not already visible
        var target = $(this).attr('data-bs-target');
        if (!$(target).hasClass('show active')) {
            $(target).addClass('show active');
        } else {
            // If the clicked tab was already active, hide its content
            $(target).removeClass('show active');
        }

        // Keep dropdown open
        $(this).closest('.dropdown-menu.d_drop1').addClass('show');
        $(this).closest('.dropdown').addClass('show');
    });
});

// offcanvas

// Get references to the necessary elements
if (document.getElementById('offcanvasTop')) {


    const dropdownToggle = document.getElementById('dropdownMenuLink');
    const offcanvasToggle = document.getElementById('d_drop_down_btn');
    const offcanvasElement = document.getElementById('offcanvasTop');
    const dropdownMenu = document.getElementById('d_drop_down');

    // Initialize Bootstrap components
    const offcanvas = new bootstrap.Offcanvas(offcanvasElement);
    const dropdown = new bootstrap.Dropdown(dropdownToggle);

    // Function to handle resize events
    function handleResize() {
        if (window.innerWidth >= 768) {
            // Close offcanvas if it's open
            if (offcanvas._isShown) {
                offcanvas.hide();
            }
            // Show dropdown toggle, hide offcanvas toggle
            dropdownToggle.classList.remove('d-none');
            offcanvasToggle.classList.add('d-none');
        } else {
            // Close dropdown if it's open
            if (dropdown._menu.classList.contains('show')) {
                dropdown.hide();
            }
            // Hide dropdown toggle, show offcanvas toggle
            dropdownToggle.classList.add('d-none');
            offcanvasToggle.classList.remove('d-none');
        }
    }

    // Add event listeners
    window.addEventListener('resize', handleResize);
    window.addEventListener('load', handleResize);

    // Additional event listener to close dropdown when screen becomes smaller
    dropdownToggle.addEventListener('shown.bs.dropdown', function () {
        const closeDropdownIfSmall = function () {
            if (window.innerWidth < 768) {
                dropdown.hide();
                window.removeEventListener('resize', closeDropdownIfSmall);
            }
        };
        window.addEventListener('resize', closeDropdownIfSmall);
    });
}

// Room Data

// let roomData = [];

// function renderRooms(rooms) {
//     const roomele = document.querySelector("#D_room");
//     let htmlContent = '';

//     rooms.forEach((room) => {
//         const featureString = room.feature.join(', ');

//         htmlContent += `
//             <div class="col-xs-12 col-sm-6">
//                 <div class="d_box position-relative">
//                     <div class="d_img">
//                         <img src="/img/d_img/${room.img}" alt="">
//                     </div>
//                     <div class="d_night">
//                         <div class="d_price">
//                             <h6>$${room.price}/ Night</h6>
//                         </div>
//                     </div>
//                     <div class="d_content">
//                         <div class="d_icon d-flex align-items-center">
//                             <div class="d-flex align-items-center me-3">
//                                 <img src="/img/d_img/icon1.png" class="me-2" alt="">
//                                 <div class="d_icondesc">${room.meter}</div>
//                             </div>
//                             <div class="d-flex align-items-center me-3">
//                                 <img src="/img/d_img/icon2.png" class="me-2" alt="">
//                                 <div class="d_icondesc">${room.guest} Guests</div>
//                             </div>
//                             <div class="d-flex align-items-center">
//                                 <img src="/img/d_img/bedroom.png" class="me-2" alt="">
//                                 <div class="d_icondesc">${room.bed}</div>
//                             </div>
//                         </div>
//                         <div class="row m-0 g-2 mt-3 align-items-center">
//                             <div class="col-12 col-lg-8 p-0">
//                                 <h3>${featureString}</h3>
//                             </div>
//                             <div class="col-12 col-lg-1 p-0"></div>
//                             <div class="col-12 col-lg-3 p-0">
//                                 <div class="d_cta">
//                                     <a href="" class="d-block text-center">Reserve</a>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>  
//                 </div>
//             </div>
//         `;
//     });

//     roomele.innerHTML = htmlContent;
// }

// // sorting price wise

// function sortRooms(sortOption) {
//     let sortedRooms = [...roomData];

//     switch (sortOption) {
//         case 'Price: High to Low':
//             sortedRooms.sort((a, b) => parseInt(b.price) - parseInt(a.price));
//             break;
//         case 'Price: Low to High':
//             sortedRooms.sort((a, b) => parseInt(a.price) - parseInt(b.price));
//             break;
//         case 'Recommended':
//             // No sorting needed, it's the default order
//             break;
//     }

//     renderRooms(sortedRooms);
// }

// document.addEventListener('DOMContentLoaded', function() {
//     const roomContainer = document.getElementById('D_room');
//     const sortDropdown = document.querySelector('.dropdown-menu');

//     // Function to extract price from room element
//     function getPrice(roomElement) {
//         const priceText = roomElement.querySelector('.d_price h6').textContent;
//         return parseInt(priceText.replace('$', '').replace('/ Night', ''));
//     }

//     // Function to sort rooms
//     function sortRooms(sortType) {
//         debugger
//         const rooms = Array.from(roomContainer.children);

//         rooms.sort((a, b) => {
//             const priceA = getPrice(a);
//             const priceB = getPrice(b);

//             if (sortType === 'high-to-low') {
//                 return priceB - priceA;
//             } else if (sortType === 'low-to-high') {
//                 return priceA - priceB;
//             } else {
//                 // For 'recommended', we'll use the original order
//                 return rooms.indexOf(a) - rooms.indexOf(b);
//             }
//         });

//         // Re-append sorted rooms
//         rooms.forEach(room => roomContainer.appendChild(room));
//     }

//     // Event listener for sorting options
//     sortDropdown.addEventListener('click', function(e) {
//         if (e.target.classList.contains('dropdown-item')) {
//             e.preventDefault();
//             const sortType = e.target.getAttribute('data-sort');
//             sortRooms(sortType);
//         }
//     });
// });

// check availability room card 

// document.addEventListener("DOMContentLoaded", function () {
//     const apiUrl = "http://localhost:3000/room";

//     // Fetch the data from the API
//     fetch(apiUrl)
//         .then((response) => response.json())
//         .then((data) => {
//             roomData = data;
//             renderRooms(roomData);
//         })
//         .catch((error) => console.error("Error fetching data:", error));

//     // Set up event listeners for sorting
//     const sortInputs = document.querySelectorAll('.dropdown-menu input[type="radio"]');
//     sortInputs.forEach(input => {
//         input.addEventListener('change', function () {
//             if (this.checked) {
//                 sortRooms(this.parentElement.textContent.trim());
//             }
//         });
//     });
// });


// filter price wise rooms

// Sample room data with additional properties for filtering
const rooms = [
    { id: 1, name: "1 King Bed, Forest View, Loft Guest Room", price: 1050, image: "/img/d_img/room1.png", size: "80m2", bedType: "King bed", roomType: "deluxe", smokingPreference: "noSmoking", view: "forest" },
    { id: 2, name: "1 Queen Bed, City View, Standard Room", price: 500, image: "/img/d_img/room2.png", size: "60m2", bedType: "Queen bed", roomType: "classic", smokingPreference: "smoking", view: "city" },
    { id: 3, name: "2 Double Beds, Garden View, Family Suite", price: 300, image: "/img/d_img/room3.png", size: "100m2", bedType: "Double bed", roomType: "family", smokingPreference: "noSmoking", view: "garden" },
    { id: 4, name: "1 King Bed, Sky View, Executive Suite", price: 1150, image: "/img/d_img/room4.png", size: "120m2", bedType: "King bed", roomType: "junior", smokingPreference: "noPreference", view: "sky" },
    { id: 5, name: "1 King Bed, Sky View, Executive Suite", price: 1150, image: "/img/d_img/room5.png", size: "120m2", bedType: "King bed", roomType: "executive", smokingPreference: "noPreference", view: "pool" },
    { id: 6, name: "1 King Bed, Sky View, Executive Suite", price: 1150, image: "/img/d_img/room6.png", size: "120m2", bedType: "King bed", roomType: "queen", smokingPreference: "noPreference", view: "garden" },
    { id: 7, name: "1 King Bed, Sky View, Executive Suite", price: 1150, image: "/img/d_img/room7.png", size: "120m2", bedType: "King bed", roomType: "family", smokingPreference: "noSmoking", view: "sky" },
    { id: 8, name: "1 King Bed, Sky View, Executive Suite", price: 1150, image: "/img/d_img/room8.png", size: "120m2", bedType: "King bed", roomType: "queen", smokingPreference: "noPreference", view: "pool" },
    { id: 9, name: "1 King Bed, Sky View, Executive Suite", price: 1150, image: "/img/d_img/room9.png", size: "120m2", bedType: "King bed", roomType: "classic", smokingPreference: "smoking", view: "garden" },
    { id: 10, name: "2 Double Beds, Garden View, Family Suite", price: 300, image: "/img/d_img/room10.png", size: "100m2", bedType: "Double bed", roomType: "family", smokingPreference: "noSmoking", view: "garden" },
];

function renderRooms(filteredRooms) {
    const roomContainer = document.getElementById('D_room');
    if (roomContainer) {
        roomContainer.innerHTML = ''; // Clear existing rooms

        filteredRooms.forEach(room => {
            const roomHtml = `
           <div class="col-xs-12 col-sm-6">
                        <div class="d_box position-relative">
                            <div class="d_img">
                                <img src="${room.image}" alt="${room.name}">
                            </div>
                            <div class="d_night">
                                <div class="d_price">
                                    <h6>$${room.price}/ Night</h6>
                                </div>
                            </div>
                            <div class="d_content">
                                <div class="d_icon d-flex align-items-center">
                                    <div class="d-flex align-items-center me-3">
                                        <img src="/img/d_img/icon1.png" class="me-2" alt="">
                                        <div class="d_icondesc">${room.size}</div>
                                    </div>
                                    <div class="d-flex align-items-center me-3">
                                        <img src="/img/d_img/icon2.png" class="me-2" alt="">
                                        <div class="d_icondesc">Guests</div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="/img/d_img/bedroom.png" class="me-2" alt="">
                                        <div class="d_icondesc">${room.bedType}</div>
                                    </div>
                                </div>
                                <div class="row m-0 g-2 mt-0 align-items-center">
                                    <div class="col-12 col-lg-8 p-0">
                                        <h3>${room.name}</h3>
                                    </div>
                                    <div class="col-12 col-lg-1 p-0"></div>
                                    <div class="col-12 col-lg-3 p-0">
                                        <div class="d_cta">
                                            <a href="/booknow.html" class="d-block">Reserve</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
        ;

            roomContainer.innerHTML += roomHtml;

        });
    }
}

function demo() {
    `<div class="col-xs-12 col-sm-6">
                        <div class="d_box">
                            <div class="d_img">
                                <img src="${room.image}" alt="${room.name}">
                                <div class="d_night">
                                    <div class="d_price">
                                        <h6>$${room.price}/ Night</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="d_content">
                                <div class="d_icon d-flex align-items-center">
                                    <div class="d-flex align-items-center me-3">
                                        <img src="/img/d_img/icon1.png" class="me-2" alt="">
                                        <div class="d_icondesc">${room.size}</div>
                                    </div>
                                    <div class="d-flex align-items-center me-3">
                                        <img src="/img/d_img/icon2.png" class="me-2" alt="">
                                        <div class="d_icondesc">Guests</div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="/img/d_img/bedroom.png" class="me-2" alt="">
                                        <div class="d_icondesc">${room.bedType}</div>
                                    </div>
                                </div>
                                <h3>${room.name}</h3>
                                <div class="d_cta">
                                    <a href="/booknow.html">Reserve</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
}
function filterRooms() {
    const checkedRoomTypes = Array.from(document.querySelectorAll('input[name="roomType"]:checked')).map(el => el.value);
    const checkedSmokingPreferences = Array.from(document.querySelectorAll('input[name="smokingPreference"]:checked')).map(el => el.value);
    const checkedViews = Array.from(document.querySelectorAll('input[name="view"]:checked')).map(el => el.value);

    const filteredRooms = rooms.filter(room => {
        const roomTypeMatch = checkedRoomTypes.length === 0 || checkedRoomTypes.includes('all') || checkedRoomTypes.includes(room.roomType);
        const smokingMatch = checkedSmokingPreferences.length === 0 || checkedSmokingPreferences.includes(room.smokingPreference);
        const viewMatch = checkedViews.length === 0 || checkedViews.includes(room.view);

        return roomTypeMatch && smokingMatch && viewMatch;
    });

    renderRooms(filteredRooms);
}

// Event listeners for checkboxes
document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', filterRooms);
});

// Clear filters
document.querySelectorAll('.d_clear a').forEach(clearLink => {
    clearLink.addEventListener('click', (e) => {
        e.preventDefault();
        const checkboxes = e.target.closest('.tab-pane').querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(cb => cb.checked = false);
        filterRooms();
    });
});

// Initial render
document.addEventListener('DOMContentLoaded', () => {
    renderRooms(rooms);
});

// Sorting function (from previous example)
function sortRooms(sortBy) {
    let sortedRooms = [...rooms]; // Create a copy of the rooms array

    switch (sortBy) {
        case 'highToLow':
            sortedRooms.sort((a, b) => b.price - a.price);
            break;
        case 'lowToHigh':
            sortedRooms.sort((a, b) => a.price - b.price);
            break;
        case 'recommended':
            // For simplicity, we'll keep the original order for 'recommended'
            // You might want to implement a more complex recommendation algorithm here
            break;
    }

    renderRooms(sortedRooms);
}

// Event listener for sort options
document.querySelectorAll('input[name="sort"]').forEach(radio => {
    radio.addEventListener('change', (e) => {
        sortRooms(e.target.value);
    });
});



// book now images

document.addEventListener("DOMContentLoaded", function () {
    const mainImage = document.querySelector('.d_booknow .d_img img');
    const thumbnails = document.querySelectorAll('.d_subimg img');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function () {
            // Get the source of the clicked thumbnail
            const newSrc = this.getAttribute('src');

            // Set the main image source to the clicked thumbnail's source
            mainImage.setAttribute('src', newSrc);
        });
    });
});

// calculate bookbox

document.addEventListener('DOMContentLoaded', () => {
    // Constants
    const PRICE_PER_NIGHT = 1250;
    const ROOM_CLEAN_PRICE = 100;
    const MASSAGE_PRICE = 30;
    const DAY_SPA_PRICE = 20;

    // DOM Elements
    const checkInInput = document.querySelector('input[name="checkin"]');
    const checkOutInput = document.querySelector('input[name="checkout"]');
    const roomCount = document.getElementById('room-count');
    const adultCount = document.getElementById('adult-count');
    const childrenCount = document.getElementById('children-count');
    const roomCleanCheckbox = document.getElementById('extra-room-clean');
    const massageCheckbox = document.getElementById('extra-massage');
    const daySpaCheckbox = document.getElementById('extra-day-spa');
    const massageCount = document.getElementById('massage-count');
    const daySpaCount = document.getElementById('day-spa-count');
    const totalCostDisplay = document.getElementById('total-cost');
    const basePriceDisplay = document.querySelector('.d_price[data-type="base"]');
    const taxesDisplay = document.querySelector('.d_price[data-type="taxes"]');
    const extraDisplay = document.querySelector('.d_price[data-type="extra"]');
    const totalPriceDisplay = document.getElementById('total-price');

    // Helper Functions
    const updateDisplay = (element, value) => {
        if (element) element.textContent = value;
    };

    const calculateNights = () => {
        const checkIn = new Date(checkInInput.value);
        const checkOut = new Date(checkOutInput.value);
        return checkIn && checkOut && checkOut > checkIn ?
            Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24)) : 1;
    };

    const calculateTotal = () => {
        const nights = calculateNights();
        const rooms = parseInt(roomCount.textContent);
        const basePrice = PRICE_PER_NIGHT * nights * rooms;

        let extraPrice = 0;
        if (roomCleanCheckbox.checked) extraPrice += ROOM_CLEAN_PRICE;
        if (massageCheckbox.checked) extraPrice += MASSAGE_PRICE * parseInt(massageCount.textContent);
        if (daySpaCheckbox.checked) extraPrice += DAY_SPA_PRICE * parseInt(daySpaCount.textContent);

        const taxes = 0; // Assuming no taxes for now
        const total = basePrice + extraPrice + taxes;

        updateDisplay(basePriceDisplay, `$${basePrice}`);
        updateDisplay(taxesDisplay, `$${taxes}`);
        updateDisplay(extraDisplay, `$${extraPrice}`);
        updateDisplay(totalPriceDisplay, `$${total}`);
        updateDisplay(totalCostDisplay, `$${total}`);
    };

    // Event Listeners
    const addCounterListeners = (incrementBtn, decrementBtn, countElement, minValue = 0) => {
        incrementBtn.addEventListener('click', () => {
            countElement.textContent = parseInt(countElement.textContent) + 1;
            calculateTotal();
        });
        decrementBtn.addEventListener('click', () => {
            if (parseInt(countElement.textContent) > minValue) {
                countElement.textContent = parseInt(countElement.textContent) - 1;
                calculateTotal();
            }
        });
    };

    // Room, Adult, Children counters
    addCounterListeners(
        document.querySelector('.btn-increment[data-target="room"]'),
        document.querySelector('.btn-decrement[data-target="room"]'),
        roomCount, 1
    );
    addCounterListeners(
        document.querySelector('.btn-increment[data-target="adult"]'),
        document.querySelector('.btn-decrement[data-target="adult"]'),
        adultCount, 1
    );
    addCounterListeners(
        document.querySelector('.btn-increment[data-target="children"]'),
        document.querySelector('.btn-decrement[data-target="children"]'),
        childrenCount
    );

    // Extra services counters
    addCounterListeners(
        document.querySelector('.btn-service-increment[data-target="massage"]'),
        document.querySelector('.btn-service-decrement[data-target="massage"]'),
        massageCount, 1
    );
    addCounterListeners(
        document.querySelector('.btn-service-increment[data-target="day-spa"]'),
        document.querySelector('.btn-service-decrement[data-target="day-spa"]'),
        daySpaCount, 1
    );

    // Checkbox listeners
    [roomCleanCheckbox, massageCheckbox, daySpaCheckbox].forEach(checkbox => {
        checkbox.addEventListener('change', calculateTotal);
    });

    // Date input listeners
    [checkInInput, checkOutInput].forEach(input => {
        input.addEventListener('change', calculateTotal);
    });

    // Book Now button
    document.querySelector('.d_cta a').addEventListener('click', (e) => {
        e.preventDefault();
        // alert('Booking functionality is not yet implemented.');
        window.location = 'checkout.html'
    });

    // Initial calculation
    calculateTotal();
});


// spabook category wise filtering

// document.addEventListener('DOMContentLoaded', function () {
//     const filterButtons = document.querySelectorAll('.tab');
//     const galleryItems = document.querySelectorAll('.d_spabook');

//     function filterGallery(category) {
//         galleryItems.forEach(item => {
//             if (category === 'all' || item.getAttribute('data-category') === category) {
//                 item.style.display = 'block';
//             } else {
//                 item.style.display = 'none';
//             }
//         });
//     }

//     filterButtons.forEach(button => {
//         button.addEventListener('click', function () {
//             filterButtons.forEach(btn => btn.classList.remove('active'));
//             this.classList.add('active');
//             const category = this.getAttribute('data-category');
//             filterGallery(category);
//         });
//     });

//     // Initialize with 'all' category
//     filterGallery('all');
// });


// date select book now

$(function () {
    // Function to get today's date in dd/mm/yy format
    function getTodayDate() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        var yyyy = today.getFullYear();
        return dd + '/' + mm + '/' + yyyy;
    }

    $(".d_cal .ds").datepicker({
        dateFormat: "dd/mm/yy",
        defaultDate: new Date(),
        onSelect: function (dateText, inst) {
            $(this).val(dateText);
        }
    });

    // Set default date to today for both inputs
    $(".d_cal .ds").val(getTodayDate());

    $(".d_cal .datepicker-trigger").on("click", function () {
        var input = $(this).siblings(".ds");
        input.datepicker("show");
    });
});


// gallery page js


// // filter the gallery page js

// document.addEventListener('DOMContentLoaded', function () {
//     const tabs = document.querySelectorAll('.tab');
//     const galleries = document.querySelectorAll('.image-gallery');
//     const allImages = document.querySelectorAll('.image-item');
//     const modal = document.getElementById("imageModal");
//     const carousel = $('#test1');
//     const modalText = document.querySelector('.d_sildertext');

//     function initializeCarousel() {
//         // Clear existing carousel items
//         carousel.trigger('destroy.owl.carousel');
//         carousel.empty();

//         // Add visible images to the carousel
//         document.querySelectorAll('.image-item[style="display: block;"] img').forEach((img, index) => {
//             const overlayText = img.nextElementSibling.querySelector('p').textContent;
//             carousel.append(`
//                 <div class="item" data-hash="slide${index + 1}">
//                     <img src="${img.src}" alt="${img.alt}">
//                     <p class="hidden-text">${overlayText}</p>
//                 </div>
//             `);
//         });

//         // Initialize Owl Carousel
//         carousel.owlCarousel({
//             items: 1,
//             loop: true,
//             dots: false,
//             center: true,
//             nav: true,
//             margin: 10,
//             URLhashListener: true,
//             autoplayHoverPause: true,
//             startPosition: 'URLHash',
//         });

//         carousel.on('changed.owl.carousel', function (event) {
//             const current = event.item.index;
//             updateModalText(current);
//         });
//     }

//     function updateModalText(index) {
//         const text = $(carousel.find('.owl-item.active .item')).find('.hidden-text').text();
//         modalText.textContent = text;
//     }

//     function addImageClickListeners() {
//         document.querySelectorAll('.image-item[style="display: block;"] img').forEach((image, index) => {
//             image.addEventListener('click', function (e) {
//                 e.preventDefault();
//                 modal.style.display = "block";
//                 initializeCarousel(); // Reinitialize carousel before opening modal
//                 carousel.trigger('to.owl.carousel', [index, 300]);
//             });
//         });
//     }

//     function filterAndDistributeImages(category) {
//         const filteredImages = Array.from(allImages).filter(img =>
//             category === 'all' || img.getAttribute('data-category') === category
//         );

//         allImages.forEach(img => img.style.display = 'none');

//         filteredImages.forEach((img, index) => {
//             const galleryIndex = Math.floor(index / 5);
//             if (galleryIndex < 3) {
//                 const targetGallery = galleries[galleryIndex];
//                 const targetSlot = targetGallery.querySelector(`.image-item[data-index="${index}"]`);
//                 if (targetSlot) {
//                     targetSlot.innerHTML = img.innerHTML;
//                     targetSlot.setAttribute('data-category', img.getAttribute('data-category'));
//                     targetSlot.style.display = 'block';
//                 }
//             }
//         });

//         galleries.forEach(gallery => {
//             const visibleImages = gallery.querySelectorAll('.image-item[style="display: block;"]');
//             gallery.style.display = visibleImages.length > 0 ? 'block' : 'none';
//         });

//         addImageClickListeners();
//     }

//     tabs.forEach(tab => {
//         tab.addEventListener('click', function () {
//             tabs.forEach(tab => tab.classList.remove('active'));
//             this.classList.add('active');
//             const category = this.getAttribute('data-category');
//             filterAndDistributeImages(category);
//         });
//     });

//     // Initial setup
//     filterAndDistributeImages('all');

//     // Close modal functionality
//     const span = document.getElementsByClassName("d_close")[0];
//     span.onclick = function () {
//         modal.style.display = "none";
//     }

//     window.onclick = function (event) {
//         if (event.target == modal) {
//             modal.style.display = "none";
//         }
//     }
// });





document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-link");

    function setActiveLink() {
        const currentPage = window.location.pathname.split("/").pop().replace(".html", "") || "index";
        
        navLinks.forEach(link => {
            const linkPage = link.getAttribute("data-page");
            if (linkPage === currentPage) {
                link.classList.add("active");
            } else {
                link.classList.remove("active");
            }
        });
    }

    // Set initial active state
    setActiveLink();

    // Add click event listeners
    navLinks.forEach(link => {
        link.addEventListener("click", function(e) {
            e.preventDefault();
            const clickedPage = this.getAttribute("data-page");
            
            // Navigate to the new page
            window.location.href = clickedPage + ".html";
            
            // Update active state
            setActiveLink();
        });
    });

    // Handle browser back/forward buttons
    window.addEventListener("popstate", setActiveLink);
});


document.addEventListener('DOMContentLoaded', function () {
    const canvasOpen = document.querySelector('.canvas__open');
    const offcanvasMenuWrapper = document.querySelector('.offcanvas-menu-wrapper');
    const offcanvasMenuOverlay = document.querySelector('.offcanvas-menu-overlay');
    const mobileMenuLinks = document.querySelectorAll('.mobile-menu .nav-link');

    // Function to open offcanvas menu
    function openOffcanvasMenu() {
        offcanvasMenuWrapper.classList.add('active');
        offcanvasMenuOverlay.classList.add('active');
    }

    // Function to close offcanvas menu
    function closeOffcanvasMenu() {
        offcanvasMenuWrapper.classList.remove('active');
        offcanvasMenuOverlay.classList.remove('active');
    }

    // Toggle offcanvas menu
    canvasOpen.addEventListener('click', function (e) {
        e.preventDefault();
        openOffcanvasMenu();
    });

    // Close offcanvas menu when clicking outside
    offcanvasMenuOverlay.addEventListener('click', closeOffcanvasMenu);

    // Close offcanvas menu when clicking a menu item
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', closeOffcanvasMenu);
    });

    // Handle window resize
    window.addEventListener('resize', function () {
        if (window.innerWidth > 991) {
            closeOffcanvasMenu();
        }
    });
});
// 