import React from 'react';
import DetailsBar from '../../Components/Contactus/DetailsBar';
import InputSide from '../../Components/Contactus/InputSide';
import './Contactus.css';

const ContactUs = () => {
    return (
        <div className="contact-wrapper">
            <div className="left-side">
                <DetailsBar />
            </div>
            <div className="right-side">
                <InputSide />
            </div>
        </div>
    );
};

export default ContactUs;