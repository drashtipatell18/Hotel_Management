@extends('frontend.layouts.main')
@section('title', 'Hotel Management: Gallery')
@section('main-container')

<style>
    .fixed-size-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .image-item {
        position: relative;
        margin-bottom: 20px;
        padding: 10px;
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
            labore et dolore magna laboris nisi ut aliquip ex</p>
        <div class="nav-tabs d-flex justify-content-between mt-5">
            <button class="tab active" data-category="all">All</button>
            @foreach($facilities as $facility)
            <button class="tab" data-category="{{ Str::slug($facility->name) }}">{{ $facility->name }}</button>
            @endforeach
        </div>
        <div id="imageModal" class="d_modal">
            <span class="d_close">&times;</span>
            <div class="position-relative">
                <div class="owl-carousel owl-theme" id="test1">
                    <!-- Carousel items will be dynamically inserted here -->
                </div>
                <div class="d_sildertext"></div>
            </div>
        </div>
        <div class="image-gallery" id="imageGallery">
            <div class="row g-3">
                @foreach($facilities as $index => $facility)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    @foreach(explode(',', $facility->image) as $image)
                    <div class="image-item d_sub" data-category="{{ Str::slug($facility->name) }}" data-index="{{ $index }}">
                        <img src="{{ asset('assets/facilities/' . trim($image)) }}" alt="{{ $facility->name }}"
                            class="fixed-size-image">
                        <div class="d_image-overlay">

                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
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
