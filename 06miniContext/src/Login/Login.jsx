import React from 'react'
import { useContext, useState } from 'react'
import UserContext from '../Context/UserContext'

const Login = () => {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');

    const {setUser} = useContext(UserContext);

    const handleLogin = (e) => {
        e.preventDefault();
        setUser({username, password});
    }
  return (
    <div>
      <h2>Login Page</h2>
      <input type="text" 
      value={username}
      onChange={(e) => setUsername(e.target.value)}
      placeholder="Enter username"
       />
       {"           "}
        <input type="password" 
        value={password}
        onChange={(e) => setPassword(e.target.value)}
        placeholder="Enter password" />

        <button
        onClick={handleLogin}>Login</button>
    </div>
  )
}

export default Login
