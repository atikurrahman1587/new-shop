<div class="footer-w3l">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <h4>About </h4>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                <div class="social-icon">
                    <a href="#"><i class="icon"></i></a>
                    <a href="#"><i class="icon1"></i></a>
                    <a href="#"><i class="icon2"></i></a>
                    <a href="#"><i class="icon3"></i></a>
                </div>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>My Account</h4>
                <ul>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="registered.html"> Create Account </a></li>
                    <li><a href="{{ route('/mail-us') }}">Mail Us</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>Brand</h4>
                <ul>
                    @foreach($brands as $brand)
                    <li><a href="{{ route('brand-product', ['id'=>$brand->id, 'name'=>$brand->brand_name]) }}">{{ $brand->brand_name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 footer-grid foot">
                <h4>Contacts</h4>
                <ul>
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a href="#">E Comertown Rd, Westby, USA</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a href="#">1 599-033-5036</a></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:contactinfo.atikur@gmail.com">contactinfo.atikur@gmail.com</a></li>

                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>
