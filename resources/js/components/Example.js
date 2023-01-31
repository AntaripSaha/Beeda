import React from 'react';
import ReactDOM from 'react-dom';

function Example() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component test 2</div>

                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
// import React, { Component } from 'react';
// import { Container } from 'react-bootstrap';
// import ReactDOM from 'react-dom';
// import { BrowserRouter as Router, Routes, Route, Link, NavLink } from "react-router-dom";
// // import Footer from './layouts/Footer';
// import Header from './layouts/Header';
// // import About from './pages/About';
// // import Home from './pages/Home';
// // import ProjectList from './pages/project/ProjectList';
// // import { PUBLIC_URL } from '../constants';
// // import ProjectCreate from './pages/project/ProjectCreate';
// // import ProjectView from './pages/project/ProjectView';

// class Example extends Component {
//     render() {
//         return (
//             <Router>
//                 <Header />
//                 <Container className="p-4">

//                     <Footer />
//                 </Container>


//             </Router >
//         );
//     }
// }



// export default Example;

// if (document.getElementById('example')) {
//     ReactDOM.render(<Example />, document.getElementById('example'));
// }
