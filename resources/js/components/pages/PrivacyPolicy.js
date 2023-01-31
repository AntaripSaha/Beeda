import React, { useEffect,useState } from 'react';
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
    useEffect(() =>{
        window.scrollTo(0, 0)
    }, [])
    return (
        <>
        <Container>
            <div className='margin-top'>
                <h1>Privacy Policy</h1>
                <p>Our Privacy Policy was last updated and posted on May 14, 2020. It governs the
                privacy terms of our website, located at http://beeda.com, sub-domains, and any
                associated web-based and mobile applications (collectively, &quot;Website&quot;), as owned and
                operated by Beeda Inc. Any capitalized terms not defined in our Privacy Policy, have
                the meaning as specified in our Terms of Service.<br></br>
                Your privacy is very important to us. Accordingly, we have developed this Policy in
                order for you to understand how we collect, use, communicate and disclose and make
                use of personal information. We use your Personal Information only for providing and
                improving the website. By using the website, you agree to the collection and use of
                information in accordance with this policy. Unless otherwise defined in this Privacy
                Policy, terms used in this Privacy Policy have the same meanings as in our Terms and
                Conditions, accessible at http://beeda.com. The following outlines our privacy policy.
                </p><br></br>
                <ul>
                    <li>
                        Before or at the time of collecting personal information, we will identify the
                        purposes for which information is being collected.
                    </li>
                    <li>
                        We will collect and use personal information solely with the objective of
                        fulfilling those purposes specified by us and for other compatible purposes,
                        unless we obtain the consent of the individual concerned or as required by law.
                    </li>
                    <li>
                        We will only retain personal information as long as necessary for the
                        fulfillment of those purposes.
                    </li>
                    <li>
                        We will collect personal information by lawful and fair means and, where
                        appropriate, with the knowledge or consent of the individual concerned.
                    </li>
                    <li>
                        Personal data should be relevant to the purposes for which it is to be used, and,
                        to the extent necessary for those purposes, should be accurate, complete, and
                        up-to-date.
                    </li>
                    <li>
                        We will protect personal information by reasonable security safeguards against
                        loss or theft, as well as unauthorized access, disclosure, copying, use or
                        modification.
                    </li>
                    <li>
                        We will make readily available to customers information about our policies and
                        practices relating to the management of personal information.
                    </li>
                </ul>
                <h3>Your Privacy</h3>
                <p>
                    Beeda Inc follows all legal requirements to protect your privacy. Our Privacy Policy is
                    a legal statement that explains how we may collect information from you, how we
                    may share your information, and how you can limit our sharing of your information.
                    We utilize the Personal Data you offer in a way that is consistent with this Personal
                    privacy Policy. If you provide Personal Data for a particular reason, we could make
                    use of the Personal Data in connection with the reason for which it was provided. For

                    example, registration info sent when developing your account, might be used to
                    suggest products to you based on past acquisitions. We might use your Personal Data
                    to offer access to services on the Website and monitor your use of such services.
                    Beeda Inc may also utilize your Personal Data and various other personally non-
                    identifiable info gathered through the Website to assist us with improving the material
                    and functionality of the Website, to much better comprehend our users, and to
                    improve our services. You will see terms in our Privacy Policy that are capitalized.
                    These terms have meanings as described in the Definitions section below.
                </p>
                <h3>Definitions</h3>
                <p>
                    "Non Personal Information" is information that is not personally identifiable to you
                    and that we automatically collect when you access our Website with a web browser. It
                    may also include publicly available information that is shared between you and others.
                    &quot;Personally Identifiable Information&quot; is non-public information that is personally
                    identifiable to you and obtained in order for us to provide you our Website. Personally
                    Identifiable Information may include information such as your name, email address,
                    and other related information that you provide to us or that we obtain about you.
                </p>
                <h3>Information We Collect</h3>
                <p>
                    Generally, you control the amount and type of information you provide to us when
                    using our Website.<br></br><br></br>
                    As a Visitor, you can browse our website to find out more about our Website. You are
                    not required to provide us with any Personally Identifiable Information as a Visitor.
                </p>
                <h3>Computer Information Collected</h3>
                <p>
                    When you use our Website, we automatically collect certain computer information by
                    the interaction of your mobile phone or web browser with our Website. Such
                    information is typically considered Non Personal Information. We also collect the
                    following:<br></br>
                </p>
                <ul>
                    <li>
                        <h4><bold>Cookies</bold></h4><br></br>
                        <p>
                            Our Website uses &quot;Cookies&quot; to identify the areas of our Website that you have
                            visited. A Cookie is a small piece of data stored on your computer or mobile
                            device by your web browser. We use Cookies to personalize the Content that
                            you see on our Website. Most web browsers can be set to disable the use of
                            Cookies. However, if you disable Cookies, you may not be able to access
                            functionality on our Website correctly or at all. We never place Personally
                            Identifiable Information in Cookies.
                        </p>
                    </li>
                    <li>
                        <h4><bold>Geographical Information</bold></h4><br></br>
                        <p>
                            When you use the mobile application, we may use GPS technology (or other
                            similar technology) to determine your current location in order to determine the
                            city you are located in and display information with relevant data or
                            advertisements. We will not share your current location with other users or
                            partners. If you do not want us to use your location for the purposes set forth
                            above, you should turn off the location services for the mobile application
                            located in your account settings or in your mobile phone settings and/or within
                            the mobile application.
                        </p>
                    </li>
                    <li>
                        <h4><bold>Automatic Information</bold></h4><br></br>
                        <p>
                            We automatically receive information from your web browser or mobile
                            device. This information includes the name of the website from which you
                            entered our Website, if any, as well as the name of the website to which you&#39;re
                            headed when you leave our website. This information also includes the IP
                            address of your computer/proxy server that you use to access the Internet, your
                            Internet Website provider name, web browser type, type of mobile device, and
                            computer operating system. We use all of this information to analyze trends
                            among our Users to help improve our Website.
                        </p>
                    </li>
                    <li>
                        <h4><bold>Log Data</bold></h4><br></br>
                        <p>
                            Like many Website operators, we collect information that your browser sends
                            whenever you visit our Website (&quot;Log Data&quot;). This Log Data may include
                            information such as your computer&#39;s Internet Protocol (&quot;IP&quot;) address, browser
                            type, browser version, the pages of our Website that you visit, the time and date
                            of your visit, the time spent on those pages and other statistics.
                        </p>
                    </li>
                </ul>
                <p>
                    Under the Child&#39;s Online Privacy Security Act, no Website operator can require, as a
                    condition to involvement in an activity, that a child younger than 13 years of age
                    divulge more details than is reasonably required. Beeda Inc abides by this demand.
                    Beeda Inc just collects information willingly offered; no information is gathered
                    passively. children under 13 can submit only their email address when sending us an
                    email in our &quot;Contact Us&quot; area. Beeda Inc makes use of the email address to respond
                    to a one-time demand from a child under 13 and afterwards deletes the email address.
                    In case Beeda Inc collects and maintains personal information relating to a child under
                    13, the parent may send out an email to us to review, alter and/or erase such info as
                    well as to decline to enable any additional collection or use of the child&#39;s information.
                </p><br></br><br></br>
                <h3>How We Use Your Information</h3><br></br>
                <p>We use the information we receive from you as follows:</p><br></br>
                <ul>
                    <li>
                        <h4><bold>Customizing Our Website</bold></h4><br></br>
                        <p>
                            We may use the Personally Identifiable information you provide to us along
                            with any computer information we receive to customize our Website.
                        </p>
                    </li>
                    <li>
                        <h4><bold>Sharing Information with Affiliates and Other Third Parties</bold></h4><br></br>
                        <p>
                            We do not sell, rent, or otherwise provide your Personally Identifiable
                            Information to third parties for marketing purposes. We may provide your
                            Personally Identifiable Information to affiliates that provide services to us with
                            regards to our Website (i.e. payment processors, Website hosting companies,
                            etc.); such affiliates will only receive information necessary to provide the
                            respective services and will be bound by confidentiality agreements limiting the
                            use of such information.
                        </p>
                    </li>
                    <li>
                        <h4><bold>Data Aggregation</bold></h4><br></br>
                        <p>
                            We retain the right to collect and use any Non Personal Information collected
                            from your use of our Website and aggregate such data for internal analytics that
                            improve our Website and Service as well as for use or resale to others. At no
                            time is your Personally Identifiable Information included in such data
                            aggregations.
                        </p>
                    </li>
                    <li>
                        <h4><bold>Legally Required Releases of Information</bold></h4><br></br>
                        <p>
                            We may be legally required to disclose your Personally Identifiable
                            Information, if such disclosure is (a) required by subpoena, law, or other legal
                            process; (b) necessary to assist law enforcement officials or government
                            enforcement agencies; (c) necessary to investigate violations of or otherwise
                            enforce our Legal Terms; (d) necessary to protect us from legal action or claims
                            from third parties including you and/or other Members; and/or (e) necessary to
                            protect the legal rights, personal/real property, or personal safety of Beeda Inc,
                            our Users, employees, and affiliates.
                        </p>
                    </li>
                </ul>
                <h3>Opt-Out</h3><br></br>
                <p>
                    We offer you the chance to &quot;opt-out&quot; from having your personally identifiable
                    information used for particular functions, when we ask you for this detail. When you
                    register for the website, if you do not want to receive any additional material or
                    notifications from us, you can show your preference on our registration form.
                </p>
                <br></br>
                <h3>Links to Other Websites</h3><br></br>
                <p>
                    Our Website may contain links to other websites that are not under our direct control.
                    These websites may have their own policies regarding privacy. We have no control of
                    or responsibility for linked websites and provide these links solely for the convenience
                    and information of our visitors. You access such linked Websites at your own risk.
                    These websites are not subject to this Privacy Policy. You should check the privacy
                    policies, if any, of those individual websites to see how the operators of those third-
                    party websites will utilize your personal information. In addition, these websites may
                    contain a link to Websites of our affiliates. The websites of our affiliates are not
                    subject to this Privacy Policy, and you should check their individual privacy policies
                    to see how the operators of such websites will utilize your personal information.
                </p><br></br>
                <h3>Security</h3><br></br>
                <p>
                    The security of your Personal Information is important to us, but remember that no
                    method of transmission over the Internet, or method of electronic storage, is 100%
                    secure. While we strive to use commercially acceptable means to protect your
                    Personal Information, we cannot guarantee its absolute security. We utilize practical
                    protection measures to safeguard against the loss, abuse, and modification of the
                    individual Data under our control. Personal Data is kept in a secured database and
                    always sent out by means of an encrypted SSL method when supported by your web
                    browser. No Web or email transmission is ever totally protected or mistake cost-free.
                    For example, email sent out to or from the Website may not be protected. You must
                    take unique care in deciding what info you send to us by means of email.
                </p><br></br>
                <h3>Privacy Policy Updates</h3><br></br>
                <p>
                    We reserve the right to modify this Privacy Policy at any time. You should review this
                    Privacy Policy frequently. If we make material changes to this policy, we may notify
                    you on our Website, by a blog post, by email, or by any method we determine. The
                    method we chose is at our sole discretion. We will also change the &quot;Last Updated&quot;
                    date at the beginning of this Privacy Policy. Any changes we make to our Privacy
                    Policy are effective as of this Last Updated date and replace any prior Privacy
                    Policies.
                </p><br></br>
                <h3>Questions About Our Privacy Practices or This Privacy Policy</h3><br></br>
                <p>
                    We are committed to conducting our business in accordance with these principles in
                    order to ensure that the confidentiality of personal information is protected and
                    maintained. If you have any questions about our Privacy Practices or this Policy,
                    please contact us.
                </p>

            </div>
        </Container>
        </>
    );
}

export default PrivacyPolicy;