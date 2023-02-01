import React, { useEffect, useState } from 'react';
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import NavDropdown from 'react-bootstrap/NavDropdown';
import Form from 'react-bootstrap/Form';
import FormControl from 'react-bootstrap/FormControl';
import Container from 'react-bootstrap/Container';
import { Card, Button, Badge, Row, Col } from 'react-bootstrap';
import { BrowserRouter as Router, Routes, Route, Link, NavLink } from "react-router-dom";

const PrivacyPolicy = () => {
    const [URL, setUrl] = useState("beeda-frontend/");
    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);
    const data = `
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong><h2>Privacy & Policy</h2></strong></strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Beeda (“we” or “us” or “our”) respects the privacy of our users (“user” or “you”). This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website&nbsp;</span></span><a style="text-decoration:none;" href="https://beeda.com/"><span style="background-color:transparent;color:#0563c1;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11pt;"><span style="-webkit-text-decoration-skip:none;font-style:normal;font-variant:normal;font-weight:400;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre-wrap;"><u>https://beeda.com/</u></span></span></a><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">,&nbsp; including any other media form, media channel, mobile website, or mobile application related or connected thereto (collectively, the “Site”). Please read this privacy policy carefully.&nbsp; If you do not agree with the terms of this privacy policy, please do not access the site.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We reserve the right to make changes to this Privacy Policy at any time and for any reason.&nbsp; We will alert you about any changes by updating the “Last Updated” date of this Privacy Policy.&nbsp; Any changes or modifications will be effective immediately upon posting the updated Privacy Policy on the Site, and you waive the right to receive specific notice of each such change or modification.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You are encouraged to periodically review this Privacy Policy to stay informed of updates. You will be deemed to have been made aware of, will be subject to, and will be deemed to have accepted the changes in any revised Privacy Policy by your continued use of the Site after the date such revised Privacy Policy is posted.&nbsp;&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:2pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:small-caps;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>COLLECTION OF YOUR INFORMATION</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We may collect information about you in a variety of ways. The information we may collect on the Site includes:</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Personal Data&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Personally identifiable information, such as your name, shipping address, email address, and telephone number, and demographic information, such as your age, gender, hometown, and interests, that you voluntarily give to us when you register with the Site&nbsp; or when you choose to participate in various activities related to the Site, such as online chat and message boards. You are under no obligation to provide us with personal information of any kind, however your refusal to do so may prevent you from using certain features of the Site.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Derivative Data&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Information our servers automatically collect when you access the Site, such as your IP address, your browser type, your operating system, your access times, and the pages you have viewed directly before and after accessing the Site.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Financial Data&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Financial information, such as data related to your payment method (e.g. valid credit card number, card brand, expiration date) that we may collect when you purchase, order, return, exchange, or request information about our services from the Site. We store only very limited, if any, financial information that we collect. Otherwise, all financial information is stored by our payment processors, and you are encouraged to review their privacy policy and contact them directly for responses to your questions.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Data From Social Networks&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">User information from social networking sites, such as Facebook, Instagram, Twitter, including your name, your social network username, location, gender, birth date, email address, profile picture, and public data for contacts, if you connect your account to such social networks.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Mobile Device Data&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Device information, such as your mobile device ID, model, and manufacturer, and information about the location of your device, if you access the Site from a mobile device.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Third-Party Data&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Information from third parties, such as personal information or network friends, if you connect your account to the third party and grant the Site permission to access this information.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Data From Contests, Giveaways, and Surveys&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Personal and other information you may provide when entering contests or giveaways and/or responding to surveys.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:2pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:small-caps;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>USE OF YOUR INFORMATION&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Having accurate information about you permits us to provide you with a smooth, efficient, and customized experience.&nbsp; Specifically, we may use information collected about you via the Site to:&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<ul>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Create and manage your account.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Assist law enforcement and respond to subpoena.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Compile anonymous statistical data and analysis for use internally or with third parties.&nbsp;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Deliver targeted advertising, coupons, newsletters, and other information regarding promotions and the Site to you.&nbsp;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Email you regarding your account or order.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Enable user-to-user communications.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Fulfill and manage purchases, orders, payments, and other transactions related to the Site.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Generate a personal profile about you to make future visits to the Site more personalized.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Increase the efficiency and operation of the Site.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Monitor and analyze usage and trends to improve your experience with the Site.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Notify you of updates to the Site s.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Offer new products, services, and/or recommendations to you.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Perform other business activities as needed.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Prevent fraudulent transactions, monitor against theft, and protect against criminal activity.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Process payments and refunds.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Request feedback and contact you about your use of the Site.&nbsp;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Resolve disputes and troubleshoot problems.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Respond to product and customer service requests.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Send you a newsletter.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Solicit support for the Site</strong></span></span>
    </li>
</ul>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:2pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:small-caps;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>DISCLOSURE OF YOUR INFORMATION</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We may share information we have collected about you in certain situations. Your information may be disclosed as follows:&nbsp;&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>By Law or to Protect Rights&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If we believe the release of information about you is necessary to respond to legal process, to investigate or remedy potential violations of our policies, or to protect the rights, property, and safety of others, we may share your information as permitted or required by any applicable law, rule, or regulation.&nbsp; This includes exchanging information with other entities for fraud protection and credit risk reduction.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Third-Party Service Providers&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We may share your information with third parties that perform services for us or on our behalf, including payment processing, data analysis, email delivery, hosting services, customer service, and marketing assistance.&nbsp;&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Marketing Communications</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">With your consent, or with an opportunity for you to withdraw consent, we may share your information with third parties for marketing purposes, as permitted by law.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Interactions with Other Users&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If you interact with other users of the Site, those users may see your name, profile photo, and descriptions of your activity, including sending invitations to other users, chatting with other users, liking posts, following blogs.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Online Postings</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">When you post comments, contributions or other content to the Site, your posts may be viewed by all users and may be publicly distributed outside the Site in perpetuity.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Third-Party Advertisers&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We may use third-party advertising companies to serve ads when you visit the Site. These companies may use information about your visits to the Site&nbsp; and other websites that are contained in web cookies in order to provide advertisements about goods and services of interest to you.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Affiliates&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We may share your information with our affiliates, in which case we will require those affiliates to honor this Privacy Policy. Affiliates include our parent company and any subsidiaries, joint venture partners or other companies that we control or that are under common control with us.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Business Partners&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We may share your information with our business partners to offer you certain products, services or promotions.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Other Third Parties</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We may share your information with advertisers and investors for the purpose of conducting general business analysis. We may also share your information with such third parties for marketing purposes, as permitted by law.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Sale or Bankruptcy&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If we reorganize or sell all or a portion of our assets, undergo a merger, or are acquired by another entity, we may transfer your information to the successor entity.&nbsp; If we go out of business or enter bankruptcy, your information would be an asset transferred or acquired by a third party.&nbsp; You acknowledge that such transfers may occur and that the transferee may decline honor commitments we made in this Privacy Policy.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We are not responsible for the actions of third parties with whom you share personal or sensitive data, and we have no authority to manage or control third-party solicitations.&nbsp; If you no longer wish to receive correspondence, emails or other communications from third parties, you are responsible for contacting the third party directly.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:2pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:small-caps;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>TRACKING TECHNOLOGIES</strong></span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Cookies and Web Beacons</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We may use cookies, web beacons, tracking pixels, and other tracking technologies on the Site&nbsp; to help customize the Site&nbsp; and improve your experience. When you access the Site, your personal information is not collected through the use of tracking technology. Most browsers are set to accept cookies by default. You can remove or reject cookies, but be aware that such action could affect the availability and functionality of the Site&nbsp; . You may not decline web beacons. However, they can be rendered ineffective by declining all cookies or by modifying your web browser’s settings to notify you each time a cookie is tendered, permitting you to accept or decline cookies on an individual basis.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We may use cookies, web beacons, tracking pixels, and other tracking technologies on the Site&nbsp; to help customize the Site&nbsp; and improve your experience. For more information on how we use cookies, please refer to our Cookie Policy posted on the Site, which is incorporated into this Privacy Policy. By using the Site, you agree to be bound by our Cookie Policy.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Internet-Based Advertising</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Additionally, we may use third-party software to serve ads on the Site , implement email marketing campaigns, and manage other interactive marketing initiatives.&nbsp; This third-party software may use cookies or similar tracking technology to help manage and optimize your online experience with us.&nbsp; For more information about opting-out of interest-based ads, visit the&nbsp;</span></span><a style="text-decoration:none;" href="http://www.networkadvertising.org/choices/"><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="-webkit-text-decoration-skip:none;font-style:normal;font-variant:normal;font-weight:400;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre-wrap;"><u>Network Advertising Initiative Opt-Out Tool</u></span></span></a><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"> or&nbsp;</span></span><a style="text-decoration:none;" href="http://www.aboutads.info/choices/"><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="-webkit-text-decoration-skip:none;font-style:normal;font-variant:normal;font-weight:400;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre-wrap;"><u>Digital Advertising Alliance Opt-Out Tool</u></span></span></a><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Website Analytics&nbsp;</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We may also partner with selected third-party vendors, to allow tracking technologies and remarketing services on the Site&nbsp; through the use of first party cookies and third-party cookies, to, among other things, analyze and track users’ use of the Site&nbsp; , determine the popularity of certain content and better understand online activity. By accessing the Site, you consent to the collection and use of your information by these third-party vendors. You are encouraged to review their privacy policy and contact them directly for responses to your questions. We do not transfer personal information to these third-party vendors. However, if you do not want any information to be collected and used by tracking technologies, you can visit the third-party vendor or the&nbsp;</span></span><a style="text-decoration:none;" href="http://www.networkadvertising.org/choices/"><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="-webkit-text-decoration-skip:none;font-style:normal;font-variant:normal;font-weight:400;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre-wrap;"><u>Network Advertising Initiative Opt-Out Tool</u></span></span></a><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"> or&nbsp;</span></span><a style="text-decoration:none;" href="http://www.aboutads.info/choices/"><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="-webkit-text-decoration-skip:none;font-style:normal;font-variant:normal;font-weight:400;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre-wrap;"><u>Digital Advertising Alliance Opt-Out Tool</u></span></span></a><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You should be aware that getting a new computer, installing a new browser, upgrading an existing browser, or erasing or otherwise altering your browser’s cookies files may also clear certain opt-out cookies, plug-ins, or settings.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:2pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:small-caps;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>THIRD-PARTY WEBSITES</strong></span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Site may contain links to third-party websites and applications of interest, including advertisements and external services, that are not affiliated with us. Once you have used these links to leave the Site, any information you provide to these third parties is not covered by this Privacy Policy, and we cannot guarantee the safety and privacy of your information. Before visiting and providing any information to any third-party websites, you should inform yourself of the privacy policies and practices (if any) of the third party responsible for that website, and should take those steps necessary to, in your discretion, protect the privacy of your information. We are not responsible for the content or privacy and security practices and policies of any third parties, including other sites, services or applications that may be linked to or from the Site .</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:2pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:small-caps;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>SECURITY OF YOUR INFORMATION</strong></span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We use administrative, technical, and physical security measures to help protect your personal information.&nbsp; While we have taken reasonable steps to secure the personal information you provide to us, please be aware that despite our efforts, no security measures are perfect or impenetrable, and no method of data transmission can be guaranteed against any interception or other type of misuse.&nbsp; Any information disclosed online is vulnerable to interception and misuse by unauthorized parties. Therefore, we cannot guarantee complete security if you provide personal information.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:2pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:small-caps;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>POLICY FOR CHILDREN</strong></span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We do not knowingly solicit information from or market to children under the age of 18. If you become aware of any data we have collected from children under age 18, please contact us using the contact information provided below.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:2pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:small-caps;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>CONTROLS FOR DO-NOT-TRACK FEATURES&nbsp;&nbsp;</strong></span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Most web browsers and some mobile operating systems&nbsp; include a Do-Not-Track (“DNT”) feature or setting you can activate to signal your privacy preference not to have data about your online browsing activities monitored and collected.&nbsp; No uniform technology standard for recognizing and implementing DNT signals has been finalized. As such, we do not currently respond to DNT browser signals or any other mechanism that automatically communicates your choice not to be tracked online.&nbsp; If a standard for online tracking is adopted that we must follow in the future, we will inform you about that practice in a revised version of this Privacy Policy.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:2pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:small-caps;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>OPTIONS REGARDING YOUR INFORMATION</strong></span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Account Information</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You may at any time review or change the information in your account or terminate your account by:</span></span>
</p>
<ul>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Logging into your account settings and updating your account</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Contacting us using the contact information provided below</span></span>
    </li>
</ul>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Upon your request to terminate your account, we will deactivate or delete your account and information from our active databases. However, some information may be retained in our files to prevent fraud, troubleshoot problems, assist with any investigations, enforce our Terms of Use and/or comply with legal requirements.</span></span>
</p>
<p>
    &nbsp;
</p>

<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Emails and Communications</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If you no longer wish to receive correspondence, emails, or other communications from us, you may opt-out by:</span></span>
</p>
<ul>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Noting your preferences at the time you register your account with the Site&nbsp;</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Logging into your account settings and updating your preferences.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Contacting us using the contact information provided below</span></span>
    </li>
</ul>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If you no longer wish to receive correspondence, emails, or other communications from third parties, you are responsible for contacting the third party directly.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:2pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:small-caps;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>CONTACT US</strong></span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If you have questions or comments about this Privacy Policy, please contact us at:</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.2;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Beeda Inc</span></span>
</p>
<p style="line-height:1.2;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">1115 Broadway</span></span>
</p>
<p style="line-height:1.2;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">New York</span></span><span style="background-color:#ffffff;color:#1d2228;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:10pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"> 10010</span></span>
</p>
<p style="line-height:1.2;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">212-386-7612</span></span>
</p>
<p style="line-height:1.2;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">info@Beeda.com</span></span>
</p>
<p>
    &nbsp;
</p>
    `
    return (
        <>
            <Container>
                <div
                    className="blog-text text-justify margin-top"
                    dangerouslySetInnerHTML={{ __html: data }}
                />

            </Container>
        </>
    );
}

export default PrivacyPolicy;