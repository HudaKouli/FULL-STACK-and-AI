import { useEffect } from "react";
import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import toast from "react-hot-toast";
import '../Input/LogInInput.css';

function LogInInput() {
    const navigate = useNavigate();
    const [error, setError] = useState("");
    const [isDisabled, setIsDisabled] = useState(true);
    const [formData, setFormData] = useState({
        email: '',
        password: ''
    });

    const loginHandler = (email, password) => {
        try {
            // Get stored user data
            const userData = JSON.parse(localStorage.getItem("userData"));
            
            if (userData && userData.email === email && userData.password === password) {
                localStorage.setItem("isLoggedIn", "true");
                console.log("isLoggedIn in LogInInput:", "isLoggedIn"); // Debugging
                toast.success("Welcome!");
                navigate("/");
            } else {
                toast.error("Invalid email or password!");
            }
        } catch (error) {
            console.log(error);
            toast.error("Login failed!");
        }
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        loginHandler(formData.email, formData.password);
    };

    useEffect(() => {
        if (formData.email?.length > 0 && formData.password?.length > 0) {
            setError("");
            setIsDisabled(false);
        } else {
            setError("All fields must be filled.");
            setIsDisabled(true);
        }
    }, [formData]);

    return (
        <div className="login-container">
            <div className="login-box">
                <h1 className="login-heading">Log In</h1>
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label htmlFor="email">Email</label>
                        <input
                            id="email"
                            type="email"
                            value={formData.email}
                            onChange={(e) => setFormData(prev => ({
                                ...prev,
                                email: e.target.value
                            }))}
                            placeholder="Enter your email"
                            required
                        />
                    </div>
                    <div className="form-group">
                        <label htmlFor="password">Password</label>
                        <input
                            id="password"
                            type="password"
                            value={formData.password}
                            onChange={(e) => setFormData(prev => ({
                                ...prev,
                                password: e.target.value
                            }))}
                            placeholder="Enter your password"
                            required
                        />
                    </div>
                    {error && <p className="error-message">{error}</p>}
                    <button 
                        type="submit" 
                        className="login-button"
                        disabled={isDisabled}
                    >
                        Log In
                    </button>
                </form>
                <p className="signup-text">
                    Don't have an account?{" "}
                    <button
                        className="signup-link"
                        onClick={() => navigate("/SignupPage")}
                    >
                        Sign Up
                    </button>
                </p>
            </div>
        </div>
    );
}

export default LogInInput;
