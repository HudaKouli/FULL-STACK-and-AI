import react from "react";
import toast from "react-hot-toast";

const getCartItems = () => {
    const items = localStorage.getItem('cartItems');
    return items ? JSON.parse(items) : [];
};

export const removeFromCart = (_id, dispatch) => {
    try {
        const cartItems = getCartItems();
        const updatedCart = cartItems.filter(item => item._id !== _id);
        localStorage.setItem('cartItems', JSON.stringify(updatedCart));
        dispatch({ type: "CART", payload: updatedCart });

        toast.success("Item removed from cart!");
    } catch (error) {
        toast.error("Failed to remove from cart!");
    }
};

export const addToCart = (product, dispatch) => {


    try {
        const cartItems = getCartItems();
        const existingItem = cartItems.find(item => item._id === product._id);

        if (existingItem) {
            existingItem.quantity = (existingItem.quantity || 1) + 1;
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            dispatch({ type: "CART", payload: cartItems });
            toast.success("Item quantity updated in cart!");
            return true;
        } 
        
            const cartProduct = { 
                _id: product._id, 
                image: product.image, 
                title: product.title,
                price: product.price,
                quantity: 1 
            };
            cartItems.push(cartProduct);
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            dispatch({ type: "CART", payload: cartItems });
            toast.success("Item added to cart!");
            return true;
        
    } catch (error) {
        toast.error("Failed to add to cart!");
        return false;
    }
};


export const updateQty = (actionType, _id, dispatch) => {
    try {
        const cartItems = JSON.parse(localStorage.getItem('cartItems')) || []; // Get cart items with fallback
        const existingItem = cartItems.find(item => item._id === _id);

        if (existingItem) {
            if (actionType === 'increment') {
                existingItem.quantity += 1; // Increment quantity
            } else if (actionType === 'decrement' && existingItem.quantity > 1) {
                existingItem.quantity -= 1; // Decrement quantity (but not below 1)
            }

            localStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update localStorage
            if (dispatch) {
                dispatch({ type: "CART", payload: cartItems }); // Dispatch to update state
            }

            toast.success("Quantity updated!");
            return cartItems; // Return the updated cart items
        } else {
            toast.error("Item not found in cart!");
            return cartItems; // Return the original cart items if item is not found
        }
    } catch (error) {
        console.error("Error updating quantity:", error);
        toast.error("Failed to update quantity!");
        return []; // Return an empty array in case of error
    }
};