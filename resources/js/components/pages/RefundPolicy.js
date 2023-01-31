import React, { useState } from 'react';
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
    return (
        <>
        <Container><h1>RefundPolicy</h1></Container>
        </>
    );
}

export default RefundPolicy;