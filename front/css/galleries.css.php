.photothumb {
    width: 150px;
    height: 150px;
    border: 1px <?php echo $mainColor; ?> solid;
    cursor: pointer;
    display: inline-block;
    vertical-align: bottom;
    border-radius: 5px;
    margin: 10px;
    background-position: center;
    background-repeat: no-repeat;
    text-align: center;
}

.photothumb .galedit {
    position: relative;
    bottom: 0;
    background-color: rgba(0,0,0,0.5);
    color: white;
    margin: 0;
    margin-top: 109px;
    /* padding: 10px; */
    font-size: 20px;
    height: 30px;
    border: 0;
    border-radius: 0;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    text-align: center;
    width: 150px;
}

.tlcorner {
    margin-top: -13px;
    float:right;
}

.crop {
    overflow: hidden;
    display: inline-block;
}


.gal .slick-prev:hover, .gal .slick-prev:focus,
.gal .slick-prev {
    background: url(<?php echo BASE_URL;?>front/img/larr.png);
    background-size: cover;
    width: 60px;
    height: 196px;
    margin-left: -40px;
}

.gal .slick-next:hover, .gal .slick-next:focus,
.gal .slick-next {
    background: url(<?php echo BASE_URL;?>front/img/rarr.png);
    background-size: cover;
    width: 60px;
    height: 196px;
    margin-right: -40px;
}


.gal li:before {
    all: initial;
    cursor: pointer;
}

.slick-dots li:before {
    color: black;
    content: "\25CF";
    font-size: 30px;
}
.slick-dots li.slick-active:before {
    color: #e00000;
    content: "\25CF";
}
.gal tr,
.pic img {
    margin: 0 100px;
}

.gal .slick-dots {
    bottom: -50px;
}


.gal .pic {
    width: 1000px;
    height: 400px;
    background-position: center;
    background-repeat: no-repeat;
}

.company .gal .pic {
    height: 666px;
}

.gal.slick-dotted.slick-slider {
    margin-bottom: 100px;
}