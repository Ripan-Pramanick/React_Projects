import React from 'react'
import UserContextProvider from './Context/UserContextProvider'
import Login from './Login/Login'
import Profile from './Login/profile'

const App = () => {
  return (
    <div>
      <UserContextProvider>
        <Login />
        <Profile />
      </UserContextProvider>
    </div>
  )
}

export default App

