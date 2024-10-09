@extends('frontend.layouts.main')
@section('title', 'Gallery')
@section('main-container')

<section class="d_p-25 d_gallery mt-3">
    <div class="d_container">
        <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna laboris nisi ut aliquip ex</p>
            <div class="nav-tabs d-flex justify-content-between mt-5">
                <button class="tab {{ $name == 'all' ? 'active' : '' }}" data-name="all">All</button>
                @foreach($names as $n)
                    <button class="tab {{ $name == $n ? 'active' : '' }}" data-name="{{ $n }}">{{ ucwords(str_replace('-', ' ', $n)) }}</button>
                @endforeach
            </div>

        <div class="image-gallery" id="imageGallery1">
            <div class="row g-3 px-sm-2 p-0">
                @foreach($facilities as $index => $facility)
                <div class="col-12 col-lg-6 my-2">
                    <div class="image-item h-100" data-name="{{ $facility->name }}" data-index="{{ $index }}">
                        @foreach(explode(',', $facility->image) as $image)
                            <img src="{{ asset('assets/facilities/' . trim($image)) }}" alt="{{ $facility->name }}" class="fixed-size-image">
                        @endforeach
                    </div>
                    @if(($index + 1) % 5 == 0 && !$loop->last)
                        </div>
                    </div>
                    <div class="image-gallery" id="imageGallery{{ floor($index / 5) + 2 }}">
                        <div class="row g-3 px-sm-2 p-0">
                    @endif
                @endforeach
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

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.tab');
    const allImages = document.querySelectorAll('.image-item');
    const modal = document.getElementById('imageModal');
    const modalCarousel = document.getElementById('test1');
    const modalText = document.querySelector('.d_sildertext');
    let filteredImages = [];

    function filterImages(name) {
        console.log(`Filtering images for tab: ${name}`); // Debug log
        filteredImages = Array.from(allImages).filter(img =>
            name === 'all' || img.getAttribute('data-name') === name
        );

        console.log(`Filtered images count: ${filteredImages.length}`); // Debug log

        allImages.forEach(img => img.style.display = 'none');
        filteredImages.forEach(img => img.style.display = 'block');

        initializeImageClickEvents(); // Ensure this is called after filtering
    }

    function initializeImageClickEvents() {
        const visibleImages = document.querySelectorAll('.image-item[style="display: block;"]');
        console.log(`Visible images count: ${visibleImages.length}`); // Debug log
        visibleImages.forEach((img, index) => {
            img.onclick = function () {
                openModal(index);
            };
        });
    }

    function openModal(index) {
        console.log(`Opening modal for image index: ${index}`); // Debug log
        modalCarousel.innerHTML = '';
        filteredImages.forEach((img) => {
            const slide = document.createElement('div');
            slide.className = 'item';
            slide.innerHTML = img.innerHTML;
            modalCarousel.appendChild(slide);
        });

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

            const name = this.getAttribute('data-name');
            console.log(`Tab clicked: ${name}`); // Debug log
            filterImages(name); // Ensure this is correctly passing the name
        });
    });

    document.querySelector('.d_close').onclick = function () {
        modal.style.display = 'none';
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };

    $(modalCarousel).on('changed.owl.carousel', function (event) {
        updateModalText();
    });

    const initialActiveTab = document.querySelector('.tab.active') || document.querySelector('.tab[data-name="all"]');
    if (initialActiveTab) {
        const initialName = initialActiveTab.getAttribute('data-name');
        console.log(`Initial active tab: ${initialName}`); // Debug log
        filterImages(initialName);
    } else {
        filterImages('all');
    }
});
</script>
@endpush
