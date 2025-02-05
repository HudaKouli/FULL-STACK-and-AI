import React from "react";
import { useNavigate } from "react-router-dom";
import './Footer.css';

function Footer() {
    const navigate = useNavigate();

    const handleContactClick = () => {
        navigate('/src/Pages/Contactus.jsx');
    };

    return (
        <footer className="footerpos">
            <button 
                className="button btn btn-success" 
                onClick={handleContactClick}
            >
                Contact Us
            </button>
            <p className='paragraph'>© 2025 makeUp addict</p>
            <div className='links'>
                <a href="https://linkedin.com/in/huda-kouli/" target="_blank" rel="noopener noreferrer">
                    <img 
                        className="logo_image" 
                        src="https://th.bing.com/th/id/R.c1a3ad44057df610974c24bf46f6cae9?rik=7Zgn6mq2vYvoGA&pid=ImgRaw&r=0" 
                        alt='linkedin' 
                        loading="lazy"
                    />
                </a>
                <a href="https://github.com/HudaKouli" target="_blank" rel="noopener noreferrer">
                    <img 
                        className='logo_image' 
                        src="https://th.bing.com/th/id/R.7a864f07681f187fb572468bfc949977?rik=3fUik6Pc6xTrHQ&pid=ImgRaw&r=0" 
                        alt='github' 
                        loading="lazy"
                    />
                </a>
            </div>  
        </footer>
    );
}

export default Footer;