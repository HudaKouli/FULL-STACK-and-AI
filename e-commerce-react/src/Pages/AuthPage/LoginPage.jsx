import React from "react";
import Footer from "../../Components/Layout/Footer";
import Navbar from "../../Components/Layout/Navbar";
import LogInInput from "../../Components/Input/LogInInput";

function LoginPage() {
  return (
    <div>
      <Navbar />
      <LogInInput />
      <Footer />
    </div>
  );
}

export default LoginPage;
