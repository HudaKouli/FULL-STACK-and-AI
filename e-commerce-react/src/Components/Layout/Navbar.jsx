import React from "react";
import { Link } from "react-router-dom";
import './Navbar.css';

function Navbar() {
    const token = window.localStorage.getItem("token");

// const { dispatch } = useFilterContext();

    return (
        <nav className="navigation-menu navColor navpos">
            <div className="navigation__left">
                <Link to="/Notfound/Notfound">
                    <span className='span-color'>MAKEUP-KIT</span>
                </Link>

            </div>
            <div className="navigation__right">   
                <div className="navbadge">
                <Link to="/src/Pages/WishListPage/WishlistPage">

                    <span className="material-icons navigationmi">favorite</span>
                    </Link>

                    {/* <span className="nav__number-badge">5</span> */}
                </div>
                <div className="navbadge">
                <Link to="/src/Pages/CartPage/CartPage">
                    <span className="material-icons navigationmi">shopping_cart</span>
                    </Link>
    
                    {/* <span className="nav__number-badge">5</span> */}
                </div>

                {!token ? (
                    <Link to="/LoginPage">
                        <span className="material-icons navigationmi">login</span>
                    </Link>
                ) : (
                    <Link to="/SignupPage">
                        <span className="material-icons navigationmi">account_circle</span>
                    </Link>
                )}
            </div>
        </nav>
    );
}

export default Navbar;
