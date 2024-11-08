/*  ---------------------------------------------------
  Template Name: Hiroto
  Description:  Hiroto Hotel HTML Template
  Author: Colorlib
  Author URI: https://colorlib.com
  Version: 1.0
  Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Canvas Menu
    $(".canvas__open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    /*------------------
		Navigation
	--------------------*/
    $(".menu__class").slicknav({
        appendTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*--------------------------
        Gallery Slider
    ----------------------------*/
    $(".gallery__slider").owlCarousel({
        center: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        items: 2,  
        loop: true,
        margin: 0,
        dots: true,
        stagePadding: 50, // Adjust padding to partially show side items
        responsive: {
            1024: {
                items: 3
            },
            600:{
                items: 1
            },
            425:{
                items: 1
            },
            320:{
                items: 1
            }
        }
    });

    // Change the width and scale of active and non-active items
    $(".gallery__slider").on('initialized.owl.carousel', function(event) {
        var dots = $(this).find('.owl-dot');
        if (dots.length <= 1) {
            dots.parent().hide(); // Hide dots if only one is present
        }
    });
        /*--------------------------
        Gallery Slider
    ----------------------------*/
    $(".order__slider").owlCarousel({
        center: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        items: 2,  
        loop: true,
        margin: 0,
        dots: true,
        stagePadding: 50,
        responsive: {
            1440: {
                items: 4    
            },
            1024: {
                items: 3    
            },
            600:{
                items: 2
            },
            425:{
                items: 1
            },
            320:{
                items: 1
            }
        }
    });

    $(".order__slider2").owlCarousel({
        center: false,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        items: 4,
        loop: true,
        nav: true,
        margin: 0,
        dots: true,
        responsive: {
            1440: {
                items: 4    
            },
            1024: {
                items: 3    
            },
            600:{
                items: 2
            },
            425:{
                items: 1
            },
            320:{
                items: 1
            }
        }
    });

    // experince slider 
    $(".experince_slider").owlCarousel({
        center: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        items: 2,  
        loop: true,
        margin: 0,
        dots: true,
        stagePadding: 50, // Adjust padding to partially show side items
        responsive: {
            1024: {
                items: 3
            },
            600:{
                items: 1
            },
            425:{
                items: 1
            },
            320:{
                items: 1
            }
        }
    });
 // Change the width and scale of active and non-active items
 $(".experince_slider").on('initialized.owl.carousel', function(event) {
    var dots = $(this).find('.owl-dot');
    if (dots.length <= 1) {
        dots.parent().hide(); // Hide dots if only one is present
    }
});

    // experince slider 
    $(".Testimonials_slider").owlCarousel({
        center: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        items: 2,  
        loop: true,
        margin: 0,
        dots: true,
        stagePadding: 50, // Adjust padding to partially show side items
        responsive: {
            1440: {
                items: 3
            },
            1024:{
                items: 3
            },
            600:{
                items: 1
            },
            425:{
                items: 1
            },
            320:{
                items: 1
            }
        }
    });
    

    
    /*--------------------------
        Room Pic Slider
    ----------------------------*/
    $(".room__pic__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: true,
        nav: true,
        navText: ["<i class='arrow_carrot-left'></i>", "<i class='arrow_carrot-right'></i>"],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false
    });

    /*--------------------------
        Room Details Pic Slider
    ----------------------------*/
    $(".room__details__pic__slider").owlCarousel({
        loop: true,
        margin: 10,
        items: 2,
        dots: true,
        nav: true,
        navText: ["<i class='arrow_carrot-left'></i>", "<i class='arrow_carrot-right'></i>"],
        autoHeight: false,
        autoplay: false,
        mouseDrag: false,
        responsive: {
            576: {
                items: 2
            },
            0: {
                items: 1
            }
        }
    });
    
    /*--------------------------
        Testimonial Slider
    ----------------------------*/
    var testimonialSlider = $(".testimonial__slider");
    testimonialSlider.owlCarousel({
        loop: true,
        margin: 30,
        items: 1,
        dots: true,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        mouseDrag: false,
        onInitialized: function(e) {
        	    var a = this.items().length;
                $("#snh-1").html("<span>01</span><span>" + "0" + a + "</span>");
                var presentage = Math.round((100 / a));
                $('.slider__progress span').css("width", presentage + "%");
                
            }
        }).on("changed.owl.carousel", function(e) {
            var b = --e.item.index, a = e.item.count;
            $("#snh-1").html("<span> "+ "0" +(1 > b ? b + a : b > a ? b - a : b) + "</span><span>" + "0" + a + "</span>");

            var current = e.page.index + 1;
            var presentage = Math.round((100 / e.page.count) * current);
            $('.slider__progress span').css("width", presentage + "%");
    });
    
    
    /*--------------------------
        Logo Slider
    ----------------------------*/
    $(".logo__carousel").owlCarousel({
        loop: true,
        margin: 100,
        items: 5,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
        responsive: {
            992: {
                items: 5
            },
            768: {
                items: 3
            },
            320: {
                items: 2
            },
            0: {
                items: 1
            }
        }
    });

    /*--------------------------
        Select
    ----------------------------*/
    $("select").niceSelect();
    

/*--------------------------
    Datepicker
----------------------------*/
/*--------------------------
    Datepicker
----------------------------*/
var today = new Date(); 
var dd = today.getDate(); 
var mm = today.getMonth() + 1; 
var yyyy = today.getFullYear(); 

if (dd < 10) { 
    dd = '0' + dd; 
}
if (mm < 10) { 
    mm = '0' + mm; 
}

var today = dd + '-' + mm + '-' + yyyy; 

$(".check__in").val(today);
$(".check__out").val(today);

function setupDatepicker() {
    var numberOfMonths = window.innerWidth < 768 ? 1 : 2;
    $( ".datepicker_pop" ).datepicker({ 
        dateFormat: 'dd-mm-yy',  // Format as 'dd-mm-yy'
        minDate: 0,
        numberOfMonths: numberOfMonths  // Display 2 months or 1 month based on screen width
    });
}

// Initialize datepicker
setupDatepicker();

// Reinitialize datepicker on window resize
$(window).resize(function() {
    $( ".datepicker_pop" ).datepicker("destroy"); // Destroy the existing datepicker
    setupDatepicker(); // Reinitialize datepicker with the new settings
});

// log in model 
// Get elements
const modal = document.getElementById('authModal');
const openModalBtn = document.getElementById('openModalBtn');
const loginBtn = document.getElementById('loginBtn');
const registerBtn = document.getElementById('registerBtn');
const forgotPasswordBtn = document.getElementById('forgotPasswordBtn');
const sendCodeBtn = document.getElementById('sendCodeBtn');
const verifyBtn = document.getElementById('verifyBtn');

const modalHeader = document.getElementById('modalHeader');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const forgotPasswordForm = document.getElementById('forgotPasswordForm');
const otpVerificationForm = document.getElementById('otpVerificationForm');
const createNewPasswordForm = document.getElementById('createNewPasswordForm');

const toggleLoginPassword = document.getElementById('toggleLoginPassword');
const toggleRegisterPassword = document.getElementById('toggleRegisterPassword');
const toggleNewPassword = document.getElementById('toggleNewPassword');
const toggleConfirmNewPassword = document.getElementById('toggleConfirmNewPassword');
const otpInputs = document.querySelectorAll('.otp-box');

// Add event listener for input event
otpInputs.forEach((input, index) => {
    input.addEventListener('input', () => {
        // Move to the next input if a digit is entered
        if (input.value.length === 1 && index < otpInputs.length - 1) {
            otpInputs[index + 1].focus();
        }
    });

    // Add event listener for backspace event to go to previous input
    input.addEventListener('keydown', (event) => {
        if (event.key === 'Backspace' && input.value.length === 0 && index > 0) {
            otpInputs[index - 1].focus();
        }
    });
});

// Function to reset the modal to the login form
function resetModal() {
    loginForm.style.display = "block";
    registerForm.style.display = "none";
    forgotPasswordForm.style.display = "none";
    otpVerificationForm.style.display = "none";
    createNewPasswordForm.style.display = "none";
    modalHeader.style.display = "flex";
    loginBtn.classList.add('active');
    registerBtn.classList.remove('active');
}

// Open modal and reset to login form
openModalBtn.onclick = function() {
    modal.style.display = "block";
    resetModal();  // Reset modal every time it's opened
}

// Switch to login form
loginBtn.onclick = function() {
    resetModal();  // Reset to login form
}

// Switch to register form
registerBtn.onclick = function() {
    registerForm.style.display = "block";
    loginForm.style.display = "none";
    forgotPasswordForm.style.display = "none";
    otpVerificationForm.style.display = "none";
    createNewPasswordForm.style.display = "none";
    modalHeader.style.display = "flex";
    registerBtn.classList.add('active');
    loginBtn.classList.remove('active');
}

// Switch to forgot password form
forgotPasswordBtn.onclick = function() {
    forgotPasswordForm.style.display = "block";
    loginForm.style.display = "none";
    registerForm.style.display = "none";
    otpVerificationForm.style.display = "none";
    createNewPasswordForm.style.display = "none";
    modalHeader.style.display = "none";
}

// Switch to OTP verification form
sendCodeBtn.onclick = function() {
    otpVerificationForm.style.display = "block";
    forgotPasswordForm.style.display = "none";
    modalHeader.style.display = "none";
}

// Switch to create new password form
verifyBtn.onclick = function() {
    createNewPasswordForm.style.display = "block";
    otpVerificationForm.style.display = "none";
    modalHeader.style.display = "none";
}

// Close the modal when clicking outside
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Toggle password visibility
function togglePasswordVisibility(inputId, toggleIcon) {
    const passwordInput = document.getElementById(inputId);
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = "password";
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

// Event listeners for toggling password visibility
toggleLoginPassword.onclick = function() {
    togglePasswordVisibility('loginPassword', toggleLoginPassword);
};

toggleRegisterPassword.onclick = function() {
    togglePasswordVisibility('registerPassword', toggleRegisterPassword);
};

toggleNewPassword.onclick = function() {
    togglePasswordVisibility('newPassword', toggleNewPassword);
};

toggleConfirmNewPassword.onclick = function() {
    togglePasswordVisibility('confirmNewPassword', toggleConfirmNewPassword);
};
const createPasswordBtn = document.getElementById('createPasswordBtn');

// Function to close the modal
function closeModal() {
    modal.style.display = "none";
}

// Event listener for the "Create Password" button
createPasswordBtn.onclick = function() {
    closeModal();  // Close the modal when "Create Password" is clicked
};

// Close the modal when clicking outside
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();  // Close the modal when clicking outside
    }
};
// Function to change modal margin when the register form is open
function adjustModalMargin() {
    if (registerForm.style.display === "block") {
        document.querySelector('.login_model').style.margin = "5% auto";
    } else {
        document.querySelector('.login_model').style.margin = "10% auto";
    }
}

