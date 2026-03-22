import React from 'react'
import { useContext } from 'react'
import UserContext from '../Context/UserContext'

const profile = () => {
  const {user} = useContext(UserContext);

  if (!user) {
    return (
      <div>
        <h2>Profile Page</h2>
        <p>Please log in to view your profile.</p>
      </div>
    )
  } else{
  return (
    <div>
      <h2>Profile Page</h2>
      <p>Welcome, {user?.username || 'Guest'}!</p>
    </div>
  )
}
}

export default profile
