import React, { useEffect, useState } from 'react';
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import NavDropdown from 'react-bootstrap/NavDropdown';
import Form from 'react-bootstrap/Form';
import FormControl from 'react-bootstrap/FormControl';
import Container from 'react-bootstrap/Container';
import { Card, Button, Badge, Row, Col } from 'react-bootstrap';
import { BrowserRouter as Router, Routes, Route, Link, NavLink } from "react-router-dom";

const RefundPolicy = () => {
  const [URL, setUrl] = useState("beeda-frontend/");
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);
  const data = `
  <p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong><h2>Beeda Return & Refund Policy</h2></strong></strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Our Return and Refund Policy was last updated&nbsp;</span></span><span style="background-color:transparent;color:#434343;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">September 18, 2022</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Thank you for shopping at&nbsp;</span></span><a style="text-decoration:none;" href="http://beeda.com/"><span style="background-color:transparent;color:#0000ff;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="-webkit-text-decoration-skip:none;font-style:normal;font-variant:normal;font-weight:400;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre-wrap;"><u>http://beeda.com/</u></span></span></a><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If, for any reason, you are not completely satisfied with a purchase We invite you to review our policy on refunds and returns.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The following terms are applicable for any products that you purchased with Us.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:4pt;margin-top:16pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Interpretation</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:4pt;margin-top:16pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Definitions</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">For the purposes of this Return and Refund Policy:</span></span>
</p>
<p>
    &nbsp;
</p>
<ul>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">“</span><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Company</strong></span><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">” (referred to as either "the Company", "We", "Us" or "Our" in this Agreement) refers to Beeda Inc</span></span>
        <br>
        <br>
        &nbsp;
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">“</span><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Goods</strong></span><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">” refers to the items offered for sale on the Service.</span></span>
        <br>
        <br>
        &nbsp;
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">“</span><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Orders</strong></span><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">” means a request by You to purchase Goods from Us.</span></span>
        <br>
        <br>
        &nbsp;
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">“</span><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Service</strong></span><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">” refers to the Website.</span></span>
        <br>
        <br>
        &nbsp;
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">“</span><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Website</strong></span><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">” refers to Beeda, accessible from&nbsp;</span></span><a style="text-decoration:none;" href="http://beeda.com/"><span style="background-color:transparent;color:#0000ff;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="-webkit-text-decoration-skip:none;font-style:normal;font-variant:normal;font-weight:400;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre-wrap;"><u>http://beeda.com/</u></span></span></a><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">&nbsp;</span></span>
        <br>
        <br>
        &nbsp;
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">“</span><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>You</strong></span><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">” means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</span></span>
    </li>
</ul>
<p style="line-height:1.3800000000000001;margin-bottom:6pt;margin-top:18pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Your Order Cancellation Rights</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You are entitled to cancel Your Order within 14 days without giving any reason for doing so.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The deadline for cancelling an Order is 14 days from the date on which You received the Goods or on which a third party you have appointed, who is not the carrier, takes possession of the product delivered.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">In order to exercise Your right of cancellation, you must inform us of your decision by means of a clear statement. You can inform us of your decision by sending us an email: info@beeda.com</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We will reimburse You no later than 14 days from the day on which We receive the returned Goods. We will use the same means of payment as You used for the Order, and You will not incur any fees for such reimbursement.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:6pt;margin-top:18pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Conditions for Returns</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">In order for the Goods to be eligible for a return, please make sure that:</span></span>
</p>
<p>
    &nbsp;
</p>
<ul>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Goods were purchased in the last 14 days</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Goods are in the original packaging</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The following Goods cannot be returned:</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The supply of Goods made to Your specifications or clearly personalized.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The supply of Goods which according to their nature are not suitable to be returned, deteriorate rapidly or where the date of expiry is over.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The supply of Goods which are not suitable for return due to health protection or hygiene reasons and were unsealed after delivery.</span></span>
    </li>
    <li style="margin-bottom:0;margin-top:0;padding-inline-start:48px;">
        <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The supply of Goods which are, after delivery, according to their nature, inseparably mixed with other items.</span></span>
    </li>
</ul>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We reserve the right to refuse returns of any merchandise that does not meet the above return conditions in our sole discretion.</span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:6pt;margin-top:18pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Returning Goods</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">You are responsible for the cost and risk of returning the Goods to us.&nbsp;</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We cannot be held responsible for Goods damaged or lost in return shipment. Therefore, we recommend an insured and trackable mail service. We are unable to issue a refund without actual receipt of the Goods or proof of received return delivery.</span></span>
</p>
<p>
    &nbsp;
</p>
<p style="line-height:1.3800000000000001;margin-bottom:6pt;margin-top:18pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>Contact Us</strong></span></span>
</p>
<p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">If you have any questions about our Returns and Refunds Policy, please contact us:</span></span>
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
<p>
    &nbsp;
</p>
<p>
    &nbsp;
</p>
  `
  return (
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
  );
}

export default RefundPolicy;