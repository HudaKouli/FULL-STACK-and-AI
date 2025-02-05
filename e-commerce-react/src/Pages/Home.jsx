import React, { useState } from "react";
import Navbar from "../../src/Components/Layout/Navbar";
import Footer from "../../src/Components/Layout/Footer";
import ProductCard from "../../src/Components/Card/ProductCard";
import { useEffect } from "react";


const products = [
    {
      _id: "1",
      image: "https://th.bing.com/th/id/R.5facc44e9e73a26cbe48e9e9028faa9f?rik=hwaERSvCQjruDg&pid=ImgRaw&r=0",
      title: "Brush Set",
      price: 20,
      quantity: 1

    },
    {
      _id: "2",
      image: "https://th.bing.com/th/id/OIP.i_d4IptaTiPfKzsr4jYOYwHaHa?rs=1&pid=ImgDetMain",
      title: "EyeShadow Set",
      price: 200,
      quantity: 1

    },
    {
      _id: "3",
      image: "https://th.bing.com/th/id/OIP.i0DNiEY461lIKViuHXi-aAHaHa?rs=1&pid=ImgDetMain",
      title: "Concealer",
      price: 20,
      quantity: 1
    },
    {
      _id: "4",
      image: "https://static.beautytocare.com/cdn-cgi/image/width=1600,height=1600,f=auto/media/catalog/product//s/e/sensai-mascara-38-c-separating-lengthening-msl-1-black-7-5ml.jpg",
      title: "Mascara",
      price: 50,
      quantity: 1
    },
    {
      _id: "5",
      image: "https://www.haarshop.nl/media/catalog/product/cache/06ffe170b6ed0220f6f7af87ae90c8f0/r/e/red_3.jpg",
      title: "Lip Gloss",
      price: 20,
      quantity: 1
    },
    {
      _id: "6",
      image: "https://static.beautytocare.com/cdn-cgi/image/width=1600,height=1600,f=auto/media/catalog/product//g/u/guerlain-mad-eyes-intense-liquid-eyeliner-01-glossy-black-5ml_1.png",
      title: "Eyeliner",
      price: 48,
      quantity: 1
    },
    {
      _id: "7",
      image: "https://th.bing.com/th/id/OIP.EZ14DToloUUxVA4vAEaZ2wHaE8?rs=1&pid=ImgDetMain",
      title: "Cream Eyeshadow",
      price: 24,
      quantity: 1
    },
    {
      _id: "8",
      image: "https://th.bing.com/th/id/OIP.cjeKY8AVGN1oVuQjzC97-wHaFh?rs=1&pid=ImgDetMain",
      title: "Skin Care",
      price: 150,
      quantity: 1
    },
  ];

  const cart = []; // Example cart data (can be fetched from state or context)
  const wish = []; // Example wishlist data (can be fetched from state or context)
  const dispatch = () => {}; // Example dispatch function (replace with your actual dispatch function)
  const isLoggedIn = true; // Example login status (can be fetched from state or context)
  


function Homepage() {
    const [isLoggedIn, setIsLoggedIn] = useState(false);

    useEffect(() => {
        // Set initial login state and update when it changes
        const checkLoginStatus = () => {
            setIsLoggedIn(localStorage.getItem("isLoggedIn") === "true");
        };

        checkLoginStatus();
        
        // Listen for changes in localStorage
        window.addEventListener('storage', checkLoginStatus);
        
        return () => window.removeEventListener('storage', checkLoginStatus);
    }, []);



return (

<div>

<Navbar />
<ProductCard
        products={products} // Pass the array of products
        cart={cart} // Pass the cart data
        wish={wish} // Pass the wishlist data
        dispatch={dispatch} // Pass the dispatch function
        isLoggedIn={isLoggedIn} // Pass the login status
      /> <Footer />


</div>

);

}

export default Homepage;