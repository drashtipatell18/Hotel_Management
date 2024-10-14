<footer class="footer">
    <div class="footerBack_img">
        <div class="d_container">
            <div class="footer__content">
                <div class="row m-0">
                    <div class="col-xl-4 col-lg-12 col-md-12">
                        <div class="footer__about">
                            <div class="footer__logo">
                                <a href="#">
                                    <!-- <img src="img/logo.png" alt> -->
                                    <h1 class="text-light mb-0">logo</h1>
                                </a>
                            </div>
                            <p class="text-light">Lorem ipsum dolor sit
                                amet, consectetur
                                elit, sed do eiusmod tempor incididunt
                                u</p>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-12 col-md-12">
                        <div class="row m-0">
                            <div class="col-xl-2 col-lg-3 p-0 col-md-3  col-sm-6">
                                <div class="footer__widget">
                                    <h4>Quick Link</h4>
                                    <ul class="footer_ul_res">
                                        <div>
                                            <li><a class="text-light" href="{{ route('index') }}">Home</a></li>
                                            <li><a class="text-light" href="{{ route('aboutus') }}">About
                                                    Us</a></li>
                                            <li><a class="text-light" href="{{ route('rooms-frontend') }}">Rooms</a>
                                            </li>
                                        </div>
                                        <div class="div2">
                                            <li><a class="text-light" href="{{ route('spa') }}">Spa</a></li>
                                            <li><a class="text-light" href="{{ route('gallery') }}">Gallery</a></li>
                                            <li><a class="text-light" href="{{ route('contact-us') }}">Contact
                                                    Us</a></li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5  col-md-5  col-sm-6">
                                <div class="footer__widget">
                                    <h4>Contact</h4>
                                    <ul>
                                        <li class="d-flex pb-2"><i
                                                class="text-light px-2 pt-2 fa-solid fa-location-dot"></i><a
                                                class="text-light" href="#">330 Kling Ford,
                                                Lake Denitaside,
                                                United States</a></li>
                                        <li class="d-flex pb-2 align-items-center"><i
                                                class="text-light px-2 fa-solid fa-phone"></i><a class="text-light"
                                                href="#">+1 23 4567890
                                            </a></li>
                                        <li class="d-flex pb-2 align-items-center"><i
                                                class="text-light px-2 fa-solid fa-envelope"></i><a class="text-light"
                                                href="#">booking@example.com</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-4 col-sm-12">
                                <div class="footer__newslatter">
                                    <h4 class="text-light">Follow us
                                        on</h4>
                                    <p class="text-light y_hide_text">And keep up to
                                        date with our hotel.</p>
                                    <div class="footer__social">
                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                        <a href="#"><i class="fa-brands fa-square-x-twitter"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="footer__copyright">
            <div class="container">
                <div class="footer__copyright__text">
                    <p class="text-light"> &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        Hotel. All Rights Reserved
                        with
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<!-- jQuery (make sure this is before other scripts that use jQuery) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery Validate plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<!-- Toastr JS (if you're using it) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script> -->
<script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
<!-- <script src="{{ url('frontend/js/jquery.nice-select.min.js') }}"></script> -->
<script src="{{ url('frontend/js/jquery-ui.min.js') }}"></script>
<script src="{{ url('frontend/js/jquery.slicknav.js') }}"></script>
<script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('frontend/js/main.js') }}"></script>
<!-- <script src="{{ url('frontend/js/d_home.js') }}"></script> -->

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<script src="{{ url('frontend/js/jquery.nice-select.min.js') }}"></script>
 

<!-- <script>
    fetch('header.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('navbar').innerHTML = data;
        });
    fetch('footer.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('footer').innerHTML = data;
        });
</script> -->

<script>
    window.onload = function () {
        var modal = document.getElementById("defaultModal");
        modal.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById("defaultModal");
        modal.style.display = "none";
    }
</script>



