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
const movies = () => {
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
                <div className="rideShareHeadline">Movies</div>
              </div>
              <div>
                <img
                  src="/img/movies/logo2.png"
                  alt="beeda icon"
                  className="mobile"
                />

                <img
                  src="/img/movies/logo1.png"
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
                  src="/img/movies/movie1.png"
                  alt="Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>About Beeda Movies</h3>
                <p>
                  Beeda Movies is your one-stop destination for premium movie and TV content.
                  With a vast library of top-rated movies, TV shows, and series, you'll have
                  endless entertainment options at your fingertips. Enjoy the latest releases,
                  classic films, and must-see TV shows from the comfort of your own home or on the go.
                  Our user-friendly OTT platform and convenient subscription fee make it easy for you
                  to access the best entertainment anytime, anywhere.
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
                  Our motive at Beeda Movies is to provide a premium OTT platform for movie and
                  TV show enthusiasts to access the latest and greatest in film and television.
                  Our aim is to offer a convenient and user-friendly interface for subscribers to
                  enjoy their favorite content from anywhere, anytime.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/movies/movie2.jpg"
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
                  src="/img/movies/movie3.png"
                  alt="Small Business With Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>Watch Your Favorite Movie</h3>
                <p>
                  Beeda always ensures to enlist the latest movies and serve the users accordingly.
                  We have already built a great library where you can search and watch your favorite
                  classic or the latest movie. You can subscribe and enjoy this OTT platform anytime from anywhere.
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
                <h3>Enjoy Your Favorite Series</h3>
                <p>
                  Enjoying your weekend or vacation watching your favorite series has become a
                  dream comes a true moment. Beeda has created this OTT platform which includes
                  all your favorite TV series. Subscribe now, watch your favorite series, and have a better weekend.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/movies/movie4.jpg"
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

export default movies;