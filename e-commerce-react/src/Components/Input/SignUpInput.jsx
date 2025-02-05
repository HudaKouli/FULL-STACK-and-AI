import { useNavigate } from "react-router-dom";
import { useEffect, useState } from "react";
import toast from "react-hot-toast";
import '../Input/SignUpInput.css';

const SignUpInput = ({ dispatch, name, email, password }) => {
    const navigate = useNavigate();
    const [error, setError] = useState("");
    const [isDisabled, setIsDisabled] = useState(true);
    const [formData, setFormData] = useState({
        name: name || '',
        email: email || '',
        password: password || ''
    });

    const signUpHandler = (name, email, password) => {
        try {
            // Store user data in localStorage
            const userData = {
                name,
                email,
                password
            };
            localStorage.setItem("userData", JSON.stringify(userData));
            toast.success("Signup success!");
            navigate("/LoginPage");
        } catch (error) {
            console.error("Signup error:", error);
            toast.error("Signup failed!");
        }
    };

    const handleSubmit = (e) => {
    //to prevent reload when submitting to improve UX.

        e.preventDefault();
        signUpHandler(formData.name, formData.email, formData.password);
    };

    const handleChange = (e, type) => {
        const { value } = e.target;
        setFormData(prev => ({
            ...prev,
            [e.target.id]: value
        }));
        if (typeof dispatch === 'function') {
            dispatch({ type, payload: value });
        }
    };

    useEffect(() => {
        if (formData.name?.length > 0 && formData.email?.length > 0 && formData.password?.length > 0) {
            setError("");
            setIsDisabled(false);
        } else {
            setError("All fields must be filled.");
            setIsDisabled(true);
        }
    }, [formData]);

    return (
        <div className="signup-container">
            <div className="signup-box">
                <h1 className="signup-heading">Sign Up</h1>
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label htmlFor="name">Name</label>
                        <input
                            id="name"
                            type="text"
                            value={formData.name}
                            onChange={(e) => handleChange(e, "NAME")}
                            placeholder="Enter your name"
                            required
                        />
                    </div>
                    <div className="form-group">
                        <label htmlFor="email">Email</label>
                        <input
                            id="email"
                            type="email"
                            value={formData.email}
                            onChange={(e) => handleChange(e, "EMAIL")}
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
                            onChange={(e) => handleChange(e, "PASSWORD")}
                            placeholder="Enter your password"
                            required
                        />
                    </div>
                    {error && <p className="error-message">{error}</p>}
                    <button
                        type="submit"
                        className="signup-button"
                        disabled={isDisabled}
                    >
                        Sign Up
                    </button>
                </form>
                <p className="login-text">
                    Already have an account?{" "}
                    <button
                        className="login-link"
                        onClick={() => navigate("/LoginPage")}
                    >
                        Login
                    </button>
                </p>
            </div>
        </div>
    );
};

export default SignUpInput; 