// Modify the existing register button event to adjust the margin
registerBtn.onclick = function() {
    registerForm.style.display = "block";
    loginForm.style.display = "none";
    forgotPasswordForm.style.display = "none";
    otpVerificationForm.style.display = "none";
    createNewPasswordForm.style.display = "none";
    modalHeader.style.display = "flex";
    registerBtn.classList.add('active');
    loginBtn.classList.remove('active');
    
    // Adjust modal margin when register form is shown
    adjustModalMargin();
}

// Ensure margin resets when switching to login form
loginBtn.onclick = function() {
    resetModal();  // Reset to login form
    adjustModalMargin();  // Reset margin to 10% for login
}
const customOverlay = document.getElementById('customOverlay');

// Function to open the modal and show the overlay
openModalBtn.onclick = function() {
    modal.style.display = "block";
    loginForm.style.display = "block"
    customOverlay.style.display = "block"; // Show the black overlay
    resetModal();  // Reset modal every time it's opened
}

// Function to close the modal and hide the overlay
function closeModal() {
    modal.style.display = "none";
    customOverlay.style.display = "none"; // Hide the black overlay
}

// Event listener for the "Create Password" button to close the modal
createPasswordBtn.onclick = function() {
    closeModal();  // Close the modal when "Create Password" is clicked
};

