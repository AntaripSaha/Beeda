import React, { useEffect, useState } from 'react';
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import NavDropdown from 'react-bootstrap/NavDropdown';
import Form from 'react-bootstrap/Form';
import FormControl from 'react-bootstrap/FormControl';
import Container from 'react-bootstrap/Container';
import { Card, Button, Badge, Row, Col } from 'react-bootstrap';
import { BrowserRouter as Router, Routes, Route, Link, NavLink } from "react-router-dom";
const Disclaimer = () => {
    const [URL, setUrl] = useState("beeda-frontend/");
    useEffect(() => {
      window.scrollTo(0, 0);
    }, []);
    const data =`

    <p style="line-height:1.3800000000000001;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
    <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong><h2>Disclaimer</h2></strong></strong></span></span>
  </p><p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The information provided by Beeda (“we,” “us” or “our”) on&nbsp;</span></span><a style="text-decoration:none;" href="http://beeda.com/"><span style="background-color:transparent;color:#0563c1;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11pt;"><span style="-webkit-text-decoration-skip:none;font-style:normal;font-variant:normal;font-weight:400;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre-wrap;"><u>http://beeda.com/</u></span></span></a><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">&nbsp;</span></span><span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">(the “Site”) is for general informational purposes only. All information on the Site is provided in good faith, however we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability or completeness of any information on the Site .</span></span>
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Under no circumstance shall we have any liability to you for any loss or damage of any kind incurred as a result of the use of the site or reliance on any information provided on the site. Your use of the site and your reliance on any information on the site is solely at your own risk.&nbsp;</span></span>
</p>
<p>
  &nbsp;
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>EXTERNAL LINKS DISCLAIMER&nbsp;</strong></span></span>
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Site may contain (or you may be sent through the Site links to other websites or content belonging to or originating from third parties or links to websites and features in banners or other advertising). Such external links are not investigated, monitored, or checked for accuracy, adequacy, validity, reliability, availability or completeness by us.</span></span>
</p>
<p>
  &nbsp;
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">We do not warrant, endorse, guarantee, or assume responsibility for the accuracy or reliability of any information offered by third-party websites linked through the site or any website or feature linked in any banner or other advertising. We will not be a party to or in any way be responsible for monitoring any transaction between you and third-party providers of products or services.</span></span>
</p>
<p>
  &nbsp;
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>PROFESSIONAL DISCLAIMER&nbsp;</strong></span></span>
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Site cannot and does not contain medical/legal/fitness/health/other advice. The legal/medical/fitness/health/other information is provided for general informational and educational purposes only and is not a substitute for professional advice.</span></span>
</p>
<p>
  &nbsp;
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">Accordingly, before taking any actions based upon such information, we encourage you to consult with the appropriate professionals. We do not provide any kind of medical/legal/fitness/health/other advice. The use or reliance of any information contained on this site is solely at your own risk.</span></span>
</p>
<p>
  &nbsp;
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>AFFILIATES DISCLAIMER&nbsp;</strong></span></span>
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Site may contain links to affiliate websites, and we receive an affiliate commission for any purchases made by you on the affiliate website using such links.&nbsp;</span></span>
</p>
<p>
  &nbsp;
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;"><strong>TESTIMONIALS DISCLAIMER</strong></span></span>
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The Site may contain testimonials by users of our products and/or services. These testimonials reflect the real-life experiences and opinions of such users. However, the experiences are personal to those particular users, and may not necessarily be representative of all users of our products and/or services. We do not claim, and you should not assume, that all users will have the same experiences. Your individual results may vary.&nbsp;</span></span>
</p>
<p>
  &nbsp;
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The testimonials on the Site are submitted in various forms such as text, audio and/or video, and are reviewed by us before being posted. They appear on the Site verbatim as given by the users, except for the correction of grammar or typing errors. Some testimonials may have been shortened for the sake of brevity where the full testimonial contained extraneous information not relevant to the general public.&nbsp;</span></span>
</p>
<p>
  &nbsp;
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  <span style="background-color:transparent;color:#000000;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:12pt;"><span style="font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">The views and opinions contained in the testimonials belong solely to the individual user and do not reflect our views and opinions. We are not affiliated with users who provide testimonials, and users are not paid or otherwise compensated for their testimonials.</span></span>
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
  &nbsp;
</p>
<p style="line-height:1.7999999999999998;margin-bottom:0pt;margin-top:0pt;text-align:justify;" dir="ltr">
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
};

export default Disclaimer;