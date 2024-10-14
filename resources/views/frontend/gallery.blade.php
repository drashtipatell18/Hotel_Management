@extends('frontend.layouts.main')
@section('title', 'Gallery')
@section('main-container')
    <style>
        .fixed-size-image {
            width: 100%;
            height: 200px;
            /* Adjust this value according to your design */
            object-fit: cover;
        }

        .image-item {
            position: relative;
        }

        .d_image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;           
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .image-item:hover .d_image-overlay {
            opacity: 1;
        }

        .d_image-overlay p {
            color: #fff;
            text-align: center;
        }
    </style>    
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
                    @foreach ($hotelImages->chunk(5) as $chunkIndex => $chunk)
                        @if ($chunkIndex % 2 == 0)
                            {{-- Odd-indexed loop: 1 large image on the left, 4 small images on the right --}}
                            <div class="col-12 col-lg-6 my-2">
                                @if (isset($chunk[0]))
                                    {{-- Large image on the left --}}
                                    <div class="image-item h-100" data-index="{{ $chunkIndex * 5 }}">
                                        <img src="{{ asset('assets/hotel/' . trim($chunk[0]->hotel_image)) }}"
                                            alt="{{ $chunk[0]->name }}" class="img-fluid large-image">
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6 my-2">
                                <div class="row g-3">
                                    {{-- Four small images on the right --}}
                                    @foreach ($chunk->slice(1) as $index => $facility)
                                        <div class="col-6">
                                            <div class="image-item d_sub" data-index="{{ $chunkIndex * 5 + $index + 1 }}">
                                                <img src="{{ asset('assets/hotel/' . trim($facility->hotel_image)) }}"
                                                    alt="{{ $facility->name }}" class="img-fluid small-grid-image">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else   
                            {{-- Even-indexed loop: 4 small images on the left, 1 large image on the right --}}
                            <div class="col-12 col-lg-6 my-2">
                                <div class="row g-3">
                                    {{-- Four small images on the left --}}
                                    @foreach ($chunk->slice(0, 4) as $index => $facility)
                                        <div class="col-6">
                                            <div class="image-item d_sub" data-index="{{ $chunkIndex * 5 + $index }}">
                                                <img src="{{ asset('assets/hotel/' . trim($facility->hotel_image)) }}"
                                                    alt="{{ $facility->name }}" class="img-fluid small-grid-image">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 my-2">
                                @if (isset($chunk[4]))
                                    {{-- Large image on the right --}}
                                    <div class="image-item h-100" data-index="{{ $chunkIndex * 5 + 4 }}">
                                        <img src="{{ asset('assets/hotel/' . trim($chunk[4]->hotel_image)) }}"
                                            alt="{{ $chunk[4]->name }}" class="img-fluid large-image">
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>






        </div>
        </div>



    </section>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

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
                        const targetSlot = targetGallery.querySelector(
                        `.image-item[data-index="${index}"]`);
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
                    img.onclick = function() {
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
                    onInitialized: function(event) {
                        updateModalText();
                    }
                });

                // Show the modal
                modal.style.display = 'block';
            }

            function updateModalText() {
                const currentSlide = modalCarousel.querySelector('.owl-item.active');
                if (currentSlide) {
                    const textElement = currentSlide.querySelector('.d_image-overlay p') || currentSlide
                        .querySelector('p');
                    modalText.textContent = textElement ? textElement.textContent : '';
                } else {
                    modalText.textContent = '';
                }
            }

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(tab => tab.classList.remove('active'));
                    this.classList.add('active');

                    const category = this.getAttribute('data-category');
                    filterAndDistributeImages(category);
                });
            });

            // Close modal when clicking on the close button
            document.querySelector('.d_close').onclick = function() {
                modal.style.display = 'none';
            };

            // Close modal when clicking outside the image
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            };

            // Update modal text when carousel changes
            $(modalCarousel).on('changed.owl.carousel', function(event) {
                updateModalText();
            });

            // Find the initially active tab or default to 'all'
            const initialActiveTab = document.querySelector('.tab.active') || document.querySelector(
                '.tab[data-category="all"]');
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
