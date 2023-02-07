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
const FoodDelivery = () => {
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
                <div className="rideShareHeadline">Food Delivery</div>
              </div>
              <div>
                <img
                  src="/img/food/logo2.png"
                  alt="beeda icon"
                  className="mobile"
                />

                <img
                  src="/img/food/logo1.png"
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
                  src="/img/food/food1.jpg"
                  alt="Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>About Beeda Food Delivery Service</h3>
                <p>
                  Beeda Food Delivery Services is a game-changer in the food delivery industry.
                  The platform offers a diverse selection of restaurants,
                  giving customers a multitude of delicious options to choose from.
                  Restaurants can join the platform, reach a larger customer base,
                  and streamline their delivery operations through its subscription-based model.
                </p>
                <p>
                  The intuitive interface, real-time tracking,
                  and convenient payment options make ordering food a breeze for customers.
                  Whether you're looking for a quick lunch or a full-on feast,
                  Beeda has everything you need to satisfy your cravings.
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
                  Beeda Food Delivery Service's motive is to serve customers and food businesses equally.
                  By providing a platform for restaurants to expand their reach and streamline their delivery operations,
                  Beeda empowers food businesses to grow. At the same time, Beeda offers a convenient and reliable solution for customers,
                  making ordering food from their favorite restaurants easy.
                  The ultimate goal is to provide a seamless, efficient, and enjoyable food delivery experience for all.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/food/food2.jpg"
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
                  src="/img/food/food3.jpg"
                  alt="Small Business With Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>Eat Better, Live Better</h3>
                <p>
                  Beeda Food Delivery Service provides a user-friendly
                  and efficient way to order food. Customers can browse through
                  various restaurants and cuisines to find their desired meal.
                  The platform offers real-time tracking, a simple payment,
                  and a smooth ordering experience. With Beeda, getting your
                  food delivered to your door is as easy as a few clicks.
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
                <h3>Grow Your Food Business</h3>
                <p>
                  Beeda empowers food businesses to reach their target customers and grow.
                  By enlisting on the platform, restaurants can elevate their service and
                  deliver delicious food to a wider audience. Beeda streamlines operations,
                  allowing businesses to focus on their specialty and serving amazing food.
                  Join Beeda and take your food business to the next level.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/food/food4.jpg"
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

export default FoodDelivery;