// Close the modal and overlay when clicking outside the modal
window.onclick = function(event) {
    if (event.target == modal || event.target == customOverlay) {
        closeModal();  // Close the modal and hide the overlay when clicking outside
    }
}



// active css remove code 
// Function to open the modal and remove the CSS
openModalBtn.onclick = function() {
    modal.style.display = "block";
    customOverlay.style.display = "block"; // Show the black overlay
    resetModal();  // Reset modal every time it's opened

    // Remove the specific CSS
    document.querySelector('.header__menu ul li.active a').style.color = "white";
}

// Function to close the modal and reapply the CSS
function closeModal() {
    modal.style.display = "none";
    customOverlay.style.display = "none"; // Hide the black overlay

    // Reapply the specific CSS
    document.querySelector('.header__menu ul li.active a').style.color = "#E9AD28";
}

// Event listener for the "Create Password" button to close the modal
createPasswordBtn.onclick = function() {
    closeModal();  // Close the modal when "Create Password" is clicked
};

// Close the modal and overlay when clicking outside the modal
window.onclick = function(event) {
    if (event.target == modal || event.target == customOverlay) {
        closeModal();  // Close the modal and hide the overlay when clicking outside
    }
}




// rooms and child selection 
// Toggle the visibility of the dropdown menu
document.querySelector('.selected-guests').addEventListener('click', function() {
    document.querySelector('.guest-dropdown').classList.toggle('show');
});

