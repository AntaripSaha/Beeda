import React, { useEffect, useState } from 'react';
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import NavDropdown from 'react-bootstrap/NavDropdown';
import Form from 'react-bootstrap/Form';
import FormControl from 'react-bootstrap/FormControl';
import Container from 'react-bootstrap/Container';
import { Card, Button, Badge, Row, Col } from 'react-bootstrap';
import { BrowserRouter as Router, Routes, Route, Link, NavLink } from "react-router-dom";

const TermsOfService = () => {
    const [URL, setUrl] = useState("beeda-frontend/");
    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);
    const data =
        `
    <p>
    <meta charset="utf-8">
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong><h2>AGREEMENT TO TERMS</h2></strong></strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">These Terms of Service constitute a legally binding agreement between you, individually or on behalf of an entity ("you"), and BEEDA INC ("we," "us," or "our") regarding your access to and use of the&nbsp;</span></span><a style="text-decoration:none;" href="https://beeda.com/"><span style="background-color:transparent;color:#0000ff;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="-webkit-text-decoration-skip:none;font-style:normal;font-variant:normal;font-weight:400;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre-wrap;"><u>https://beeda.com/</u></span></span></a><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"> website and any other media form, media channel, mobile website or mobile application related, linked, or otherwise connected thereto (collectively the "Site").</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You acknowledge that by accessing the Site, you have read, comprehended, and consent to be bound by these whole Terms of Service. If you do not agree with these Terms of Service in their entirety, you are explicitly barred from using the Site and must immediately terminate use.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Additional terms and conditions or documents that may from time to time be posted on the Site are expressly incorporated herein by this reference. We reserve the right, at any time and for any cause, to make changes or revisions to these Terms of Service at our sole discretion.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We shall notify you of any modifications by revising the "Last updated" date in these Terms of Service, and you waive your right to obtain explicit notification of any modification.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You are responsible for frequently reviewing these Terms of Service for modifications. You will be subject to, and will be deemed to have been made aware of and to have accepted, the changes in any updated Terms of Use by continuing to use the Site after such revised Terms of Use have been posted.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">This information is not intended for distribution to or use by any individual or organization in any jurisdiction or country where such distribution or use would be contrary to law or regulation or would subject us to any registration obligation within such jurisdiction or country.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Those who access the Site from other locations do so voluntarily and are solely responsible for compliance with local laws, if and to the extent local laws are relevant.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Website is designed for users over the age of 18. All users who are minors in their home jurisdiction (usually under the age of 18) are required to have parental consent and direct supervision in order to access the Site. Prior to using the Site if you are a minor, your parent or legal guardian must read and consent to these Terms of Service.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>INTELLECTUAL PROPERTY RIGHTS</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Unless otherwise specified, the Site is our exclusive property, and all source code, databases, functionality, software, website designs, audio, video, text, photographs, and graphics on the Site (collectively, the "Content") and trademarks, service marks, and logos contained therein (the "Marks") are owned or controlled by us or licensed to us, and are protected by copyright and trademark laws as well as various other intellectual property rights and unfair competition laws.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Site provides the Content and Marks "AS IS" for your information and personal use only. No portion of the Site and no Content or Marks may be copied, reproduced, aggregated, republished, uploaded, posted, publicly displayed, encoded, translated, transmitted, distributed, licensed, or otherwise exploited for any commercial purpose whatsoever, except as expressly permitted in these Terms of Service.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You are granted a limited license to access and use the Site, as well as to download or print a copy of any portion of the Content to which you have lawfully gained access, solely for your own private, non-commercial use. This is granted as long as you are qualified to use the Site. We hold all ownership rights to the Site, the Content, and the Marks that are not otherwise explicitly granted to you.</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>USER REPRESENTATIONS</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You affirm and guarantee by using the website that:</span></span>
</p>
<ol>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You certify that any registration information you provide is true, accurate, up-to-date, and comprehensive.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You will keep such information accurate and immediately update such registration information as required;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">you agree to abide by these Terms of Use and are of legal age;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">if you are a minor, your parents have given you permission to use the Site if you are not a minor in the country in which you now reside;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You won't use a bot, script, or any other automated or non-human method to access the Site;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">you won't utilize the website for any improper or prohibited purposes;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You won't break any laws or regulations by using the Site.</span></span>
    </li>
</ol>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We reserve the right to suspend or cancel your account and prohibit any and all current or future use of the Site in the event that you provide any information that is untrue, inaccurate, out-of-date, or incomplete (or any portion thereof).&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>USER REGISTRATION</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You may be needed to create an account on the site. You agree to keep your password secure and are responsible for any activities that occur under your account and password. We reserve the right to remove, reclaim, or alter a username you choose if, in our sole discretion, we think that it is improper, offensive, or otherwise objectionable.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">&nbsp;</span></span>
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>PRODUCTS</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We make every attempt to display the colors, features, specs, and specifics of the products offered on the website as accurately as possible. However, we cannot guarantee that the colors, features, specs, and details of the products will be accurate, complete, reliable, current, or error-free, and your electronic display may not reflect the actual colors and details of the products.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We cannot guarantee the in-stock status of any item. We have the right to discontinue any product, for any reason, at any time. All product prices are subject to change.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Amazon does sell children's products, but only to adults who can pay with a credit card or other acceptable payment method. If you are under the age of 18, you may only use the Amazon Services with permission from a parent or guardian. Parents and guardians can create account profiles for their children. Amazon's alcohol listings are intended for adults. You must be at least 21 years old to purchase or use any alcohol-related site features. Amazon maintains the right, at its sole discretion, to deny service, terminate accounts, revoke your permission to use Amazon Services, remove or edit content, or cancel orders.</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>PRICING</strong></span></span>
</h1>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">"List Price" refers to the suggested retail price issued by the manufacturer, supplier, or seller for a product. We routinely compare List Prices to recent prices reported on Amazon and other stores. Certain products may display a "Was Pricing," which is calculated using the product's recent price history on Amazon.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Regarding Amazon-sold items, we cannot confirm the price until you place an order. A small number of the items in our inventory may be mispriced despite our best efforts. If an item's correct price is higher than our listed price, we shall, at our discretion, either contact you for instructions before shipment or cancel your purchase and notify you of such cancellation. In the event of a mispriced goods, other retailers may follow different practices.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We do not charge your credit card until your order has entered the delivery process or, for digital purchases, until the digital product is made available to you.</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>PURCHASES AND PAYMENT</strong></span></span>
</h1>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We accept the following payment methods: Visa, Master Card, American Express, Paypal, Beeda Pay . For any transactions made over the Site, you undertake to provide current, complete, and accurate purchase and account information. You also promise to immediately update your account and payment details, including your email address, payment method, and credit card's expiration date, so that we can complete your transactions and notify you as necessary. As needed, sales tax will be added to the price of all purchases. Prices are subject to change at any time. Every payment must be made in U.S. dollars.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You agree to pay all charges at the then-current rates for your purchases and any applicable shipping fees, and you allow us to charge your payment method for these amounts at the time you place your order.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We have the right to correct any pricing errors even if payment has already been requested or accepted.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We have the right to reject any online order. We reserve the right to limit or cancel quantities purchased per person, per household, or per order, at our sole discretion. Orders placed by or under the same customer account, with the same payment method, and/or to the same billing or shipping address may be subject to these restrictions. We have the right to limit or reject orders that appear to be placed by dealers, re-sellers, or distributors, based on our sole discretion.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>RETURN/REFUNDS POLICY</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Please review our Return Policy posted on the Site prior to making any purchases.</span><i><span style="font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>&nbsp;</strong></span></i></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>PROHIBITED ACTIVITIES</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You may not access or use the Site for any other purpose than those for which it is intended. Except for those expressly supported or allowed by us, the Site may not be utilized in connection with any commercial ventures.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-left:7.1pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You agree, as a user of the Site, not to:</span></span>
</p>
<ol>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Systematically retrieve data or other content from the Site for the purpose of creating or compiling, directly or indirectly, a collection, compilation, database, or directory without our explicit consent.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Make any unauthorized use of the Site, such as gathering usernames and/or email addresses of users using electronic or other means for the purpose of sending unsolicited email, or creating user accounts through automated means or under false pretenses.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Use a purchasing agent or buying agent to make purchases on the Site.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Utilize the Site to promote or offer to sell products or services.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Bypass, deactivate, or otherwise interfere with security-related aspects of the Site, including features that prevent or restrict the use or copying of any Content or enforce usage limitations on the Site and/or its Content.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">engage in illegal framing or linking to the Site.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Trick, defraud, or mislead us or other users, including in an attempt to obtain sensitive account information such as user passwords; make improper use of our support services; or submit fraudulent claims of misconduct or abuse.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">No automated use of the system is permitted, including the use of scripts to send comments or messages, data mining, robots, or similar data collection and extraction techniques.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Interfere with, disrupt, or impose an unreasonable load on the Website or the networks or services connected to the Website.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">attempt to assume the identity of another user or person, or use another user's username.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">sell or transfer your profile in some other way.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Use any information obtained from the Site to harass, abuse, or otherwise cause harm to another user.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You may not use the Site as part of any effort to compete with us or utilize the Site and/or Content for any other revenue-generating or commercial purpose.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You may not decrypt, decompile, disassemble, or otherwise reverse-engineer any of the software comprising or otherwise constituting any portion of the Site.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">attempt to circumvent any Site measures intended to prevent or limit access to the Site or any portion thereof.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You may not harass, irritate, intimidate, or threaten any of our employees or agents involved in supplying you with any portion of our website.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Remove the notice of copyright or other property rights from the Content.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You may not copy or modify the software on the Site, including but not limited to Flash, PHP, HTML, JavaScript, or other code.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">upload or transmit (or attempt to upload or transmit) viruses, Trojan horses, or other material, including excessive use of capital letters and spamming (continuous posting of repetitive text), that interferes with the uninterrupted use and enjoyment of the Site by any party, or that modifies, impairs, disrupts, or interferes with the use, features, functions, operation, or maintenance of the Site.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">upload or transmit (or attempt to upload or transmit) any material that acts as a passive or active information collection or transmission mechanism, including, but not limited to, clear graphics interchange formats ("gifs"), 11 pixels, web bugs, cookies, or other similar devices (sometimes known as "spyware" or "passive collection mechanisms" or "pcms").</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Use, launch, develop, or distribute any automated system, including, but not limited to, any spider, robot, cheat utility, scraper, or offline reader that accesses the Site, or use or launch any unauthorized script or other software, except as may be the result of standard search engine or Internet browser usage.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Denigrate, taint, or otherwise harm us and/or the Site, in our opinion.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Use the Website in violation of any applicable laws or regulations.</span></span>
    </li>
</ol>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>USER GENERATED CONTRIBUTIONS</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Site may invite you to participate in chat, blogs, message boards, online forums, and other features and may give you the chance to create, submit, post, display, transmit, perform, publish, distribute, or broadcast content and materials to us or on the Site, such as but not limited to text, writings, video, audio, photographs, graphics, comments, suggestions, or other material containing personal information (collectively, "Contributions").</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Other Site users and third-party websites may be able to view contributions. Any Contributions you send could therefore be considered non-confidential and non-proprietary. When you generate Contributions or make them available, you represent and warrant that:</span></span>
</p>
<ol>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Creation, distribution, transmission, public display or performance, as well as accessing, downloading, or copying of your Contributions, do not and will not violate the intellectual rights of any third party, including but not limited to copyright, patent, trademark, trade secret, or moral rights.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You are the creator and owner of your Contributions, or you have the appropriate licenses, rights, consents, releases, and permissions to use and authorize us, the Site, and other Site users to use your Contributions in any way permitted by the Site and these Terms of Service.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You have the written approval, release, and/or authorization of each and every identifiable individual in your Contributions to enable inclusion and use of your Contributions in any manner authorized by the Site and these Terms of Service.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Your Contributions are neither fake nor wrong.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Your Contributions are not unsolicited or unlawful advertising, promotional materials, pyramid schemes, chain letters, spam, or mass mailings.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Your Contributions must not be obscene, lewd, lascivious, filthy, violent, harassing, libelous, or otherwise inappropriate (as determined by us).</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Your Contributions do not mock, degrade, intimidate, or abuse anyone.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Your contributions do not advocate for the violent overthrow of any government or incite, urge, or threaten physical damage against another individual.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Your Contributions comply with all applicable laws, rules, and regulations.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">your Contributions do not breach the privacy or publicity rights of any third party.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">your Contributions do not contain any content that solicits personal information from anybody under the age of 18 or exploits anyone under the age of 18 in a sexual or violent manner.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">your Contributions do not violate any federal or state legislation prohibiting child pornography, or otherwise intended to protect the health or well-being of minors;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">your Contributions do not include any offensive comments that are connected to race, country origin, gender, sexual preference, or physical impairment.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Your Contributions do not otherwise violate any aspect of these Terms of Service or any relevant law or regulation, nor do they link to content that does.</span></span>
    </li>
</ol>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Any use of the Site in violation of the aforementioned may result in termination or suspension of your rights to use the Site.&nbsp;</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">&nbsp;</span></span>
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>CONTRIBUTION LICENSE</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You automatically grant us an unrestricted, unlimited, irrevocable, perpetual, non-exclusive, transferable, royalty-free, fully-paid, worldwide right and license to host, use, copy, reproduce, disclose, sell, resell, publish your Contributions on the Site or make them accessible to the Site by linking your account on the Site to any of your social networking accounts. You also represent and warrant that you have the right to grant this license. Any media channels and any media formats are acceptable for use and distribution.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">This license includes our use of your name, company name, and franchise name, as applicable, as well as any trademarks, service marks, trade names, logos, and personal and commercial images you supply. You renounce all moral rights to your Contributions, and you warrant that no moral rights have been asserted against them.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We make no claim to ownership of your Contributions. You retain complete ownership of all of your Contributions and associated intellectual property rights and other proprietary rights. We are not responsible for any claims or representations made in your Contributions in any area of the Site.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You are entirely responsible for your Contributions to the Site, and you expressly agree to absolve us of any liability and to refrain from bringing any legal action against us in connection with your Contributions.&nbsp;&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We reserve the right, in our sole and absolute discretion, to (1) edit, redact, or otherwise modify any Contributions; (2) re-categorize any Contributions to place them in more appropriate locations on the Site; and (3) pre-screen or delete any Contributions at any time and for any reason, without notice. We are under no responsibility to oversee your Contributions.&nbsp;</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">&nbsp;&nbsp;</span></span>
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>GUIDELINES FOR REVIEWS</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We may provide locations on the Site where you can leave comments or ratings. The following requirements must be met while publishing a review:</span></span>
</p>
<ol>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You should have direct knowledge with the individual or organization being examined;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Your reviews should not contain profanity or language that is abusive, racial, insulting, or hateful;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Your evaluations should not contain any references that are biased based on religion, ethnicity, gender, national origin, age, marital status, sexual orientation, or disability;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Your reviews should not contain unlawful activity references;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">When publishing unfavorable evaluations, you should not be linked with competitors.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You should not draw any inferences on the legality of conduct;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">you are not permitted to publish any false or misleading statements;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You are not permitted to create a campaign urging others to publish reviews, regardless of whether they are positive or negative.</span></span>
    </li>
</ol>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We have the right to approve, reject, or remove reviews at our discretion. We are under no responsibility whatsoever to moderate or remove reviews, even if someone finds them offensive or false. We do not endorse reviews, nor do they necessarily reflect our opinions or those of our affiliates or partners.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We assume no responsibility for any review or any claims, liabilities, or losses that may emerge from any review. By submitting a review, you offer us a perpetual, non-exclusive, worldwide, royalty-free, fully-paid, assignable, and sublicensable right and license to reproduce, edit, translate, transmit by any means, display, perform, and/or distribute any and all review-related content.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">&nbsp;</span><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>&nbsp;</strong></span></span>
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>MOBILE APPLICATION LICENSE</strong></span></span>
</h1>
<h2 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Use License</strong></span></span>
</h2>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If you access the Site through a mobile application, we grant you a limited, revocable, non-exclusive, and non-transferable license to install and use the mobile application on wireless electronic devices that you own or control, and to access and use the mobile application on such devices strictly in accordance with the terms and conditions of this mobile application license set forth in these Terms of Service.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You must not:</span></span>
</p>
<ol>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">decompile, reverse engineer, disassemble, or attempt to derive the application's source code;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">make any changes, adaptations, improvements, translations, or derivative works to the application;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">violate any applicable laws, rules, or regulations relating to your access to or use of the application;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">remove, modify, or conceal any proprietary notice (including notices of copyright or trademark) displayed by us or the application's licensors;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Use the application for any revenue-generating, commercial, or other unintended purpose.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">provide the application through a network or other environment that permits simultaneous access or use by numerous devices or users;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Create a product, service, or software that directly or indirectly competes with or is an alternative for the application.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Use the program to send automated queries to any website or unsolicited commercial e-mail;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Use any of our proprietary information, interfaces, or other intellectual property in the design, development, manufacturing, licensing, or distribution of apps, accessories, or devices for use with the application.</span></span>
    </li>
</ol>
<p>
    &nbsp;
</p>
<h2 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Apple and Android Devices</strong></span></span>
</h2>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">When you access the Site through a mobile application downloaded from either the Apple Store or Google Play (each a "App Distributor"), the following conditions apply:</span></span>
</p>
<ol>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The license we grant you for our mobile app is restricted to a non-transferable license to use it on a device running either the Apple iOS or Android operating systems, as appropriate, and in accordance with the usage guidelines described in the terms of service of the relevant App Distributor;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You acknowledge that each App Distributor has no obligation whatsoever to provide any maintenance and support services with respect to the mobile application, and that we are responsible for providing any such services as specified in the terms and conditions of this mobile application license contained in these Terms of Use or as otherwise required by applicable law.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If the mobile application does not meet any applicable warranty, you may contact the relevant app distributor, and that distributor may, in accordance with its terms and policies, refund any money paid for the mobile application's purchase; however, to the fullest extent permitted by applicable law, the applicable app distributor will have no other warranty obligation with respect to the mobile application;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You affirm and guarantee that you do not reside in a nation under U.S. embargo or one that the government has designated as "terrorist supporting," and that your name does not appear on any list of individuals or entities that the government has restricted or prohibited;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">When using the mobile application, you must adhere to any applicable third-party terms of agreement; for instance, if you use a VoIP application, you must not violate their wireless data service agreement;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You acknowledge and agree that the App Distributors are third-party beneficiaries of the terms and conditions in this mobile application license contained in these Terms of Use. As such, you acknowledge and agree that each App Distributor will have the right (and will be deemed to have accepted the right) to enforce the terms and conditions in this mobile application license contained in these Terms of Use against you.&nbsp;&nbsp;</span></span>
    </li>
</ol>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">&nbsp;</span></span>
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>SOCIAL MEDIA</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">As part of the functionality of the Site, you may link your account with online accounts you have with third-party service providers (each such account, a "Third-Party Account"). To do this, you can either: provide your Third-Party Account login information through the Site; or grant us access to your Third-Party Account, as permitted by the applicable terms and conditions that govern your use of each Third-Party Account.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You affirm and warrant that you have the right to provide us with your third-party account login information and/or access to your third-party account, without violating any of the rules governing your use of the relevant third-party account, without charging us any fees, and without putting any restrictions on our use of the account by the third-party service provider.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">By giving us permission to access any Third-Party Accounts, you agree that we may access, make available, and store (as appropriate) any content you have provided to and stored in your Third-Party Account (the "Social Network Content") so that it is accessible on and through the Site via your account, including without limitation any friend lists. You also agree that we may submit to and receive from your Third-Party Account additional information to the extent you are informed when we do so.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Depending on the Third-Party Accounts you choose and the privacy settings on those Third-Party Accounts, personally identifiable information that you submit to your Third-Party Accounts may be accessible on and through your account on the Site. Please be aware that if a Third-Party Account or associated service becomes unavailable, or if our access to such Third-Party Account is terminated by the third-party service provider, then Social Network Content may no longer be accessible via the Site.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You will always have the option to discontinue the link between your Site account and your Third-Party Accounts. PLEASE NOTE THAT YOUR RELATIONSHIP WITH THE THIRD-PARTY SERVICE PROVIDERS ASSOCIATED WITH YOUR THIRD-PARTY ACCOUNTS IS GOVERNED SOLELY BY THE AGREEMENT(S) YOU HAVE ENTERED INTO WITH SUCH THIRD-PARTY SERVICE PROVIDERS.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We make no effort to check any Social Network Content, including for accuracy, legality, or non-infringement, and we are not responsible for any Social Network Content. You agree that we may access your email address book associated with a Third-Party Account and your contacts list stored on your mobile device or tablet computer for the express purpose of identifying and notifying you of those contacts who have also registered to use the Site.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You may deactivate the link between the Site and your Third-Party Account by contacting us using the details shown below, or by accessing your account settings (if applicable). We will endeavor to remove any information saved on our servers that was accessed through a Third-Party Account, with the exception of your username and profile picture.</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>SUBMISSIONS</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You understand and agree that any questions, comments, suggestions, ideas, feedback, or other information you give to us on the Site ("Submissions") are non-confidential and become our sole property. We shall own all rights, including intellectual property rights, and shall be entitled to the unlimited use and dissemination of these Submissions for any lawful purpose, commercial or otherwise, without acknowledgment or payment to you.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You relinquish all moral rights to such Submissions and warrant that such Submissions are your original work or that you have the right to submit them. You agree that we shall not be liable for any alleged or actual infringement or misappropriation of any proprietary right in connection with your Submissions.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>THIRD-PARTY WEBSITES AND CONTENT</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Links to other websites ("Third-Party Websites"), as well as articles, photos, text, graphics, pictures, designs, music, sound, video, information, applications, software, and other content or items belonging to or originating from third parties, may be found on the Site or you may be sent via the Site ("Third-Party Content").</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We do not review, monitor, or check the accuracy, suitability, or completeness of any such Third-Party Websites or Third-Party Content, and we do not assume any liability or responsibility for any such Third-Party Websites or Third-Party Content that is posted on, made available through, or installed from the Site, including the accuracy, offensiveness, opinions, reliability, privacy practices, or other guidelines of or contained in the Third-Party Websites or the T</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">No approval or endorsement by us is implied by the inclusion of, linking to, or allowing the use or installation of any Third-Party Websites or any Third-Party Content. You do so at your own risk and should be aware that these Terms of Use no longer apply if you choose to exit the Site, access Third-Party Websites, or use or install any Third-Party Content.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If you visit to any website through the Site or use or install any programs from the Site, you should examine the appropriate terms and policies, including privacy and data gathering practices. We accept no liability for any transactions you make through Third-Party Websites since they are solely between you and the relevant third party. Any purchases you make through Third-Party Websites will be through other websites and from other businesses.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You accept and agree that we do not support the goods or services advertised on Third-Party Websites, and you agree to indemnify us for any damage resulting from your purchase of such goods or services. Furthermore, you agree to indemnify us from any losses you may incur or injury you may suffer connected with or resulting from any contact with third-party websites or any third-party content.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>ADVERTISERS</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">In some places of the website, such as sidebar or banner adverts, we permit advertisers to show their ads and other content. If you are an advertiser, you are entirely responsible for any advertisements you post on the website, as well as any services you offer or goods you promote.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Additionally, in your capacity as an advertiser, you warrant and represent that you have all necessary rights, including but not limited to intellectual property, publicity, and contractual rights, to post advertisements on the Site.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Advertisers acknowledge and agree that the provisions of our Digital Millennium Copyright Act ("DMCA") Notice and Policy, as described below, apply to such advertisements. Advertisers also acknowledge and agree that there will be no refunds or other forms of remuneration for DMCA takedown-related issues. We have no other interaction with advertisers other than to provide the platform for such adverts.&nbsp;&nbsp;&nbsp;</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>&nbsp;</strong></span></span>
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>SITE MANAGEMENT</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Although we are not obligated to, we reserve the right to:</span></span>
</p>
<ol>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">check the website for any violations of these terms and conditions;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">anyone who, in our sole judgement, violates the law or these Terms of Use will be subject to appropriate legal action, which may include but is not limited to reporting the offending user to police enforcement;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Any of your contributions or any portion thereof may be rejected, denied access to, limited in availability, or disabled (to the degree technologically possible) at our sole discretion;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">All files and content that are excessively large or otherwise burdensome to our systems may be removed from the Site or otherwise disabled at our sole discretion and without restriction, notification, or liability;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">otherwise take care of the Site in a way that promotes its proper operation while safeguarding our rights and property.</span></span>
    </li>
</ol>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>PRIVACY POLICY</strong></span></span>
</h1>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Data security and privacy are important to us. Please read the Site's posted Privacy Statement by clicking [HERE]. You consent to be governed by our Privacy Policy, which is incorporated into these Terms of Use, by using the Site. Please be aware that AWS is where the website is hosted.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">By continuing to use the Site, you are sending your data to AWS and you hereby give your express consent for such data to be sent to and processed in AWS if you are accessing the Site from the European Union, Asia, or any other region of the world where applicable laws regarding the collection, use, or disclosure of personal data differ from applicable laws in.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Furthermore, we do not knowingly market to children or accept, request, or solicit information from them.</span></span>
</p>
<p>
    &nbsp;
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>DIGITAL MILLENNIUM COPYRIGHT ACT (DMCA) NOTICE AND POLICY</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<h2 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Notifications</strong></span></span>
</h2>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We honor other people's rights to their intellectual property. Please immediately notify our Designated Copyright Agent using the contact information provided below (a "Notification") if you think any content on or accessible via the Site violates any copyright you are the owner of or otherwise have control over.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The individual who posted or stored the content mentioned in your notification will receive a copy of it. Please be aware that if you make serious misrepresentations in a Notification, you may be held accountable for damages under federal law. Therefore, you should think about first consulting an attorney if you are unsure if any content on the Site or one of its links violates your copyright.</span></span>
</p>
<p>
    &nbsp;
</p>
<h2 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-left:-21.6pt;margin-top:0pt;padding:0pt 0pt 0pt 21.6pt;text-align:justify;text-indent:-21.6pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Counter Notification</strong></span></span>
</h2>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You can send us/our Designated Copyright Agent a written counter notification (a "Counter Notification") if you think your own copyrighted content was taken from the Site due to an error or misidentification. The contact information is provided below.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If you send us a legitimate, written Counter Notification, we will reinstate the material that has been removed or disabled unless we first receive notification from the party who filed the Notification informing us that such party has initiated legal action to prevent you from engaging in infringement-related activity.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Please be aware that you might be held accountable for damages, including costs and attorney's fees, if you materially misrepresent that the content was disabled or removed by mistake or misidentification. Filing a false Counter Notification constitutes perjury.</span></span>
</p>
<p>
    &nbsp;
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>COPYRIGHT INFRINGEMENTS</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We honor other people's rights to their intellectual property. Please contact us straight away using the details listed below (a "Notification") if you feel that any content on or accessible via the Site violates any copyright you may have. The individual who posted or stored the content mentioned in your notification will receive a copy of it.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Please be aware that if you make serious misrepresentations in a Notification, you may be held accountable for damages under federal law. Therefore, you should think about first consulting an attorney if you are unsure if any content on the Site or one of its links violates your copyright.</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>TERM AND TERMINATION</strong></span></span>
</h1>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">While you use the Site, these Terms of Use will continue to be in full force and effect. Without limiting any other provision of these terms of use, we reserve the right to, in our sole discretion and without notice or liability, refuse access to and use of the site to anyone for any reason or for no reason at all, including without limitation for breach of any representation, warranty, or covenant contained in these terms of use or of any applicable law or regulation, including blocking specific IP addresses. In any time, without prior notice, and at our sole discretion, we may stop allowing you to use or participate in the site, or we may delete your account together with any material or information you have provided.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You are forbidden from registering and setting up a new account in the name of any third person, even if you could be acting on their behalf, even if we terminate or suspend your account for any reason.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We reserve the right to pursue appropriate legal action, including without limitation seeking civil, criminal, and injunctive remedy, in addition to canceling or suspending your account.</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>MODIFICATIONS AND INTERRUPTIONS&nbsp;</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Site's contents are subject to alteration, modification, or removal at any time and without prior notice for any reason. We are not obligated to update any material on our website, though. Additionally, we retain the right to change or stop offering the Site altogether at any time without prior notice.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Any time the Site is altered, its price is raised, it is suspended, or it is discontinued, we won't be held responsible to you or any other person.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The availability of the Site cannot be guaranteed at all times. We could encounter hardware, software, or other issues or need to carry out maintenance on the Site, which might cause disruptions, delays, or mistakes. Without providing you with prior notice, we retain the right to alter, suspend, or cancel the Site at any time and for any reason.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You acknowledge and agree that we shall not be responsible or liable in any way for any loss, harm, or inconvenience resulting from your inability to access or use the Site during any outage or discontinuation of the Site. Nothing in these Terms of Use shall be deemed to oblige us to provide any corrections, updates, or releases in connection with the Site's upkeep and support.</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>GOVERNING LAW</strong></span></span>
</h1>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>&nbsp;</strong></span></span>
</h1>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">These Terms of Use and your use of the Site are governed by and construed in accordance with the laws of Florida</span><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>&nbsp;</strong></span><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">applicable to agreements made and to be entirely performed within Florida, without regard to its conflict of law principles.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>DISPUTE RESOLUTION</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Parties agree to first attempt to negotiate any Dispute (aside from those Disputes expressly provided below) informally for at least 7 business days before commencing arbitration in order to expedite resolution and manage the costs of any dispute, controversy, or claim related to these terms of use (each a "Dispute" and collectively, the "Disputes"). Following written notification from one party to the other, such informal negotiations begin.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Except for those disputes that are specifically excluded herein, disputes between the Parties that cannot be settled via informal dialogue shall be ultimately and solely settled by binding arbitration. YOU UNDERSTAND THAT IN THE ABSENCE OF THIS PROVISION, YOU WOULD BE ENTITLED TO A JURY TRIAL AND THE RIGHT TO SUE IN COURT.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The arbitration must start and proceed in accordance with the relevant arbitration legislation.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Parties hereby agree to, and waive any defenses of lack of personal jurisdiction and forum non conveniens with respect to venue and jurisdiction in the courts in Florida, in the event that a dispute is resolved via litigation rather than arbitration. These Terms of Use do not apply to the Uniform Computer Information Transaction Act (UCITA) or the United Nations Convention on Contracts for the International Sale of Goods.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Any dispute involving the Site that is raised by any Party must never be filed more than a year after the cause of action first materialized. A court of competent jurisdiction within the courts listed for jurisdiction above will resolve any disputes falling within this provision if it is determined that any part of it is unlawful or unenforceable, and the Parties agree to submit to the personal jurisdiction of such court. If this provision is determined to be unlawful or unenforceable, neither Party will choose to arbitrate any disputes falling within that portion of this provision.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Parties concur that any arbitration will only cover the particular disputes between the Parties. There is no right or authority for any dispute to be brought in a purported representative capacity on behalf of the general public or any other individuals, and no arbitration shall be joined with any other proceeding to the fullest extent permitted by law. There is also no right or authority for any dispute to be arbitrated on a class-action basis or to use class-action procedures.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Parties concur that the following Disputes are not covered by the aforementioned clauses regarding binding arbitration and informal negotiations:</span></span>
</p>
<ol>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">any Disputes involving the enforcement, protection, or validity of a Party's intellectual property rights;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">any Conflict involving, or resulting from, claims of Theft, Piracy, Privacy Invasion, or Unauthorized Use; and</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">any demand for an injunction.&nbsp;</span></span>
    </li>
</ol>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If any part of this clause is found to be unlawful or unenforceable, neither Party will choose to arbitrate any disputes that fall under that part of the clause; instead, those disputes will be resolved by a court of competent jurisdiction, and the Parties consent to the personal jurisdiction of that court.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>&nbsp;</strong></span></span>
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>CORRECTIONS</strong></span></span>
</h1>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Site may contain typographical mistakes, inaccuracies, or omissions that may relate to the descriptions, prices, availability, or other information. We retain the right to alter or update the information on the Site at any time, without prior notice, in order to address any mistakes, inaccuracies, or omissions.</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>DISCLAIMER</strong></span></span>
</h1>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The website is made accessible "as is" and "as available." You acknowledge that using the website's services is done at your own risk. We disclaim all warranties, explicit or implicit, in relation to the site and your use of it, including, without limitation, implied warranties of merchantability, fitness for a particular purpose, and non-infringement, to the maximum extent permissible by law.&nbsp;</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We will not accept duty or responsibility for any errors or omissions in the site's material, the content of any websites connected to this one, and we make no guarantees or claims&nbsp;</span></span>
</p>
<ol>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">regarding its correctness or completeness.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">omissions, faults, or inaccuracies in the contents and content</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">any type of physical harm or material loss brought on by your use of the site or access to it,</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">any unlawful access to or use of our secure systems, including any unauthorized access to or use of any personal information, financial information,</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">if there is a halt to transmission to or from the location,</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">any bugs, viruses, trojan horses, or similar items that any third party might send to or through the website, and/or&nbsp;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">any mistakes or omissions in the materials and content, as well as for any loss or harm of any kind brought on by the use of any materials or content posted, communicated, or otherwise made accessible via the website.</span></span>
    </li>
</ol>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Any product or service advertised or offered by a third party through the website, any linked website, any website or mobile application featured in any banner ad, or in any other manner, is not warranted, endorsed, guaranteed, or assumed by us to be of any quality, and we have no involvement in, and take no responsibility for, the monitoring of, any transaction between you and any third-party suppliers of products or services. You should use caution when necessary and use your best judgment when buying a good or service, regardless of the venue or location.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">&nbsp;</span></span>
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>LIMITATIONS OF LIABILITY</strong></span></span>
</h1>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Even if we have been informed of the possibility of such damages, in no event will we or our directors, employees, or agents be liable to you or any third party for any direct, indirect, consequential, exemplary, incidental, special, or punitive damages, including lost profit, lost revenue, loss of data, or other damages arising from your use of the website. Despite anything to the contrary in this document, our liability to you for any reason and regardless of the form of the action will always be limited to the lesser of $100 or the amount you paid, if any, to us in the 12 months prior to the cause of action occurring. Limitations on implied warranties and the exclusion or restriction of certain damages are prohibited by some state laws. If these laws apply to you, some or all of the aforementioned limits or disclaimers may not be applicable to you, and you could even be entitled to more rights.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">&nbsp;</span></span>
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>INDEMNIFICATION</strong></span></span>
</h1>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You promise to protect us, our subsidiaries, affiliates, and each of our officers, agents, business partners, and staff members from and against any loss, damage, responsibility, claim, or demand made by any third party owing to or resulting from:</span></span>
</p>
<ol>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">your contributions;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">using the website;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">violates these terms and conditions;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">any violation of the promises and representations you've made in these terms of use;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">your infringement of another party's rights, particularly those related to intellectual property, or</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">any overtly detrimental behavior you display toward another site user with whom you associated there.&nbsp;</span></span>
    </li>
</ol>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Despite the aforementioned, we retain the right to assume the exclusive defense and control of any matter for which you are obligated to indemnify us, and you agree to assist us in the defense of such claims at your expense. As soon as we become aware of any such claim, action, or process that is covered by this indemnity, we shall make a reasonable effort to let you know about it.&nbsp;</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">&nbsp;</span></span>
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>USER DATA</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">For the purpose of maintaining the Site's performance, we will keep track of some of the information you send to the Site, as well as information on how you use the Site. Despite the fact that we regularly backup your data, you are solely in charge of any data you communicate or that pertains to any activity you conduct while using the Site.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You acknowledge that we are not responsible for any loss or corruption of such data, and you hereby release us from any claims you may have about such loss or corruption.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>&nbsp;</strong></span></span>
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>ELECTRONIC COMMUNICATIONS, TRANSACTIONS, AND SIGNATURES</strong></span></span>
</h1>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Electronic communications include messages sent to us via email, website visits, and online form submissions. You agree that all agreements, notices, disclosures, and other communications that we give to you electronically through email and on the Site fulfill any legal need that such communications be in writing. You also consent to receiving electronic communications from us. THE USE OF ELECTRONIC SIGNATURES, CONTRACTS, ORDERS, AND OTHER RECORDS, AS WELL AS THE ELECTRONIC DELIVERY OF NOTICES, POLICIES, AND RECORDS OF TRANSACTIONS INITIATED OR COMPLETED BY US OR VIA THE SITE, ARE HEREBY AGREEED TO BY YOU.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You hereby waive any rights or obligations you may have under any statutes, rules, regulations, ordinances, or other legislation in any area that call for an original signature, the delivery of paper documents, their storage, or the right to payment or credit by methods other than electronic ones.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>MISCELLANEOUS</strong></span></span>
</h1>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The only agreements and understandings between you and us are these Terms of Use and any other policies or operating guidelines we put on the website or in relation to the website. No right or provision of these Terms of Use shall be deemed to have been waived by our failure to exert or enforce such right or provision.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">To the largest extent permitted by law, these Terms of Use are in effect. All of our rights and duties are transferable at any time. Any loss, damage, delay, or failure to act brought on by a factor outside of our reasonable control shall not be our responsibility or liability.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If any term or portion of a term of these Terms of Use is found to be unlawful, invalid, or unenforceable, that term or portion is deemed severable from these Terms of Use and has no bearing on the legality or enforceability of any other terms that remain in place. These Terms of Use and your use of the Site do not establish any joint venture, partnership, employment relationship, or agency between you and us.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You acknowledge that the fact that we wrote these terms of use should not be used against us. You hereby waive any and all objections you may have to these Terms of Use's electronic format and the parties' failure to execute them by hand.</span></span>
</p>
<p>
    &nbsp;
</p>
<h1 style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>CONTACT US&nbsp;</strong></span></span>
</h1>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">In order to resolve a complaint regarding the Site or to receive further information regarding use of the Site, please contact us at:</span><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>&nbsp;</strong></span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Beeda Inc</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">1115 Broadway</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">New York</span></span><span style="background-color:#ffffff;color:#1d2228;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:10pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"> 10010</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">212-386-7612</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <a href="mailto:info@Beeda.com"><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">info@Beeda.com</span></span></a>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    &nbsp;
</p>

`
    return (
        <>
            <Container>
                <>
                    <Container>
                        <div
                            className="blog-text text-justify margin-top"
                            dangerouslySetInnerHTML={{ __html: data }}
                        />

                    </Container>
                </>
            </Container>
        </>
    );
}

export default TermsOfService;