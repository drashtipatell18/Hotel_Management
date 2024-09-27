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
                                            <li><a class="text-light" href="index.html">Home</a></li>
                                            <li><a class="text-light" href="about.html">About
                                                    Us</a></li>
                                            <li><a class="text-light" href="rooms.html">Rooms</a></li>
                                        </div>
                                        <div class="div2">
                                            <li><a class="text-light" href="spa.html">Spa</a></li>
                                            <li><a class="text-light" href="gallery.html">Gallery</a></li>
                                            <li><a class="text-light" href="contact.html">Contact
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
                        <script>document.write(new Date().getFullYear());</script>
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
<script src="{{ url('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ url('frontend/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ url('frontend/js/jquery-ui.min.js') }}"></script>
<script src="{{ url('frontend/js/jquery.slicknav.js') }}"></script>
<script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('frontend/js/main.js') }}"></script>


<script>
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
</script>

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

</body>

</html>