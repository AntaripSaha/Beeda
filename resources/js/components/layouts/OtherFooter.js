import { auto } from "@popperjs/core";
import React, { useState } from "react";
import { BsFacebook } from 'react-icons/bs';
import { AiFillInstagram } from 'react-icons/ai';
import { AiFillLinkedin } from 'react-icons/ai';
import { AiOutlineTwitter } from 'react-icons/ai';
import { AiFillYoutube } from 'react-icons/ai';
import {
    BrowserRouter as Router,
    Routes,
    Route,
    Link,
    NavLink,
} from "react-router-dom";
import { NavHashLink } from 'react-router-hash-link';
import axios from "axios";
import { useToast, immediateToast } from "izitoast-react";
import "izitoast-react/dist/iziToast.css";

export default function OtherFooter() {
    const [email, setEmail] = useState('');
    const [hoverFb, setHoverFb] = useState(false)
    const [hoverInsta, setHoverInsta] = useState(false)
    const [hoverIn, setHoverIn] = useState(false)
    const [hoverTwe, setHoverTwe] = useState(false)
    const [hoveryou, setHoverYou] = useState(false)
    const handleSubmit = (e) => {
        e.preventDefault();
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) && email !== '') {
            axios
                .post(`http://beeda-frontend.local/api/subscribe/store`, { email: email })
                .then((res) => {
                    console.log(res.data.message);
                    if (res.data.status) {
                        setEmail('');
                        immediateToast("info", {
                            message: res.data.message,
                            timeout: 500000
                        });
                    }
                    else {
                        immediateToast("info", {
                            message: res.data.message,
                            timeout: 500000
                        });
                    }
                });
        }
        else {
            immediateToast("info", {
                message: "You have entered an invalid email address!",
                timeout: 500000
            });
        }
    }
    return (
        <footer id="footer">
            <div className="wrapper">
                <form className="form-group" onSubmit={e => { handleSubmit(e) }}>
                    <div id="footerTop">
                        <div className="container-fluid p-0">
                            <div className="row">
                                <div className="col-12 col-lg-4 p-3">
                                    <a href="/">
                                    <img
                                        src="/img/about-us/Frame.png"
                                        alt="beeda icon"
                                        className=""
                                    />
                                    </a>
                                </div>
                                <div className="col-12 col-lg-8 d-flex align-items-center">
                                    <div className="footerTopInput">
                                        <p>Newsletter Signup</p>
                                        <div className="position-relative d-flex align-items-center w-100">
                                            <input
                                                type="text"
                                                placeholder="Enter your email Address"
                                                id='email'
                                                name='email'
                                                value={email}
                                                onChange={(e) => setEmail(e.target.value)}
                                                required
                                            />
                                            <button className="footerTopButton">
                                                <span className="footerTopButton_text">
                                                    Subscribe
                                                </span>
                                                <img
                                                    src="/img/send.svg"
                                                    alt="Beeda-Subscribe Icon"
                                                />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div className="footerTopBorder"></div>
            <div className="wrapper">
                <div id="footerMiddle">
                    <div className="row">
                        <div className="col-6 col-lg-2">
                            <h3>Company</h3>
                            <ul className="list-group list-group-flush">
                                <a href="" target="_blank">
                                    <li className="list-group-item">  <NavLink to={`about-us`}>About Us</NavLink></li>
                                </a>
                                <li className="list-group-item">
                                    <NavLink to={`contact-us`}>Contact Us</NavLink>
                                </li>
                                <li className="list-group-item">
                                    <NavLink to={`blogs`}>Blog</NavLink>
                                </li>
                                {/* <li className="list-group-item">
                                    FAQ's
                                </li> */}

                            </ul>
                        </div>
                        <div className="col-6 col-lg-2">
                            <h3>Policies</h3>
                            <ul className="list-group list-group-flush">
                                <li className="list-group-item">
                                    <NavLink to={`privacy-policy`}>Privacy Policy</NavLink>

                                </li>
                                <li className="list-group-item">
                                    <NavLink to={`terms-of-service`}>Terms & Condition</NavLink>

                                </li>
                                <li className="list-group-item">
                                    <NavLink to={`refund-policy`}>Refund Policy</NavLink>

                                </li>
                                {/* <li className="list-group-item">
                                <NavLink to={`disclaimer`}>Disclaimer</NavLink>
                                </li> */}
                            </ul>
                        </div>
                        <div className="col-6 col-lg-2">
                            <h3>Quick Links</h3>
                            <ul className="list-group list-group-flush">
                                <li className="list-group-item">
                                    <a
                                        href="https://play.google.com/store/apps/details?id=com.beeda.user&hl=en&gl=US"
                                        target="_blank"
                                    >
                                        Join as Driver
                                    </a>

                                </li>
                                <li className="list-group-item">
                                    <a
                                        href="https://beeda.com/register"
                                        target="_blank"
                                    >
                                        Join as Merchant
                                    </a>

                                </li>
                                <li className="list-group-item">
                                    <a
                                        href="mailto:support@beeda.com"
                                        target="_blank"
                                    >
                                        Join as Employee
                                    </a>

                                </li>

                            </ul>
                        </div>
                        <div className="col-6 col-lg-3">
                            <h3>Contact us</h3>
                            <div className="d-flex align-items-start ">
                                <div>
                                    <img src="/img/LOCATION_ICON_1.svg" alt="" className="mr-3" />
                                </div>
                                <div>
                                    <p>
                                        <address className="text-white" style={{ marginTop: "-5px" }}>
                                            1115 Broadway 16 Madison Square West, New York, United States.
                                        </address>
                                    </p>
                                </div>
                                <div>

                                </div>
                            </div>
                            <ul className="list-group list-group-flush">

                                <li className="list-group-item" style={{ marginTop: "-20px" }}>
                                    <img
                                        src="/img/clarity_chat-bubble-outline-badged.svg"
                                        alt="chat"
                                    />

                                    <p>
                                        <a href="https://m.me/108826358751069" target="_blank">
                                            <span className="text-white">Start a</span>{" "}
                                            <span className="highLight">
                                                Live Chat
                                            </span>
                                        </a>
                                    </p>
                                </li>

                                <li className="list-group-item">
                                    <img src="/img/mail.svg" alt="chat" />
                                    <p>
                                        <a href="mailto:support@beeda.com" target="_blank">
                                            <span className="text-white">support</span>
                                            <span className="highLight">
                                                @beeda.com
                                            </span>
                                        </a>
                                    </p>
                                </li>
                                <li className=" desktop ">
                                    <a href="https://www.facebook.com/BeedaMegaApp"
                                        onMouseEnter={() => setHoverFb(true)}
                                        onMouseLeave={() => setHoverFb(false)}
                                        className="rounded mr-2 icon-anchor"
                                        style={{
                                            backgroundColor: hoverFb ? '#061880' : '#3B5998',
                                            cursor: 'pointer',
                                            color: 'inherit',
                                            
                                        }}>
                                        <BsFacebook color='#FFFFFF' className="p-2" size="36" />
                                    </a>
                                    <a href="https://www.instagram.com/beedamegaapp/"
                                        onMouseEnter={() => setHoverInsta(true)}
                                        onMouseLeave={() => setHoverInsta(false)}
                                        className="rounded mr-2 icon-anchor"
                                        style={{
                                            backgroundColor: hoverInsta ? '#061880' : '#C13584',
                                            cursor: 'pointer',
                                            color: 'inherit',
                                        }}>
                                        <AiFillInstagram color='#FFFFFF' className="p-2" size="36" />
                                    </a>
                                    <a href="https://www.linkedin.com/company/beeda/"
                                        onMouseEnter={() => setHoverIn(true)}
                                        onMouseLeave={() => setHoverIn(false)}
                                        className="rounded mr-2 icon-anchor"
                                        style={{
                                            backgroundColor: hoverIn ? '#061880' : '#0072B1',
                                            cursor: 'pointer',
                                            color: 'inherit',
                                        }}>
                                        <AiFillLinkedin color='#FFFFFF' className="p-2" size="36" />
                                    </a>
                                    <a href="https://twitter.com/BeedamegaApp"
                                        onMouseEnter={() => setHoverTwe(true)}
                                        onMouseLeave={() => setHoverTwe(false)}
                                        className="rounded mr-2 icon-anchor"
                                        style={{
                                            backgroundColor: hoverTwe ? '#061880' : '#00ACEE',
                                            cursor: 'pointer',
                                            color: 'inherit',
                                        }}>
                                        <AiOutlineTwitter color='#FFFFFF' className="p-2" size="36" />
                                    </a>
                                    <a href="https://www.youtube.com/@beedamegaapp"
                                        onMouseEnter={() => setHoverYou(true)}
                                        onMouseLeave={() => setHoverYou(false)}
                                        className="rounded icon-anchor"
                                        style={{
                                            backgroundColor: hoveryou ? '#061880' : '#FF0000',
                                            cursor: 'pointer',
                                            color: 'inherit',
                                        }}>
                                        <AiFillYoutube color='#FFFFFF' className="p-2" size="36" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <li className="mobile text-center">
                                    <a href="https://www.facebook.com/BeedaMegaApp"
                                        onMouseEnter={() => setHoverFb(true)}
                                        onMouseLeave={() => setHoverFb(false)}
                                        className="rounded mr-2 icon-anchor"
                                        style={{
                                            backgroundColor: hoverFb ? '#061880' : '#3B5998',
                                            cursor: 'pointer',
                                            color: 'inherit',
                                            
                                        }}>
                                        <BsFacebook color='#FFFFFF' className="p-2" size="36" />
                                    </a>
                                    <a href="https://www.instagram.com/beedamegaapp/"
                                        onMouseEnter={() => setHoverInsta(true)}
                                        onMouseLeave={() => setHoverInsta(false)}
                                        className="rounded mr-2 icon-anchor"
                                        style={{
                                            backgroundColor: hoverInsta ? '#061880' : '#C13584',
                                            cursor: 'pointer',
                                            color: 'inherit',
                                        }}>
                                        <AiFillInstagram color='#FFFFFF' className="p-2" size="36" />
                                    </a>
                                    <a href="https://www.linkedin.com/company/beeda/"
                                        onMouseEnter={() => setHoverIn(true)}
                                        onMouseLeave={() => setHoverIn(false)}
                                        className="rounded mr-2 icon-anchor"
                                        style={{
                                            backgroundColor: hoverIn ? '#061880' : '#0072B1',
                                            cursor: 'pointer',
                                            color: 'inherit',
                                        }}>
                                        <AiFillLinkedin color='#FFFFFF' className="p-2" size="36" />
                                    </a>
                                    <a href="https://twitter.com/BeedamegaApp"
                                        onMouseEnter={() => setHoverTwe(true)}
                                        onMouseLeave={() => setHoverTwe(false)}
                                        className="rounded mr-2 icon-anchor"
                                        style={{
                                            backgroundColor: hoverTwe ? '#061880' : '#00ACEE',
                                            cursor: 'pointer',
                                            color: 'inherit',
                                        }}>
                                        <AiOutlineTwitter color='#FFFFFF' className="p-2" size="36" />
                                    </a>
                                    <a href="https://www.youtube.com/@beedamegaapp"
                                        onMouseEnter={() => setHoverYou(true)}
                                        onMouseLeave={() => setHoverYou(false)}
                                        className="rounded icon-anchor"
                                        style={{
                                            backgroundColor: hoveryou ? '#061880' : '#FF0000',
                                            cursor: 'pointer',
                                            color: 'inherit',
                                        }}>
                                        <AiFillYoutube color='#FFFFFF' className="p-2" size="36" />
                                    </a>
                        </li>
                        <div className="col-6 col-lg-3 m-auto m-lg-0">
                            <div className="qrCode d-none  d-md-flex justify-content-center">
                                <div className="qrContainer">
                                    <img
                                        src="/img/qr_1.png"
                                        alt="Beeda-App QR Code"
                                    />
                                </div>
                            </div>
                            <div className="storeBtn">
                                <div className="d-flex align-content-center gap-2">
                                    <a href="https://apps.apple.com/us/app/beeda/id1641292802" target="_blank">
                                        <img
                                            src="/img/Apple Store.jpg"
                                            alt="Beeda-Download App Store App"
                                            style={{ width: "100px", height: "35px" }}
                                        />
                                    </a>
                                    <a href="https://play.google.com/store/apps/details?id=com.beeda.user" target="_blank">
                                        <img
                                            src="/img/Google play.jpg"
                                            alt="google store"
                                            className="Beeda-Download Google Store App"
                                            style={{ width: "100px", height: "35px" }}
                                        />
                                    </a>
                                    <a href="https://appgallery.huawei.com/" target="_blank">
                                        <img src="/img/Huwaei.jpg" alt="Beeda-Download Huawei App"
                                            style={{ width: "100px", height: "35px" }}
                                        />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="card-container">
                        <img src="/img/visa.jpg" alt="Beeda-Visa Payment" />
                        <img src="/img/mastercard.png" alt="Beeda-Mastercard Payment" />
                        <img src="/img/american-express.jpg" alt="Beeda-American Express Payment" />
                        <img src="/img/maestro.jpg" alt="Beeda-Maestro Payment" />
                        <img src="/img/discover.jpg" alt="Beeda-Discover Payment" />
                        <img src="/img/paypal.jpg" alt="Beeda-Paypal Payment" />
                        <img src="/img/google-pay.jpg" alt="Beeda-Google Pay" />
                        <img src="/img/apple-pay.jpg" alt="Beeda-Apple Pay" />
                    </div>
                </div>
            </div>

            <div className="footerTopBorder"></div>
            <div className="wrapper">
                <div className="beeda-content-wrapper">
                    <div id="footerBottom">
                        <div className="row">

                            <div className="d-flex align-items-center justify-content-center">
                                <p>
                                    Copyright © Beeda Inc . All Rights Reserved.
                                    2019-2023
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    );
}
