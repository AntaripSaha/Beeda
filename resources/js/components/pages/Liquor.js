import React, { useEffect, useState } from "react";
import AboutStyle from "../../../css/aboutUs.module.css";
import {
  BrowserRouter as Router,
  Routes,
  Route,
  Link,
  NavLink,
} from "react-router-dom";
import { CDN_URL } from "../../constant";

const Liquor = () => {
  const [URL, setUrl] = useState("beeda-frontend/");
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);
  return (
    <>
      <img
        src="img/about-us/Vector (1).png"
        alt="vector"
        className={`${AboutStyle.torusIcon} ${AboutStyle.vector1}`}
      />
      <img
        src="img/about-us/Torus.png"
        alt="vector"
        className={`${AboutStyle.torusIcon} ${AboutStyle.torus1}`}
      />
      <img
        src="img/about-us/Vector (2).png"
        alt="vector"
        className={`${AboutStyle.torusIcon} ${AboutStyle.vector2}`}
      />
      <img
        src="img/about-us/Torus2.png"
        alt="vector"
        className={`torusIcon torus2`}
      />
      <img
        src="img/about-us/Torus3.png"
        alt="vector"
        className={`${AboutStyle.torusIcon} ${AboutStyle.torus3}`}
      />
      <div
        className={`aboutUsBanner d-flex justify-content-center align-items-center`}
      >
        <section className="w-100">
          <div className="container">
            <div className="d-flex align-items-center justify-content-between">
              <div className="">
                <div className="rideShareHeadline">Liquor</div>
              </div>
              <div>
                <img
                  src="/img/liquor/logo2.png"
                  alt="beeda icon"
                  className="mobile"
                />

                <img
                  src="/img/liquor/logo1.png"
                  alt="beeda icon"
                  className="desktop"
                />
              </div>
            </div>
          </div>
        </section>
      </div>

      <div className="wrapper">
        <div id="whatIsBeeda">
          <div className="container-fluid p-0">
            <div className="row">
              <div className="col-lg-6">
                <img
                  src="/img/liquor/liquor1.jpg"
                  alt="Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>About Liquor Service</h3>
                <p>
                  Beeda's liquor delivery service provides a convenient and fast solution for both
                  customers and business owners. Customers can easily order their favorite beverages
                  from a wide selection of liquors, beers, wines, and other spirits and have them delivered
                  right to their doorsteps.
                  Meanwhile, business owners can expand their reach and grow their sales by enlisting on the platform,
                  reaching a wider audience, and streamlining their delivery operations. With fast delivery options,
                  a user-friendly platform, and an easy-to-use interface, Beeda is the go-to solution for all your liquor needs.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div id="whatIsBeeda">
          <div className="container-fluid p-0">
            <div className="row">
              <div className="col-lg-6 d-flex flex-column justify-content-start order-2 order-lg-1">
                <h3>Our Motive</h3>
                <p>
                  At Beeda, our aim is to make liquor delivery convenient and accessible for both
                  customers and business owners. With our user-friendly platform and efficient delivery system,
                  customers can enjoy a wide selection of drinks and have them delivered straight to their doorstep. Our mission is
                  to provide a hassle-free and reliable liquor delivery service that meets the needs of both customers and business owners.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/liquor/liquor2.jpg"
                  alt="Beeda Mega App"
                  width="430px"
                />
              </div>
            </div>
          </div>
        </div>
        <div id="whatIsBeeda">
          <div className="container-fluid p-0">
            <div className="row">
              <div className="col-lg-6">
                <img
                  src="/img/liquor/liquor3.jpg"
                  alt="Small Business With Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>Get The Best Liquor</h3>
                <p>
                  Beeda offers a convenient and reliable liquor delivery service for customers looking to stock their
                  bar or host a party. With a wide selection of top-quality spirits, beer, and wine, Beeda makes it
                  easy to find what you're looking for. And with fast delivery options and a user-friendly platform,
                  ordering your favorite drinks has never been easier. Whether at home or the office, trust Beeda to
                  deliver your favorite beverages right to your door.
                </p>
                <span
                  className={`d-flex align-items-center ${AboutStyle.clickToRegister}`}
                >
                  Click here to register
                  <span className="material-symbols-outlined ml-2">
                    arrow_circle_right
                  </span>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div id="whatIsBeeda">
          <div className="container-fluid p-0">
            <div className="row">
              <div className="col-lg-6 d-flex flex-column justify-content-start order-2 order-lg-1">
                <h3>Grow Your Liquor Business</h3>
                <p>
                  You can enlist your liquor business and grow with Beeda.
                  Our platform connects liquor business owners with customers
                  seeking top-quality alcohol delivery. With fast delivery options,
                  a user-friendly interface, and a wide range of products,
                  Beeda makes it easy to grow your business and reach new customers.
                  Join us today and take your liquor business to the next level.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/liquor/liquor4.jpg"
                  alt="Grow Your Business With Beeda Mega App"
                  width="430px"
                />
              </div>
            </div>
          </div>
        </div>
      </div>

      <div className="container">
        <div className="row">
          <div className="col-12 col-lg-7 m-auto p-relative">
            <div id="thankU">
              <h3>Thank You</h3>
              <p>
                Thank you for being a loyal customer, partner, or vendor, we
                look forward to serving you for many generations to come, Beeda
                Let’s Go Further Together
              </p>
            </div>
            <img
              src="/img/about-us/happy.png"
              alt="happy"
              width="315"
              height="306"
              className="thankUImg"
            />
          </div>
        </div>
      </div>
    </>
  );
};

export default Liquor;