import React from "react";
import './ProductCard.css';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import Slider from "react-slick";
import { useNavigate } from "react-router-dom";
import toast from "react-hot-toast";

import { addToWishlist, deleteWishList } from "../../Sevices/WishlistServices";
import { addToCart, removeFromCart } from "../../Sevices/CartServices";

const ProductCard = ({ products = [], cart = [], wish = [], dispatch, isLoggedIn }) => {
  const navigate = useNavigate();

  const token = localStorage.getItem("token");

  const settings = {
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  };

  return (
    <div className="card">
      <Slider {...settings}>
        {products.map((product) => (
          <div key={product._id} className="container">
            <img className="image" src={product.image} alt={product.title} />
            <button className="btn btn-success-outline stock">IN STOCK</button>
            <h2>{product.title}</h2>
            <div className="star">
              <h3 className="price">
                <b>${product.price}</b>
              </h3>
              <div className="stars">
                <span className="fa fa-star checked"></span>
                <span className="fa fa-star checked"></span>
                <span className="fa fa-star checked"></span>
                <span className="fa fa-star checked"></span>
                <span className="fa fa-star"></span>
              </div>
            </div>

            <div className="flex flex-col justify-center items-center p-4 buttons">
              {cart.some((prod) => prod._id === product._id) ? (
                <button
                  className="button btn btn-primary icon cart"
                  onClick={() => removeFromCart(product._id, dispatch)}
                >
                  CART- <span className="material-icons">remove_shopping_cart</span>
                </button>
              ) : (
                <button
                  className="button btn btn-primary icon cart"
                  onClick={() => addToCart(product, dispatch)}
                >
                  CART+ <span className="material-icons">shopping_cart</span>
                </button>
              )}

              {wish.some((wishlist) => wishlist._id === product._id) ? (
                <button
                  className="button btn btn-success icon wishlist"
                  onClick={() => deleteWishList(product._id, dispatch, isLoggedIn)}
                >
                  WISHLIST- <span className="material-icons">favorite</span>
                </button>
              ) : (
                <button
                  className="button btn btn-success icon wishlist"
                  onClick={() => addToWishlist(product, dispatch, isLoggedIn)}
                >
                  WISHLIST+ <span className="material-icons">favorite_border</span>
                </button>
              )}
            </div>
          </div>
        ))}
      </Slider>
    </div>
  );
};

export default ProductCard;