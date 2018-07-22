<header>
    <div class="w3-bar w3-blue">
        <a href="/" class="w3-bar-item w3-button w3-mobile" id="nav-index">น้ำแร่ธรรมชาติเขาแก้ว</a>
        <form>
            <input type="text" class="w3-bar-item w3-input" placeholder="Search..">
            <a href="#" class="w3-bar-item w3-button w3-black">Go</a>
        </form>
    </div>
</header>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-right" style="z-index:3;width:300px;right: 0;overflow:scroll"
     id="mySidebar">
    <div class="container-fluid">
        <div class="w3-bar-block">
            <a href="/product" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-right-align"
               id="nav-product">ผลิตภัณฑ์ของเรา</a>
            <a href="/sales" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-right-align"
               id="nav-sales">ตัวแทนจำหน่าย</a>
            <a href="/port" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-right-align" id="nav-port">ผลงานของเรา</a>
            <a href="/aboutme" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-right-align"
               id="nav-aboutme">เกี่ยวกับเรา</a>
            <a href="/contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-right-align"
               id="nav-contact">ติดต่อเรา</a>
            <a href="/buy" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-right-align" id="nav-buy">ชำระค่าสินค้า</a>
        </div>
        <div class="w3-panel w3-large">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
    </div>
</nav>

<!-- Header Hamburger -->
<header id="portfolio">
    <div class="navbar-hamburger-right">
                <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i
                        class="fa fa-bars"></i></span>
    </div>
    <div class="w3-container">
        <h3><u>น้ำแร่ธรรมชาติเขาแก้ว</u></h3>
    </div>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer;"
     title="close side menu" id="myOverlay"></div>
