import React from 'react';
import * as Icon from 'react-feather';
import './DetailsBar.css';

const DetailsBar = () => {
    return (
        <div className="details-bar-wrapper">
            <div className="text-wrapper">
                <p className="text-one">Contact Information</p>
                <p className="text-two">Fill up the form and our team will get back to you within 24 hours</p>
            </div>
            <div>
                <a className="contacts-wrapper" href="tel:+963956426255">
                    <Icon.Phone size={15} color="rgb(252, 113, 137)" />
                    <div className="contact-text">+963956426255</div>
                </a>

                <a className="contacts-wrapper" href="hudakouli97@gmail.com">
                    <Icon.Mail size={15} color="rgb(252, 113, 137)" />
                    <div className="contact-text">hudakouli97@gmail.com</div>
                </a>
            </div>

            <div>
                <div className="big-circle"></div>
                <div className="small-circle"></div>
            </div>

            <div className="socials-wrapper">
                <a className="social-icon-wrapper" href="https://www.facebook.com/huda.kouli">
                    <Icon.Facebook color="#fff" size={20} />
                </a>
                <a className="social-icon-wrapper" href="https://www.instagram.com/huda_kouli/">
                    <Icon.Instagram color="#fff" size={20} />
                </a>
                <a className="social-icon-wrapper" href="https://www.linkedin.com/in/huda-kouli">
                    <Icon.Linkedin color="#fff" size={20} />
                </a>
            </div>
        </div>
    );
};

export default DetailsBar;