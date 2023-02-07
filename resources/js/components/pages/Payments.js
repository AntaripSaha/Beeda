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

const Payment = () => {
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
                <div className="rideShareHeadline">Payments</div>
              </div>
              <div>
                <img
                  src="/img/payments/logo2.png"
                  alt="beeda icon"
                  className="mobile"
                />

                <img
                  src="/img/payments/logo1.png"
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
                  src="/img/payments/payment1.jpg"
                  alt="Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>About Beeda Wallet</h3>
                <p>
                  Beeda Wallet is a convenient and secure digital wallet that makes
                  it easy for users to store and manage their money. With Beeda Wallet,
                  users can easily make purchases, transfer money, and keep track of their
                  transactions, all in one place. The wallet ensures that users' funds are
                  always safe. Whether you're a consumer or a business owner, Beeda Wallet
                  offers the flexibility and control you need to manage your finances effectively.
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
                  Beeda wallet is a simple, convenient, and secure platform that enables both users
                  and businesses to manage their transactions easily. For users, Beeda wallet offers
                  a seamless way to store and access their funds, while businesses can use it to process
                  payments and manage their financial transactions. Whether you're a consumer looking for
                  an easy-to-use payment solution, or a business owner seeking to streamline your financial
                  operations, Beeda wallet has everything you need to succeed.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/payments/payment2.jpg"
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
                  src="/img/payments/payment3.jpg"
                  alt="Small Business With Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>Everything from One Wallet</h3>
                <p>
                  Beeda Wallet offers a convenient and secure way for users to manage their finances.
                  Whether you're looking to store your cash, pay bills, or make purchases,
                  Beeda's wallet has everything you need to keep your money safe and accessible.
                  With fast and easy transactions, you can enjoy the peace of mind that comes with
                  knowing your money is in good hands.
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
                <h3>Grow Your Business with Beeda Wallet</h3>
                <p>
                  Beeda Wallet helps businesses grow and manage their finances more efficiently.
                  Whether you're a small business owner or a large corporation, Beeda Wallet offers
                  a wide range of features to streamline your financial operations. With easy-to-use tools,
                  real-time insights, secure transactions, getting payments, and taking loans,
                  Beeda Wallet empowers businesses to grow and succeed.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/payments/payment4.jpg"
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

export default Payment;