import React from 'react';
import { Link } from 'react-router-dom';
import './Notfound.css';

const Notfound = () => {
    return (
        <section className="notfound-section">
            <div className="notfound-container">
                <h1 className="notfound-heading">404</h1>
                <h2 className="notfound-subheading">Page Not Found</h2>
                <p className="notfound-text">
                    Sorry, the page you are looking for doesn't exist or has been moved.
                </p>
                <Link to="/" className="notfound-link">
                    Back to Home
                </Link>
            </div>
        </section>
    );
};

export default Notfound;