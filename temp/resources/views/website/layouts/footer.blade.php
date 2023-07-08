<!-- Footer section start here -->
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    <div class="footer-logo">
                        <img src="{{asset_url('website/assets/images/footer-logo.png')}}" alt="footer-logo">
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="footer-contact-info">
                        <li><i class="ri-phone-fill"></i><a href="tel:+8801234567898">+8801234567898</a></li>
                        <li><i class="ri-mail-fill"></i><a
                                href="mailto:mail@alokitoteachers.com">mail@alokitoteachers.com</a></li>
                        <li><i class="ri-global-line"></i><a href="alokitoteachers.com">alokitoteachers.com</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="footer-menu">
                        <li><a href="" class="active">হোম</a></li>
                        <li><a href="">কোর্স</a></li>
                        <li><a href="">রিসোর্স</a></li>
                        <li><a href="{{route('website.innovation.all')}}">ইনোভেশন</a></li>
                        <li><a href="">ওয়ার্কশপ</a></li>
                        <li><a href="">আমাদের সম্পর্কে</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <ul class="footer-bottom-menu">
                <li><a href="">Terms</a></li>
                <li><a href="">Privacy</a></li>
                <li><a href="">Policy</a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- Footer section end here -->

<!-- Vendor js -->
<script src="{{asset_url('website/assets/js/vendor-min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js" integrity="sha512-LW9+kKj/cBGHqnI4ok24dUWNR/e8sUD8RLzak1mNw5Ja2JYCmTXJTF5VpgFSw+VoBfpMvPScCo2DnKTIUjrzYw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('js01')

<!-- Main scripts js -->
<!-- Toastr -->
<script src="{{asset_url('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset_url('website/assets/js/main.js')}}"></script>

@yield('js02')

</body>

</html>