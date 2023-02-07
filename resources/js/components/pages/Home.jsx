import React, { useEffect, useState } from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/css";
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";
import NavDropdown from "react-bootstrap/NavDropdown";
import Form from "react-bootstrap/Form";
import FormControl from "react-bootstrap/FormControl";
import Container from "react-bootstrap/Container";
import { Card, Button, Badge, Row, Col } from "react-bootstrap";
import {
  BrowserRouter as Router,
  Routes,
  Route,
  Link,
  NavLink,
} from "react-router-dom";
import { CDN_URL } from "../../constant";

import { Helmet } from "react-helmet";
const Home = () => {
  const [URL, setUrl] = useState("beeda-frontend/");
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);
  return (
    <>
      <img
        src="/img/home-top-vector-1.png"
        alt="home-top-vector"
        className="home-top-vector"
      />

      <section id="hero-banner-top">
        <div className="beeda-content-wrapper">
          <div className="hero-banner-top-wrapper row">
            <div className="hero-banner-top-left d-flex justify-content-lg-center justify-content-start col-12 col-md-6 ">
              <div className="w-80">
                <div className="banner-heading">
                  <div className="heading-1">We’re the world’s</div>
                  <div className="heading-container">
                    <div className="heading-2">First & Only</div>
                    <div className="heading-3">Mega App</div>
                  </div>
                  <div className="heading-4">Explore App Now!!</div>
                </div>
                <div className="col-12 col-md-9">
                  <div className="row">
                    <div className="col-4 p-0">
                      <div className="rounded w-4/12 mr-3">
                        <a
                          href="https://apps.apple.com/us/app/beeda/id1641292802"
                          target="_blank"
                        >
                          <img
                            src="/img/apply-store-banner.png"
                            alt="apply-store-banner"
                            className="rounded"
                          />
                        </a>
                      </div>
                    </div>
                    <div className="col-4 p-0">
                      <div className="rounded w-4/12 mr-3">
                        <a
                          href="https://play.google.com/store/apps/details?id=com.beeda.user"
                          target="_blank"
                        >
                          <img
                            src="/img/google-store-banner.png"
                            alt="google-store-banner"
                            className="rounded"
                          />
                        </a>
                      </div>
                    </div>
                    <div className="col-4 p-0">
                      <div className="rounded w-4/12 mr-3">
                        <a
                          href="https://appgallery.huawei.com/"
                          target="_blank"
                        >
                          <img
                            src="/img/Huwaei.png"
                            alt="google-store-banner"
                            className="rounded"
                          />
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="hero-banner-top-right mx-auto col-12 col-md-6 desktop">
              <img src="/img/banner-phone.png" alt="banner-phone" />
            </div>
            <div className="col-sm-12 mobile">
              <img
                src="/img/mobile/mobile.png"
                alt="banner-phone"
                className="w-100"
              />
            </div>
          </div>
        </div>
      </section>

      <section id="featured_section" className="">
        <div className="wrapper">
          <div className="featured_section_content"></div>
          <div className="featured_section_wrapper">
            <div className="featured_section_wrapper_item">
              <img
                src={`${CDN_URL}assets/front/img/1st_section/vendor_platform.png`}
                alt="Vendors Platform-Beeda"
              />
              <p className="about_images_p">Multi Vendor Platform</p>
            </div>
            <div className="featured_section_wrapper_item">
              <img
                src={`${CDN_URL}assets/front/img/1st_section/military_grade_encryption.png`}
                alt="Vendors Platform-Beeda"
              />
              <p className="about_images_p">Encrypted Chatting</p>
            </div>
            <div className="featured_section_wrapper_item">
              <img
                src={`${CDN_URL}assets/front/img/1st_section/mobile_smart_pos.png`}
                alt="Vendors Platform-Beeda"
              />
              <p className="about_images_p">Mobile Smart POS</p>
            </div>
            <div className="featured_section_wrapper_item">
              <img
                src={`${CDN_URL}assets/front/img/1st_section/digital_payment.png`}
                alt="Vendors Platform-Beeda"
              />
              <p className="about_images_p">Digital Payments</p>
            </div>
            <div className="featured_section_wrapper_item">
              <img
                src={`${CDN_URL}assets/front/img/1st_section/online-entertainment.png`}
                alt="Vendors Platform-Beeda"
              />
              <p className="about_images_p">Entertainment Platform</p>
            </div>
            <div className="featured_section_wrapper_item">
              <img
                src={`${CDN_URL}assets/front/img/1st_section/others.png`}
                alt="Vendors Platform-Beeda"
              />
              <p className="about_images_p">Digital Business Card</p>
            </div>
          </div>
        </div>
      </section>

      {/* With Link Start  */}
      <section className="one-app">
        <div className="wrapper">
          <div className="title">One App for everyday needs</div>
          <div className="slider-wrapper">
            <Swiper slidesPerView={"auto"}>
              <SwiperSlide>
                <NavLink to={`beeda-mall`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/bag.png" alt="bag" />
                    </div>
                    <p>Beedamall</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`ride-share`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/drive-icon.png" alt="bag" />
                    </div>
                    <p>Ride Share</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`food-delivery`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                    <img src="/img/food-and-drink.png" alt="bag" />
                    </div>
                    <p>Food Delivery</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`grocery`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                    <img src="/img/Grocery-Icon-low.png" alt="bag" />
                    </div>
                    <p>Grocery</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
              <NavLink to={`flower`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                    <img src="/img/flower-bucket.png" alt="bag" />
                    </div>
                    <p>Flower</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
              <NavLink to={`water`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                    <img
                      src="/img/water-bottle.png"
                      alt="water bottle"
                      className="object-contain"
                    />
                    </div>
                    <p>Water</p>
                  </div>
                </NavLink>
              </SwiperSlide>
            </Swiper>
          </div>
          <div className="slider-wrapper mt-3 mt-md-4 mt-lg-5" id="driver">
            <Swiper slidesPerView={"auto"}>
              <SwiperSlide>
                <NavLink to={`liquor`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                    <img src="/img/beer-bottles.png" alt="beer-bottles" />
                    </div>
                    <p>Liquor</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
              <NavLink to={`payments`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                    <img src="/img/digital-payment.png" alt="online-payment" />
                    </div>
                    <p>Payments</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
              <NavLink to={`movies`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                    <img src="/img/frame.png" alt="film" />
                    </div>
                    <p>Movies</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
              <NavLink to={`travel`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                    <img src="/img/travel.png" alt="world-tour" />
                    </div>
                    <p>Travel</p>
                  </div>
                </NavLink>
     
              </SwiperSlide>
              <SwiperSlide>
              <NavLink to={`gas`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                    <img src="/img/gas.png" alt="gas" />
                    </div>
                    <p>Gas</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
              <NavLink to={`about-us`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                    <img src="/img/more-option.png" alt="other" />
                    </div>
                    <p>Others</p>
                  </div>
                </NavLink>
              </SwiperSlide>
            </Swiper>
          </div>
        </div>
      </section>
      {/* With Link End  */}


      {/* Without Link Start */}
      {/* <section className="one-app">
        <div className="wrapper">
          <div className="title">One App for everyday needs</div>
          <div className="slider-wrapper">
            <Swiper slidesPerView={"auto"}>
              <SwiperSlide>
                <NavLink to={`#`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/bag.png" alt="bag" />
                    </div>
                    <p>Beedamall</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`#`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/drive-icon.png" alt="bag" />
                    </div>
                    <p>Ride Share</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`#`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/food-and-drink.png" alt="bag" />
                    </div>
                    <p>Food Delivery</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`#`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/Grocery-Icon-low.png" alt="bag" />
                    </div>
                    <p>Grocery</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`#`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/flower-bucket.png" alt="bag" />
                    </div>
                    <p>Flower</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`#`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img
                        src="/img/water-bottle.png"
                        alt="water bottle"
                        className="object-contain"
                      />
                    </div>
                    <p>Water</p>
                  </div>
                </NavLink>
              </SwiperSlide>
            </Swiper>
          </div>
          <div className="slider-wrapper mt-3 mt-md-4 mt-lg-5" id="driver">
            <Swiper slidesPerView={"auto"}>
              <SwiperSlide>
                <NavLink to={`#`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/beer-bottles.png" alt="beer-bottles" />
                    </div>
                    <p>Liquor</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`#`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/digital-payment.png" alt="online-payment" />
                    </div>
                    <p>Payments</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`#`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/Frame.png" alt="film" />
                    </div>
                    <p>Movies</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`#`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/travel.png" alt="world-tour" />
                    </div>
                    <p>Travel</p>
                  </div>
                </NavLink>

              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`#`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/gas.png" alt="gas" />
                    </div>
                    <p>Gas</p>
                  </div>
                </NavLink>
              </SwiperSlide>
              <SwiperSlide>
                <NavLink to={`#`}>
                  <div className="over-slider-item">
                    <div className="over-slider-item-img-content">
                      <img src="/img/more-option.png" alt="other" />
                    </div>
                    <p>Others</p>
                  </div>
                </NavLink>
              </SwiperSlide>
            </Swiper>
          </div>
        </div>
      </section> */}
      {/* Without Link End*/}

      <section id="call-to-action">
        <div className="wrapper">
          <div className="container-fluid p-0">
            <div className="join_the_change">
              <div className="title pb-5" >
                Join the Change with <span>Beeda</span>{" "}
              </div>
            </div>
            <div className="row mt-5 d-flex justify-content-center">
              <div className="col-lg-4 col-md-6 col-sm-12">
                <div id="call-to-container">
                  <div className="call-to-container-blur"></div>
                  <div className="call-to-container-details">
                    <div className="profile-img">
                      <img
                        className="profile-img-top"
                        src="/img/employee.png"
                        alt="Beeda Employee Icon"
                      />
                    </div>
                    <h3>Employees</h3>
                    <div className="description">
                      Our employees are efficient and committed to delivering
                      user-friendly products and the best services to customers.
                      Join the Beeda team to make a difference.
                    </div>
                    <a href="" target="_blank" className="button_profile">
                      Join as Employee
                    </a>
                  </div>
                </div>
              </div>
              <div className="col-lg-4 col-md-6 col-sm-12">
                <div id="call-to-container">
                  <div className="call-to-container-blur"></div>
                  <div className="call-to-container-details driver">
                    <div className="profile-img">
                      <img
                        className="profile-img-top"
                        src="/img/Driving Partner.png"
                        alt="Beeda Employee Icon"
                      />
                    </div>
                    <h3>Driving Partner</h3>
                    <div className="description mobile-right">
                      Working as a part-time or full-time driver, you have the
                      opportunity to work at your convenience time. Join Beeda
                      and start serving.
                    </div>
                    <a href="" target="_blank" className="button_profile">
                      Join as Driver
                    </a>
                  </div>
                </div>
              </div>
              <div className="col-lg-4 col-md-6 col-sm-12">
                <div id="call-to-container">
                  <div className="call-to-container-blur"></div>
                  <div className="call-to-container-details">
                    <div className="profile-img">
                      <img
                        className="profile-img-top"
                        src="/img/Merchant.png"
                        alt="Beeda Employee Icon"
                      />
                    </div>
                    <h3>Merchant</h3>
                    <div className="description">
                      If you have a business or service, list it on the Beeda
                      platform and reach an enormous number of customers, place
                      ads and chat with them, and get payment in your wallet.
                    </div>
                    <a href="" target="_blank" className="button_profile">
                      Join as Merchant
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="beeda-store">
        <div className="beeda-store-app">
          <div className="wrapper">
            <div className="beeda-content-wrapper">
              <div className="beeda-store-app-1">
                <div className="w-100 pb-3">
                  <div className="title">Beeda Store App</div>
                  <p>
                    Beeda store app allows merchants to register their shop in
                    food, grocery, ride-sharing, liquor, gas, flower, pharmacy,
                    travel, spa, real estate, courier, car sale, etc. sectors.
                    As a vendor, you will be notified of new orders. You are
                    allowed to view accepted and processing orders, change the
                    basic information of your stores such as delivery time,
                    opening and closing time, packaging charges, and product
                    details, and manage inventory from the Beeda app.
                  </p>
                  <div className="row">
                    <div className="col-12 col-sm-8">
                      <div className="row">
                        <div className="col-4">
                          <a
                            href="https://apps.apple.com/us/app/beeda/id1641292802"
                            target="_blank"
                          >
                            <img
                              src="/img/Apple Store.jpg"
                              alt="apply store"
                              className="appleStoreImg"
                            />
                          </a>
                        </div>
                        <div className="col-4">
                          <a
                            href="https://play.google.com/store/apps/details?id=com.beeda.user"
                            target="_blank"
                          >
                            <img
                              src="/img/Google play.jpg"
                              alt="google store"
                              className="googleStoreImg"
                            />
                          </a>
                        </div>
                        <div className="col-4">
                          <a
                            href="https://appgallery.huawei.com/"
                            target="_blank"
                          >
                            <img
                              src="/img/Huwaei.jpg"
                              alt="Huwaei store"
                              className="googleStoreImg"
                            />
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="w-100 d-flex justify-content-center beeda-store-img-container">
                  <img
                    src="/img/beeda-store-woman-hand.png"
                    alt="apply store banner"
                    className="beeda-store-img"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div className="beeda-store-app beeda-store-app-2">
          <div className="wrapper">
            <div className="beeda-content-wrapper">
              <div className="beeda-store-app-1 flex-wrap">
                <div className="w-100 mb-3 d-flex justify-content-center beeda-store-img-user-container">
                  <img
                    src="/img/beeda-user.png"
                    alt="apply store banner"
                    className="beeda-store-img-user"
                  />
                </div>
                <div className="w-100 pb-3">
                  <div className="title">Beeda User App</div>
                  <p>
                    Users are allowed to order on-demand services from nearby
                    vendors. In the Beeda platform, users can access the shops,
                    restaurants, transport, couriers, real estate, and other
                    essential services using a single app. As a user, you can
                    manage your profile, delivery address, order scheduling, and
                    payment system. Also, you are allowed to use promo codes to
                    get discounts and view all reviews & ratings of merchants.
                  </p>
                  <div className="row">
                    <div className="col-12 col-sm-8">
                      <div className="row">
                        <div className="col-4">
                          <a
                            href="https://apps.apple.com/us/app/beeda/id1641292802"
                            target="_blank"
                          >
                            <img
                              src="/img/Apple Store.jpg"
                              alt="apply store"
                              className="appleStoreImg"
                            />
                          </a>
                        </div>
                        <div className="col-4">
                          <a
                            href="https://play.google.com/store/apps/details?id=com.beeda.user"
                            target="_blank"
                          >
                            <img
                              src="/img/Google play.jpg"
                              alt="google store"
                              className="googleStoreImg"
                            />
                          </a>
                        </div>
                        <div className="col-4">
                          <a
                            href="https://appgallery.huawei.com/"
                            target="_blank"
                          >
                            <img
                              src="/img/Huwaei.jpg"
                              alt="Huwaei store"
                              className="googleStoreImg"
                            />
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div className="beeda-store-app beeda-store-app-3">
          <div className="wrapper">
            <div className="beeda-content-wrapper">
              <div className="beeda-store-app-1">
                <div className="w-100 pb-3">
                  <div className="title">Beeda Driver App</div>
                  <p>
                    Beeda store app allows merchants to register their shop in
                    food, grocery, ride-sharing, liquor, gas, flower, pharmacy,
                    travel, spa, real estate, courier, car sale, etc. sectors.
                    As a vendor, you will be notified of new orders. You are
                    allowed to view accepted and processing orders, change the
                    basic information of your stores such as delivery time,
                    opening and closing time, packaging charges, and product
                    details, and manage inventory from the Beeda app.
                  </p>
                  <div className="row">
                    <div className="col-12 col-sm-8">
                      <div className="row">
                        <div className="col-4">
                          <a
                            href="https://apps.apple.com/us/app/beeda/id1641292802"
                            target="_blank"
                          >
                            <img
                              src="/img/Apple Store.jpg"
                              alt="apply store"
                              className="appleStoreImg"
                            />
                          </a>
                        </div>
                        <div className="col-4">
                          <a
                            href="https://play.google.com/store/apps/details?id=com.beeda.user"
                            target="_blank"
                          >
                            <img
                              src="/img/Google play.jpg"
                              alt="google store"
                              className="googleStoreImg"
                            />
                          </a>
                        </div>
                        <div className="col-4">
                          <a
                            href="https://appgallery.huawei.com/"
                            target="_blank"
                          >
                            <img
                              src="/img/Huwaei.jpg"
                              alt="Huwaei store"
                              className="googleStoreImg"
                            />
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="w-100 mb-3 d-flex justify-content-center beeda-store-img-container">
                  <img
                    src="/img/beeda-driver.png"
                    alt="apply store banner"
                    className="beeda-store-img-drive"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="advanced-features">
        <div className="wrapper">
          <div id="voucher" className="features-row">
            <div className="container-fluid p-0">
              <div className="row">
                <div className="col-lg-12 col-md-12 col-sm-12 col-12 voucher-col-12">
                  <div className="col-lg-5 col-md-5 col-sm-12 col-12">
                    <div className="voucher-text">
                      <div className="voucher2">
                        <img
                          className=""
                          src={`${CDN_URL}assets/front/img/7th_section/voucher1.png`}
                          alt="Payment Service-Beeda"
                        />
                      </div>
                      <div className="voucher-text">
                        <span>Don’t Have a credit card?</span>
                        <p>
                          Purchase the Beeda gift card or voucher, add it to
                          your wallet and make payments for products and
                          services, pay utility bills, and transfer funds to
                          your friend’s wallets.{" "}
                        </p>
                      </div>
                    </div>
                  </div>
                  <div className="col-lg-7 col-md-7 col-sm-12 col-12">
                    <div className="voucher1">
                      <img
                        className=""
                        src={`${CDN_URL}assets/front/img/7th_section/voucher2.png`}
                        alt="Gift Card-Beeda"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="rectangle">
        <div>
          <img
            className="rectangle-img"
            src={`${CDN_URL}assets/front/img/5th_section/rectangle.png`}
            alt="Happy Customer-Beeda"
          />
        </div>
      </section>
      <section id="supper-featuress" className="">
        <div className="container">
          <div className="row">
            <div className="col-lg-6">
              <div className="row">
                <div className="col-lg-12" style={{ paddingTop: 130 }}>
                  <div className="deliver-part">
                    <h1 className="supperapp-tagline">
                      Beeda is Crossing boundaries to deliver smiles.
                    </h1>
                  </div>
                </div>
                <div className="col-lg-12 features-p"></div>
                <div className="col-lg-12 two" style={{ paddingTop: 150 }}>
                  <div className="deliver-bottom">
                    <h1 className="supperapp-text">
                      Beeda{" "}
                      <a href="https://beedamegaapp.com/" target="_blank">
                        Mega App
                      </a>{" "}
                      for Life
                    </h1>
                    <h1 className="supperapp-text">Download</h1>
                    <h1 className="supperapp-text" style={{ fontSize: "38px" }}>
                      The Beeda App Today
                    </h1>
                    <div className="row">
                      <div className="col-4">
                        <a
                          href="https://apps.apple.com/us/app/beeda/id1641292802"
                          target="_blank"
                        >
                          <img
                            src="/img/Apple Store.jpg"
                            alt="apply store"
                            className="appleStoreImg"
                          />
                        </a>
                      </div>
                      <div className="col-4">
                        <a
                          href="https://play.google.com/store/apps/details?id=com.beeda.user"
                          target="_blank"
                        >
                          <img
                            src="/img/Google play.jpg"
                            alt="google store"
                            className="googleStoreImg"
                          />
                        </a>
                      </div>
                      <div className="col-4">
                        <a
                          href="https://appgallery.huawei.com/"
                          target="_blank"
                        >
                          <img
                            src="/img/Huwaei.jpg"
                            alt="Huwaei store"
                            className="googleStoreImg"
                          />
                        </a>
                      </div>
                    </div>
                    <img
                      className="device_2"
                      style={{
                        width: "100%",
                        textAlign: "right",
                        marginBottom: 10,
                      }}
                      src={`assets/front/img/5th_section/device_2.png`}
                      alt="Mega App for User-Beeda"
                    />
                  </div>
                </div>

                <div className="col-lg-12 three">
                  <img
                    style={{ width: "100%" }}
                    src={`assets/front/img/5th_section/Beeda.png`}
                    alt="beeda"
                  />
                </div>
              </div>
            </div>
            <div className="col-lg-6 all_service">
              <img
                style={{ width: "100%" }}
                src={`assets/front/img/5th_section/Beeda.png`}
                alt="All in One App-Beeda"
              />
            </div>
          </div>
        </div>
        <img
          className="device"
          src={`assets/front/img/5th_section/Beeda_Beeda_Mega_App.png`}
          alt="Food Ordering Service-Beeda"
        />
      </section>

      {/* <div className="wrapper">
                <section id="more-features" className="">
                    <div className="container-fluid p-0">
                        <div className="row">
                            <div className="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div id="login-container-2" className="part-1">
                                    <div className="profile-img ">
                                        <img
                                            className="profile-img-top-1"
                                            src={`${CDN_URL}assets/front/img/6th_section/real_time_tracking.png`}
                                            alt="Realtime Tracking Feature-Beeda"
                                        />
                                    </div>
                                    <h1>Realtime Tracking</h1>
                                    <div className="description">
                                        Realtime tracking your orders, rides,
                                        and services.
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div id="login-container-2" className="part-2">
                                    <div className="profile-img ">
                                        <img
                                            className="profile-img-top-1"
                                            src={`${CDN_URL}assets/front/img/6th_section/user_rating.png`}
                                            alt="User Rating Feature-Beeda"
                                        />
                                    </div>
                                    <h1>User Rating</h1>
                                    <div className="description">
                                        Users can rate and write reviews for
                                        merchants.
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div id="login-container-2" className="part-3">
                                    <div className="profile-img">
                                        <img
                                            className="profile-img-top-1"
                                            src={`${CDN_URL}assets/front/img/6th_section/30_services.png`}
                                            alt="50 Plus Service-Beeda"
                                        />
                                    </div>
                                    <h1>50+ Services</h1>
                                    <div className="description">
                                        Beeda mega app allows to access more
                                        than 50 on-demand services.
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div id="login-container-2" className="part-4">
                                    <div className="profile-img">
                                        <img
                                            className="profile-img-top-1"
                                            src={`${CDN_URL}assets/front/img/6th_section/live_chat.png`}
                                            alt="Live Chat Feature-Beeda"
                                        />
                                    </div>
                                    <h1>Live Chat</h1>
                                    <div className="description">
                                        Direct communication with the merchants
                                        via live chat.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div className="row smart_pos">
                            <div className="col-lg-6 col-md-12 col-12 smart_pos_group">
                                <a href="" target="_blank">
                                    <div className="smart_pos_hading">
                                        <span className="smart_pos">
                                            Order our Smart Pos
                                        </span>
                                    </div>
                                    <div className="smart_pos_arrow">
                                        <i className="fa fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                            <div className="col-lg-6 col-md-12 col-12 smart_pos_group">
                                <a href="" target="_blank">
                                    <div className="smart_pos_hading">
                                        <span className="smart_pos">
                                            Sign Up as a service provider
                                        </span>
                                    </div>
                                    <div className="smart_pos_arrow">
                                        <i className="fa fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>


                    </div>
                </section>
            </div> */}
      <section id="service-details">
        <div className="wrapper">
          <div className="service-details-content">
            <div className="container-fluid p-0">
              <div className="row">
                <div className="col-12 col-sm-6 col-md-6 col-lg-3 p-3">
                  <div className="service-details-content-items">
                    <div className="server-details-header-icon">
                      <img
                        src="/img/service-details/tracking-app 1.png"
                        alt="tracking-app"
                      />
                    </div>
                    <div className="details">
                      <h3>Realtime Tracking</h3>
                      <p>Realtime tracking your orders, rides, and services.</p>
                    </div>
                  </div>
                </div>
                <div className="col-12 col-sm-6 col-md-6 col-lg-3 p-3">
                  <div className="service-details-content-items">
                    <div className="server-details-header-icon">
                      <img
                        src="/img/service-details/happy-face 2.png"
                        alt="happy-face"
                      />
                    </div>
                    <div className="details">
                      <h3>User Rating</h3>
                      <p>Users can rate and write reviews for merchants.</p>
                    </div>
                  </div>
                </div>
                <div className="col-12 col-sm-6 col-md-6 col-lg-3 p-3">
                  <div className="service-details-content-items">
                    <div className="server-details-header-icon">
                      <img
                        src="/img/service-details/team-work 1.png"
                        alt="team-work"
                      />
                    </div>
                    <div className="details">
                      <h3>50+ Services</h3>
                      <p>
                        Beeda Mega App offers 50+ on-demand services.
                      </p>
                    </div>
                  </div>
                </div>
                <div className="col-12 col-sm-6 col-md-6 col-lg-3 p-3">
                  <div className="service-details-content-items">
                    <div className="server-details-header-icon">
                      <img
                        src="/img/service-details/speech-bubble 1.png"
                        alt="speech-bubble"
                      />
                    </div>
                    <div className="details">
                      <h3>Live Chat</h3>
                      <p>
                        Direct communication with the merchants via live chat.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <Helmet encodeSpecialCharacters={true}>
        <script type="application/ld+json">{`
                    {
                        "@context": "http://www.schema.org/",
                        "@type": “MobileApplication”,
                        "name": "Beeda Mega App",
                        "url": "https://beeda.com/",
                        "logo": "https://beeda.com/assets/front/img/beeda_white_logo.png",
                        "description": "Beeda is a Mega App with 50+ Services to satisfy everyone's needs. Some of our best services are E-commerce, Food Delivery, Ride Sharing, Travel, and more.",
                        "address": {
                            "@type": "PostalAddress",
                            "streetAddress": "16 Madison Square West Associates, 16 Madison Square West",
                            "addressLocality": "New York",
                            "addressRegion": "New York",
                            "postalCode": "NY 10010",
                            "addressCountry": "United States"
                        },
                        "geo": {
                            "@type": "GeoCoordinates",
                            "latitude": "40.7429219",
                            "longitude": "73.9915369"
                        },
                        "hasMap": "https://www.google.com/search?q=Beeda+INC+1115+Broadway+16+Madison+Square+West+11th+Floor+%E2%80%93+New+York%2C+NY+10010.&rlz=1C1CHBD_enBD1036BD1036&oq=Beeda+INC+1115+Broadway+16+Madison+Square+West+11th+Floor+%E2%80%93+New+York%2C+NY+10010.&aqs=chrome.0.69i59j69i60l3.1670j0j7&sourceid=chrome&ie=UTF-8",
                        "openingHours": "Mo, Tu, We, Th, Fr, Sa, Su 01:00-23:59",
                        "contactPoint": {
                            "@type": "ContactPoint",
                            "contactType": "Customer Service",
                            "telephone": "+1 754-399-1127"
                        }
                    }
                `}</script>
      </Helmet>
    </>
  );
};

export default Home;
