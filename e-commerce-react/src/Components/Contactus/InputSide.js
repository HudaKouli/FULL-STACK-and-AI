import React from 'react';
import './InputSide.css';
import { useNavigate } from 'react-router-dom';

const InputSide = () => {
    const navigate = useNavigate(); // Use useNavigate instead of useHistory

    const handleSubmit = (e) => {
        e.preventDefault(); // Prevent the default form submission behavior
        navigate('/'); // Navigate to the home page
    };

    return (
        <form className="input-side-wrapper" onSubmit={handleSubmit}>
            <div className="input-wrapper">
                <p>Name</p>
                <input 
                    type="text" 
                    placeholder="Huda Kouli" 
                    className="input"
                />
            </div>
            <div className="input-wrapper">
                <p>Email</p>
                <input 
                    type="email" 
                    placeholder="hudakouli97@gmail.com" 
                    className="input"
                />
            </div>
            <div className="input-wrapper">
                <p>Phone</p>
                <input 
                    type="number" 
                    placeholder="+963956426255" 
                    className="input"
                />
            </div>
            <div className="input-wrapper">
                <p>Message</p>
                <textarea 
                    placeholder="Write your message" 
                    className="message-input"
                ></textarea>
            </div>

            <input 
                type="submit" 
                value="Send Message" 
                className="submit-button"
            />
        </form>
    );
};

export default InputSide;