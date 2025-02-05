// import React, { useState, useEffect } from "react";
// import Footer from "../../Components/Layout/Footer";
// import Navbar from "../../Components/Layout/Navbar";
// import ProductCard from "../../Components/Card/ProductCard";
// import {useNavigate } from "react-router-dom";

// import "./Wishlist.css";

// function WishlistPage() {

import React, { useState, useEffect } from "react";
import Footer from "../../Components/Layout/Footer";
import Navbar from "../../Components/Layout/Navbar";
import ProductCard from "../../Components/Card/ProductCard";
import {useNavigate } from "react-router-dom";
import { Link} from "react-router-dom";


import "./Wishlist.css";

function WishlistPage() {
    const navigate = useNavigate();
    
    const [wishlistItems, setWishlistItems] = useState([]);
    const [isLoggedIn, setIsLoggedIn] = useState(false);
    const [cart, setCart] = useState([]); // Add cart state



    useEffect(() => {
        // Check login status when component mounts
        setIsLoggedIn(localStorage.getItem("isLoggedIn") === "true");

        // Get cart items
        const cartItems = localStorage.getItem('cartItems');
        setCart(cartItems ? JSON.parse(cartItems) : []);

        const getWishlistItems = () => {
            try {
                const items = localStorage.getItem('wishlistItems');
                setWishlistItems(items ? JSON.parse(items) : []);
            } catch (error) {
                console.error("Error fetching wishlist:", error);
                setWishlistItems([]);
            }
        };

        getWishlistItems();

        // Listen for changes in localStorage
        const handleStorageChange = (e) => {
            if (e.key === 'wishlistItems') {
                getWishlistItems();
            }
            if (e.key === 'isLoggedIn') {
                setIsLoggedIn(e.newValue === "true");
            }
            if (e.key === 'cartItems') {
                setCart(JSON.parse(e.newValue || '[]'));
            }
        };

        window.addEventListener('storage', handleStorageChange);
        return () => window.removeEventListener('storage', handleStorageChange);
    }, []);

    const dispatch = (action) => {
        if (action.type === 'cart') {
            const updatedCart = [...cart, action.payload];
            localStorage.setItem('cartItems', JSON.stringify(updatedCart));
            setCart(updatedCart);
        }
    };

    return (
        <div>
            <Navbar />
            
            {wishlistItems.length === 0 ? (
                <div className="cart-mesg">There are no items in Wishlist</div>
            ) : (
        
                <div className="wishlist-cards">
                    <ProductCard
                        products={wishlistItems}
                        isLoggedIn={isLoggedIn}
                        cart={cart}
                        wish={wishlistItems}
                        dispatch={dispatch}
                    />
                </div>
            )}

            <div className="back-home-container">
                <Link to="/" className="back-home-button">
                    Back to Home
                </Link>
            </div>

            <Footer />
        </div>
    );
}

export default WishlistPage;

