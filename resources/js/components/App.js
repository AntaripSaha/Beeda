import React, { Component } from "react";
import { Container } from "react-bootstrap";
import ReactDOM from "react-dom";
import {
    BrowserRouter as Router,
    Routes,
    Route,
    Link,
    NavLink,
} from "react-router-dom";
import Footer from "./layouts/Footer";
import Header from "./layouts/Header";
import AboutUs from "./pages/AboutUs";
import Contact from "./pages/Contact";
import Home from "./pages/Home";
import BeedaAds from "./pages/BeedaAds";
import BeedaPay from "./pages/BeedaPay";
import DataSecurity from "./pages/DataSecurity";
import DriversCentre from "./pages/DriversCentre";
import FraudPrevention from "./pages/FraudPrevention";
import HowItWorks from "./pages/HowItWorks";
import InvestorRelation from "./pages/InvestorRelation";
import Jobs from "./pages/Jobs";
import Locations from "./pages/Locations";
import MoreFeatures from "./pages/MoreFeatures";
import PartnerWithUs from "./pages/PartnerWithUs";
import PressReleases from "./pages/PressReleases";
import PrivacyPolicy from "./pages/PrivacyPolicy";
import RefundPolicy from "./pages/RefundPolicy";
import Sustainability from "./pages/Sustainability";
import TermsOfUse from "./pages/TermsOfUse";
import TrustAndSafety from "./pages/TrustAndSafety";
import { PUBLIC_URL } from "../constant";
import TermsOfService from "./pages/TermsOfService";
import OtherFooter from "./layouts/OtherFooter";
import OtherHeader from "./layouts/OtherHeader";
import Blog from "./pages/Blog/index";
import Details from "./pages/Blog/Details";
import RideShare from "./pages/RideShare";

class App extends Component {
    render() {
        return (
            <Router>
                {/* <Header /> */}
                <OtherHeader />
                {/* <Container> */}
                <Routes>
                    <>
                        <Route
                            exact
                            path={`about-us`}
                            element={
                                <>
                                    {" "}
                                    <AboutUs />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`blogs`}
                            element={
                                <>
                                    <Blog />
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`blogs-details`}
                            element={
                                <>
                                    <Details />
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`contact-us`}
                            element={
                                <>
                                    {" "}
                                    <Contact />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`ride-share`}
                            element={
                                <>
                                    {" "}
                                    <RideShare />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={``}
                            element={
                                <>
                                    {" "}
                                    <Home />{" "}
                                </>
                            }
                        ></Route>

                        <Route
                            exact
                            path={`beeda-ads`}
                            element={
                                <>
                                    {" "}
                                    <BeedaAds />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`beeda-pay`}
                            element={
                                <>
                                    {" "}
                                    <BeedaPay />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`data-security`}
                            element={
                                <>
                                    {" "}
                                    <DataSecurity />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`drivers-centre`}
                            element={
                                <>
                                    {" "}
                                    <DriversCentre />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`fraud-prevention`}
                            element={
                                <>
                                    {" "}
                                    <FraudPrevention />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`how-it-works`}
                            element={
                                <>
                                    {" "}
                                    <HowItWorks />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`investor-relation`}
                            element={
                                <>
                                    {" "}
                                    <InvestorRelation />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`jobs`}
                            element={
                                <>
                                    {" "}
                                    <Jobs />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`locations`}
                            element={
                                <>
                                    {" "}
                                    <Locations />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`more-features`}
                            element={
                                <>
                                    {" "}
                                    <MoreFeatures />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`partner-with-us`}
                            element={
                                <>
                                    {" "}
                                    <PartnerWithUs />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`press-releases`}
                            element={
                                <>
                                    {" "}
                                    <PressReleases />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`privacy-policy`}
                            element={
                                <>
                                    {" "}
                                    <PrivacyPolicy />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`refund-policy`}
                            element={
                                <>
                                    {" "}
                                    <RefundPolicy />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`sustainability`}
                            element={
                                <>
                                    {" "}
                                    <Sustainability />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`terms-of-use`}
                            element={
                                <>
                                    {" "}
                                    <TermsOfUse />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`terms-of-service`}
                            element={
                                <>
                                    {" "}
                                    <TermsOfService />{" "}
                                </>
                            }
                        ></Route>
                        <Route
                            exact
                            path={`trust-and-safety`}
                            element={
                                <>
                                    {" "}
                                    <TrustAndSafety />{" "}
                                </>
                            }
                        ></Route>
                    </>
                </Routes>
                {/* </Container> */}

                {/* <Footer /> */}
                <OtherFooter />
            </Router>
        );
    }
}

export default App;

if (document.getElementById("app")) {
    ReactDOM.render(<App />, document.getElementById("app"));
}
