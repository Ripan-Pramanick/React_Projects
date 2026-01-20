import React, { useState, useCallback, useEffect, useRef } from "react";

const App = () => {
  const [length, setLength] = useState(10);
  const [numberAllowed, setNumberAllowed] = useState(false);
  const [symbolAllowed, setSymbolAllowed] = useState(false);
  const [password, setPassword] = useState("");

  const passwordGeneretor = useCallback(() => {
    let pass = "";
    let str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ" + "abcdefghijklmnopqrstuvwxyz";
    if (numberAllowed) {
      str += "0123456789";
    }
    if (symbolAllowed) {
      str += "!@#$%^&*()-+";
    }

    for (let i = 1; i <= length; i++) {
      let char = Math.floor(Math.random() * str.length);
      pass += str.charAt(char);
    }

    setPassword(pass);
  }, [length, numberAllowed, symbolAllowed]);

  useEffect(() => {
    passwordGeneretor();
  }, [length, numberAllowed, symbolAllowed, passwordGeneretor]);

  // useRef hook 
  const passwordRef = useRef(null);

  const copyPasswordClipboard = useCallback(() => {
    passwordRef.current.select();
    passwordRef.current.setSelectionRange(0, 9999); // For mobile devices
    window.navigator.clipboard.writeText(password);
    alert("Password copied to clipboard:  " + password);
  }, [password]);

  return (
    <>
      <h1 className="text-3xl font-bold text-center text-black pt-20">
        Password Generator
      </h1>
      <div className="w-full max-w-md mx-auto shadow-md rounded-lg px-4 py-3 my-8 bg-gray-800 text-orange-500">
        <div className="w-full max-w-md mx-auto shadow-md rounded-lg px-4 py-3 my-8 bg-gray-800 text-orange-500">
          <div className="flex shadow rounded-lg overflow-hidden mb-4">
            <input
              type="text"
              className="outline-none w-full py-1 px-3 bg-gray-50"
              placeholder="password"
              value={password}
              ref={passwordRef}
              readOnly
            />
            <button 
            className="outline-none bg-blue-700 text-white px-3 py-0.5 shrink-0"
            onClick={copyPasswordClipboard}>
              Copy
            </button>
          </div>

          <div className="flex text-sm gap-x-2">
            <div className="flex items-center gap-x-1">
              <input
                type="range"
                className="cursor-pointer"
                min={6}
                max={20}
                value={length}
                onChange={(e) => {
                  setLength(e.target.value);
                }}
              />
              <label htmlFor="length">Length: {length}</label>
            </div>

            <div className="flex items-center gap-x-1">
              <input
                type="checkbox"
                id="numberInput"
                defaultChecked={numberAllowed}
                onChange={() => {
                  setNumberAllowed((prev) => !prev);
                }}
              />
              <label htmlFor="numbers">Numbers</label>
            </div>

            <div className="flex items-center gap-x-1">
              <input
                type="checkbox"
                id="symbols"
                defaultChecked={symbolAllowed}
                onChange={() => {
                  setSymbolAllowed((prev) => !prev);
                }}
              />
              <label htmlFor="symbols">Symbols</label>
            </div>

            {/* <div className= >
              <input 
              type="checkbox"
              id="uppercase" 
              />
            <label htmlFor="uppercase">Uppercase</label>
            </div> */}

            {/* <div>
              <input 
              type="checkbox" 
              id="lowercase" 
              />
            <label htmlFor="lowercase">Lowercase</label>
            </div> */}
          </div>
        </div>
      </div>
    </>
  );
};

export default App;
