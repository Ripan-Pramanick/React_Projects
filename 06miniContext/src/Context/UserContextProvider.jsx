import React, {useState} from 'react'
import UserContext from './UserContext.js'


const UserContextProvider = ({children}) => {

    const [user, setUser] = useState({name: "John", age: 30})

  return (
    <UserContext.Provider value={{user, setUser}}>
      {children}
    </UserContext.Provider>
  ) 
 
}

export default UserContextProvider
