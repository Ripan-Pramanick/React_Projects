import { StrictMode } from "react";
import { createRoot } from "react-dom/client";

// Styles and Components imports
import "./index.css";
import Layout from "./layout.jsx";
import Home from "/src/components/Home/Home.jsx";
import About from "/src/components/AboutUs/AboutUs.jsx";
import Contact from "/src/components/ContectUs/ContectUs.jsx";
import User from "/src/components/User/User.jsx";
import Github from "/src/Github/Github.jsx";


// React Router imports
import { createBrowserRouter, createRoutesFromElements, Route, RouterProvider } from "react-router-dom";
import { loader } from "./Github/Loader.js";

// Router Configuration
// const router = createBrowserRouter([
//   {
//     path: "/",
//     element: <Layout />,
//     children: [
//       {
//         path: "/",
//         element: <Home />,
//       },
//       {
//         path: "/about",
//         element: <About />,
//       },
//       {
//         path: "/contact",
//         element: <Contact />,
//       },
//     ],
//   },
// ]);

// Using createRoutesFromElements
const router = createBrowserRouter(
  createRoutesFromElements(
    <Route path='/' element={<Layout />}>
      <Route path='/' element={<Home />} />
      <Route path='about' element={<About />} />
      <Route path='contact' element={<Contact />} />
      <Route path='user/:id' element={<User />} />
      <Route 
      loader={loader}
      path='github' 
      element={<Github />} />
    </Route>
  )
);
  

createRoot(document.getElementById("root")).render(
  <StrictMode>
    <RouterProvider router={router} />
  </StrictMode>,
);