<script>
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
    openNewModalBtn.onclick = function () {
        newModal.style.display = "block";
        newCustomOverlay.style.display = "block"; // Show the overlay
        resetNewModal();  // Reset modal every time it's opened
    }

    // Switch to login form
    newLoginBtn.onclick = function () {
        resetNewModal();  // Reset to login form
    }

    // Switch to register form
    newRegisterBtn.onclick = function () {
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

    newToggleLoginPassword.onclick = function () {
        togglePasswordVisibility('newLoginPassword', 'newToggleLoginPassword');
    }

    newToggleRegisterPassword.onclick = function () {
        togglePasswordVisibility('newRegisterPassword', 'newToggleRegisterPassword');
    }

    newToggleNewPassword.onclick = function () {
        togglePasswordVisibility('newNewPassword', 'newToggleNewPassword');
    }

    newToggleConfirmNewPassword.onclick = function () {
        togglePasswordVisibility('newConfirmNewPassword', 'newToggleConfirmNewPassword');
    }

    // Show forgot password form
    newForgotPasswordBtn.onclick = function () {
        newLoginForm.style.display = "none";
        newRegisterForm.style.display = "none";
        newForgotPasswordForm.style.display = "block";
        newOtpVerificationForm.style.display = "none";
        newCreateNewPasswordForm.style.display = "none";
        newModalHeader.style.display = "none";
    }

    // Send code for forgot password
    newSendCodeBtn.onclick = function () {
        newForgotPasswordForm.style.display = "none";
        newOtpVerificationForm.style.display = "block";
    }

    // Verify OTP
    newVerifyBtn.onclick = function () {
        newOtpVerificationForm.style.display = "none";
        newCreateNewPasswordForm.style.display = "block";
    }

    // Create new password
    newCreatePasswordBtn.onclick = function () {
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
    newCustomOverlay.onclick = function () {
        newModal.style.display = "none";
        newCustomOverlay.style.display = "none"; // Hide the overlay
    }

    // Close modal if Escape key is pressed
    document.onkeydown = function (e) {
        if (e.key === "Escape") {
            newModal.style.display = "none";
            newCustomOverlay.style.display = "none"; // Hide the overlay
        }
    }

    // Initial modal setup
    resetNewModal();

    document.addEventListener("DOMContentLoaded", function () {
        const currentPage = window.location.pathname.split("/").pop().replace(".html", "");
        const navLinks = document.querySelectorAll(".nav-link");

        navLinks.forEach(link => {
            if (link.getAttribute("data-page") === currentPage) {
                link.classList.add("active");
            }
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll('.tab');
        const galleryItems = document.querySelectorAll('.d_spabook');

        function filterGallery(category) {
            galleryItems.forEach(item => {
                const item  Category = item.getAttribute('data-category');
                item.style.display = (category === 'all' || itemCategory === category) ? 'block' : 'none';
            });
        }

        if (filterButtons && galleryItems) {
            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const category = this.getAttribute('data-category');
                    filterGallery(category);
                });
            });
        }

        // Initialize with 'all' category
        filterGallery('all');
    });


    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.tab');
        const galleries = Array.from(document.querySelectorAll('.image-gallery'));
        const allImages = document.querySelectorAll('.image-item');
        const modal = document.getElementById('imageModal');
        const modalCarousel = document.getElementById('test1');
        const modalText = document.querySelector('.d_sildertext');
        let filteredImages = [];

        function filterAndDistributeImages(category) {
            // ... (previous code remains the same)
            filteredImages = Array.from(allImages).filter(img =>
                category === 'all' || img.getAttribute('data-category') === category
            );

            // Hide all images initially
            allImages.forEach(img => img.style.display = 'none');


            // Distribute and show filtered images
            filteredImages.forEach((img, index) => {
                const galleryIndex = Math.floor(index / 5);
                if (galleryIndex < galleries.length) {
                    const targetGallery = galleries[galleryIndex];
                    const targetSlot = targetGallery.querySelector(`.image-item[data-index="${index}"]`);
                    if (targetSlot) {
                        // Replace the content of the target slot with the filtered image
                        targetSlot.innerHTML = img.innerHTML;
                        targetSlot.setAttribute('data-category', img.getAttribute('data-category'));
                        targetSlot.style.display = 'block';
                    }
                }
            });

            // Show/hide galleries based on content
            galleries.forEach(gallery => {
                const visibleImages = gallery.querySelectorAll('.image-item[style="display: block;"]');
                gallery.style.display = visibleImages.length > 0 ? 'block' : 'none';
            });

            // Reinitialize click events for the newly displayed images
            initializeImageClickEvents();
        }

        function initializeImageClickEvents() {
            const visibleImages = document.querySelectorAll('.image-item[style="display: block;"]');
            visibleImages.forEach((img, index) => {
                img.onclick = function () {
                    openModal(index);
                };
            });
        }

        function openModal(index) {
            modalCarousel.innerHTML = '';
            filteredImages.forEach((img, idx) => {
                const slide = document.createElement('div');
                slide.className = 'item';
                slide.innerHTML = img.innerHTML;
                modalCarousel.appendChild(slide);
            });

            // Initialize or reinitialize Owl Carousel
            if (modalCarousel.classList.contains('owl-loaded')) {
                $(modalCarousel).trigger('destroy.owl.carousel');
            }
            $(modalCarousel).owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                dots: false,
                startPosition: index,
                onInitialized: function (event) {
                    updateModalText();
                }
            });

            // Show the modal
            modal.style.display = 'block';
        }

        function updateModalText() {
            const currentSlide = modalCarousel.querySelector('.owl-item.active');
            if (currentSlide) {
                const textElement = currentSlide.querySelector('.d_image-overlay p') || currentSlide.querySelector('p');
                modalText.textContent = textElement ? textElement.textContent : '';
            } else {
                modalText.textContent = '';
            }
        }

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                tabs.forEach(tab => tab.classList.remove('active'));
                this.classList.add('active');

                const category = this.getAttribute('data-category');
                filterAndDistributeImages(category);
            });
        });

        // Close modal when clicking on the close button
        document.querySelector('.d_close').onclick = function () {
            modal.style.display = 'none';
        };

        // Close modal when clicking outside the image
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };

        // Update modal text when carousel changes
        $(modalCarousel).on('changed.owl.carousel', function (event) {
            updateModalText();
        });

        // Find the initially active tab or default to 'all'
        const initialActiveTab = document.querySelector('.tab.active') || document.querySelector('.tab[data-category="all"]');
        if (initialActiveTab) {
            const initialCategory = initialActiveTab.getAttribute('data-category');
            filterAndDistributeImages(initialCategory);
        } else {
            // If no active tab found, default to showing all images
            filterAndDistributeImages('all');
        }
    });
