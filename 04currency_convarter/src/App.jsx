import React, { useState } from "react";
import InputBox from "./component/InputBox.jsx";
import { useCurrencyInfo } from "./hooks/useCurrencyInfo.js";

function App() {
    // background image
  let BackgroundImage =
    "https://img.freepik.com/free-vector/collection-digital-currency-sign-background-with-text-space_1017-60247.jpg?semt=ais_hybrid&w=740&q=80";

  // state variables
  const [amount, setAmount] = useState(1);
  const [from, setFrom] = useState("usd");
  const [to, setTo] = useState("inr");
  const [convertedAmount, setConvertedAmount] = useState(0);

  //   get currency info using custom hook
  const currencyInfo = useCurrencyInfo(from);
  const optionsObject = Object.keys(currencyInfo);

  //   button swap functionality
  const swapCurrencies = () => {
    setFrom(to);
    setTo(from);
    setConvertedAmount(amount);
    setAmount(convertedAmount);
  };

//   convert currency function
  const covertCurrency = () => setConvertedAmount(amount * currencyInfo[to]);

  return (
    <div
      className="w-full h-screen flex flex-wrap justify-center items-center bg-cover bg-no-repeat"
      style={{
        backgroundImage: `url('${BackgroundImage}')`,
      }}
    >
      <div className="w-full">
        <div className="w-full max-w-md mx-auto border border-gray-60 rounded-lg p-5 backdrop-blur-sm bg-white/30">
          <form
            onSubmit={(e) => {
              e.preventDefault();
              covertCurrency();
            }}
          >
            <div className="w-full mb-1">
              <InputBox
                label="From"
                amount={amount}
                currencyOptions={optionsObject}
                onAmountChange={(amount) => setAmount(amount)}
                onCurrencyChange={(currency) => setAmount(amount)}
                selectedCurrency={from}
              />
            </div>
            <div className="relative w-full h-0.5">
              <button
                type="button"
                className="absolute left-1/2 -translate-x-1/2 -translate-y-1/2 border-2 border-white rounded-md bg-blue-600 text-white px-2 py-0.5"
                onClick={swapCurrencies}
              >
                swap
              </button>
            </div>
            <div className="w-full mt-1 mb-4">
              <InputBox
                label="to"
                amount={convertedAmount}
                currencyOptions={optionsObject}
                onCurrencyChange={(currency) => setTo(currency)}
                selectedCurrency={to}
                amountDisabled={true}
              />
            </div>
            <button
              type="submit"
              className="w-full bg-blue-600 text-white px-4 py-3 rounded-lg"
            >
              Convert {from.toUpperCase()} to {to.toUpperCase()}
            </button>
          </form>
        </div>
      </div>
    </div>
  );
}

export default App;
