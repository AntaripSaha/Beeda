import { auto } from "@popperjs/core";
import React, { useState } from "react";
import BeedaIcon from "../../../img/Frame.png";
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
export default function OtherFooter() {
    const [hoverFb, setHoverFb]=useState(false)
    const [hoverInsta, setHoverInsta]=useState(false)
    const [hoverIn, setHoverIn]=useState(false)
    const [hoverTwe, setHoverTwe]=useState(false)
    const [hoveryou, setHoverYou]=useState(false)
    return (
        <footer id="footer">
            <div className="wrapper">
                <div id="footerTop">
                    <div className="container-fluid p-0">
                        <div className="row">
                        <div className="col-12 col-lg-4 p-3">
                                <img
                                    src="/img/about-us/Frame.png"
                                    alt="beeda icon"
                                    className=""
                                />
                        </div>
                            <div className="col-12 col-lg-8 d-flex align-items-center">
                                <div className="footerTopInput">
                                    <p>Newsletter Signup</p>
                                    <div className="position-relative d-flex align-items-center w-100">
                                        <input
                                            type="text"
                                            placeholder="Enter your email Address"
                                        />
                                        <button className="footerTopButton">
                                            <span className="footerTopButton_text">
                                                Subscribe
                                            </span>
                                            <img
                                                src="/img/send.svg"
                                                alt="send"
                                            />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* <div className="w-100 py-3">
                    <img
                        src={BeedaIcon}
                        alt="beeda icon"
                        className="footer_icon"
                    />
                </div>
                <div className="w-100">
                    <div className="footerTopInput">
                        <p>Newsletter Signup</p>
                        <div className="position-relative d-flex align-items-center w-100">
                            <input
                                type="text"
                                placeholder="Enter your email Address"
                            />
                            <button className="footerTopButton">
                                Subscribe
                                <img
                                    src="/img/send.svg"
                                    alt="send"
                                    className="ml-3"
                                />
                            </button>
                        </div>
                    </div>
                </div> */}
                </div>
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
                                    Services
                                </li>
                                <li className="list-group-item">
                                <NavLink to={`blogs`}>Blog</NavLink>
                                </li>
                                <li className="list-group-item">
                                    FAQ's
                                </li>
                                
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
                                <li className="list-group-item">
                                    Fraud Prevention
                                </li>
                            </ul>
                        </div>
                        <div className="col-6 col-lg-2">
                            <h3>Quick Links</h3>
                            <ul className="list-group list-group-flush">
                                <li className="list-group-item">
                                    Join as Driver
                                </li>
                                <li className="list-group-item">
                                    Join as Merchant 
                                </li>
                                <li className="list-group-item">
                                    Join as Employee
                                </li>
                                <li className="list-group-item">
                                    How it works
                                </li>
                                <li className="list-group-item">
                                    Help Center
                                </li>
                            </ul>
                        </div>
                        <div className="col-12 col-lg-3">
                            <h3>Contact us</h3>
                            <div className="d-flex align-items-start ">
                             <div>
                              <img src="/img/LOCATION_ICON_1.svg" alt="" className="mr-3"/> 
                             </div>
                             <div>
                             <p>
                              <address className="text-white" style={{marginTop: "-5px"}}>
                              1115 Broadway 16 Madison Square West, New York, United States.
                              </address>
                            </p>
                             </div>
                            <div>
                            
                            </div>
                            </div>
                            <ul className="list-group list-group-flush">
                       
                            <li className="list-group-item" style={{marginTop: "-20px"}}>
                                    <img
                                        src="/img/clarity_chat-bubble-outline-badged.svg"
                                        alt="chat"
                                    />
                                    <p>
                                        Start a{" "}
                                        <span className="highLight">
                                            Live Chat
                                        </span>
                                    </p>
                            </li>
                           
                            <li className="list-group-item">
                                    <img src="/img/mail.svg" alt="chat" />
                                    <p>
                                        support
                                        <span className="highLight">
                                         @beeda.com
                                        </span>
                                    </p>
                            </li>
                            <li>    
                            <a href="https://www.facebook.com/BeedaMegaApp"
                                                onMouseEnter={() => setHoverFb(true)}
                                                onMouseLeave={() => setHoverFb(false)}
                                                className="rounded mr-2"
                                                style={{
                                                backgroundColor: hoverFb? '#061880' : '#3B5998',
                                                cursor: 'pointer',
                                                color: 'inherit',
                                                }}>
                                            <BsFacebook color='#FFFFFF' className="p-2" size="36"/>
                                        </a>
                                        <a href="https://www.instagram.com/beedamegaapp/"
                                                onMouseEnter={() => setHoverInsta(true)}
                                                onMouseLeave={() => setHoverInsta(false)}
                                                className="rounded mr-2"
                                                style={{
                                                backgroundColor: hoverInsta? '#061880' : '#C13584',
                                                cursor: 'pointer',
                                                color: 'inherit',
                                                }}>
                                            <AiFillInstagram color='#FFFFFF' className="p-2" size="36"/>
                                        </a>
                                        <a href="https://www.linkedin.com/company/beeda/"
                                                onMouseEnter={() => setHoverIn(true)}
                                                onMouseLeave={() => setHoverIn(false)}
                                                className="rounded mr-2"
                                                style={{
                                                backgroundColor: hoverIn? '#061880' : '#0072B1',
                                                cursor: 'pointer',
                                                color: 'inherit',
                                                }}>
                                            <AiFillLinkedin color='#FFFFFF' className="p-2" size="36"/>
                                        </a>
                                        <a href="https://twitter.com/BeedamegaApp"
                                                onMouseEnter={() => setHoverTwe(true)}
                                                onMouseLeave={() => setHoverTwe(false)}
                                                className="rounded mr-2"
                                                style={{
                                                backgroundColor: hoverTwe? '#061880' : '#00ACEE',
                                                cursor: 'pointer',
                                                color: 'inherit',
                                                }}>
                                            <AiOutlineTwitter color='#FFFFFF' className="p-2" size="36"/>
                                        </a>
                                        <a href="https://www.youtube.com/@beedamegaapp"
                                                onMouseEnter={() => setHoverYou(true)}
                                                onMouseLeave={() => setHoverYou(false)}
                                                className="rounded"
                                                style={{
                                                backgroundColor: hoveryou? '#061880' : '#FF0000',
                                                cursor: 'pointer',
                                                color: 'inherit',
                                                }}>
                                            <AiFillYoutube color='#FFFFFF' className="p-2" size="36"/>
                                        </a>   
                            </li>
                            </ul>
                        </div>
                        <div className="col-6 col-lg-3 m-auto m-lg-0">
                            <div className="qrCode d-none  d-md-flex justify-content-center">
                                <div className="qrContainer">
                                        <img
                                            src="/img/qr_1.png"
                                            alt="qr-code"
                                        />
                                    </div>
                            </div>
                            <div className="storeBtn">
                                <div className="d-flex align-content-center gap-2">
                                <a href="https://apps.apple.com/us/app/beeda/id1641292802" target="_blank">
                                    <img
                                        src="/img/Apple Store.jpg"
                                        alt="apply store"
                                        style={{width:"100px", height:"35px"}}
                                    />
                                    </a>
                                    <a href="https://play.google.com/store/apps/details?id=com.beeda.user" target="_blank">
                                                        <img
                                                            src="/img/Google play.jpg"
                                                            alt="google store"
                                                            className="googleStoreImg"
                                                            style={{width:"100px", height:"35px"}}
                                                        />
                                    </a>
                                     <a href="https://appgallery.huawei.com/" target="_blank">
                                    <img src="/img/Huwaei.jpg" alt="huwaei" 
                                    style={{width:"100px", height:"35px"}} 
                                    />
                                    </a>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div className="card-container">
                                <img src="/img/visa.jpg" alt="mastercard" />
                                <img src="/img/mastercard.png" alt="mastercard" />
                                <img src="/img/american-express.jpg" alt="mastercard" />
                                <img src="/img/maestro.jpg" alt="mastercard" />
                                <img src="/img/discover.jpg" alt="mastercard" />
                                <img src="/img/paypal.jpg" alt="mastercard" />
                                <img src="/img/google-pay.jpg" alt="mastercard" />
                                <img src="/img/apple-pay.jpg" alt="mastercard" />
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>

            <div className="footerTopBorder"></div>
            <div className="wrapper">
                <div className="beeda-content-wrapper">
                    <div id="footerBottom">
                        <div className="row">
                          
                            <div className="col-md-6 d-flex align-items-center justify-content-center justify-content-lg-start">
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
