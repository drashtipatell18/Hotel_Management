@extends('frontend.layouts.main')
@section('title', 'Gallery')
@section('main-container')


<!-- <script src="{{ url('frontend/js/d_home.js') }}"></script> -->

    <!-- Breadcrumb Begin -->

    <!-- Breadcrumb End -->

    <section class="d_p-25 d_gallery mt-3">
        <div class="d_container">
            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna
                laboris nisi ut aliquip ex</p>
            <div class="nav-tabs d-flex justify-content-between mt-5">
                <button class="tab active" data-category="all">All</button>
                <button class="tab" data-category="hotel-ground">Hotel & Ground</button>
                <button class="tab" data-category="rooms-suites">Rooms & Suites</button>
                <button class="tab" data-category="fitness-center">Fitness Center</button>
                <button class="tab" data-category="restaurant-bar">Restaurant & Bar</button>
                <button class="tab" data-category="indoor-pool">Indoor Pool</button>
            </div>

        
            <div class="image-gallery" id="imageGallery1">
                <div class="row g-3 px-sm-2 p-0">
                    <div class="col-12 col-lg-6 my-2">
                        <div class="image-item h-100" data-category="hotel-ground" data-index="0">
                            <img src="{{ url('frontend/img/d_img/gallery1.png') }}" alt="Hotel & Ground">
                            <div class="d_image-overlay">
                                <p>Lorem ipsum dolor sit amet...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 my-2">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <div class="image-item d_sub" data-category="rooms-suites" data-index="1">
                                    <img src="{{ url('frontend/img/d_img/gallery2.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="image-item d_sub" data-category="fitness-center" data-index="2">
                                    <img src="{{ url('frontend/img/d_img/galley3.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p> ipsum </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="image-item d_sub" data-category="restaurant-bar" data-index="3">
                                    <img src="{{ url('frontend/img/d_img/gallery4.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="image-item d_sub" data-category="indoor-pool" data-index="4">
                                    <img src="{{ url('frontend/img/d_img/gallery5.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
             <div class="image-gallery my-3" id="imageGallery2">
                <div class="row g-3 px-sm-2 p-0">
                    <div class="col-12 col-lg-6 my-2">
                        <div class="row g-3 p-0">
                            <div class="col-12 col-sm-6">
                                <div class="image-item d_sub" data-category="rooms-suites" data-index="5">
                                    <img src="{{ url('frontend/img/d_img/gallery7.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="image-item d_sub" data-category="fitness-center" data-index="6">
                                    <img src="{{ url('frontend/img/d_img/gallery8.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="image-item d_sub" data-category="fitness-center" data-index="7">
                                    <img src="{{ url('frontend/img/d_img/gallery9.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="image-item d_sub" data-category="fitness-center" data-index="8">
                                    <img src="{{ url('frontend/img/d_img/gallery10.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 my-2">
                        <div class="image-item h-100" data-category="fitness-center" data-index="9">
                            <img src="{{ url('frontend/img/d_img/gallery6.png') }}" alt="Hotel & Ground">
                            <div class="d_image-overlay">
                                <p>Lorem ipsum dolor sit amet...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image-gallery" id="imageGallery3">
                <div class="row g-3 px-sm-2 p-0">
                    <div class="col-12 col-lg-6 my-2">
                        <div class="image-item h-100" data-category="hotel-ground" data-index="10">
                            <img src="{{ url('frontend/img/d_img/gallery11.png') }}" alt="Hotel & Ground">
                            <div class="d_image-overlay">
                                <p>Lorem ipsum dolor sit</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 my-2">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <div class="image-item d_sub" data-category="rooms-suites" data-index="11">
                                    <img src="{{ url('frontend/img/d_img/gallery12.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="image-item d_sub" data-category="fitness-center" data-index="12">
                                    <img src="{{ url('frontend/img/d_img/gallery13.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="image-item d_sub" data-category="restaurant-bar" data-index="13">
                                    <img src="{{ url('frontend/img/d_img/gallery14.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 ">
                                <div class="image-item d_sub" data-category="indoor-pool" data-index="14">
                                    <img src="{{ url('frontend/img/d_img/gallery15.png') }}" alt="Hotel & Ground">
                                    <div class="d_image-overlay">
                                        <p>Lorem ipsum dolor sit amet...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popup Modal -->
    <div id="imageModal" class="d_modal">
        <span class="d_close">&times;</span>
        <div class="position-relative">
            <div class="owl-carousel owl-theme" id="test1">
                <!-- Carousel items will be dynamically inserted here -->
            </div>
            <div class="d_sildertext"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
  

@endsection
