import React, { useState } from "react";
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";
import NavDropdown from "react-bootstrap/NavDropdown";
import Form from "react-bootstrap/Form";
import FormControl from "react-bootstrap/FormControl";
import Container from "react-bootstrap/Container";
import { Card, Button, Badge, Row, Col } from "react-bootstrap";
import BeedaIcon from "../../../img/beeda-icon.svg";
import Image1 from "../../../img/image 196.png";
import Image2 from "../../../img/image 196 (1).png";
import Image3 from "../../../img/image 198.png";
import Image4 from "../../../img/image 203.png";
import Vector1 from "../../../img/Vector (1).png";
import Vector2 from "../../../img/Vector (2).png";
import Torus1 from "../../../img/Torus.png";
import Torus2 from "../../../img/Torus2.png";
import Torus3 from "../../../img/Torus3.png";
import happy from "../../../img/happy.png";
import AboutStyle from "../../../css/aboutUs.module.css";
import {
    BrowserRouter as Router,
    Routes,
    Route,
    Link,
    NavLink,
} from "react-router-dom";
import { CDN_URL } from "../../constant";

const Chats = () => {
    const [URL, setUrl] = useState("beeda-frontend/");
    return (
        <>
            <div className="container-fluid">
                <div className="row">
                    <div className="col-11 m-auto">
                        <div id="whoWeAre">
                            <h2>Who are we?</h2>
                            <p>
                                Dictumst nunc tempus sed platea sodales blandit
                                aenean suscipit. Purus est consectetur eget
                                feugiat tempus. Dis malesuada felis integer
                                massa tortor quam lobortis. Massa interdum eget
                                feugiat elementum. Consectetur varius vel et
                                luctus lacus nec. Praesent quis nulla gravida
                                adipiscing faucibus diam dolor egestas tellus.
                                In ornare mauris cursus viverra ridiculus enim
                                vulputate. Nibh vivamus mauris eu sit praesent.
                                Sollicitudin mi blandit laoreet aliquam enim in
                                eget aliquam. Orci risus tempus donec convallis
                                arcu purus lobortis condimentum. Dignissim a cum
                                consequat gravida nulla. Amet vel tincidunt cum
                                volutpat sed. Sapien placerat sit quis ultricies
                                ut sapien nibh dignissim quis. Dignissim sit ac
                                non donec. Proin pellentesque molestie faucibus
                                ultricies enim facilisi. Fringilla ut pretium
                                integer rhoncus mauris dui lacus metus at.
                                Consectetur lectus ut bibendum faucibus senectus
                                urna lorem. Aliquet lobortis maecenas proin amet
                                dignissim elementum morbi. Augue iaculis
                                imperdiet dignissim diam feugiat. Duis urna
                                tristique faucibus purus pulvinar ridiculus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
        </>
    );
};

export default Chats;