</script>
<script>
    $(document).ready(function () {
        // Initialize Toastr
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "1000",
        }
        $('#otpVerificationForm').hide();
        $('#createNewPasswordForm').hide();

        $('#forgotPasswordForm').on('submit', function (e) {
            e.preventDefault();
            var email = $('#email').val();

            $.ajax({
                url: '{{ route('forget.password') }}', // Correctly reference the named route
                type: 'POST',
                data: {
                    email: email,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        $('#forgotPasswordForm').hide();
                        $('#otpVerificationForm').removeClass('hidden').show();

                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr) {
                    var errors = xhr.responseJSON.errors;
                    if (errors && errors.email) {
                        toastr.error(errors.email[0]);
                    } else {
                        toastr.error('An error occurred. Please try again later.');
                    }
                }
            });
        });
        $('#verifyBtn').on('click', function (e) { // Change from 'submit' to 'click'
            e.preventDefault();
            const otp = Array.from(document.querySelectorAll('.otp-box')).map(input => input.value).join(''); // Collect OTP from all inputs

            $.ajax({
                url: '/verify-otp',
                type: 'POST',
                data: {
                    email: $('#email').val(), // Ensure you have an email input somewhere
                    otp: otp, // Use the collected OTP
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        $('#otpVerificationForm').hide();
                        $('#createNewPasswordForm').removeClass('hidden').show();
                        // Redirect to password reset page or show password reset form
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr) {
                    toastr.error('An error occurred. Please try again later.');
                }
            });
        });

        $('#resendOtp').on('click', function (e) {
            e.preventDefault();
            const email = $('#email').val(); // Get the email

            $.ajax({
                url: '{{ route('resend.otp') }}', // Add your route for resending OTP
                type: 'POST',
                data: {
                    email: email,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr) {
                    toastr.error('An error occurred while resending OTP. Please try again later.');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const otpInputs = document.querySelectorAll('.otp-box');
            const verifyBtn = document.getElementById('verifyBtn');
            const resendOtp = document.getElementById('resendOtp');

            otpInputs.forEach((input, index) => {
                input.addEventListener('input', function () {
                    if (this.value.length === this.maxLength) {
                        if (index < otpInputs.length - 1) {
                            otpInputs[index + 1].focus();
                        }
                    }
                });
            });

            verifyBtn.addEventListener('click', function () {
                const otp = Array.from(otpInputs).map(input => input.value).join('');
                verifyOtp(otp);
            });

            resendOtp.addEventListener('click', function () {
                resendOtpCode();
            });
        });

        function verifyOtp(otp) {
            // Send OTP to server for verification
            // You'll need to implement this part based on your backend API
            console.log('Verifying OTP:', otp);
            // Make an AJAX call to your server to verify the OTP
            // If successful, allow the user to reset their password
            // If not, show an error message
        }

        // function resendOtpCode() {
        //     // Implement the logic to resend the OTP
        //     console.log('Resending OTP');
        //     // Make an AJAX call to your server to generate and send a new OTP
        // }


        document.getElementById('createPasswordBtn').addEventListener('click', function () {
            const newPassword = document.getElementById('newPassword').value;
            const confirmNewPassword = document.getElementById('confirmNewPassword').value;

            // Check if both fields are filled
            if (!newPassword || !confirmNewPassword) {
                toastr.error('Both fields are required.', 'Error');
                return;
            }

            // Check if the passwords match
            if (newPassword !== confirmNewPassword) {
                toastr.error('Passwords do not match.', 'Error');
                return;
            }

            fetch('/password/reset', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ newPassword: newPassword, email: document.getElementById('email').value })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success('Password changed successfully!', 'Success');
                        // Hide the modal or form after successful password change
                        $('#createNewPasswordForm').hide(); // Adjust this line to hide your modal if applicable
                        // Optionally, if you want to also close the modal, you might want to call:
                        $('#authModal').hide(); // Uncomment and replace 'yourModalId' with the actual modal ID
                    } else {
                        toastr.error(data.message, 'Error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('An error occurred while resetting your password.', 'Error');
                });
        });



        $('#loginAjaxForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('login.authenticate') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        window.location.href = response.redirect;
                    } else {
                        if (response.errors) {
                            if (response.errors.email) {
                                toastr.error(response.errors.email[0]);
                            }
                            if (response.errors.password) {
                                toastr.error(response.errors.password[0]);
                            }
                            if (response.errors.role) {
                                toastr.error(response.errors.role[0]);
                            }
                        } else {
                            toastr.error(response.message);
                        }
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        if (errors.email) {
                            toastr.error(errors.email[0]);
                        }
                        if (errors.password) {
                            toastr.error(errors.password[0]);
                        }
                    } else if (xhr.status === 403) {  // Handle 403 status for role errors
                        var errors = xhr.responseJSON.errors;
                        if (errors.role) {
                            toastr.error(errors.role[0]);
                        }
                    } else {
                        toastr.error('An error occurred. Please try again.');
                    }
                }
            });
        });
        $('#mobileloginAjaxForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('login.authenticate') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        window.location.href = response.redirect;
                    } else {
                        if (response.errors) {
                            if (response.errors.email) {
                                toastr.error(response.errors.email[0]);
                            }
                            if (response.errors.password) {
                                toastr.error(response.errors.password[0]);
                            }
                            if (response.errors.role) {  // Add this block to handle role errors
                                toastr.error(response.errors.role[0]);
                            }
                        } else {
                            toastr.error(response.message);
                        }
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        if (errors.email) {
                            toastr.error(errors.email[0]);
                        }
                        if (errors.password) {
                            toastr.error(errors.password[0]);
                        }
                    } else if (xhr.status === 403) {  // Handle 403 status for role errors
                        var errors = xhr.responseJSON.errors;
                        if (errors.role) {
                            toastr.error(errors.role[0]);
                        }
                    } else {
                        toastr.error('An error occurred. Please try again.');
                    }
                }
            });
        });

        $('#registerAjaxForm').submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var url = "{{ route('register.store') }}";

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        setTimeout(function () {
                            window.location.href = response.redirect;
                        }, 2000);
                    } else {
                        toastr.error('Registration failed. Please try again.');
                    }
                },
                error: function (xhr) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        toastr.error(value[0]);
                    });
                }
            });
        });

        $('#mobileregisterAjaxForm').submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var url = "{{ route('register.store') }}";

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        setTimeout(function () {
                            window.location.href = response.redirect;
                        }, 2000);
                    } else {
                        toastr.error('Registration failed. Please try again.');
                    }
                },
                error: function (xhr) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        toastr.error(value[0]);
                    });
                }
            });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#logoutButton').click(function () {
            $.ajax({
                url: '{{ route("logoutfrontend") }}', // Adjust the route as necessary
                type: 'POST',
                success: function (response) {
                    toastr.success("You have been logged out successfully.");
                    window.location.href = '/'; // Redirect after logout
                },
                error: function (xhr) {
                    toastr.error("Logout failed. Please try again.");
                }
            });
        });






        // Make sure Toastr is properly initialized
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    });
</script>
<script>

</script>
</body>

</html>