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
                                                <h1
                                                    class="text-light mb-0">logo</h1>
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
                                                        <li><a class="text-light"
                                                                href="index.html">Home</a></li>
                                                        <li><a class="text-light"
                                                                href="about.html">About
                                                                Us</a></li>
                                                        <li><a class="text-light"
                                                                href="rooms.html">Rooms</a></li>
                                                    </div>
                                                    <div class="div2">
                                                        <li><a class="text-light"
                                                                    href="spa.html">Spa</a></li>
                                                        <li><a class="text-light"
                                                                href="gallery.html">Gallery</a></li>
                                                        <li><a class="text-light"
                                                                href="contact.html">Contact
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
                                                            class="text-light"
                                                            href="#">330 Kling Ford,
                                                            Lake Denitaside,
                                                            United States</a></li>
                                                    <li
                                                        class="d-flex pb-2 align-items-center"><i
                                                            class="text-light px-2 fa-solid fa-phone"></i><a
                                                            class="text-light"
                                                            href="#">+1 23 4567890
                                                        </a></li>
                                                    <li
                                                        class="d-flex pb-2 align-items-center"><i
                                                            class="text-light px-2 fa-solid fa-envelope"></i><a
                                                            class="text-light"
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
                                                    <a href="#"><i
                                                            class="fa-brands fa-facebook"></i></a>
                                                    <a href="#"><i
                                                            class="fa-brands fa-instagram"></i></a>
                                                    <a href="#"><i
                                                            class="fa-brands fa-square-x-twitter"></i></a>
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
                                    with </p>
                            </div>
                        </div>
                    </div>
                </div>
    
            </footer>
            <!-- Footer Section End -->
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
                window.onload = function() {
                    var modal = document.getElementById("defaultModal");
                    modal.style.display = "block";
                }
    
                function closeModal() {
                    var modal = document.getElementById("defaultModal");
                    modal.style.display = "none";
                }
            </script>
        
        <!-- Js Plugins -->
        <script src="{{ url('frontend/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('frontend/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ url('frontend/js/jquery-ui.min.js') }}"></script>
        <script src="{{ url('frontend/js/jquery.slicknav.js') }}"></script>
        <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
        <script src="{{ url('frontend/js/main.js') }}"></script>

        </body>

</html>