import { Link} from "react-router-dom";
import { useEffect, useState } from "react";
import Footer from "../../Components/Layout/Footer";
import Navbar from "../../Components/Layout/Navbar";
import ProductCard from "../../Components/Card/ProductCard";
import toast from "react-hot-toast";
import './CartPage.css';
import { updateQty,removeFromCart, addToCart } from "../../Sevices/CartServices";
import { addToWishlist, deleteWishList } from "../../Sevices/WishlistServices";
import { useNavigate } from 'react-router-dom';  // Make sure this import is at the top



function CartPage({  }) {
const navigate = useNavigate();
const [cart, setCart] = useState([]);
const isLoggedIn = localStorage.getItem('token') !== null;

useEffect(() => {
    const cartItems = localStorage.getItem('cartItems');
    if (cartItems) {
      setCart(JSON.parse(cartItems));
    }
  }, []);
    // Function to handle adding items to the cart
    const handleAddToCart = (productCard) => {
        const updatedCart = addToCart(productCard); // Add item to cart
        setCart(updatedCart); // Update state
        localStorage.setItem('cartItems', JSON.stringify(updatedCart)); // Update localStorage
      };
    
      // Function to handle removing items from the cart
      const handleRemoveFromCart = (productId) => {
        const currentCart = JSON.parse(localStorage.getItem('cartItems')) || [];
        const updatedCart = currentCart.filter(item => item._id !== productId);
        setCart(updatedCart);
        localStorage.setItem('cartItems', JSON.stringify(updatedCart));
      };
    
      // Function to handle updating item quantity in the cart
      const handleUpdateQty = (action, productId) => {
        const updatedCart = updateQty(action, productId) || []; // Add fallback empty array
        setCart(updatedCart); // Update state
        localStorage.setItem('cartItems', JSON.stringify(updatedCart)); // Update localStorage
 
      };
    // Function to calculate the total price for an item
    const calculateTotalPrice = (price, quantity) => {
        return (price * quantity).toFixed(2); // Ensure the price is formatted to 2 decimal places
    };
return (
<>
 <Navbar/>
 <div className="cart-container">
        {(!cart || cart.length === 0) ? (
            <div className="cart-mesg">Your cart is empty</div>
        ) : (
            <>
                <div className="cart-header">
                    <p className='products'>Products</p>
                </div>
                <div className="cart-item">
                    {cart.map(cartdata => (
                        <div key={cartdata._id}>
                            <div className="cart-item-container">
                            <div className="title">{cartdata.title}</div>
                            <div className="image"><img src={cartdata.image} alt={cartdata.title}/></div>
                            <div className="price">{calculateTotalPrice(cartdata.price, cartdata.quantity)} $</div>
                            <div className="qty">
                                <button onClick={() => handleUpdateQty("decrement", cartdata._id)}>-</button>
                                <input type="text" value={cartdata.quantity}/>
                                <button onClick={() => handleUpdateQty("increment", cartdata._id)}>+</button>
                            </div>
                            <div className="delete">
                                
                                <button onClick={() => handleRemoveFromCart(cartdata._id)}>🗑️</button>
                                </div>

                            </div>
                        </div>
                    
                    ))}
                </div>
            </>
        )}
        
        <div className="home-checkout">
        <a href="#" className="checkout-btn">Checkout</a>
        <Link to="/" className="notfound-link">
                    Back to Home

                </Link>
    
        </div>
        </div>
    

        <Footer />
</>
);
}

export default CartPage;

  