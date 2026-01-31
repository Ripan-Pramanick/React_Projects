import {TheamProvider} from './Contexts/Theam.js'
import ThemeBtn from './Components/TheamBtn.jsx';
import Card from './Components/Card.jsx';

import { useEffect, useState } from 'react';

import "./App.css";


function App() {
  
  const [theamMode, setTheamMode] = useState('light');

  const lightTheam = () => {
    setTheamMode('light')
  }
  const darkTheam = () => {
    setTheamMode('dark')
  }

  //actual change in theam

  useEffect(() =>  {
    document.querySelector('html').classList.remove("light", "dark")
    document.querySelector('html').classList.add(theamMode)
  }, [theamMode])

  return (
    <TheamProvider value={{theamMode, lightTheam, darkTheam}}>
      <div className="flex flex-wrap min-h-screen items-center">
        <div className="w-full">
          <div className="w-full max-w-sm mx-auto flex justify-end mb-4">
           <ThemeBtn />
          </div>

          <div className="w-full max-w-sm mx-auto">
            <Card />
          </div>
        </div>
      </div>
    </TheamProvider>
  );
}

export default App;
