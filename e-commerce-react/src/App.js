import './App.css';
import Homepage from './Pages/Home';
import { BrowserRouter } from 'react-router-dom';
import { Route, Routes } from "react-router-dom";
import Notfound from './Pages/Notfound/Notfound.jsx';
import Contactus from './Pages/Contactus/Contactus.jsx';
import SignupPage from './Pages/AuthPage/SignupPage.jsx';
import LoginPage from './Pages/AuthPage/LoginPage.jsx';
import CartPage from './Pages/CartPage/CartPage.jsx';
import WishlistPage from './Pages/WishListPage/WishlistPage.jsx';
import { Toaster } from 'react-hot-toast';

function App() {
  return (
    <>
      <Toaster
        position="top-right"
        toastOptions={{
          duration: 3000,
          style: {
            background: '#333',
            color: '#fff',
          },
          success: {
            style: {
              background: 'green',
            },
          },
          error: {
            style: {
              background: 'red',
            },
          },
        }}
      />
      <BrowserRouter>
        <div>
          <Routes>
            <Route exact path="/" element={<Homepage />} />
            <Route path="/src/Pages/Contactus.jsx" element={<Contactus />} />
            <Route exact path="/LoginPage" element={<LoginPage />} />
            <Route exact path="/SignupPage" element={<SignupPage />} />
            
            <Route
              path="/src/Pages/CartPage/CartPage"
              element={<CartPage /> }
            />
            <Route
              exact
              path="/src/Pages/WishListPage/WishlistPage"
              element={<WishlistPage />
              }
            /> 
            <Route path="/Notfound/Notfound" element={<Notfound />} />
            <Route exact path="*" element={<Notfound />} />
          </Routes>
        </div>
      </BrowserRouter>
    </>
  );
}

export default App;