// Update the summary text at the top
const updateSummary = () => {
    const roomCount = document.getElementById('room-count').textContent;
    const adultCount = document.getElementById('adult-count').textContent;
    const childCount = document.getElementById('child-count').textContent;
    
    document.getElementById('guest-summary').textContent = 
        `${roomCount} Room${roomCount > 1 ? 's' : ''}, ${adultCount} Adult${adultCount > 1 ? 's' : ''}, ${childCount} Child${childCount > 1 ? 'ren' : ''}`;
};

// Handle the increment and decrement buttons
document.querySelectorAll('.increment, .decrement').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default action (e.g., form submission)
        
        const type = this.getAttribute('data-type');
        const elementId = type + '-count';
        const element = document.getElementById(elementId);
        let value = parseInt(element.textContent);
        
        if (this.classList.contains('increment')) {
            value++;
        } else if (this.classList.contains('decrement') && value > 0) {
            value--;
        }

        element.textContent = value;
        updateSummary();
    });
});

// login model for resposnsive 
// Get elements
const newModal = document.getElementById('newAuthModal');
const openNewModalBtn = document.getElementById('openNewModalBtn');
const newLoginBtn = document.getElementById('newLoginBtn');
const newRegisterBtn = document.getElementById('newRegisterBtn');
const newForgotPasswordBtn = document.getElementById('newForgotPasswordBtn');
const newSendCodeBtn = document.getElementById('newSendCodeBtn');
const newVerifyBtn = document.getElementById('newVerifyBtn');
const newCreatePasswordBtn = document.getElementById('newCreatePasswordBtn');

const newModalHeader = document.getElementById('newModalHeader');
const newLoginForm = document.getElementById('newLoginForm');
const newRegisterForm = document.getElementById('newRegisterForm');
const newForgotPasswordForm = document.getElementById('newForgotPasswordForm');
const newOtpVerificationForm = document.getElementById('newOtpVerificationForm');
const newCreateNewPasswordForm = document.getElementById('newCreateNewPasswordForm');

const newToggleLoginPassword = document.getElementById('newToggleLoginPassword');
const newToggleRegisterPassword = document.getElementById('newToggleRegisterPassword');
const newToggleNewPassword = document.getElementById('newToggleNewPassword');
const newToggleConfirmNewPassword = document.getElementById('newToggleConfirmNewPassword');

const newCustomOverlay = document.getElementById('newCustomOverlay');
const newotpInputs = document.querySelectorAll('.new-otp-box');

// Add event listener for input event
newotpInputs.forEach((input, index) => {
    input.addEventListener('input', () => {
        // Move to the next input if a digit is entered
        if (input.value.length === 1 && index < newotpInputs.length - 1) {
            newotpInputs[index + 1].focus();
        }
    });

    // Add event listener for backspace event to go to previous input
    input.addEventListener('keydown', (event) => {
        if (event.key === 'Backspace' && input.value.length === 0 && index > 0) {
            newotpInputs[index - 1].focus();
        }
    });
});

