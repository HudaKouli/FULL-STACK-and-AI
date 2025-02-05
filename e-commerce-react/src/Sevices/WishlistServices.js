
import react from "react";
import toast from "react-hot-toast";

const getWishlistItems = () => {
    const items = localStorage.getItem('wishlistItems');
    return items ? JSON.parse(items) : [];
};

export const addToWishlist = (product, dispatch, isLoggedIn) => {
    console.log("isLoggedIn:", isLoggedIn); // Debugging

    if (!isLoggedIn) {
        toast.error("Please login first!");
        return false; // Return false to indicate login needed
    }

    try {
        const wishlistItems = getWishlistItems();
        const existingItem = wishlistItems.find(item => item._id === product._id);

        if (existingItem) {
            toast.error("Item already in wishlist!");
            return true;
        }

        const wishlistProduct = { 
            _id: product._id, 
            image: product.image, 
            title: product.title,
            price: product.price
        };
        
        wishlistItems.push(wishlistProduct);
        localStorage.setItem('wishlistItems', JSON.stringify(wishlistItems));
        dispatch({ type: "WISH", payload: wishlistItems });

        toast.success("Item added to wishlist!");
        return true;
    } catch (error) {
        toast.error("Failed to add to wishlist!");
        return false;
    }
};

export const deleteWishList = (productId, dispatch, isLoggedIn) => {
    console.log("isLoggedIn:", isLoggedIn); // Debugging

    if (!isLoggedIn) {
        toast.error("Please login first!");
        return false;
    }

    try {
        const wishlistItems = getWishlistItems();
        const updatedWishlist = wishlistItems.filter(item => item._id !== productId);
        localStorage.setItem('wishlistItems', JSON.stringify(updatedWishlist));
        dispatch({ type: "WISH", payload: updatedWishlist });

        toast.success("Item removed from wishlist!");
        return true;
    } catch (error) {
        toast.error("Failed to remove from wishlist!");
        return false;
    }
};
