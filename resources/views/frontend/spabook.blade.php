@extends('frontend.layouts.main')
@section('title', 'SpaBook')
@section('main-container')
<style>
    .d_gallery .nav-tabs {
            overflow: auto;
    }
    ::-webkit-scrollbar {
        display: none;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <section class="d_p-25 d_gallery mt-3 mb-4">
        <div class="d_container">
            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna
                laboris nisi ut aliquip ex</p>
            <div class="nav-tabs d-flex justify-content-between mt-5 overflow-auto">
                <button class="tab d_tabfill active" data-category="all">All</button>
                <button class="tab d_tabfill" data-category="seasonaloffer">Seasonal Offer</button>
                <button class="tab d_tabfill" data-category="massage">Massage</button>
                <button class="tab d_tabfill" data-category="coupleritual">Couples Rituals</button>
                <button class="tab d_tabfill" data-category="facial">Facial</button>
                <button class="tab d_tabfill" data-category="signature">Signature Experience</button>
            </div>
            <div class="image-gallery" id="imageGallery">
                <div class="row g-3 px-sm-2 p-0 ">
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="massage">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img h-100" src="{{ url('frontend/img/d_img/spa1.png') }}" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="coupleritual">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="{{ url('frontend/img/d_img/spa3.png') }}" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="facial">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img" src="{{ url('frontend/img/d_img/spa6.png') }}" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="facial">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="{{ url('frontend/img/d_img/spa5.png') }}" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="seasonaloffer">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="{{ url('frontend/img/d_img/spa6.png') }}" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="massage">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="{{ url('frontend/img/d_img/spa1.png') }}" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="seasonaloffer">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="{{ url('frontend/img/d_img/spa3.png') }}" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="signature">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="{{ url('frontend/img/d_img/spa6.png') }}" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 my-2 d_spabook" data-category="signature">
                        <div class="order__item  h-100">
                            <div class="Slider_image m-0 h-100">
                                <img class="image__img " src="{{ url('frontend/img/d_img/spa5.png') }}" alt>
                                <div>
                                    <div class="image__overlay3 image__overlay3--primary">
                                        <a href="spabooknow.html" class="Custom_btn">Book Now</a>
                                    </div>
                                    <div class="image_onsection d_boxsec bg-light py-3">
                                        <h4 class="text-center pb-2">Custom Massage (100 min)</h4>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- <i class="fa-solid fa-tag px-2"></i> -->
                                            <p class=" mb-0">Starting from $120</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<script src="{{ url('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('frontend/js/d_home.js') }}"></script>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterButtons = document.querySelectorAll('.tab');
            const galleryItems = document.querySelectorAll('.d_spabook');

            function filterGallery(category) {
                galleryItems.forEach(item => {
                    if (category === 'all' || item.getAttribute('data-category') === category) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    const category = this.getAttribute('data-category');
                    filterGallery(category);
                });
            });

            // Initialize with 'all' category
            filterGallery('all');
        });
</script>
@endsection