// Function to reset the modal to the login form
function resetNewModal() {
    newLoginForm.style.display = "block";
    newRegisterForm.style.display = "none";
    newForgotPasswordForm.style.display = "none";
    newOtpVerificationForm.style.display = "none";
    newCreateNewPasswordForm.style.display = "none";
    newModalHeader.style.display = "flex";
    newLoginBtn.classList.add('active');
    newRegisterBtn.classList.remove('active');
}

// Open modal and reset to login form
openNewModalBtn.onclick = function() {
    newModal.style.display = "block";
    newCustomOverlay.style.display = "block"; // Show the overlay
    resetNewModal();  // Reset modal every time it's opened
}

// Switch to login form
newLoginBtn.onclick = function() {
    resetNewModal();  // Reset to login form
}

// Switch to register form
newRegisterBtn.onclick = function() {
    newRegisterForm.style.display = "block";
    newLoginForm.style.display = "none";
    newForgotPasswordForm.style.display = "none";
    newOtpVerificationForm.style.display = "none";
    newCreateNewPasswordForm.style.display = "none";
    newModalHeader.style.display = "flex";
    newRegisterBtn.classList.add('active');
    newLoginBtn.classList.remove('active');
    adjustNewModalMargin(); // Adjust margin when register form is active
}

// Toggle password visibility
function togglePasswordVisibility(inputId, toggleIconId) {
    const passwordInput = document.getElementById(inputId);
    const toggleIcon = document.getElementById(toggleIconId);
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.add("fa-eye-slash");
        toggleIcon.classList.remove("fa-eye");
    } else {
        passwordInput.type = "password";
        toggleIcon.classList.add("fa-eye");
        toggleIcon.classList.remove("fa-eye-slash");
    }
}

newToggleLoginPassword.onclick = function() {
    togglePasswordVisibility('newLoginPassword', 'newToggleLoginPassword');
}

newToggleRegisterPassword.onclick = function() {
    togglePasswordVisibility('newRegisterPassword', 'newToggleRegisterPassword');
}

newToggleNewPassword.onclick = function() {
    togglePasswordVisibility('newNewPassword', 'newToggleNewPassword');
}

newToggleConfirmNewPassword.onclick = function() {
    togglePasswordVisibility('newConfirmNewPassword', 'newToggleConfirmNewPassword');
}

// Show forgot password form
newForgotPasswordBtn.onclick = function() {
    newLoginForm.style.display = "none";
    newRegisterForm.style.display = "none";
    newForgotPasswordForm.style.display = "block";
    newOtpVerificationForm.style.display = "none";
    newCreateNewPasswordForm.style.display = "none";
    newModalHeader.style.display = "none";
}

// Send code for forgot password
newSendCodeBtn.onclick = function() {
    newForgotPasswordForm.style.display = "none";
    newOtpVerificationForm.style.display = "block";
}

// Verify OTP
newVerifyBtn.onclick = function() {
    newOtpVerificationForm.style.display = "none";
    newCreateNewPasswordForm.style.display = "block";
}

// Create new password
newCreatePasswordBtn.onclick = function() {
    newCreateNewPasswordForm.style.display = "none";
    newLoginForm.style.display = "block";
    newCustomOverlay.style.display = "none"; // Hide the overlay
    newModal.style.display = "none"; // Hide the modal
}

// Adjust modal margin when register form is open
function adjustNewModalMargin() {
    if (newRegisterForm.style.display === "block") {
        newModal.style.margin = "5%";
    } else {
        newModal.style.margin = "auto";
    }
}

// Close modal on overlay click
newCustomOverlay.onclick = function() {
    newModal.style.display = "none";
    newCustomOverlay.style.display = "none"; // Hide the overlay
}

// Close modal if Escape key is pressed
document.onkeydown = function(e) {
    if (e.key === "Escape") {
        newModal.style.display = "none";
        newCustomOverlay.style.display = "none"; // Hide the overlay
    }
}

// Initial modal setup
resetNewModal();



var i = 0;
[].forEach.call(document.querySelectorAll('menu__class li > a'), function(nav) {
  console.log(nav.pathname,window.location.pathname);
  if (nav.pathname === window.location.pathname){
      i = 1;
      console.log(i);
    nav.classList.add('active')
  }
      
  else{
       console.log(i)
       nav.classList.removeClass('active')
}
  

})   
})(jQuery);