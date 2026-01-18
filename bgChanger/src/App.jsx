
import { useState } from "react";

function App() {

  const [bgColor, setBgColor] = useState("olive");

  return (
    <>
      <div className="w-full h-screen duration-200" style={{backgroundColor: bgColor}}></div>

      <div className="fixed flex flex-wrap w-full justify-center bottom-12 inset-x-0 px-2">
        <div className="flex flex-wrap justify-center gap-3 shadow-lg bg-white px-3 py-2 rounded-3xl">
          <button
            className="outline-none px-4 py-1 rounded-full text-white shadow-lg"
            style={{ backgroundColor: "red" }}
            onClick={() => setBgColor("red")}
          >
            Red
          </button>
          <button
            onClick={() => {setBgColor("green"); 
              console.log("Green clicked");
            }}
            
            className="outline-none px-4 py-1 rounded-full text-white shadow-lg"
            style={{ backgroundColor: "green" }}
            
          >
            Green
          </button>
          <button
            className="outline-none px-4 py-1 rounded-full text-white shadow-lg"
            style={{ backgroundColor: "blue" }}
            onClick={() => setBgColor("blue")}
          >
            Blue
          </button>
        </div>
      </div>
    </>
  );
}

export default App;
